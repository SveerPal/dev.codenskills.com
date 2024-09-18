<?php
function process_payment($amount, $currency, $payment_method)
{
    // General sandbox mode
    $is_sandbox = get_option('cf7_booking_sandbox', false);

    switch ($payment_method) {
        case 'stripe':
            process_stripe_payment($amount, $currency, $is_sandbox);
            break;

        case 'paypal':
            process_paypal_payment($amount, $currency, $is_sandbox);
            break;

        case 'razorpay':
            process_razorpay_payment($amount, $currency, $is_sandbox);
            break;

        case 'payu':
            process_payu_payment($amount, $currency, $is_sandbox);
            break;

        default:
            echo 'Invalid payment method selected';
            break;
    }
}

////////////////////////////////////////
// Stripe Payment Processing Function //
////////////////////////////////////////

function process_stripe_payment($amount, $currency, $is_sandbox)
{
    // Stripe API keys
    $stripe_publishable_key = get_option('cf7_stripe_publishable_key', '');
    $stripe_secret_key = get_option('cf7_stripe_secret_key', '');

    // Stripe PHP SDK is already autoloaded by Composer
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    try {
        $charge = \Stripe\Charge::create([
            'amount' => $amount * 100, // Stripe expects amount in cents
            'currency' => $currency,
            'description' => 'Booking Payment',
            'source' => $_POST['stripeToken'], // The source token from frontend
        ]);

        echo 'Payment successful!';
    } catch (Exception $e) {
        echo 'Payment failed: ' . $e->getMessage();
    }
}

////////////////////////////////////////
// PayPal Payment Processing Function //
////////////////////////////////////////

function process_paypal_payment($amount, $currency, $is_sandbox)
{
    // PayPal API credentials
    $paypal_client_id = get_option('cf7_paypal_client_id', '');
    $paypal_secret = get_option('cf7_paypal_secret', '');

    $endpoint = $is_sandbox ? 'https://api.sandbox.paypal.com' : 'https://api.paypal.com';

    $accessToken = get_paypal_access_token($paypal_client_id, $paypal_secret, $endpoint);

    if ($accessToken) {
        $paymentData = [
            'intent' => 'sale',
            'payer' => ['payment_method' => 'paypal'],
            'transactions' => [
                [
                    'amount' => [
                        'total' => $amount,
                        'currency' => $currency
                    ],
                    'description' => 'Booking Payment'
                ]
            ]
        ];

        $response = make_paypal_payment($paymentData, $accessToken, $endpoint);

        if ($response['status'] == 'success') {
            echo 'Payment successful!';
        } else {
            echo 'Payment failed: ' . $response['message'];
        }
    } else {
        echo 'Failed to retrieve PayPal access token';
    }
}

////////////////////////////////////////
// Razorpay Payment Processing Function //
////////////////////////////////////////

function process_razorpay_payment($amount, $currency, $is_sandbox)
{
    // Razorpay API credentials
    $razorpay_key_id = get_option('cf7_razorpay_key_id', '');
    $razorpay_key_secret = get_option('cf7_razorpay_key_secret', '');

    // Razorpay SDK is already autoloaded by Composer
    $api = new \Razorpay\Api\Api($razorpay_key_id, $razorpay_key_secret);

    try {
        $order = $api->order->create([
            'receipt' => 'rcptid_11',
            'amount' => $amount * 100, // Amount in paisa (INR)
            'currency' => $currency,
            'payment_capture' => 1
        ]);

        echo 'Payment successful!';
    } catch (Exception $e) {
        echo 'Payment failed: ' . $e->getMessage();
    }
}

////////////////////////////////////////
// PayU Payment Processing Function //
////////////////////////////////////////

function process_payu_payment($amount, $currency, $is_sandbox)
{
    // PayU API credentials
    $payu_key = get_option('cf7_payu_key', '');
    $payu_salt = get_option('cf7_payu_salt', '');

    $endpoint = $is_sandbox ? 'https://test.payu.in/_payment' : 'https://secure.payu.in/_payment';

    $hash_string = $payu_key . '|' . uniqid() . '|' . $amount . '|' . 'Booking Payment' . '|' . 'customer_name' . '|' . 'customer_email' . '||||||||||' . $payu_salt;
    $hash = strtolower(hash('sha512', $hash_string));

    $payment_data = [
        'key' => $payu_key,
        'txnid' => uniqid(),
        'amount' => $amount,
        'productinfo' => 'Booking Payment',
        'firstname' => 'Customer Name',
        'email' => 'customer@example.com',
        'phone' => '1234567890',
        'surl' => 'https://yourwebsite.com/success',
        'furl' => 'https://yourwebsite.com/failure',
        'hash' => $hash,
        'service_provider' => 'payu_paisa'
    ];

    // Redirect the customer to PayU payment page
    echo '<form action="' . $endpoint . '" method="POST">';
    foreach ($payment_data as $key => $value) {
        echo '<input type="hidden" name="' . $key . '" value="' . $value . '">';
    }
    echo '<input type="submit" value="Pay Now">';
    echo '</form>';
}

////////////////////////////////////////
// PayPal Helper Functions //
////////////////////////////////////////

function get_paypal_access_token($client_id, $secret, $endpoint)
{
    // Get PayPal access token using client credentials
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint . "/v1/oauth2/token");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, $client_id . ":" . $secret);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

    $response = curl_exec($ch);
    if (empty($response)) {
        return null;
    } else {
        $json = json_decode($response);
        return $json->access_token;
    }

    curl_close($ch);
}

function make_paypal_payment($paymentData, $accessToken, $endpoint)
{
    // Make the payment request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint . "/v1/payments/payment");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer " . $accessToken
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($paymentData));

    $response = curl_exec($ch);
    if (empty($response)) {
        return ['status' => 'failure', 'message' => 'Empty response from PayPal'];
    } else {
        $json = json_decode($response);
        if ($json->state == 'approved') {
            return ['status' => 'success', 'message' => 'Payment approved'];
        } else {
            return ['status' => 'failure', 'message' => 'Payment failed'];
        }
    }

    curl_close($ch);
}
