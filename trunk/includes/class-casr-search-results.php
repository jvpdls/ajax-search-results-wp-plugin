<?php 
/**
 * The class responsible for handling the search results
 */
class Casr_Search_Results {

    function casr_search_results_add_action() {
        add_action( 'wp_ajax_load_search_results', [$this,'casr_load_search_results'] );
        add_action( 'wp_ajax_nopriv_load_search_results', [$this,'casr_load_search_results'] );
    }

    function casr_load_more_posts_add_action() {
        add_action( 'wp_ajax_load_more_posts', [$this,'casr_load_more_posts'] );
        add_action( 'wp_ajax_nopriv_load_more_posts', [$this,'casr_load_more_posts'] );
    }

    function casr_load_search_results() {
        include plugin_dir_path( __FILE__ ) . 'reusable/casr-ajax-get-settings.php';

        $query = sanitize_text_field( $_POST['query'] );
    
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            's' => $query,
            'posts_per_page' => $default_posts_per_page
        );
        
        $casr_search = new WP_Query( $args ); ?>
    
        <div class="post-list">        

            <?php if ( $casr_search->have_posts() ): ?>
                <div>
                    <?php include plugin_dir_path( __FILE__ ) . 'reusable/casr-content.php'; ?>
                    <?php if (  $casr_search->max_num_pages > 1 ) :
                    echo wp_kses( '<center id="casr-center"><button id="casr-load-more">', $arr ) . esc_html__( 'More posts', 'custom-ajax-search-results' ) . wp_kses( '</button></center>', $arr );
                    endif; ?>
                </div>
        
            <?php
            else: ?>
                <h3><?php esc_html_e( 'Nothing found', 'custom-ajax-search-results' ) ?></h3> 
                <p><?php esc_html_e( 'Please, try again!', 'custom-ajax-search-results' ) ?></p>
            <?php
            endif; ?>
           
        </div>

        <?php die();
    }

    function casr_load_more_posts() {
        include plugin_dir_path( __FILE__ ) . 'reusable/casr-ajax-get-settings.php';

        $query = sanitize_text_field( $_POST['query'] );
        $page = absint( $_POST['page'] + 1 );

        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            's' => $query,
            'posts_per_page' => $default_posts_per_page,
            'paged' => $page
        );
     
        $casr_search = new WP_Query( $args );

        include plugin_dir_path( __FILE__ ) . 'reusable/casr-content.php';
        if (  $page < $casr_search->max_num_pages ) :
            echo wp_kses( '<center id="casr-center"><button id="casr-load-more">', $arr ) . esc_html__( 'More posts', 'custom-ajax-search-results' ) . wp_kses( '</button></center>', $arr );
        endif; 
        
        die();
    }
}
