<?php
/**
 * Plugin Name: Custom AJAX Search Results (C.A.S.R.)
 * Description: Insert a search bar with AJAX search results anywhere you want with a shortcode
 * Author: João Santos
 * Version: 1.0.1
 * Author URI: https://linkedin.com/in/joaovpdls
 * Text Domain: custom-ajax-search-results
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

require( "includes/class-casr.php" );

add_action( 'init', 'casr_load_text_domain' );

add_action( 'init', 'casr_init' );

function casr_load_text_domain() {
  load_plugin_textdomain( 'custom-ajax-search-results', false, plugin_basename( __DIR__ ) . '/languages/' ); 
}

function casr_init() {
    $plugin = new Casr();
    $plugin->run();
}
