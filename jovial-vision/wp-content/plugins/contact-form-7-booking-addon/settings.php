<?php


// Display settings page with tabbed layout
function cf7_booking_addon_settings_page()
{
    $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'general_settings';
    ?>
    <div class="wrap">
        <h1>Contact Form 7 Booking Addon Settings</h1>
        <h2 class="nav-tab-wrapper">
            <a href="?page=cf7-booking-addon&tab=general_settings"
                class="nav-tab <?php echo $active_tab == 'general_settings' ? 'nav-tab-active' : ''; ?>">General
                Settings</a>
            <a href="?page=cf7-booking-addon&tab=stripe_settings"
                class="nav-tab <?php echo $active_tab == 'stripe_settings' ? 'nav-tab-active' : ''; ?>">Stripe Settings</a>
            <a href="?page=cf7-booking-addon&tab=paypal_settings"
                class="nav-tab <?php echo $active_tab == 'paypal_settings' ? 'nav-tab-active' : ''; ?>">PayPal Settings</a>
            <a href="?page=cf7-booking-addon&tab=razorpay_settings"
                class="nav-tab <?php echo $active_tab == 'razorpay_settings' ? 'nav-tab-active' : ''; ?>">Razorpay
                Settings</a>
            <a href="?page=cf7-booking-addon&tab=payumoney_settings"
                class="nav-tab <?php echo $active_tab == 'payumoney_settings' ? 'nav-tab-active' : ''; ?>">PayU Money
                Settings</a>
        </h2>

        <form method="post" action="options.php">
            <?php
            if ($active_tab == 'general_settings') {
                // Display General Settings fields
                settings_fields('cf7_booking_addon_options_group');
                do_settings_sections('cf7-booking-addon');
            } elseif ($active_tab == 'stripe_settings') {
                // Display Stripe Settings fields
                settings_fields('cf7_booking_addon_options_group');
                do_settings_sections('cf7-stripe-section');
            } elseif ($active_tab == 'paypal_settings') {
                // Display PayPal Settings fields
                settings_fields('cf7_booking_addon_options_group');
                do_settings_sections('cf7-paypal-section');
            } elseif ($active_tab == 'razorpay_settings') {
                // Display Razorpay Settings fields
                settings_fields('cf7_booking_addon_options_group');
                do_settings_sections('cf7-razorpay-section');
            } elseif ($active_tab == 'payumoney_settings') {
                // Display PayU Money Settings fields
                settings_fields('cf7_booking_addon_options_group');
                do_settings_sections('cf7-payumoney-section');
            }
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


// Register settings for PayPal, Razorpay, and PayU Money
add_action('admin_init', 'cf7_booking_addon_register_settings');
function cf7_booking_addon_register_settings()
{
    // General Settings
    register_setting('cf7_booking_addon_options_group', 'cf7_booking_amount');
    register_setting('cf7_booking_addon_options_group', 'cf7_booking_sandbox');

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
        'cf7_booking_sandbox',
        'Sandbox Mode',
        'cf7_booking_sandbox_callback',
        'cf7-booking-addon',
        'cf7_booking_addon_section'
    );

    // Stripe Settings
    register_setting('cf7_booking_addon_options_group', 'cf7_stripe_publishable_key');
    register_setting('cf7_booking_addon_options_group', 'cf7_stripe_secret_key');
    register_setting('cf7_booking_addon_options_group', 'cf7_stripe_webhook_url');

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
    register_setting('cf7_booking_addon_options_group', 'cf7_paypal_client_id');
    register_setting('cf7_booking_addon_options_group', 'cf7_paypal_secret');
    register_setting('cf7_booking_addon_options_group', 'cf7_paypal_webhook_url');

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
    register_setting('cf7_booking_addon_options_group', 'cf7_razorpay_key_id');
    register_setting('cf7_booking_addon_options_group', 'cf7_razorpay_key_secret');
    register_setting('cf7_booking_addon_options_group', 'cf7_razorpay_webhook_url');

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

    // PayU Money Settings
    register_setting('cf7_booking_addon_options_group', 'cf7_payumoney_key');
    register_setting('cf7_booking_addon_options_group', 'cf7_payumoney_salt');
    register_setting('cf7_booking_addon_options_group', 'cf7_payumoney_webhook_url');

    add_settings_section(
        'cf7_payumoney_section',
        'PayU Money Settings',
        'cf7_payumoney_section_callback',
        'cf7-payumoney-section'
    );
    add_settings_field(
        'cf7_payumoney_key',
        'PayU Money Key',
        'cf7_payumoney_key_callback',
        'cf7-payumoney-section',
        'cf7_payumoney_section'
    );
    add_settings_field(
        'cf7_payumoney_salt',
        'PayU Money Salt',
        'cf7_payumoney_salt_callback',
        'cf7-payumoney-section',
        'cf7_payumoney_section'
    );
    add_settings_field(
        'cf7_payumoney_webhook_url',
        'PayU Money Webhook URL',
        'cf7_payumoney_webhook_url_callback',
        'cf7-payumoney-section',
        'cf7_payumoney_section'
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

// PayU Money Settings Callbacks
function cf7_payumoney_section_callback()
{
    echo '<p>Enter your PayU Money API credentials and webhook URL here.</p>';
}
function cf7_payumoney_key_callback()
{
    $key = get_option('cf7_payumoney_key');
    echo '<input type="text" name="cf7_payumoney_key" value="' . esc_attr($key) . '" />';
}

function cf7_payumoney_salt_callback()
{
    $salt = get_option('cf7_payumoney_salt');
    echo '<input type="text" name="cf7_payumoney_salt" value="' . esc_attr($salt) . '" />';
}

function cf7_payumoney_webhook_url_callback()
{
    $url = get_option('cf7_payumoney_webhook_url');
    echo '<input type="text" name="cf7_payumoney_webhook_url" value="' . esc_attr($url) . '" />';
}


// // Registering the General and Stripe sections and their settings
// add_action('admin_init', 'cf7_booking_addon_register_settings');
// function cf7_booking_addon_register_settings()
// {
//     // General Settings
//     register_setting('cf7_booking_addon_options_group', 'cf7_booking_amount');
//     register_setting('cf7_booking_addon_options_group', 'cf7_booking_sandbox');

//     add_settings_section(
//         'cf7_booking_addon_section',
//         'General Settings',
//         'cf7_booking_addon_section_callback',
//         'cf7-booking-addon'
//     );
//     add_settings_field(
//         'cf7_booking_amount',
//         'Amount',
//         'cf7_booking_amount_callback',
//         'cf7-booking-addon',
//         'cf7_booking_addon_section'
//     );
//     add_settings_field(
//         'cf7_booking_sandbox',
//         'Sandbox Mode',
//         'cf7_booking_sandbox_callback',
//         'cf7-booking-addon',
//         'cf7_booking_addon_section'
//     );

//     // Stripe Settings
//     register_setting('cf7_booking_addon_options_group', 'cf7_stripe_publishable_key');
//     register_setting('cf7_booking_addon_options_group', 'cf7_stripe_secret_key');
//     register_setting('cf7_booking_addon_options_group', 'cf7_stripe_webhook_url');

//     add_settings_section(
//         'cf7_stripe_section',
//         'Stripe Settings',
//         'cf7_stripe_section_callback',
//         'cf7-stripe-section'
//     );
//     add_settings_field(
//         'cf7_stripe_publishable_key',
//         'Stripe Publishable Key',
//         'cf7_stripe_publishable_key_callback',
//         'cf7-stripe-section',
//         'cf7_stripe_section'
//     );
//     add_settings_field(
//         'cf7_stripe_secret_key',
//         'Stripe Secret Key',
//         'cf7_stripe_secret_key_callback',
//         'cf7-stripe-section',
//         'cf7_stripe_section'
//     );
//     add_settings_field(
//         'cf7_stripe_webhook_url',
//         'Stripe Webhook URL',
//         'cf7_stripe_webhook_url_callback',
//         'cf7-stripe-section',
//         'cf7_stripe_section'
//     );
// }

// // General section callback
// function cf7_booking_addon_section_callback()
// {
//     echo '<p>Customize your Contact Form 7 Booking Addon settings below.</p>';
// }

// // Stripe section callback
// function cf7_stripe_section_callback()
// {
//     echo '<p>Configure your Stripe settings below.</p>';
// }

// // Amount field callback
// function cf7_booking_amount_callback()
// {
//     $amount = get_option('cf7_booking_amount');
//     echo '<input type="text" name="cf7_booking_amount" value="' . esc_attr($amount) . '" class="regular-text" />';
// }

// // Sandbox Mode field callback
// function cf7_booking_sandbox_callback()
// {
//     $sandbox = get_option('cf7_booking_sandbox');
//     $checked = $sandbox ? 'checked' : '';
//     echo '<input type="checkbox" name="cf7_booking_sandbox" value="1" ' . $checked . ' />';
//     echo '<label for="cf7_booking_sandbox"> Enable Sandbox Mode</label>';
// }

// // Stripe Publishable Key field callback
// function cf7_stripe_publishable_key_callback()
// {
//     $publishable_key = get_option('cf7_stripe_publishable_key');
//     echo '<input type="text" name="cf7_stripe_publishable_key" value="' . esc_attr($publishable_key) . '" class="regular-text" />';
// }

// // Stripe Secret Key field callback
// function cf7_stripe_secret_key_callback()
// {
//     $secret_key = get_option('cf7_stripe_secret_key');
//     echo '<input type="text" name="cf7_stripe_secret_key" value="' . esc_attr($secret_key) . '" class="regular-text" />';
// }

// // Stripe Webhook URL field callback
// function cf7_stripe_webhook_url_callback()
// {
//     $webhook_url = get_option('cf7_stripe_webhook_url');
//     echo '<input type="text" name="cf7_stripe_webhook_url" value="' . esc_attr($webhook_url) . '" class="regular-text" />';
// }


