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
                            <div class="be-gallery--icon">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 426.667 426.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M405.332 192H234.668V21.332C234.668 9.559 225.109 0 213.332 0 201.559 0 192 9.559 192 21.332V192H21.332C9.559 192 0 201.559 0 213.332c0 11.777 9.559 21.336 21.332 21.336H192v170.664c0 11.777 9.559 21.336 21.332 21.336 11.777 0 21.336-9.559 21.336-21.336V234.668h170.664c11.777 0 21.336-9.559 21.336-21.336 0-11.773-9.559-21.332-21.336-21.332zm0 0" fill="#000000" data-original="#000000" class=""></path></g></svg>
                            </div>
                        </a>
                    <?php endforeach; ?>    
                </div>
            <?php endif; ?>    
    </div>
    </div>
</div>