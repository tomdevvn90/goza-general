<?php
function single_ev_template($block){
    $is_style = isset($block['className']) ? $block['className'] : "is-style-default"; 

    switch ($is_style) {
        case "is-style-charity":
            be_single_ev_template_charity();
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
        $color_hd     = get_field('cl_heading_sg_ev') ?: '';
        $color_name   = get_field('cl_name_sg_ev') ?: '';
        $color_cd     = get_field('cl_cd_sg_ev') ?: '';
        $cd_text      = $color_cd['heading'] ? : '';
        $cd_number    = $color_cd['number'] ? : '';

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
            <h2 class="be-single-event-inner--heading" style="color:<?= $color_hd ?>"> <?= esc_attr($heading) ?> </h2>
        <?php endif; ?>
        
        <h2 class="be-single-event-inner--name" style="color:<?= $color_name ?>">  
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
                        <div class='be-day' style="color:<?= $cd_number ?>">   <?= $days ?>    <span style="color:<?= $cd_text ?>">Days</span> </div>
                        <div class='be-hours' style="color:<?= $cd_number ?>"> <?= $hours ?>   <span style="color:<?= $cd_text ?>">Hours</span> </div>
                        <div class='be-min' style="color:<?= $cd_number ?>">   <?= $minutes ?> <span style="color:<?= $cd_text ?>">Minutes</span> </div>
                        <div class='be-sec' style="color:<?= $cd_number ?>">   <?= $seconds ?> <span style="color:<?= $cd_text ?>">Seconds</span> </div>
                    <?php }else{ ?>
                        <span style="color:<?= $cd_text ?>"> EXPIRED </span>
                    <?php } ?>

                </div>
            <?php endif; ?>    
            
            <div id="be-count-down" data-color-heading="<?= $cd_text ?>" data-color-number="<?= $cd_number ?>"> </div>
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

function be_single_ev_template_charity(){       
    $heading      = get_field('heading_sg_ev') ?: '';
    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full') ? : 'https://picsum.photos/1920/900?1'; 
    $cta_style    = get_field('cta_style_sg_ev') ?: 'btn-default';
    $color_hd     = get_field('cl_heading_sg_ev') ?: '';
    $color_name   = get_field('cl_name_sg_ev') ?: '';
    $color_cd     = get_field('cl_cd_sg_ev') ?: '';
    $cd_text      = $color_cd['heading'] ? : '';
    $cd_number    = $color_cd['number'] ? : '';
    $author_id    = get_post_field('post_author', get_the_ID());
    $author_name  = get_the_author_meta('display_name', $author_id);
    $author_avta  = get_avatar($author_id);
    $event_cate   = tribe_get_event_categories();

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
    <div class="be-single-event-inner--bg"> 
        <img src="<?= esc_url($post_img_url) ?>" alt="bg image">
    </div>

    <div class="be-single-event-inner--content"> 
        <div class="container">
            <?php if(!empty($heading)): ?>
                <h2 class="be-single-event-inner--heading" style="color:<?= $color_hd ?>"> <?= esc_attr($heading) ?> </h2>
            <?php endif; ?>
            
            <h2 class="be-single-event-inner--name" style="color:<?= $color_name ?>">  
                <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
            </h2>

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
                            <div class='be-day' style="color:<?= $cd_number ?>">   <?= $days ?>    <span style="color:<?= $cd_text ?>">Days</span> </div>
                            <div class='be-hours' style="color:<?= $cd_number ?>"> <?= $hours ?>   <span style="color:<?= $cd_text ?>">Hours</span> </div>
                            <div class='be-min' style="color:<?= $cd_number ?>">   <?= $minutes ?> <span style="color:<?= $cd_text ?>">Minutes</span> </div>
                            <div class='be-sec' style="color:<?= $cd_number ?>">   <?= $seconds ?> <span style="color:<?= $cd_text ?>">Seconds</span> </div>
                        <?php }else{ ?>
                            <span style="color:<?= $cd_text ?>"> EXPIRED </span>
                        <?php } ?>

                    </div>
                <?php endif; ?>    
                
                <div id="be-count-down" data-color-heading="<?= $cd_text ?>" data-color-number="<?= $cd_number ?>"> </div>
            </div>

            <div class="be-single-event-inner--meta"> 
                <?php if(!empty($venue)): ?>
                    <div class="be-single-event-inner--venue"> 
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                        <span> <?= $venue ?> </span>
                    </div>
                <?php endif; ?>

                <?php if(!empty($time_start) && !empty($date_start)): ?>
                    <div class="be-single-event-inner--date-start"> 
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m347.216 301.211-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83-10.966 0-19.83 8.864-19.83 19.83v118.978c0 6.246 2.935 12.136 7.932 15.864l79.318 59.489a19.713 19.713 0 0 0 11.878 3.966c6.048 0 11.997-2.717 15.884-7.952 6.585-8.746 4.8-21.179-3.965-27.743z" fill="#000000" data-original="#000000" class=""></path><path d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.833 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.066-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.066 216.341 216.341S375.275 472.341 256 472.341z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                        <p> <span> STARTED </span> : <?= esc_attr($date_start)?> </p>
                    </div>
                <?php endif; ?> 
            </div>

            <div class="be-single-event-inner--info"> 
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

                <div class="be-single-event-inner--author"> 
                    <div class="be-single-event-inner--author-avatar"> 
                        <?= $author_avta ?>
                    </div>

                    <div class="be-single-event-inner--author-meta"> 
                        <h4 class="be-single-event-inner--author-name"> <?=  esc_attr($author_name) ?> </h4>
                        <div class="be-single-event-inner--author-cate"> 
                            <?= $event_cate ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }