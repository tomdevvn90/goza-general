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

        case "is-style-5":
            be_template_events_listing_style_5();
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
        $venue       =  tribe_get_venue(get_the_ID());
    ?>
    <div class="item-event"> 
        <div class="item-event-inner">
            <div class="item-event--start-date">
                <span class="item-event--start-date__day"> <?php echo $day ?> </span>
                <span class="item-event--start-date__month"> <?php echo $month ?> </span>
            </div>

            <div class="item-event--meta"> 
                <div class="item-event--time"> 
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 443.294 443.294" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M221.647 0C99.433 0 0 99.433 0 221.647s99.433 221.647 221.647 221.647 221.647-99.433 221.647-221.647S343.861 0 221.647 0zm0 415.588c-106.941 0-193.941-87-193.941-193.941s87-193.941 193.941-193.941 193.941 87 193.941 193.941-87 193.941-193.941 193.941z" fill="#000000" data-original="#000000" class=""></path><path d="M235.5 83.118h-27.706v144.265l87.176 87.176 19.589-19.589-79.059-79.059z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                    <?php echo $time ?> 
                    <span> By <?php echo $author_name ?></span>
                </div>

                <h3 class="item-event--name"> 
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>

                <?php if(!empty($venue)): ?>
                    <div class="item-event--venue">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><defs><clipPath id="a" clipPathUnits="userSpaceOnUse"><path d="M0 512h512V0H0Z" fill="#000000" data-original="#000000"></path></clipPath></defs><g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)"><path d="M0 0c-60 90-165 212-165 317 0 90.981 74.019 165 165 165s165-74.019 165-165C165 212 60 90 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 15)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path><path d="M0 0c-41.353 0-75 33.647-75 75s33.647 75 75 75 75-33.647 75-75S41.353 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 257)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path></g></g></svg>
                        <?php echo $venue ?>
                    </div>
                <?php endif; ?>    
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
        $day        = tribe_get_start_date( get_the_ID(), true, 'j');
        $month      = tribe_get_start_date( get_the_ID(), true, 'F Y -');
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
                    <span class="item-event--start-date-day"> <b><?php echo $day ?></b> <?php echo $month ?> </span>
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


function be_template_events_listing_style_5(){ 
        $ev_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        $day        = tribe_get_start_date( get_the_ID(), true, 'j F Y,');
        $time       = tribe_get_start_date( get_the_ID(), true, 'G a');
        $venue      =  tribe_get_venue(get_the_ID());
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

                <div class="item-event--info"> 
                    <div class="item-event--start-time"> 
                        <?php echo $day ?> <span><?php echo $time ?></span>
                    </div>

                    <div class="item-event-venue"><?php echo $venue ?></div>
                </div>
            </div>
        </div>
    </div>
<?php }
?>