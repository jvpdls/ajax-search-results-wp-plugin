<?php 
/**
 * The class responsible for the plugin settings and options
 */

class Casr_Register_Settings {

    function casr_settings_add_action() {
        add_action( 'admin_init', [$this, 'casr_register_setting'] );
    }

    function casr_register_setting() {

        /**
         * First options group (default tab) 
         */

        register_setting( 'casr_options_group', 'casr-placeholder', $args = array(
            'type' => 'string',
            'default' => __( 'Type here', 'custom-ajax-search-results' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        register_setting( 'casr_options_group', 'casr-search-button', $args = array(
            'type' => 'string',
            'default' => __( 'Search', 'custom-ajax-search-results' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        register_setting( 'casr_options_group', 'casr-loading-text', $args = array(
            'type' => 'string',
            'default' => __( 'Loading...', 'custom-ajax-search-results' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        register_setting( 'casr_options_group', 'casr-read-more-text', $args = array(
            'type' => 'string',
            'default' => __( 'Read more', 'custom-ajax-search-results' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        register_setting( 'casr_options_group', 'casr-content-type', $args = array(
            'type' => 'string',
            'default' => 'any',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        /**
         * Second options group (secondary tab) 
         */

        register_setting( 'casr_second_options_group', 'casr-post-title', $args = array(
            'type' => 'boolean',
            'default' => '1',
            'sanitize_callback' => 'rest_sanitize_boolean',
        ) );
        register_setting( 'casr_second_options_group', 'casr-excerpt', $args = array(
            'type' => 'boolean',
            'default' => '1',
            'sanitize_callback' => 'rest_sanitize_boolean',
        ) );
        register_setting( 'casr_second_options_group', 'casr-read-more-option', $args = array(
            'type' => 'boolean',
            'default' => '1',
            'sanitize_callback' => 'rest_sanitize_boolean',
        ) );
    }
}
