<?php 

function be_item_event($block){

    $is_style = (isset($block['className']) && !empty($block['className'])) ? $block['className'] : "is-style-default";
  
    switch ($is_style) {
        case "is-style-2":
            be_template_events_listing_style_2();
            break;

        case "is-style-3":
            be_template_events_listing_style_3();
            break; 

        case "is-style-4":
            be_template_events_listing_style_4();
            break;     

        default:
            be_template_events_listing_default();
            break; 
    } 
}

function be_template_events_listing_style_2(){ 
        $day         = tribe_get_start_date( get_the_ID(), true, 'j');
        $month       = tribe_get_start_date( get_the_ID(), true, 'F');
        $time        = tribe_get_start_date( get_the_ID(), true, 'G');
        $author_id   = get_the_author_meta('ID');
        $author_name = get_the_author_meta('display_name', $author_id);

        // $location =  theme_do_location(get_the_ID());
        // echo "<pre>";
        // echo print_r($location);
        // echo "</pre>";
    ?>
    <div class="item-event"> 
        <div class="item-event-inner">
            <div class="item-event--start-date">
                <span class="item-event--start-date__day"> <?php echo $day ?> </span>
                <span class="item-event--start-date__month"> <?php echo $month ?> </span>
            </div>

            <div class="item-event--meta"> 
                <div class="item-event--time"> 
                    <i class="fa fa-clock-o" aria-hidden="true"> </i> <?php echo $time ?> 
                    <span> By <?php echo $author_name ?></span>
                </div>

                <h3 class="item-event--name"> 
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>
            </div>
        </div>
    </div>    
<?php }

function be_template_events_listing_default(){ 
    $ev_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
    $start_date = tribe_get_start_date( get_the_ID(), true, 'j M Y - G a, l');
    ?>
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
                <div class="item-event--cta"> 
                    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"> Join Us </a>
                </div>
            </div>
        </div>
    </div>
<?php }

function be_template_events_listing_style_3(){
    $day         = tribe_get_start_date( get_the_ID(), true, 'j F');
    $time        = tribe_get_start_date( get_the_ID(), true, 'G a');
    $venue       = tribe_is_event_venue(get_the_ID());
    // echo "<pre>";
    // echo print_r($venue);
    // echo "</pre>";
    ?>
    <div class="item-event"> 
        <div class="item-event-inner">
            <div class="item-event--date"> 
                <span class="item-event--date-day"> <?php echo $day ?> </span>
                <span class="item-event--date-time">  
                    <i class="fa fa-clock-o" aria-hidden="true"> </i>
                    <?php echo $time ?>
                </span>
            </div>

            <h3 class="item-event--name"> 
                <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
            </h3>

            <div class="item-event--venue"> 
                <i class="fa fa-map-marker" aria-hidden="true"> </i>
                <span> Location </span>
            </div>
        </div>
    </div>    
<?php }

function be_template_events_listing_style_4(){ 
        $ev_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        $day        = tribe_get_start_date( get_the_ID(), true, 'j F Y');
        $time       = tribe_get_start_date( get_the_ID(), true, 'G a');
    ?>
    <div class="item-event"> 
        <div class="item-event-inner"> 
            <div class="item-event--thumbnail"> 
                <img src="<?php echo $ev_img_url ?>" alt="<?php the_title()?>" />
            </div>

            <div class="item-event--meta"> 
                <h3 class="item-event--name"> 
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>

                <div class="item-event--venue"> 
                    <i class="fa fa-map-marker" aria-hidden="true"> </i>
                    <span> Location </span>
                </div>  
                
                <div class="item-event--start-date"> 
                    <span class="item-event--start-date-day"> <?php echo $day ?> </span>
                    <span class="item-event--start-date-time"> <?php echo $time ?> </span>
                </div>

                <div class="item-event--cta"> 
                    <a href="<?php the_permalink() ?>"> 
                        View Details
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>    
<?php }
?>