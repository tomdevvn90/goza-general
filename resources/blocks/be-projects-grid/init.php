<?php

function be_projects_grid_item($block)
{

    $id = get_post_type( get_the_ID() ).'-'.get_the_ID();
    ?>
    <div id="<?php echo esc_attr( $id ); ?>" <?php post_class( "project-grid-item grid-item" ); ?>>
        <?php be_template_projects_grid_default(); ?>
    </div>
    <?php
}

function be_template_projects_grid_default()
{   

    $post_id = get_the_ID();
    $post_img_url = get_the_post_thumbnail_url( $post_id, 'full' ); 
    $post_title = get_the_title();
    $post_excerpt = get_the_excerpt();
    $post_permalink = get_the_permalink();

    ?>
    <div class="project-grid-item__thumbnail">
        <img src="<?php echo esc_url( $post_img_url ); ?>" alt="">
        <a href="<?php echo esc_url( $post_img_url ); ?>" class="zoom-image">
            <i class="fa fa-search" aria-hidden="true"></i>
        </a>
    </div>
    <div class="project-grid-item__content">
        <a class="project-grid-item__link" href="<?php echo esc_url( $post_permalink ); ?>">
            <h2 class="project-grid-item__title"><?php echo $post_title; ?></h2>
        </a>
        <div class="project-grid-item__excerpt">
            <p><?php echo wp_trim_words( $post_excerpt, 20 ); ?></p>
        </div>
        <a class="project-grid-item__button" href="<?php echo esc_url( $post_permalink ); ?>">
            <span class="project-grid-item__button-icon"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            <span class="project-grid-item__button-text"><?php echo __( 'View Details', 'goza'); ?></span>
        </a>
    </div> 
    <?php
}
