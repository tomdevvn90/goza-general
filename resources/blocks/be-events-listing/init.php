<?php 

function be_item_event($block){

    $is_style = (isset($block['className']) && !empty($block['className'])) ? $block['className'] : "is-style-default";
  
    switch ($is_style) {
        case "is-style-2":
           
            break;

        case "is-style-3":
            
            break; 

        default:
            be_template_events_listing_default();
            break; 
    } 
}


function be_template_events_listing_default(){ 
    $ev_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
    $start_date = tribe_get_start_date( get_the_ID(), true, 'j M Y - G a, l');

    // echo "<pre>";
    // echo print_r($events);
    // echo "</pre>";
    // echo $value();
    ?>
    <div class="item-event"> 
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

?>