<?php

// create id attribute for specific styling
$id = 'be-icon-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$query = (!empty(get_field('query_events_listing'))) ? get_field('query_events_listing') : '';

$is_style = isset($block['className']) ? $block['className'] : "is-style-default";

$args = [
   'post_type'   => 'tribe_events',
   'post_status' => 'publish',
];

$args['posts_per_page']  = (!empty($query['posts_per_page'])) ? $query['posts_per_page'] : -1;
$args['post__in']        = (!empty($query['select_events'])) ? $query['select_events'] : [ ];
$args['order']           = (!empty($query['order'])) ? $query['order'] : 'ASC';

if(!empty($query['categories'])){
   $args['tax_query'] = [
      array (
         'taxonomy' => 'tribe_events_cat',
         'field'    => 'term_id',
         'terms'    => $query['categories'],
      )
   ];
}
ob_start();
$the_query = new WP_Query($args);
?>

<div id="<?php echo $id; ?>" class="be-events-listing-block <?php echo $align_class?> <?php echo $is_style?>"> 
   <?php if ($the_query->have_posts()) { ?>
      <div class="be-events-listing-block-inner"> 
         <?php while ($the_query->have_posts()) {
            $the_query->the_post(); 
            be_item_event($block);
         } ?>
      </div>
   <?php }else{
      echo '<div class="be-not-found">No results found.</div>';
   } 
   ?>   
</div>

<?php 
wp_reset_postdata();
// return ob_get_clean();