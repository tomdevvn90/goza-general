<?php

// create id attribute for specific styling
$id = 'be-events-listing-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$ev_posts_per_page = __get_field('ev_posts_per_page') ?: 3;
$ev_select_events = __get_field('ev_select_events') ?: [];
$ev_taxonomy = __get_field('ev_taxonomy') ?: [];
$ev_order = __get_field('ev_order') ?: 'ASC';
$ev_heading_color = __get_field('ev_heading_color') ?: '#333';

$classes = !empty($block['className']) ? $block['className'] : "is-style-default";

$args = [
   'post_type'   => 'tribe_events',
   'post_status' => 'publish',
   'orderby' => 'meta_value',
   'meta_key' => '_EventStartDate',
];

$args['posts_per_page']  = $ev_posts_per_page;
$args['post__in']        = $ev_select_events;
$args['order']           = $ev_order;

if (!empty($ev_taxonomy)) {
   $args['tax_query'] = [
      array(
         'taxonomy' => 'tribe_events_cat',
         'field'    => 'term_id',
         'terms'    => $ev_taxonomy,
      )
   ];
}
ob_start();
$the_query = new WP_Query($args);
?>

<div id="<?php echo $id; ?>" class="be-events-listing-block <?php echo $align_class ?> <?php echo $classes ?>" style="--title-color:<?= esc_attr($ev_heading_color) ?>">
   <?php if ($the_query->have_posts()) { ?>
      <div class="be-events-listing-block-inner">
         <?php while ($the_query->have_posts()) {
            $the_query->the_post();
            be_item_event($classes);
         } ?>
      </div>
   <?php } else {
      echo '<div class="be-not-found">No results found.</div>';
   }
   ?>
</div>
<?php
wp_reset_postdata();
