<?php
/*
Plugin Name: Tainacan URL Metadata Type
Plugin URI: https://tainacan.org/new
Description: A URL Metadata Type for Tainacan, that displays a link or an embed content, if possible.
Author: wetah
Version: 0.0.1
Text Domain: tainacan-metadata-type-url
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
add_action("tainacan-register-metadata-type", "tainacan_url_register_metadata_type");
function tainacan_url_register_metadata_type($helper) {

    // Registering the Class
    require_once( plugin_dir_path(__FILE__) . 'metadata_type/metadata-type.php' );

    // Registering the Vue Component
    $handle = 'tainacan-metadata-type-url';
    $class_name = 'URL_Metadata_Type';
    $metadata_script_url = plugin_dir_url(__FILE__) . 'metadata_type/dist/metadata-type.bundle.js';
    $helper->register_metadata_type($handle, $class_name, $metadata_script_url);
}

add_action("tainacan-register-vuejs-component", "tainacan_url_register_metadata_type_form");
function tainacan_url_register_metadata_type_form($helper) {

    // Registering the Vue Component for the Metadata Options Form
    $handle2 = 'url-metadata-type-form';
    $component_script_url = plugin_dir_url(__FILE__) . 'metadata_type/metadata-type-form.js';
    $helper->register_vuejs_component($handle2, $component_script_url);

}
?>
