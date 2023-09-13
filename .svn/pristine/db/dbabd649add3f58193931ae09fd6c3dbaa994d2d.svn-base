<?php 
/**
 * The class responsible for handling the settings page
 */
class Casr_Settings_Page {
    
    protected $slug;

    function __construct( $slug ) {
        $this->slug = $slug;
    }

    function casr_settings_page_add_action() {
        add_action( 'admin_menu', [$this,'casr_create_settings_page'] );
    }

    function casr_create_settings_page() {
        add_options_page( 'Custom AJAX Search Results', 'C.A.S.R.', 'manage_options', $this->slug, [$this,'casr_html_form'] );    
    }

    /**
     * The settings page container
     */
    function casr_html_form() { 
        error_reporting ( E_ALL ^ E_NOTICE ^ E_WARNING ); 

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        
        $default_tab = null;
        $tab = null !== ( sanitize_text_field( $_GET['tab'] ) ) ? sanitize_text_field( $_GET['tab'] ) : $default_tab; ?>
        
        <div class="wrap">
            <h1>Custom AJAX Search Results</h1>

            <nav class="nav-tab-wrapper">
                <a href="?page=<?php echo esc_html( $this->slug ); ?>" class="nav-tab <?php if( $tab === null ):?>nav-tab-active<?php endif; ?>"><?php esc_html_e( 'Search form', 'custom-ajax-search-results' ) ?></a>
                <a href="?page=<?php echo esc_html( $this->slug ); ?>&tab=post-list" class="nav-tab <?php if( $tab === 'post-list' ):?>nav-tab-active<?php endif; ?>"><?php esc_html_e( 'Post list', 'custom-ajax-search-results' ) ?></a>
            </nav>

            <div class="tab-content">
                <?php switch( $tab ) :
                case 'post-list':
                    $this->casr_post_list_tab_form(); 
                    break;
                default:
                $this->casr_default_tab_form();
                    break;
                endswitch; ?>
            </div>
    <?php
    }

    /**
     * Settings page post-list tab
     */
    function casr_post_list_tab_form() {
        ?>
            <p><?php esc_html_e( 'On the section below, you can customize the content for the posts retrieved by user query', 'custom-ajax-search-results' ) ?></p>
            <form method="post" action="options.php">
            <?php settings_fields( 'casr_second_options_group' ); ?>
                <table>
                    <tr>                                                                                                                            
                        <td>
                            <label for="casr-post-title"><b><?php esc_html_e( 'Post title (with link)','custom-ajax-search-results' ) ?></b></label>
                        </td>
                        <td>
                            <input type="radio" id="casr-post-title" name="casr-post-title" value="1" <?php if ( "1" == get_option('casr-post-title') ) echo esc_html( 'checked="checked"' );  ?>/>
                        </td>
                    </tr>  
                    <tr>                                                                                                                            
                        <td>
                            <label for="casr-post-title-no-link"><b><?php esc_html_e( 'Post title (no link)','custom-ajax-search-results' ) ?></b></label>
                        </td>
                        <td>
                            <input type="radio" id="casr-post-title-no-link" name="casr-post-title" value="0" <?php if ( false == get_option('casr-post-title') ) echo esc_html( 'checked="checked"' );  ?>/>
                        </td>
                    </tr> 
                    <tr> 
                        <td>
                            <label for="casr-excerpt"><b><?php esc_html_e( 'Excerpt','custom-ajax-search-results' ) ?></b></label>
                        </td>
                        <td>
                            <input type="checkbox" id="casr-excerpt" name="casr-excerpt" value="1" <?php if ( "1" == get_option('casr-excerpt') ) echo esc_html( 'checked="checked"' );  ?>/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="casr-read-more-option"><b><?php esc_html_e( 'Read more link','custom-ajax-search-results' ) ?></b></label>
                        </td>
                        <td>
                            <input type="checkbox" id="casr-read-more-option" name="casr-read-more-option" value="1" <?php if ( "1" == get_option('casr-read-more-option') ) echo esc_html( 'checked="checked"' );  ?>/>
                        </td>
                    </tr> 
                </table>
                <?php submit_button(); ?>
            </form>
        <?php
    }

    /**
     * Settings page default tab
     */
    function casr_default_tab_form() {
        ?>
            <form method="post" action="options.php">
            <?php settings_fields( 'casr_options_group' ); ?>
                <table style="margin-top: 30px;">
                    <tr>
                        <td>
                            <label for="first_field_id"><b><?php esc_html_e( 'Search form placeholder', 'custom-ajax-search-results' ) ?></b></label>
                        </td>
                        <td>
                            <input type = 'text' class="regular-text" id="first_field" name="casr-placeholder" value="<?php echo esc_attr( get_option( 'casr-placeholder' ) ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for = "second_field_id"><b><?php esc_html_e( 'Search button text', 'custom-ajax-search-results' ) ?></b></label>
                        </td>  
                        <td>              
                            <input type = 'text' class="regular-text" id="second_field" name="casr-search-button" value="<?php echo esc_attr( get_option( 'casr-search-button' ) ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>    
                            <label for = "third_field_id"><b><?php esc_html_e( 'Loading text', 'custom-ajax-search-results' ) ?></b></label>
                        </td>
                        <td>    
                            <input type = 'text' class="regular-text" id="third_field" name="casr-loading-text" value="<?php echo esc_attr( get_option( 'casr-loading-text' ) ); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for = "third_field_id"><b><?php esc_html_e('Read more text', 'custom-ajax-search-results') ?></b></label>
                        </td>
                        <td>
                            <input type = 'text' class="regular-text" id="fourth_field" name="casr-read-more-text" value="<?php echo esc_attr( get_option( 'casr-read-more-text' ) ); ?>">
                        </td>  
                    </tr>
                </table>
        
                <h2 style = "margin-top: 30px;"><?php esc_html_e( 'Content', 'custom-ajax-search-results' ) ?></h2>
                <p><?php esc_html_e( 'Select the post types that you want to display in search results', 'custom-ajax-search-results' ) ?></p>  
        
                <div style="display: flex; flex-direction: column; gap: 5px;">
                    <div>    
                        <input type="radio" name="casr-content-type" id="post" value="post" <?php if ( 'post' == get_option('casr-content-type') ) echo esc_html( 'checked="checked"' );  ?>/><label for="post"><?php esc_html_e( 'Posts', 'custom-ajax-search-results')  ?></label>
                    </div>
                    <div>
                        <input type="radio" name="casr-content-type" id="page" value="page" <?php if ( 'page' == get_option('casr-content-type') ) echo esc_html( 'checked="checked"' );  ?>/><label for="page"><?php esc_html_e( 'Pages', 'custom-ajax-search-results' ) ?></label>
                    </div>
                    <div>
                        <input type="radio" name="casr-content-type" id="any" value="any" <?php if ( 'any' == get_option('casr-content-type') ) echo esc_html( 'checked="checked"' );  ?>/><label for="any"><?php esc_html_e( 'Show all', 'custom-ajax-search-results' ) ?></label>
                    </div>
                </div>
        
                <div style="background-color: white; border: 1px solid black; border-radius: 15px; margin-top: 30px; padding: 20px;"><?php esc_html_e( 'Use the shortcode', 'custom-ajax-search-results' ) ?> <em>[my-search-form]</em> <?php esc_html_e( 'to insert our custom search form anywhere you want', 'custom-ajax-search-results' ) ?>.</div>
        
                <?php submit_button(); ?>
                </div>
            </form>
        <?php 
    }
}
