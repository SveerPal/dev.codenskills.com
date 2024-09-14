<?php
/**
 * Plugin Name: Contact Form 7 Booking Addon
 * Plugin URI: https://codenskills.com
 * Description: A booking addon for Contact Form 7.
 * Version: 1.0
 * Author: Yashvir Pal
 * Author URI: https://yashvirpal.com
 * License: GPL2
 */

// Hook into plugin activation
register_activation_hook(__FILE__, 'cf7_booking_addon_activate');

// Hook into admin notices
add_action('admin_notices', 'cf7_booking_show_admin_notice');

// Hook into admin menu to add settings page
add_action('admin_menu', 'cf7_booking_addon_menu');

// Function to check if Contact Form 7 is active during plugin activation
function cf7_booking_addon_activate() {
    if (!class_exists('WPCF7')) {
        update_option('cf7_booking_notice', true);
        deactivate_plugins(plugin_basename(__FILE__));
    } else {
        cf7_booking_addon_create_table();
    }
}

// Function to create the booking table if it doesn't exist
function cf7_booking_addon_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cf7_booking';

    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        transactions_id varchar(100) DEFAULT NULL,
        booking_date datetime DEFAULT NULL,
        name varchar(100) DEFAULT NULL,
        email varchar(100) DEFAULT NULL,
        amount varchar(100) DEFAULT NULL,
        date date DEFAULT NULL,
        time time DEFAULT NULL,
        payment varchar(100) DEFAULT NULL,
        form_id bigint(20) NOT NULL,
        status varchar(100) DEFAULT 'pending',
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Show admin notice if Contact Form 7 is not active
function cf7_booking_show_admin_notice() {
    if (!class_exists('WPCF7') && get_option('cf7_booking_notice')) {
        echo '<div class="notice notice-error is-dismissible"><p><strong>Contact Form 7 Booking Addon</strong> requires Contact Form 7 to be installed and activated.</p></div>';
    }
}

// Remove the notice when Contact Form 7 becomes active
add_action('admin_init', 'cf7_booking_check_contact_form7_status');
function cf7_booking_check_contact_form7_status() {
    if (class_exists('WPCF7')) {
        delete_option('cf7_booking_notice');
    }
}

// Add settings page to the admin menu
function cf7_booking_addon_menu() {
    add_options_page(
        'Contact Form 7 Booking Addon Settings',
        'CF7 Booking Addon',
        'manage_options',
        'cf7-booking-addon',
        'cf7_booking_addon_settings_page'
    );
}

