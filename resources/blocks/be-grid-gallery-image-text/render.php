<?php

// create id attribute for specific styling
$id = 'be-grid-gallery-image-text-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$general     = get_field('general_grid_gallery_image_text');
$col_left    = $general['column_left'];
$col_right   = $general['column_right'];
$heading     = $general['heading'];
$gallerys    = get_field('items_gallery__image_text');
$cta         = get_field('cta_grid_gallery_image_text');

$bgCl_left   = $col_left['bg_color'] ? $col_left['bg_color'] : '';
$bgImg_left  = $col_left['bg_img'] ? $col_left['bg_img'] : '';

$bgCl_right   = $col_right['bg_color'] ? $col_right['bg_color'] : '';
$bgImg_right  = $col_right['bg_img'] ? $col_right['bg_img'] : '';

?>
<div id="<?php echo $id; ?>" class="be-grid-gallery-image-text-block <?php echo $align_class; ?>"> 
    <div class="be-grid-gallery-image-text-block-inner"> 
        <div class="be-grid-gallery-image-text-block-inner--left" 
             style="background-color:<?php echo $bgCl_left ?>; background-image:url(<?php echo $bgImg_left ?>)"
        > 
        <div class="be-grid-gallery-image-text-block-inner--left__content"> 
            <?php if(!empty($heading)): ?>
                <h2 class="be-grid-gallery-image-text-block--heading"> <?php echo $heading ?> </h2>
            <?php endif; ?>    

            <?php if(!empty($cta['name']) && !empty($cta['link'])): ?>
                    <?php $bnc_style_button= $cta['bnc_style_button'] ?: 'btn-default'; ?>
                    <div class="be-grid-gallery-image-text-block--cta"> 
                        <a href="<?= $cta['link'] ?>" class="btn <?= esc_attr($bnc_style_button) ?>">
                            <?= esc_attr($cta['name']) ?>
                            <?php if ($bnc_style_button == 'btn-water') { ?>
                                <svg class="wgl-dashes inner-dashed-border animated-dashes">
                                    <rect rx="0%" ry="0%"> </rect>
                                </svg>
                            <?php } ?>
                        </a>
                    </div>
            <?php endif; ?> 
        </div>
    </div>
        <div class="be-grid-gallery-image-text-block-inner--right"
            style="background-color:<?php echo $bgCl_right ?>; background-image:url(<?php echo $bgImg_right ?>)"
        > 
            <?php if(!empty($gallerys)): ?>
                <div id="be-gallery" class="be-grid-gallery-image-text-block--gallerys"> 
                    <?php foreach ($gallerys as $key => $value) : ?>
                       <a href="<?php echo $value ?>">
                            <img src="<?php echo $value ?>" />
                        </a>
                    <?php endforeach; ?>    
                </div>
            <?php endif; ?>    
    </div>
    </div>
</div>