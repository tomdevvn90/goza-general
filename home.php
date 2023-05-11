<?php
/**
 * The Home template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package goza
 */

get_header();
?>
    <main id="primary" class="site-main">
        <?php
        $page_for_posts_id = get_option( 'page_for_posts' );
        $page_for_posts_obj = get_post( $page_for_posts_id );
        
        echo apply_filters( 'the_content', $page_for_posts_obj->post_content );

        ?>
        <section class="goza-section section">
            <div class="post-container container">
            <?php
            if ( have_posts() ) :
                get_template_part( 'template-parts/posts/content-loop', get_post_type() );
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
            </div>
        </section>
	</main><!-- #main -->
<?php
get_footer();