// Display settings page
function cf7_booking_addon_settings_page() {
    ?>
    <div class="wrap">
        <h1>Contact Form 7 Booking Addon Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('cf7_booking_addon_options_group');
            do_settings_sections('cf7-booking-addon');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings
add_action('admin_init', 'cf7_booking_addon_register_settings');
function cf7_booking_addon_register_settings() {
    // Register settings
    register_setting('cf7_booking_addon_options_group', 'cf7_booking_amount');
    register_setting('cf7_booking_addon_options_group', 'cf7_booking_sandbox');
    // Payment Gateway Settings
    register_setting('cf7_booking_addon_options_group', 'cf7_payment_gateways');
    register_setting('cf7_booking_addon_options_group', 'cf7_payment_keys');
    register_setting('cf7_booking_addon_options_group', 'cf7_payment_webhooks');
    
    // Add settings section
    add_settings_section(
        'cf7_booking_addon_section',
        'General Settings',
        'cf7_booking_addon_section_callback',
        'cf7-booking-addon'
    );

    // Add settings fields
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

    

    // Payment Gateway settings
    add_settings_section(
        'cf7_payment_gateways_section',
        'Payment Gateways Settings',
        'cf7_payment_gateways_section_callback',
        'cf7-booking-addon'
    );

    add_settings_field(
        'cf7_payment_gateways',
        'Payment Gateways',
        'cf7_payment_gateways_callback',
        'cf7-booking-addon',
        'cf7_payment_gateways_section'
    );

    add_settings_field(
        'cf7_payment_keys',
        'Payment Details',
        'cf7_payment_keys_callback',
        'cf7-booking-addon',
        'cf7_payment_gateways_section'
    );
    
}

// Section callback
function cf7_booking_addon_section_callback() {
    echo '<p>Customize your Contact Form 7 Booking Addon settings below.</p>';
}

// Amount field callback
function cf7_booking_amount_callback() {
    $amount = get_option('cf7_booking_amount');
    echo '<input type="text" name="cf7_booking_amount" value="' . esc_attr($amount) . '" class="regular-text" />';
}

// Sandbox Mode field callback
function cf7_booking_sandbox_callback() {
    $sandbox = get_option('cf7_booking_sandbox');
    $checked = $sandbox ? 'checked' : '';
    echo '<input type="checkbox" name="cf7_booking_sandbox" value="1" ' . $checked . ' />';
    echo '<label for="cf7_booking_sandbox"> Enable Sandbox Mode</label>';
}



// Payment Gateways section callback
function cf7_payment_gateways_section_callback() {
    echo '<p>Configure the payment gateways, their API keys, and webhook URLs below.</p>';
}

// Payment Gateways field callback
function cf7_payment_gateways_callback() {
    $gateways = get_option('cf7_payment_gateways', array());
    $gateways = is_array($gateways) ? $gateways : array();
    $options = array('stripe' => 'Stripe', 'paypal' => 'PayPal', 'payumoney' => 'PayUMoney', 'razorpay' => 'Razorpay');

    foreach ($options as $key => $label) {
        $checked = in_array($key, $gateways) ? 'checked' : '';
        echo '<input type="checkbox" name="cf7_payment_gateways[]" value="' . esc_attr($key) . '" ' . $checked . ' />';
        echo '<label for="cf7_payment_gateways_' . esc_attr($key) . '"> ' . esc_html($label) . '</label><br>';
    }
}

// API Keys field callback
// API Keys field callback
function cf7_payment_keys_callback() {
    $keys = get_option('cf7_payment_keys', array());
    $keys = is_array($keys) ? $keys : array();
    
    $webhooks = get_option('cf7_payment_webhooks', array());
    $webhooks = is_array($webhooks) ? $webhooks : array();
    
    $gateways = array(
        'stripe' => 'Stripe',
        'paypal' => 'PayPal',
        'payumoney' => 'PayUMoney',
        'razorpay' => 'Razorpay'
    );

    foreach ($gateways as $key => $label) {
        echo '<h3>' . esc_html($label) . '</h3>';
        
        echo '<table class="form-table">';
        echo '<tbody>';
        
        // Sandbox API Key
        echo '<tr>';
        echo '<th scope="row"><label for="' . esc_attr($key) . '_sandbox_key">Sandbox API Key:</label></th>';
        echo '<td><input type="text" name="cf7_payment_keys[' . esc_attr($key) . '][sandbox]" value="' . esc_attr($keys[$key]['sandbox'] ?? '') . '" class="regular-text" /></td>';
        echo '</tr>';
        
        // Production API Key
        echo '<tr>';
        echo '<th scope="row"><label for="' . esc_attr($key) . '_production_key">Production API Key:</label></th>';
        echo '<td><input type="text" name="cf7_payment_keys[' . esc_attr($key) . '][production]" value="' . esc_attr($keys[$key]['production'] ?? '') . '" class="regular-text" /></td>';
        echo '</tr>';
        
        // Webhook URL
        echo '<tr>';
        echo '<th scope="row"><label for="' . esc_attr($key) . '_webhook_url">Webhook URL:</label></th>';
        echo '<td><input type="text" name="cf7_payment_webhooks[' . esc_attr($key) . ']" value="' . esc_attr($webhooks[$key] ?? '') . '" class="regular-text" /></td>';
        echo '</tr>';
        
        echo '</tbody>';
        echo '</table>';
    }
}



?>
