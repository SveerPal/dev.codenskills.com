<?php


// Display settings page with tabbed layout
// Register settings for General, Stripe, PayPal, Razorpay, and PayU
add_action('admin_init', 'cf7_booking_addon_register_settings');
function cf7_booking_addon_register_settings()
{
    // General Settings
    register_setting('cf7_booking_general_options_group', 'cf7_booking_amount');
    register_setting('cf7_booking_general_options_group', 'cf7_booking_currency');
    register_setting('cf7_booking_general_options_group', 'cf7_booking_sandbox');

    add_settings_section(
        'cf7_booking_addon_section',
        'General Settings',
        'cf7_booking_addon_section_callback',
        'cf7-booking-addon'
    );

    add_settings_field(
        'cf7_booking_amount',
        'Amount',
        'cf7_booking_amount_callback',
        'cf7-booking-addon',
        'cf7_booking_addon_section'
    );
    add_settings_field(
        'cf7_booking_currency',
        'Currency',
        'cf7_booking_currency_callback',
        'cf7-booking-addon',
        'cf7_booking_addon_section'
    );
    add_settings_field(
        'cf7_booking_sandbox',
        'Sandbox Mode',
        'cf7_booking_sandbox_callback',
        'cf7-booking-addon',
        'cf7_booking_addon_section'
    );

    // Stripe Settings
    register_setting('cf7_booking_stripe_options_group', 'cf7_stripe_publishable_key');
    register_setting('cf7_booking_stripe_options_group', 'cf7_stripe_secret_key');
    register_setting('cf7_booking_stripe_options_group', 'cf7_stripe_webhook_url');

    add_settings_section(
        'cf7_stripe_section',
        'Stripe Settings',
        'cf7_stripe_section_callback',
        'cf7-stripe-section'
    );

    add_settings_field(
        'cf7_stripe_publishable_key',
        'Stripe Publishable Key',
        'cf7_stripe_publishable_key_callback',
        'cf7-stripe-section',
        'cf7_stripe_section'
    );
    add_settings_field(
        'cf7_stripe_secret_key',
        'Stripe Secret Key',
        'cf7_stripe_secret_key_callback',
        'cf7-stripe-section',
        'cf7_stripe_section'
    );
    add_settings_field(
        'cf7_stripe_webhook_url',
        'Stripe Webhook URL',
        'cf7_stripe_webhook_url_callback',
        'cf7-stripe-section',
        'cf7_stripe_section'
    );

    // PayPal Settings
    register_setting('cf7_booking_paypal_options_group', 'cf7_paypal_client_id');
    register_setting('cf7_booking_paypal_options_group', 'cf7_paypal_secret');
    register_setting('cf7_booking_paypal_options_group', 'cf7_paypal_webhook_url');

    add_settings_section(
        'cf7_paypal_section',
        'PayPal Settings',
        'cf7_paypal_section_callback',
        'cf7-paypal-section'
    );
    add_settings_field(
        'cf7_paypal_client_id',
        'PayPal Client ID',
        'cf7_paypal_client_id_callback',
        'cf7-paypal-section',
        'cf7_paypal_section'
    );
    add_settings_field(
        'cf7_paypal_secret',
        'PayPal Secret',
        'cf7_paypal_secret_callback',
        'cf7-paypal-section',
        'cf7_paypal_section'
    );
    add_settings_field(
        'cf7_paypal_webhook_url',
        'PayPal Webhook URL',
        'cf7_paypal_webhook_url_callback',
        'cf7-paypal-section',
        'cf7_paypal_section'
    );

    // Razorpay Settings
    register_setting('cf7_booking_razorpay_options_group', 'cf7_razorpay_key_id');
    register_setting('cf7_booking_razorpay_options_group', 'cf7_razorpay_key_secret');
    register_setting('cf7_booking_razorpay_options_group', 'cf7_razorpay_webhook_url');

    add_settings_section(
        'cf7_razorpay_section',
        'Razorpay Settings',
        'cf7_razorpay_section_callback',
        'cf7-razorpay-section'
    );
    add_settings_field(
        'cf7_razorpay_key_id',
        'Razorpay Key ID',
        'cf7_razorpay_key_id_callback',
        'cf7-razorpay-section',
        'cf7_razorpay_section'
    );
    add_settings_field(
        'cf7_razorpay_key_secret',
        'Razorpay Key Secret',
        'cf7_razorpay_key_secret_callback',
        'cf7-razorpay-section',
        'cf7_razorpay_section'
    );
    add_settings_field(
        'cf7_razorpay_webhook_url',
        'Razorpay Webhook URL',
        'cf7_razorpay_webhook_url_callback',
        'cf7-razorpay-section',
        'cf7_razorpay_section'
    );

    // PayU Settings
    register_setting('cf7_booking_payu_options_group', 'cf7_payu_key');
    register_setting('cf7_booking_payu_options_group', 'cf7_payu_salt');
    register_setting('cf7_booking_payu_options_group', 'cf7_payu_webhook_url');

    add_settings_section(
        'cf7_payu_section',
        'PayU Settings',
        'cf7_payu_section_callback',
        'cf7-payu-section'
    );
    add_settings_field(
        'cf7_payu_key',
        'PayU Key',
        'cf7_payu_key_callback',
        'cf7-payu-section',
        'cf7_payu_section'
    );
    add_settings_field(
        'cf7_payu_salt',
        'PayU Salt',
        'cf7_payu_salt_callback',
        'cf7-payu-section',
        'cf7_payu_section'
    );
    add_settings_field(
        'cf7_payu_webhook_url',
        'PayU Webhook URL',
        'cf7_payu_webhook_url_callback',
        'cf7-payu-section',
        'cf7_payu_section'
    );
}


