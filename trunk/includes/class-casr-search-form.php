<?php 
/**
 * The class responsible for generating the search form
 */
class Casr_Search_Form {

    protected $version;

    function __construct( $version ) {
        $this->version = $version;
    }

    function casr_search_form_add_shortcode() {
        add_shortcode( 'my-search-form', [$this,'casr_create_search_form'] );
    }

    function casr_create_search_form() {
        wp_enqueue_style( 'casr-post-list', plugin_dir_url( __DIR__ ) . 'public/css/casr-post-list.css' );
        wp_enqueue_script( 'casr-ajax' , plugin_dir_url( __DIR__ ) . 'public/js/casr-ajax.js', array( 'jquery' ), $this->version, true );  
        wp_localize_script( 'casr-ajax', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        $image_url = plugin_dir_url( __DIR__ ) . 'public/images/loading.gif';
        wp_enqueue_script( 'casr-ajax-load-more', plugin_dir_url( __DIR__ ) . 'public/js/casr-load-more.js', array('jquery'), $this->version, true );
        wp_localize_script( 'casr-ajax-load-more', 'casr_load_more_params', array(
            'ajaxurl' => admin_url() . 'admin-ajax.php',
            'current_page' => 1,
            'loading_image' => $image_url ) );

        $placeholder = get_option( 'casr-placeholder', __( 'Type here', 'custom-ajax-search-results' ) );
        $search_text = get_option( 'casr-search-button', __( 'Search', 'custom-ajax-search-results' ) );
        $loading = get_option( 'casr-loading-text', __( 'Loading...', 'custom-ajax-search-results' ) );
    
        $search_form = '<form id="casr-search-form" class="wp-block-search__inside-wrapper">';
        $search_form .= '<input type="text" name="s" placeholder="' . esc_html( $placeholder ) . '" id="search-text" class="wp-block-search__input" required="">';
        $search_form .= '<button type="submit" class="wp-block-search__button">' . esc_html( $search_text ) . '</button>';
        $search_form .= '</form>';
        $search_form .= '<p class="casr-loader-text" style="display: none; margin-top: 10px;" >' . esc_html( $loading ) . '</p>';
        $search_form .= '<div id="casr-search-content"></div>';
    
        return $search_form;
    }
}
