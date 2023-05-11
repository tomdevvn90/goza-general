<?php
/**
 * Post loop
 */
?>

<div class="post-content">
    <div class="posts-list">
    <?php
    /* Start the Loop */
    while ( have_posts() ) :
        the_post();
        
        get_template_part( 'template-parts/posts/content', get_post_type() );

    endwhile;
    ?>
    </div>
    <div class="navigation paging-navigation">
        <?php 
        global $wp_query;

        $big = 999999999;

        $pre_text = '<i class="fa fa-angle-left"></i> <strong>Newer</strong>';
        $next_text = '<strong>Older</strong> <i class="fa fa-angle-right"></i>'; 

        $args = array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '/page/%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next'          => false,
        );

        $html = get_previous_posts_link( $pre_text );
        $html .= '<div class="pagination-numbers-wrap">'.paginate_links( $args ).'</div>';  
        $html .= get_next_posts_link( $next_text );

        $pre_button = '<a href="javascript:void(0)" class="prev page-button disabled">' . __( $pre_text, 'goza') . '</a>';
        $next_button = '<a href="javascript:void(0)" class="next page-button disabled">' . __( $next_text, 'goza') . '</a>';

        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

        if ( 1 === $paged) {
            $html = $pre_button . $html;    
        }

        if ( $wp_query->max_num_pages ==  $paged   ) {
            $html = $html . $next_button; 
        }

        if ( $wp_query->max_num_pages > 1) {
            echo '<div class="pagination loop-pagination">';
            echo    $html;
            echo '</div>';
        }

        ?>
    </div>
</div>

<div class="post-sidebar">
    <?php get_sidebar( ); ?>
</div>

