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

$bg_color_style = !empty( $bg_color )? 'background-color:'.$bg_color : '';
$heading_color_style = !empty( $heading_color )? 'color:'.$heading_color : '';
$breadcrumb_color_style = !empty( $breadcrumb_color )? 'color:'.$breadcrumb_color : '';

?>
<section id="<?php echo $id ?>" class="be-ss-hero" style="<?php echo $bg_color_style; ?>">
    <div class="be-ss-hero--bg"> 
      <img src="<?php echo esc_url( $bg['url'] ); ?>" alt="<?php echo esc_attr( $bg['alt'] ); ?>">
    </div>
    <div class="be-ss-hero--content container">
        <div class="be-ss-hero-inner <?php echo $align_class; ?>">

            <?php if ( !empty( $icon ) ): ?>
                <div class="be-ss-hero-inner__icon">
                    <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">   
                </div>
            <?php endif; ?>   
            
            <?php if ( !empty( $heading ) ): ?>
                <h2 class="be-ss-hero-inner__heading" style="<?php echo $heading_color_style; ?>"><?php echo $heading; ?></h2>
            <?php endif; ?>   
         
            <?php if ( function_exists( 'yoast_breadcrumb' ) ): ?>
                <div class="be-ss-hero-inner__breadcrumb" style="<?php echo $breadcrumb_color_style; ?>">
                    <?php yoast_breadcrumb(); ?>  
                </div> 
            <?php endif; ?>   
            
        </div>       
    </div>

</section>




