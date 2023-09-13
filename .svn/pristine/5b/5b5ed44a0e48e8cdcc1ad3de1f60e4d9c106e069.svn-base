<?php 
/**
 * Template for the user search results
 */
$i = 0;
while ( $casr_search->have_posts() ):
    $casr_search->the_post(); ?>
        <div class="casr-post" id="post-<?php echo esc_html( $i ) ?>">
            <?php if( $i > 0 ): echo wp_kses_post( '<hr class="casr-hr"/>' ); endif; 

            if ( $post_title == 1 ): ?>
            	<h2><a href="<?php the_permalink(); ?>" target="_blank" rel="noopener nofollow"><?php the_title(); ?></a></h2>
            <?php 
            else: ?>
            	<h2><?php the_title(); ?></h2>
            <?php endif;

            if ( $post_excerpt == 1 ):
           	the_excerpt(); 
            endif;  

            if ( $read_more_option == 1 ): ?>
            	<p class="casr-read-more"><a href="<?php the_permalink(); ?>" target="_blank" rel="noopener nofollow"><?php echo esc_html( $read_more ); ?></a></p>
            <?php endif; ?> 
        </div>
    <?php
    $i++;
endwhile;
