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

// Function to run on plugin activation
function cf7_booking_addon_activate() {
    // Check if Contact Form 7 is active
    if (is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
        // Call function to create the booking table
        cf7_booking_addon_create_table();
    } else {
        // Deactivate this plugin if Contact Form 7 is not active
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die('Contact Form 7 must be installed and activated for this plugin to work.');
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
        booking_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        form_id bigint(20) NOT NULL,
        user_id bigint(20) DEFAULT NULL,
        status varchar(100) DEFAULT 'pending',
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Check if Contact Form 7 is active when the plugin is loaded
add_action('admin_init', 'cf7_booking_check_plugin_status');

function cf7_booking_check_plugin_status() {
    if (!is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
        deactivate_plugins(plugin_basename(__FILE__));
        add_action('admin_notices', 'cf7_booking_show_admin_notice');
    }
}

// Display a notice if Contact Form 7 is not active
function cf7_booking_show_admin_notice() {
    echo '<div class="notice notice-error"><p>Contact Form 7 must be installed and activated for the Contact Form 7 Booking Addon to work.</p></div>';
}
