<?php
/*
Plugin Name: Tainacan URL Metadata Type
Plugin URI: https://tainacan.org/
Description: A URL Metadata Type for Tainacan, that displays a link or an embed content, if possible.
Author: tainacan
Version: 0.2.0
Text Domain: tainacan-url-metadata-type
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/** Plugin version */
const TAINACAN_URL_PLUGIN_VERSION = '0.2.0';

add_action("tainacan-register-metadata-type", "tainacan_url_plugin_register_metadata_type");
function tainacan_url_plugin_register_metadata_type($helper) {

    // Registering the Class
    require_once( plugin_dir_path(__FILE__) . 'metadata_type/metadata-type.php' );

    // Registering the Vue Component
    $handle = 'tainacan-metadata-type-url';
    $class_name = 'TAINACAN_URL_Plugin_Metadata_Type';
    $metadata_script_url = plugin_dir_url(__FILE__) . 'metadata_type/metadata-type.bundle.js';
    $helper->register_metadata_type($handle, $class_name, $metadata_script_url);
}

add_action("tainacan-register-vuejs-component", "tainacan_url_plugin_register_metadata_type_form");
function tainacan_url_plugin_register_metadata_type_form($helper) {
    
    // Registering the Vue Component for the Metadata Options Form
    $handle2 = 'url-metadata-type-form';
    $component_script_url = plugin_dir_url(__FILE__) . 'metadata_type/metadata-type-form.js';
    $helper->register_vuejs_component($handle2, $component_script_url);
}

add_action("wp_enqueue_scripts", "tainacan_url_plugin_enqueue_styles");
function tainacan_url_plugin_enqueue_styles() {

    // Registers the plugin necessary style to display some of URL metadata type content
	wp_register_style( 'TainacanURLPluginStyle', plugin_dir_url(__FILE__) . 'metadata_type/metadata-type.css', '', TAINACAN_URL_PLUGIN_VERSION );
	wp_enqueue_style( 'TainacanURLPluginStyle' );
}

/* Logics for the deprecation warning */
function tainacan_url_plugin_enqueue_admin_scripts() {
    wp_enqueue_script( 'tainacan-url-plugin-notices', plugin_dir_url(__FILE__) . 'metadata_type/notices.js', array(), TAINACAN_URL_PLUGIN_VERSION, true );
}
add_action("admin_enqueue_scripts", "tainacan_url_plugin_enqueue_admin_scripts");

function tainacan_url_plugin_dismiss_notification() {
    set_transient( 'tainacan_url_plugin_notification_dismissed', true );
    wp_die();
}
add_action( 'wp_ajax_dismiss_notification', 'tainacan_url_plugin_dismiss_notification' );

/* Adds deprecation warnings as this plugin is part of Tainacan core from version 0.21.0 on */
function tainacan_url_plugin_deprecation_warning() {

    $screen = get_current_screen();
    
    if ( $screen->id !== 'plugins' )
        return;

    if ( !defined( 'TAINACAN_VERSION' ) )
        return;

    if ( get_transient( 'tainacan_url_plugin_notification_dismissed' ) )
        return;

    $is_tainacan_version_new = version_compare(TAINACAN_VERSION, '0.21.0', '>=');

    echo '<div id="tainacan-url-plugin-deprecation-notification" class="notice notice-' . ($is_tainacan_version_new ? 'info' : 'warning') . ' is-dismissible"><p>';

    echo __('The URL metadata type functionality is part of Tainacan core from version 0.21.0 on.', 'tainacan-url-metadata-type');

    echo '&nbsp;<strong>';

    if ( $is_tainacan_version_new ) 
        echo __('You can safely deactivate and delete the "Tainacan URL Metadata Type" plugin.', 'tainacan-url-metadata-type');
    else
        echo __('Please, update Tainacan to the latest version in order to be able to deactivate the "Tainacan URL Metadata Type" plugin.', 'tainacan-url-metadata-type');

    echo '</strong></p></div>';

}
add_action('admin_notices', 'tainacan_url_plugin_deprecation_warning');
?>
