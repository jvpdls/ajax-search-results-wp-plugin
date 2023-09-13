<?php
/**
 * The plugin main class
 */
include_once plugin_dir_path( __FILE__ ) . 'class-casr-register-settings.php';
include_once plugin_dir_path( __FILE__ ) . 'class-casr-settings-page.php';
include_once plugin_dir_path( __FILE__ ) . 'class-casr-search-form.php';
include_once plugin_dir_path( __FILE__ ) . 'class-casr-search-results.php';

class Casr {

    /**
     * Plugin properties 
     */
    const VERSION = '1.0.1';
    const SLUG = 'custom-ajax-search-results';
    const PLUGIN_FILE = self::SLUG . '/casr.php';

    /**
     * Plugin Initializer(Run) 
     * 
     * The run method starts the execution of the plugin.
     */
    public function run() {
        $this->add_actions();
        $this->add_filters();
        $this->add_shortcodes();
        $this->enqueue_admin_scripts();
    }

    /**
     * Plugin methods
     */
    private function add_actions() {
        $register_settings = new Casr_Register_Settings();
        $register_settings->casr_settings_add_action();

        $settings_page = new Casr_Settings_Page( self::SLUG );
        $settings_page->casr_settings_page_add_action();

        $search_results = new Casr_Search_Results();
        $search_results->casr_search_results_add_action();
        $search_results->casr_load_more_posts_add_action();

        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_jquery'] );
    }

    private function add_filters() {
        add_filter( 'plugin_action_links',  array( $this, 'casr_add_plugin_page_settings_link' ), 10, 2 );
    }

    private function add_shortcodes() {
        $search_form = new Casr_Search_Form( self::VERSION );
        $search_form->casr_search_form_add_shortcode();
    }

    private function enqueue_admin_scripts() {
        global $pagenow;
    
        if ( 'options-general.php' === $pagenow && sanitize_text_field( $_GET['page'] ) === self::SLUG ) {
            wp_enqueue_script( 'casr-admin' , plugin_dir_url( __DIR__ ) . 'admin/js/casr-admin.js', array( 'jquery' ), self::VERSION, true );      
        } 
    }
    
    /**
     * Hooks methods
     */
    function casr_add_plugin_page_settings_link($links, $file) {
        if ( $file == self::PLUGIN_FILE ) {
            $settings_link = '<a href="' . admin_url( 'options-general.php?page=' ) . self::SLUG . '">' . esc_html__( 'Settings', 'custom-ajax-search-results' ) . '</a>';
            array_unshift( $links, $settings_link );
        }
        return $links;
    }

    function enqueue_jquery() {
        if ( ! wp_script_is( 'jquery', 'enqueued' )) {
            wp_enqueue_script( 'jquery' );
        }
    }
}
