<?php
    $page_for_posts_id = get_option( 'page_for_posts' );
    $page_for_posts_obj = get_post( $page_for_posts_id );

    $heading_field_option = __get_field('goza_blog_heading', 'option');
    $icon_field_option = __get_field('goza_blog_icon', 'option')? __get_field('goza_blog_icon', 'option') : get_template_directory_uri(). '/resources/assets/images/leaf-solid.png';
    $bg_field_option = __get_field('goza_blog_bg_image', 'option');

    $heading_blog = !empty( $heading_field_option )? $heading_field_option : $page_for_posts_obj->post_title;
    $blog_heading = ( is_archive() )? get_the_archive_title() : $heading_blog;

    $bg_image_style = !empty( $bg_field_option )? 'background-image: url('.$bg_field_option.');' : '';
?>
<section class="blog-hero-section goza-hero-section" style="<?php echo $bg_image_style; ?>">
    <div class="goza-hero-section--bg-overlay"></div>
    <div class="goza-hero-section--content container">
        <div class="goza-hero-section-inner">

            <?php if ( !empty( $icon_field_option ) ): ?>
            <div class="goza-hero-section-inner__icon">
                <img src="<?php echo esc_url( $icon_field_option ); ?>" alt="<?php echo __('icon', 'goza'); ?>">   
            </div>  
            <?php endif; ?>  

            <h2 class="goza-hero-section-inner__heading"><?php echo $blog_heading; ?></h2>
        
            <?php if ( function_exists( 'yoast_breadcrumb' ) ): ?>
                <div class="goza-hero-section-inner__breadcrumb">
                    <?php yoast_breadcrumb(); ?>  
                </div> 
            <?php endif; ?>   
            
        </div>       
    </div>
</section>

