<?php get_header();?>
<main id="primary" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
        <div class="entry-content"> 
            <?php the_content() ?>
        </div>
    </article>
</main>    
<?php get_footer(); ?>