<?php

// create id attribute for specific styling
$id = 'be-icon-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$general  = (!empty(get_field('general_ss_up_ev_vd'))) ? get_field('general_ss_up_ev_vd') : '';
$heading  = (!empty($general['heading'])) ? $general['heading'] : '';
$desc     = (!empty($general['description'])) ? $general['description'] : '';
$bg       = (!empty($general['bg_img'])) ? $general['bg_img'] : '';
$bg_left  = (!empty($bg['left'])) ? $bg['left'] : get_template_directory_uri(). '/resources/assets/images/bg-event-left-default.jpg';
$bg_right = (!empty($bg['right'])) ? $bg['right'] : get_template_directory_uri(). '/resources/assets/images/bg-event-right-default.jpg';

?>
<div id="<?php echo $id; ?>" class="be-ss-upcoming-event-video <?php echo $align_class; ?>"> 
   <div class="be-ss-upcoming-event-video--bg"> 
      <div class="be-ss-upcoming-event-video--bg-left">  <img src="<?php echo $bg_left ?>" alt="bg image"> </div>
      <div class="be-ss-upcoming-event-video--bg-right"> <img src="<?php echo $bg_right ?>" alt="bg image"> </div>
   </div>

   <div class="be-ss-upcoming-event-video--content container"> 
        <div class="be-ss-upcoming-event-video--content-inner"> 
            <?php if(!empty($heading)): ?>
               <h2 class="be-ss-upcoming-event-video--content-heading"> <?php echo $heading ?> </h2>
            <?php endif; ?>   

            <?php if(!empty($desc)): ?>
               <p class="be-ss-upcoming-event-video--content-desc"> <?php echo $desc ?> </p>
            <?php endif; ?> 

            <?php be_events_listing() ?>
        </div>
   </div>
</div>