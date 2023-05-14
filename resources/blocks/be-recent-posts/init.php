<?php


function be_recent_post_render_template()
{
    $display_author = ( get_field('display_author_name_recent_posts') )? get_field('display_author_name_recent_posts') : '';
    $display_date = ( get_field('display_date_recent_posts') )? get_field('display_date_recent_posts') : '';
    $display_excerpt = ( get_field('display_excerpt_recent_posts') )? get_field('display_excerpt_recent_posts') : '';
    $display_featured_image= ( get_field('display_featured_image_recent_posts') )? get_field('display_featured_image_recent_posts') : '';
    $image_size = get_field('image_size_recent_posts')? get_field('image_size_recent_posts') : 'small';

    $post_id     = get_the_ID();
    $thumbnail   = get_the_post_thumbnail( );
    $title       = get_the_title( );
    $post_date   = get_the_date( );
    $post_categories = get_the_category( );
    $post_link = get_the_permalink();
    $excerpt = get_the_excerpt();

    $post_author_id = get_post_field( 'post_author', $post_id );
    $post_author_name = get_the_author_meta( 'display_name', $post_author_id );
    $post_author_url = get_author_posts_url( $post_author_id );
    ?>
    <article id="post-<?php echo $post_id; ?>" <?php post_class('post-item') ?>>
        <div class="post-item__inner">
            <?php if ( $display_featured_image ) {
                ?>
                <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__featured-thumbnail <?php echo esc_attr( $image_size );?>">
                    <?php echo $thumbnail; ?>
                </a>
                <?php
            } ?>

            <div class=post-item__content>
                <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__title-link">
                    <h3 class="post-item__title"><?php echo __( $title, 'goza'); ?></h3>
                </a>

                <?php if ( $display_author ) {
                    ?>
                    <div class="post-item__author">
                        <span><i class="fa fa-user"></i>by </span>
                        <a href="<?php echo esc_url( $post_author_url ); ?>" class="post-item__author-link link"><?php echo $post_author_name; ?></a>
                    </div>
                    <?php
                } ?>

                <?php if ( $display_date ) {
                    ?>
                    <div class="post-item__date">
                        <?php echo $post_date; ?>
                    </div>
                    <?php
                } ?>

                <?php if ( $display_excerpt ) {
                    ?>
                    <div class="post-item__excerpt"><?php echo $excerpt; ?></div>
                    <?php
                } ?>
                
            </div>
        </div>
    </article>
    <?php
}