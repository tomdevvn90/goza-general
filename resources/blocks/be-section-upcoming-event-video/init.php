<?php
function be_events_listing(){
    $events        = (!empty(get_field('events_listing_ss_up_ev_vd'))) ? get_field('events_listing_ss_up_ev_vd') : '';
    $general        = (!empty(get_field('general_ss_up_ev_vd'))) ? get_field('general_ss_up_ev_vd') : '';
    $btn_animation = (!empty($general['animation_button'])) ? $general['animation_button'] : 'style_default';
  
    $args = [
        'post_type'   => 'tribe_events',
        'post_status' => 'publish',
    ];
     
    $args['posts_per_page']  = (!empty($events['posts_per_page'])) ? $events['posts_per_page'] : -1;
    $args['post__in']        = (!empty($events['select_events'])) ? $events['select_events'] : [ ];
    $args['order']           = (!empty($events['order'])) ? $events['order'] : 'ASC';
     
    if(!empty($events['categories'])){
        $args['tax_query'] = [
            array (
                'taxonomy' => 'tribe_events_cat',
                'field'    => 'term_id',
                'terms'    => $events['categories'],
            )
        ];
    }

    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) { ?>
        <div class="be-ss-upcoming-event-video--content-event-list"> 
            <div class="be-ss-upcoming-event-video--content-event-list-inner">
                <?php while ($the_query->have_posts()) { 
                    $the_query->the_post(); 
                    $ev_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                    if(is_plugin_active('the-events-calendar/the-events-calendar.php')){
                        $start_date = tribe_get_start_date( get_the_ID(), true, 'j M Y - G:i a, l');
                    } ?>
                    
                    <div class="item-event __hide"> 
                        <div class="item-event-inner"> 
                            <div class="item-event-inner-left"> 
                                <?php if(!empty($ev_img_url)): ?>
                                    <div class="item-event--thumbnail">  
                                        <img src="<?php echo $ev_img_url ?>" alt="<?php the_title() ?>">
                                        <span class="item-event--icon-toggle"></span>
                                    </div>
                                <?php endif; ?>    
                                
                                <div class="item-event--meta"> 
                                    <h3 class="item-event--name"> 
                                        <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                                    </h3>

                                    <?php if(!empty($start_date)): ?>
                                        <span class="item-event--start-date"> <?php echo $start_date ?> </span>
                                    <?php endif; ?>    

                                    <div class="item-event--excerpt"> <?php the_excerpt() ?> </div>
                                </div>
                            </div>
                            
                            <div class="item-event-inner-right"> 
                                <div class="item-event--cta be-button be-button-<?php echo $btn_animation ?>"> 
                                    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"> 
                                        <?php if(!empty($btn_animation === 'style_2')): ?>
                                            <svg class="wgl-dashes inner-dashed-border animated-dashes"> <rect rx="0%" ry="0%">  </rect> </svg>
                                        <?php endif; ?>    
                                        Join Us 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }else{
      echo '<div class="be-not-found">No results found.</div>';
    } 
}