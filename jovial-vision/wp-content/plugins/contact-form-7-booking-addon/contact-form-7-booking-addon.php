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
    register_setting('cf7_booking_addon_options_group', 'cf7_booking_addon_option');
    
    add_settings_section(
        'cf7_booking_addon_section',
        'Settings',
        'cf7_booking_addon_section_callback',
        'cf7-booking-addon'
    );

    add_settings_field(
        'cf7_booking_addon_field',
        'Custom Option',
        'cf7_booking_addon_field_callback',
        'cf7-booking-addon',
        'cf7_booking_addon_section'
    );
}

function cf7_booking_addon_section_callback() {
    echo '<p>Customize your Contact Form 7 Booking Addon settings below.</p>';
}

function cf7_booking_addon_field_callback() {
    $option = get_option('cf7_booking_addon_option');
    echo '<input type="text" name="cf7_booking_addon_option" value="' . esc_attr($option) . '" />';
}
?>
