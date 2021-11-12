<?php
/*
Plugin Name: Tainacan URL Metadata Type
Plugin URI: https://tainacan.org/
Description: A URL Metadata Type for Tainacan, that displays a link or an embed content, if possible.
Author: tainacan
Version: 0.0.5
Text Domain: tainacan-metadata-type-url
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/** Plugin version */
const TAINACAN_URL_PLUGIN_VERSION = '0.0.5';

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
?>
