<?php

/**
 * Video Popup Actions Block Template.
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
$class_name = 'video-popup-actions-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$vpa_heading            = __get_field('vpa_heading') ?: 'Your Heading Here';
$vpa_link_video         = __get_field('vpa_link_video') ?: '';
$format_video           = __get_field('format_video') ?: 'html';
$vpa_bg_image           = __get_field('vpa_bg_image') ?: '';
$vpa_width              = __get_field('vpa_width') ?: '90%';
$vpa_height             = __get_field('vpa_height') ?: '160px';
$vpa_border_radius      = __get_field('vpa_border_radius') ?: '3px';
$vpa_color_heading      = __get_field('vpa_color_heading') ?: '#000';
$vpa_icon_video_color   = __get_field('vpa_icon_video_color') ?: '#ed9913';
$vpa_bg_color           = __get_field('vpa_bg_color') ?: '#eee';

// Build a valid style attribute for background and text colors.
$styles = array('background-color: ' . $vpa_bg_color);
if ($vpa_bg_image) {
   $styles[] = 'background-image: url(' . esc_url($vpa_bg_image['url']) . ')';
}
$style  = implode('; ', $styles);

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
   <div class="block-inner">
      <?php if ($vpa_heading) { ?>
         <h5 class="block-inner__heading" style="color: <?= esc_attr($vpa_color_heading) ?>"><?= esc_attr($vpa_heading) ?></h5>
      <?php } ?>
      <div id="block-video-action">
         <?php if ($format_video == 'youtube') {
            $vpa_link_video = $vpa_link_video ? $vpa_link_video . '&mute=0' : '//www.youtube.com/watch?v=EIUJfXk3_3w&mute=0';
         ?>
            <!-- YouTube Video --->
            <a data-lg-size="1280-720" data-src="<?= esc_url($vpa_link_video) ?>">
               <i class="fa fa-play-circle-o"></i>
            </a>
         <?php } ?>

         <?php
         if ($format_video == 'vimeo') {
            $vpa_link_video = $vpa_link_video ? $vpa_link_video : '//vimeo.com/112836958';
         ?>
            <!-- Vimeo Video --->
            <a data-lg-size="1280-720" data-src="<?= esc_url($vpa_link_video) ?>">
               <i class="fa fa-play-circle-o"></i>
            </a>
         <?php } ?>

         <?php if ($format_video == 'wistia') {
            $video_url = $vpa_link_video ? $vpa_link_video : 'https://private-sharing.wistia.com/medias/mwhrulrucj';
         ?>
            <!-- Wistia Video --->
            <a data-lg-size="1280-720" data-src="<?= esc_url($video_url) ?>">
               <i class="fa fa-play-circle-o"></i>
            </a>
         <?php } ?>
         <?php
         if ($format_video == 'html') {
            $video_url = $vpa_link_video ? $vpa_link_video : get_template_directory_uri() . '/resources/assets/videos/video-demo.mp4';
         ?>
            <!-- HTML5 Video --->
            <a data-lg-size="1280-720" data-video='{"source": [{"src":"<?= esc_url($video_url) ?>", "type":"video/mp4"}], "attributes": {"preload": false, "playsinline": true, "controls": true}}'>
               <i class="fa fa-play-circle-o"></i>
            </a>
         <?php } ?>
      </div>
   </div>
</div>