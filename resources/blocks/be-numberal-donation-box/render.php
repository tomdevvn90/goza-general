<?php

// create id attribute for specific styling
$id = 'be-numberal-donation-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$general     = (!empty(get_field('general_numberal_donation_box'))) ? get_field('general_numberal_donation_box') : '';
$counter     = (!empty(get_field('counter_numberal_donation_box'))) ? get_field('counter_numberal_donation_box') : '';
$list_items  = (!empty($counter['list_items'])) ? $counter['list_items'] : '';
$button_one  = (!empty($general['button_one'])) ? $general['button_one'] : '';
$button_two  = (!empty($general['button_one'])) ? $general['button_one'] : '';
$bg          = (!empty($general['bg_image'])) ? $general['bg_image'] : get_template_directory_uri(). '/resources/assets/images/bg-number-box-default.jpg';
?>
<div id="<?php echo $id; ?>" class="be-numberal-donation-box <?php echo $align_class; ?>" style="background-image:url('<?php echo $bg ?>')"> 
  <div class="be-numberal-donation-box-inner">
      <?php if(!empty($list_items)): ?>
         <div class="be-numberal-donation-box--list-item"> 
            <?php 
               $st_counter = (!empty($counter['settings'])) ? $counter['settings'] : '';
               $duration   = (!empty($st_counter['duration'])) ?  $st_counter['duration'] : 1000;
               $offset     = (!empty($st_counter['offset'])) ?  $st_counter['offset'] : 50;
               $delay      = (!empty($st_counter['delay'])) ?  $st_counter['delay'] : 800;
            ?>
            <?php foreach ($list_items as $key => $value): ?>
               <?php 
                  $delay_item = (($key * 200) + $delay)
               ?>
               <div class="item-numberal-donation"> 
                     <div class="item-numberal-donation--number"> 
                        <?php if(!empty($value['numberal'])): ?>
                           <span data-counter data-offset="<?php echo $offset ?>" data-duration="<?php echo $duration ?>" data-delay="<?php echo $delay_item ?>"> <?php echo $value['numberal'] ?></span>
                        <?php endif; ?>

                        <?php if(!empty($value['after_prefix'])): ?>
                           <span class="item-numberal-donation--numberal-after"> <?php echo $value['after_prefix'] ?> </span>
                        <?php endif; ?>   
                     </div>

                     <?php if(!empty($value['heading'])): ?>
                        <h4 class="item-numberal-donation--heading"> <?php echo $value['heading'] ?> </h4>
                     <?php endif; ?>
               </div>
            <?php endforeach; ?>

         </div>
      <?php endif; ?>   


      <div class="be-numberal-donation-box--buttons"> 
         <?php if(!empty($button_one)): ?>
         <?php endif; ?>   
      </div>
  </div>
</div>