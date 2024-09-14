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

// Hook into admin notice
add_action('admin_notices', 'cf7_booking_show_admin_notice');

// Function to check if Contact Form 7 is active during plugin activation
function cf7_booking_addon_activate() {
    // Check if Contact Form 7 is not active
    if (!class_exists('WPCF7')) {
        // Set an option to trigger the admin notice
        update_option('cf7_booking_notice', true);

        // Deactivate this plugin
        deactivate_plugins(plugin_basename(__FILE__));
    } else {
        // If Contact Form 7 is active, create the booking table
        cf7_booking_addon_create_table();
    }
}

// Function to create the booking table if it doesn't exist
function cf7_booking_addon_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cf7_booking';

    // SQL query to create the table if it doesn't exist
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
    status payment(100) DEFAULT 'pending',
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
    // Check if Contact Form 7 is not active and notice should still be shown
    if (!class_exists('WPCF7') && get_option('cf7_booking_notice')) {
        echo '<div class="notice notice-error is-dismissible"><p><strong>Contact Form 7 Booking Addon</strong> requires Contact Form 7 to be installed and activated.</p></div>';
    }
}

// Remove the notice when Contact Form 7 becomes active
add_action('admin_init', 'cf7_booking_check_contact_form7_status');
function cf7_booking_check_contact_form7_status() {
    // If Contact Form 7 is now active, remove the notice flag
    if (class_exists('WPCF7')) {
        delete_option('cf7_booking_notice');
    }
}
