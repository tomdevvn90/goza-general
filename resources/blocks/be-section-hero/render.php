<?php

// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$bg = get_field('bg_ss_hero');
$bg_color = get_field('bg_color_ss_hero');
$icon = get_field('icon_ss_hero');
$heading = get_field('heading_ss_hero');
$heading_color = get_field('heading_color_ss_hero');
$breadcrumb_color = get_field('breadcrumb_color_ss_hero');

?>
<section id="<?php echo $id ?>" class="be-ss-hero <?php echo $align_class; ?>">
    <div class="be-ss-hero--bg"> 
      <img src="<?php echo esc_url( $bg['url'] ); ?>" alt="<?php echo esc_attr( $bg['alt'] ); ?>">
    </div>
    <div class="be-ss-hero--content container">
        <div class="be-ss-hero--inner">

            <?php if ( !empty( $icon ) ): ?>
                <div class="be-ss-hero--icon">
                    <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">   
                </div>
            <?php endif; ?>   
            
            <?php if ( !empty( $heading ) ): ?>
                <h2 class="be-ss-hero--heading"><?php echo $heading; ?></h2>
            <?php endif; ?>   
         
            <?php if ( function_exists( 'yoast_breadcrumb' ) ): ?>
                <div class="be-ss-hero--breadcrumb">
                    <?php yoast_breadcrumb(); ?>  
                </div> 
            <?php endif; ?>   
            
        </div>       
    </div>

</section>




