<?php

// create id attribute for specific styling
$id = 'be-testimonials-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$testimonials     = get_field('list_items') ? : '';
$carousel_setting = get_field('slider_setting') ? : '';
$color_name       = get_field('color_name_tm_bl') ? : '';
$color_position   = get_field('color_position_tm_bl') ? : '';
$color_desc       = get_field('color_description_tm_bl') ? : '';
$bg_item          = get_field('bg_item_tm_bl') ? : '';
$slider_color     = get_field('sliders_color_tm_bl') ? : '';

$link_op = get_field('goza_link_color_op', 'option') ? : '';
if(!empty($link_op) && isset($link_op)){
    $link_color = $link_op['link_color'];
}

if(!empty($slider_color) && isset($slider_color)){
    $color_dots    = $slider_color['dots'] ? : '';
    $color_dots_df = $color_dots['default'] ? : '#fff';
    $color_dots_at = $color_dots['active'] ? : $link_color;

    $color_arrow    = $slider_color['arrow'] ? : '';
    $color_arrow_df = $color_arrow['color_default'] ? : '#fff';
    $color_arrow_hv = $color_arrow['color_hover'] ? : $link_color;

    $bg_arrow_df = $color_arrow['bg_default'] ? : '#fff';
    $bg_arrow_hv = $color_arrow['bg_hover'] ? : $link_color;
}

if(!empty($carousel_setting) && isset($carousel_setting)){
    $data_carousel = array(
        'slidesToShow'   =>  $carousel_setting['slidesToShow'] ? intval($carousel_setting['slidesToShow']) : 1,
        'slidesToScroll' =>  $carousel_setting['slidesToScroll'] ? intval($carousel_setting['slidesToScroll']) : 1,
        'arrows'         =>  $carousel_setting['arrows'] ? : false,
        'dots'           =>  $carousel_setting['dots'] ?: false,
        'autoplay'       =>  $carousel_setting['autoplay'] ?: false,
        'loop'           =>  $carousel_setting['loop'] ?: false,
        'fade'           =>  $carousel_setting['fade'] ?: false,
    );
}

$classes = isset($block['className']) ? $block['className'] : "is-style-default";

?>
<div id="<?php echo $id; ?>" class="be-testimonials-block <?php echo $align_class; ?> <?php echo $classes?>" data-style="<?php echo $classes?>"  data-carousel='<?= json_encode($data_carousel) ?>'> 
    <?php if(!empty($testimonials) && isset($testimonials)): ?>        
        <div class="be-testimonials-block-carousel"  data-aos="fade-up"
        > 
            <?php foreach ($testimonials as $testimonial): ?>
                
                <?php $img_url = (!empty($testimonial['image'])) ? $testimonial['image'] : get_template_directory_uri(). '/resources/assets/images/image-default.jpg' ; ?>
                
                <div class="item-testimonial"> 
                    <div class="item-testimonial-inner"> 
                        <div class="item-testimonial-thumbnail"> 
                            <img src="<?php echo esc_url($img_url) ?>" alt="image">
                        </div>

                        <div class="item-testimonial-content" style="background-color:<?= $bg_item ?>"> 
                            <div class="item-testimonial--icon-quocte"> 
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="64.000000pt" height="57.000000pt" viewBox="0 0 64.000000 57.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,57.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                        <path d="M20 550 c-17 -17 -20 -33 -20 -113 0 -121 10 -137 87 -137 l56 0 -6
                                        -47 c-4 -37 -12 -54 -36 -75 -17 -15 -40 -28 -51 -28 -18 0 -20 -7 -20 -76 l0
                                        -76 43 7 c141 24 213 118 219 287 4 101 -16 89 -23 -14 -10 -142 -68 -223
                                        -176 -247 l-43 -9 0 52 c0 48 3 52 33 66 17 8 41 29 53 47 22 33 39 107 29
                                        124 -4 5 -33 9 -65 9 -74 0 -80 9 -80 118 0 107 6 112 132 112 103 0 114 -5
                                        120 -53 4 -38 23 -33 21 6 -3 55 -30 67 -149 67 -91 0 -107 -3 -124 -20z"/>
                                        <path d="M369 551 c-22 -18 -24 -26 -24 -121 0 -120 7 -130 93 -130 l54 0 -7
                                        -37 c-12 -68 -53 -113 -100 -113 -12 0 -15 -16 -15 -76 l0 -76 43 7 c57 10 96
                                        27 135 60 68 57 92 146 92 342 0 162 0 163 -144 163 -87 0 -108 -3 -127 -19z
                                        m189 -59 c4 -67 22 -59 22 10 l0 51 21 -19 c20 -18 21 -26 17 -169 -4 -127 -8
                                        -158 -27 -200 -36 -81 -77 -115 -160 -134 l-41 -9 0 52 c0 50 1 52 34 64 44
                                        16 75 65 83 131 l6 51 -56 0 c-88 0 -87 -2 -87 109 0 64 4 101 12 109 9 9 39
                                        12 93 10 l80 -3 3 -53z"/>
                                        <path d="M560 410 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0
                                        -10 -4 -10 -10z"/>
                                        <path d="M275 410 c4 -6 11 -8 16 -5 14 9 11 15 -7 15 -8 0 -12 -5 -9 -10z"/>
                                    </g>
                                </svg>
                            </div>
                            
                            <?php if(!empty($testimonial['description'])): ?>
                                <p class="item-testimonial-desc" style="color:<?= $color_desc ?>"> 
                                    <?php echo $testimonial['description'] ?> 
                                </p>
                            <?php endif; ?> 
                            
                            <div class="item-testimonial-info">
                                <?php if(!empty($testimonial['user_name'])): ?>
                                    <h3 class="item-testimonial-name" style="color:<?= $color_name ?>"> 
                                        <?php echo $testimonial['user_name'] ?> 
                                    </h3>
                                <?php endif; ?>
                                
                                <?php if(!empty($testimonial['position'])): ?>
                                    <p class="item-testimonial-position" style="color:<?= $color_position ?>"> 
                                        <?php echo $testimonial['position'] ?> 
                                    </p>
                                <?php endif; ?>
                            </div>   
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>   
        </div>
    <?php endif; ?>    
</div>