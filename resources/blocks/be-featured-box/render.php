<?php

/**
 * Box Featured Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
   $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'be-box-featured-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$fb_icon                = __get_field('fb_icon') ?: '';
$fb_heading             = __get_field('fb_heading') ?: '';
$fb_desc                = __get_field('fb_description') ?: '';
$fb_box_button          = __get_field('fb_box_button') ?: [];
$fb_box_featured_list   = __get_field('fb_box_featured_list');
//styles
$fb_color_title         = __get_field('fb_color_title') ?: '';
$fb_color_text          = __get_field('fb_color_text') ?: '';
$fb_bg_color            = __get_field('fb_bg_color') ?: '';
$fb_button_color        = __get_field('fb_button_color') ?: '';
$fb_button_color_hover  = __get_field('fb_button_color_hover') ?: '';
$fb_btn_bg              = __get_field('fb_btn_bg') ?: '';
$fb_btn_bg_hover        = __get_field('fb_btn_bg_hover') ?: '';

// Build a valid style attribute for background and text colors.
$styles = array('background-color: ' . $bnc_bg_color);
$style  = implode('; ', $styles);

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
   <div class="inner-block">
         <div class="block-col block-col-6">
            <?php if ($fb_icon) { ?>
               <img src="<?= esc_attr($fb_icon['url']) ?>" alt="<?= esc_attr($fb_icon['alt']) ?>" />
            <?php } ?>
         </div>
         <div class="block-col block-col-4">
            <?php if ($fb_icon) { ?>
               <img src="<?= esc_attr($fb_icon['url']) ?>" alt="<?= esc_attr($fb_icon['alt']) ?>" />
            <?php } ?>
         </div>
         <div class="block-col block-col-2">
            <?php if ($fb_icon) { ?>
               <img src="<?= esc_attr($fb_icon['url']) ?>" alt="<?= esc_attr($fb_icon['alt']) ?>" />
            <?php } ?>
         </div>
   </div>
</div>