// General Settings Callbacks
function cf7_booking_addon_section_callback()
{
    echo '<p>Configure the general settings for the Contact Form 7 Booking Addon here.</p>';
}
function cf7_booking_amount_callback()
{
    $amount = get_option('cf7_booking_amount');
    echo '<input type="text" name="cf7_booking_amount" value="' . esc_attr($amount) . '" />';
}
function cf7_booking_currency_callback()
{
    $currency = get_option('cf7_booking_currency', 'USD'); // Default is USD
    $currencies = array(
        'USD' => 'US Dollar',
        'EUR' => 'Euro',
        'GBP' => 'British Pound',
        'INR' => 'Indian Rupee',
        'AUD' => 'Australian Dollar',
        'CAD' => 'Canadian Dollar'
    );
    
    echo '<select name="cf7_booking_currency">';
    foreach ($currencies as $key => $label) {
        $selected = ($currency === $key) ? 'selected="selected"' : '';
        echo '<option value="' . esc_attr($key) . '" ' . $selected . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
}
function cf7_booking_sandbox_callback()
{
    $sandbox = get_option('cf7_booking_sandbox');
    $checked = $sandbox ? 'checked' : '';
    echo '<input type="checkbox" name="cf7_booking_sandbox" ' . $checked . ' /> Enable Sandbox';
}

// Stripe Settings Callbacks
function cf7_stripe_section_callback()
{
    echo '<p>Enter your Stripe API keys and webhook URL here.</p>';
}
function cf7_stripe_publishable_key_callback()
{
    $key = get_option('cf7_stripe_publishable_key');
    echo '<input type="text" name="cf7_stripe_publishable_key" value="' . esc_attr($key) . '" />';
}
function cf7_stripe_secret_key_callback()
{
    $key = get_option('cf7_stripe_secret_key');
    echo '<input type="text" name="cf7_stripe_secret_key" value="' . esc_attr($key) . '" />';
}
function cf7_stripe_webhook_url_callback()
{
    $url = get_option('cf7_stripe_webhook_url');
    echo '<input type="text" name="cf7_stripe_webhook_url" value="' . esc_attr($url) . '" />';
}

// PayPal Settings Callbacks
function cf7_paypal_section_callback()
{
    echo '<p>Enter your PayPal API credentials and webhook URL here.</p>';
}
function cf7_paypal_client_id_callback()
{
    $client_id = get_option('cf7_paypal_client_id');
    echo '<input type="text" name="cf7_paypal_client_id" value="' . esc_attr($client_id) . '" />';
}
function cf7_paypal_secret_callback()
{
    $secret = get_option('cf7_paypal_secret');
    echo '<input type="text" name="cf7_paypal_secret" value="' . esc_attr($secret) . '" />';
}
function cf7_paypal_webhook_url_callback()
{
    $url = get_option('cf7_paypal_webhook_url');
    echo '<input type="text" name="cf7_paypal_webhook_url" value="' . esc_attr($url) . '" />';
}

// Razorpay Settings Callbacks
function cf7_razorpay_section_callback()
{
    echo '<p>Enter your Razorpay API credentials and webhook URL here.</p>';
}
function cf7_razorpay_key_id_callback()
{
    $key_id = get_option('cf7_razorpay_key_id');
    echo '<input type="text" name="cf7_razorpay_key_id" value="' . esc_attr($key_id) . '" />';
}
function cf7_razorpay_key_secret_callback()
{
    $secret = get_option('cf7_razorpay_key_secret');
    echo '<input type="text" name="cf7_razorpay_key_secret" value="' . esc_attr($secret) . '" />';
}
function cf7_razorpay_webhook_url_callback()
{
    $url = get_option('cf7_razorpay_webhook_url');
    echo '<input type="text" name="cf7_razorpay_webhook_url" value="' . esc_attr($url) . '" />';
}

// PayU Settings Callbacks
function cf7_payu_section_callback()
{
    echo '<p>Enter your PayU API credentials and webhook URL here.</p>';
}
function cf7_payu_key_callback()
{
    $key = get_option('cf7_payu_key');
    echo '<input type="text" name="cf7_payu_key" value="' . esc_attr($key) . '" />';
}
function cf7_payu_salt_callback()
{
    $salt = get_option('cf7_payu_salt');
    echo '<input type="text" name="cf7_payu_salt" value="' . esc_attr($salt) . '" />';
}
function cf7_payu_webhook_url_callback()
{
    $url = get_option('cf7_payu_webhook_url');
    echo '<input type="text" name="cf7_payu_webhook_url" value="' . esc_attr($url) . '" />';
}

// Settings Page Form
function cf7_booking_addon_settings_page()
{
    $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'general_settings';
    ?>
    <div class="wrap">
        <h1>Contact Form 7 Booking Addon Settings</h1>
        <h2 class="nav-tab-wrapper">
            <a href="?page=cf7-booking-addon&tab=general_settings" class="nav-tab <?php echo $active_tab == 'general_settings' ? 'nav-tab-active' : ''; ?>">General Settings</a>
            <a href="?page=cf7-booking-addon&tab=stripe_settings" class="nav-tab <?php echo $active_tab == 'stripe_settings' ? 'nav-tab-active' : ''; ?>">Stripe Settings</a>
            <a href="?page=cf7-booking-addon&tab=paypal_settings" class="nav-tab <?php echo $active_tab == 'paypal_settings' ? 'nav-tab-active' : ''; ?>">PayPal Settings</a>
            <a href="?page=cf7-booking-addon&tab=razorpay_settings" class="nav-tab <?php echo $active_tab == 'razorpay_settings' ? 'nav-tab-active' : ''; ?>">Razorpay Settings</a>
            <a href="?page=cf7-booking-addon&tab=payu_settings" class="nav-tab <?php echo $active_tab == 'payu_settings' ? 'nav-tab-active' : ''; ?>">PayU Settings</a>
        </h2>

        <form method="post" action="options.php">
            <?php
            if ($active_tab == 'general_settings') {
                settings_fields('cf7_booking_general_options_group');
                do_settings_sections('cf7-booking-addon');
            } elseif ($active_tab == 'stripe_settings') {
                settings_fields('cf7_booking_stripe_options_group');
                do_settings_sections('cf7-stripe-section');
            } elseif ($active_tab == 'paypal_settings') {
                settings_fields('cf7_booking_paypal_options_group');
                do_settings_sections('cf7-paypal-section');
            } elseif ($active_tab == 'razorpay_settings') {
                settings_fields('cf7_booking_razorpay_options_group');
                do_settings_sections('cf7-razorpay-section');
            } elseif ($active_tab == 'payu_settings') {
                settings_fields('cf7_booking_payu_options_group');
                do_settings_sections('cf7-payu-section');
            }
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


// // General Settings
// $booking_amount = get_option('cf7_booking_amount', '');
// $booking_currency = get_option('cf7_booking_currency', 'USD'); // Default is USD
// $booking_sandbox = get_option('cf7_booking_sandbox', false);

// // Stripe Settings
// $stripe_publishable_key = get_option('cf7_stripe_publishable_key', '');
// $stripe_secret_key = get_option('cf7_stripe_secret_key', '');
// $stripe_webhook_url = get_option('cf7_stripe_webhook_url', '');

// // PayPal Settings
// $paypal_client_id = get_option('cf7_paypal_client_id', '');
// $paypal_secret = get_option('cf7_paypal_secret', '');
// $paypal_webhook_url = get_option('cf7_paypal_webhook_url', '');

// // Razorpay Settings
// $razorpay_key_id = get_option('cf7_razorpay_key_id', '');
// $razorpay_key_secret = get_option('cf7_razorpay_key_secret', '');
// $razorpay_webhook_url = get_option('cf7_razorpay_webhook_url', '');

// // PayU Settings
// $payu_key = get_option('cf7_payu_key', '');
// $payu_salt = get_option('cf7_payu_salt', '');
// $payu_webhook_url = get_option('cf7_payu_webhook_url', '');

// // Debugging: You can output or log the values like this (for testing purposes)
// echo '<pre>';
// echo 'General Settings:';
// echo 'Booking Amount: ' . esc_html($booking_amount) . PHP_EOL;
// echo 'Currency: ' . esc_html($booking_currency) . PHP_EOL;
// echo 'Sandbox Mode: ' . esc_html($booking_sandbox) . PHP_EOL;

// echo 'Stripe Settings:';
// echo 'Publishable Key: ' . esc_html($stripe_publishable_key) . PHP_EOL;
// echo 'Secret Key: ' . esc_html($stripe_secret_key) . PHP_EOL;
// echo 'Webhook URL: ' . esc_html($stripe_webhook_url) . PHP_EOL;

// echo 'PayPal Settings:';
// echo 'Client ID: ' . esc_html($paypal_client_id) . PHP_EOL;
// echo 'Secret: ' . esc_html($paypal_secret) . PHP_EOL;
// echo 'Webhook URL: ' . esc_html($paypal_webhook_url) . PHP_EOL;

// echo 'Razorpay Settings:';
// echo 'Key ID: ' . esc_html($razorpay_key_id) . PHP_EOL;
// echo 'Key Secret: ' . esc_html($razorpay_key_secret) . PHP_EOL;
// echo 'Webhook URL: ' . esc_html($razorpay_webhook_url) . PHP_EOL;

// echo 'PayU Settings:';
// echo 'Key: ' . esc_html($payu_key) . PHP_EOL;
// echo 'Salt: ' . esc_html($payu_salt) . PHP_EOL;
// echo 'Webhook URL: ' . esc_html($payu_webhook_url) . PHP_EOL;
// echo '</pre>';
