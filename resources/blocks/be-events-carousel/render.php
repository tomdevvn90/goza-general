<?php
if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {

   // create id attribute for specific styling
   $id = 'be-events-carousel-' . $block['id'];

   // create align class ("alignwide") from block setting ("wide")
   $align_class = $block['align'] ? 'align' . $block['align'] : '';

   $args = [
      'post_type'   => 'tribe_events',
      'post_status' => 'publish',
      'orderby'     => 'meta_value',
      'meta_key'    => '_EventStartDate',
   ];

   // ACF field variables
   $query       = get_field('query_ev_carousel');
   $carousel_st = get_field('cr_st_ev_carousel');
   $sub_heading = get_field('sub_hd_ev_carousel') ? : '';

   // ACF Tab Style
   $color_heading = get_field('color_hd_ev_carousel') ? : '';
   $color_sub_hd  = get_field('color_sub_hd_ev_carousel') ? : '';
   $color_content = get_field('color_content_ev_carousel') ? : '';
   $cta_style     = get_field('cta_style_ev_carousel') ?: 'btn-default';

   if(!empty($carousel_st) && isset($carousel_st)){
      $data_carousel = array(
         'slidesToShow'   =>  $carousel_st['slidesToShow'] ? intval($carousel_st['slidesToShow']) : 1,
         'slidesToScroll' =>  $carousel_st['slidesToScroll'] ? intval($carousel_st['slidesToScroll']) : 1,
         'arrows'         =>  $carousel_st['arrows'] ?: false,
         'dots'           =>  $carousel_st['dots'] ?: false,
         'autoplay'       =>  $carousel_st['autoplay'] ?: false,
         'loop'           =>  $carousel_st['loop'] ?: false,
         'fade'           =>  $carousel_st['fade'] ?: false,
      );
   }

   if(!empty($query) && isset($query)){
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
   }

   ob_start();
   $the_query = new WP_Query($args);
   ?>

   <div id="<?php echo $id; ?>" class="be-events-carousel <?php echo $align_class?>"> 
      <?php if ($the_query->have_posts()) { ?>
         <div class="be-events-carousel-inner" data-carousel='<?= json_encode($data_carousel) ?>'> 
            <?php while ($the_query->have_posts()) {
                  $the_query->the_post(); 
                  $event_date = tribe_get_start_date( get_the_ID(), true, 'j M Y');
                  $event_time = tribe_get_start_date( get_the_ID(), true, 'G:i a');
                  $address    = tribe_get_address(get_the_ID());
               ?>
               <div class="item-event"> 
                  <div class="item-event--content">
                     <?php if(!empty($sub_heading)): ?>
                        <p class="item-event--sub-heading" style="color:<?= $color_sub_hd ?>"> <?= esc_attr($sub_heading) ?></p>
                     <?php endif; ?>

                     <h3 class="item-event--heading" style="color:<?= $color_heading ?>"> 
                        <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                     </h3>

                     <div class="item-event--excerpt" style="color:<?= $color_content ?>"> <?php the_excerpt() ?> </div>
                     
                     <p class="item-event--date" style="color:<?= $color_content ?>"><span>UPCOMING EVENT:</span> <?= esc_attr($event_date) ?> at <?= esc_attr($event_time) ?></p>

                     <?php if(!empty($address)): ?>
                        <div class="item-event--address"> 
                           <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                           <span style="color:<?= $color_content ?>"> <?= esc_attr($address) ?> </span>
                        </div>
                     <?php endif; ?> 

                     <div class="item-event--btn"> 
                        <a href="<?php the_permalink() ?>" class="btn <?= esc_attr($cta_style) ?>">
                           BUY TICKET
                           <?php if ($cta_style == 'btn-water') { ?>
                              <svg class="wgl-dashes inner-dashed-border animated-dashes">
                                 <rect rx="0%" ry="0%"> </rect>
                              </svg>
                           <?php } ?>
                        </a>
                     </div>
                  </div>
               </div>
            <?php } ?>
         </div>
      <?php }else{
         echo '<div class="be-not-found">No results found.</div>';
      } ?> 
   </div>
   <?php 
   wp_reset_postdata();
}
