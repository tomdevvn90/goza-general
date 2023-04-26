<?php

// create id attribute for specific styling
$id = 'be-numberal-donation-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$general       = (!empty(get_field('general_numberal_donation_box'))) ? get_field('general_numberal_donation_box') : '';
$counter       = (!empty(get_field('counter_numberal_donation_box'))) ? get_field('counter_numberal_donation_box') : '';
$progressbar   = (!empty(get_field('progressbar_donation_box'))) ? get_field('progressbar_donation_box') : '';
$list_items    = (!empty($counter['list_items'])) ? $counter['list_items'] : '';
$button_one    = (!empty($general['button_one'])) ? $general['button_one'] : '';
$button_two    = (!empty($general['button_one'])) ? $general['button_one'] : '';
$btn_animation = (!empty($general['animation_button'])) ? $general['animation_button'] : '';
$bg            = (!empty($general['bg_image'])) ? $general['bg_image'] : get_template_directory_uri(). '/resources/assets/images/bg-number-box-default.jpg';
?>
<div id="<?php echo $id; ?>" class="be-numberal-donation-box <?php echo $align_class; ?>" style="background-image:url('<?php echo $bg ?>')"> 
   
   <?php if(!empty($progressbar['value'])): ?>
      <?php  $bg = (!empty($progressbar['bg'])) ? $progressbar['bg'] : get_template_directory_uri(). '/resources/assets/images/bg-progressbar_donation_box_default.png'; ?>
      <div class="be-numberal-donation-box-progressbar" style="background-image:url('<?php echo $bg ?>')"> 
         <div  class="be-numberal-donation-box-progressbar-inner"> 
            <span id="be-progressbar" data-progressbar="<?php echo $progressbar['value'] ?>" data-heading="<?php echo $progressbar['desc'] ?>"
                  data-strokecolor="<?php echo $progressbar['strokecolor'] ?>" data-trailcolor="<?php echo $progressbar['trailcolor'] ?>"
                  data-duration=<?php echo $progressbar['duration'] ?>
            > 
            <div class="be-progressbar-editor" style="--progressbar:<?php echo $progressbar['value']?>px;"> 
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                  <circle cx="16.1" cy="15.7" r="15.5" style=" --trailcolor:<?php echo $progressbar['trailcolor'] ?>"/>
                  <circle cx="16.1" cy="15.7" r="15.5" style=" --strokecolor:<?php echo $progressbar['strokecolor'] ?>"/>
               </svg>
              <div class="__meta"> 
                  <span> <?php echo $progressbar['value'] ?><sup>%</sup> </span>
                  <p><?php echo $progressbar['desc'] ?></p>
              </div>
            </div>
         </span>
         </div>
      </div>
   <?php endif; ?>

   <div class="be-numberal-donation-box-inner">
      <?php if(!empty($list_items)){ ?>
         <div class="be-numberal-donation-box--list-item"> 
            <?php 
               $st_counter = (!empty($counter['settings'])) ? $counter['settings'] : '';
               $duration   = (!empty($st_counter['duration'])) ?  $st_counter['duration'] : 1000;
               $delay      = (!empty($st_counter['delay'])) ?  $st_counter['delay'] : 800;
            ?>
            <?php foreach ($list_items as $key => $value): ?>
               <?php 
                  $delay_item = (($key * 20) + $delay)
               ?>
               <div class="item-numberal-donation"> 
                     <div class="item-numberal-donation--number"> 
                        <?php if(!empty($value['numberal'])): ?>
                           <span data-counter  data-duration="<?php echo $duration ?>" data-delay="<?php echo $delay_item ?>"> <?php echo $value['numberal'] ?></span>
                        <?php endif; ?>  
                     </div>

                     <?php if(!empty($value['heading'])): ?>
                        <h4 class="item-numberal-donation--heading"> <?php echo $value['heading'] ?> </h4>
                     <?php endif; ?>
               </div>
            <?php endforeach; ?>

         </div>
      <?php }else{ ?>
         <div class="be-numberal-donation-box--space" style="min-height:200px"> </div>
      <?php } ?>   

      <div class="be-numberal-donation-box--buttons"> 
         <?php if(!empty($button_one['name']) && !empty($button_one['link'])): ?>
            <div class="be-numberal-donation-box--buttons-one be-button be-button-<?php echo $btn_animation ?>"> 
               <a href="<?php echo $button_one['link'] ?>"> 
                     <?php if(!empty($btn_animation === 'style_2')): ?>
                        <svg class="wgl-dashes inner-dashed-border animated-dashes"> <rect rx="0%" ry="0%">  </rect> </svg>
                     <?php endif; ?>    
                     <?php echo $button_one['name']; ?>
               </a>
            </div>
         <?php endif; ?>   

         <?php if(!empty($button_two['name']) && !empty($button_two['link'])): ?>
            <div class="be-numberal-donation-box--buttons-two be-button be-button-<?php echo $btn_animation ?>"> 
               <a href="<?php echo $button_two['link'] ?>"> 
                     <?php if(!empty($btn_animation === 'style_2')): ?>
                        <svg class="wgl-dashes inner-dashed-border animated-dashes"> <rect rx="0%" ry="0%">  </rect> </svg>
                     <?php endif; ?>    
                     <?php echo $button_two['name']; ?>
               </a>
            </div>
         <?php endif; ?>   

      </div>
  </div>
</div>