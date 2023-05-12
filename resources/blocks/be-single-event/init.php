<?php
function single_ev_template($block){
    $is_style = isset($block['className']) ? $block['className'] : "is-style-default"; 

    switch ($is_style) {
        case "is-style-2":
            be_single_ev_template_2();
            break;

        default:
            be_single_ev_template_default();
            break; 
    } 
}


function be_single_ev_template_default(){ 
        $heading      = get_field('heading_sg_ev') ?: '';
        $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        $cta_style    = get_field('cta_style_sg_ev') ?: 'btn-default';
        if(is_plugin_active('the-events-calendar/the-events-calendar.php')){
            $date_start  = tribe_get_start_date( get_the_ID(), true, 'F d, Y');
            $time_start  = tribe_get_start_date( get_the_ID(), true, 'G i a');
            $venue       = tribe_get_venue(get_the_ID());
            $count_down  = tribe_get_start_date( get_the_ID(), true, 'F d , Y G:i:s');
            $time_now    = time();
            $timestamp   = strtotime($count_down);
            $distance    = $timestamp - $time_now;
        }
    ?>
   
    <div class="be-single-event-inner--thumbnail"> 
        <?php if(!empty($post_img_url)): ?>
            <img src="<?= esc_url($post_img_url) ?>" alt="<?php the_title() ?>">
        <?php endif; ?>    
    </div>

    <div class="be-single-event-inner--content"> 
        <?php if(!empty($heading)): ?>
            <h2 class="be-single-event-inner--heading"> <?= esc_attr($heading) ?> </h2>
        <?php endif; ?>
        
        <h2 class="be-single-event-inner--name">  
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>

        <?php if(!empty($time_start) && !empty($date_start)): ?>
            <p class="be-single-event-inner--date-start"> <span> UPCOMING EVENT </span> : <?= esc_attr($date_start)?> at <?= esc_attr($time_start)?></p>
        <?php endif; ?>   
        
        <?php if(!empty($venue)): ?>
            <div class="be-single-event-inner--venue"> 
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                <span> <?= $venue ?> </span>
            </div>
        <?php endif; ?>  

        <div class="be-single-event-inner--count-down" data-count-down="<?= esc_attr($count_down) ?>"> 
            <?php if(!empty($distance)): ?>
                <?php 
                    $days    = floor($distance / (60 * 60 * 24));
                    $hours   = floor(($distance % (60 * 60 * 24)) / (60 * 60));
                    $minutes = floor(($distance % (60 * 60)) / 60);
                    $seconds = $distance % 60;    
                ?>

                <div id="be-count-down-edit">
                    <?php if($days >= 0){ ?>
                        <div class='be-day'> <?= $days ?> <span>Days</span> </div>
                        <div class='be-hours'> <?= $hours ?> <span>Hours</span> </div>
                        <div class='be-min'> <?= $minutes ?> <span>Minutes</span> </div>
                        <div class='be-sec'> <?= $seconds ?><span>Seconds</span> </div>
                    <?php }else{ ?>
                        <span> EXPIRED </span>
                    <?php } ?>

                </div>
            <?php endif; ?>    
            
            <div id="be-count-down"> </div>
        </div>
        
        <div class="be-single-event-inner--button be-button"> 
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
   
<?php }

function be_single_ev_template_2(){
    
}