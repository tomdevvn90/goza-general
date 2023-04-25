<?php

/**
 * Image Content Text Block Template.
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
$class_name = 'goza-image-content-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}

// Support custom "align" values.
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$icb_subheading         = __get_field('icb_subheading') ?: '';
$icb_heading            = __get_field('icb_heading') ?: '';
$icb_image              = __get_field('icb_image') ?: '';
$icb_desc               = __get_field('icb_desc') ?: '';
$icb_avatar_author      = __get_field('icb_avatar_author') ?: '';
$icb_quote_text         = __get_field('icb_quote_text') ?: '';
$icb_name_author        = __get_field('icb_name_author') ?: '';
$icb_position_author    = __get_field('icb_position_author') ?: '';
$icb_textcolor          = __get_field('icb_textcolor') ?: '';
$icb_bgcolor            = __get_field('icb_bgcolor') ?: '';

// Build a valid style attribute for background colors.
$styles = array('background-color: ' . $icb_bgcolor);
$style  = implode('; ', $styles);

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
   <div class="block-inner">
      <div class="block-inner__col block-inner__image">

      </div>
      <div class="block-inner__col block-inner__content">
         <?php if ($icb_subheading) { ?>
            <h5 class="block-inner__content-subheading"><?= esc_attr($icb_subheading) ?></h5>
         <?php } ?>

         <?php if ($icb_heading) { ?>
            <h2 class="block-inner__content-heading"><?= esc_attr($icb_heading) ?></h2>
         <?php } ?>

         <?php if ($icb_heading) { ?>
            <div class="block-inner__content-desc"><?= esc_attr($icb_desc) ?></div>
         <?php } ?>

         <?php if ($icb_quote_text) { ?>
            <div class="block-inner__content-quote-text"><?= esc_attr($icb_quote_text) ?></div>
         <?php } ?>

         <div class="block-inner__content-quote-author">
            <div class="quote-author-avatar">

            </div>
            <div class="quote-author-name-pos">
               <?php if ($icb_name_author) { ?>
                  <div class="quote-author-name"><?= esc_attr($icb_name_author) ?></div>
               <?php } ?>
               <?php if ($icb_position_author) { ?>
                  <div class="quote-author-position"><?= esc_attr($icb_position_author) ?></div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>