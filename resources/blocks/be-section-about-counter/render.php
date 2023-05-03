<?php

// create id attribute for specific styling
$id = 'be-ss-ab-counter-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
// $heading  = get_field('heading_ss_up_ev_vd') ?: '';

$bg        = get_field('bg_ss_ab_counter') ?: get_template_directory_uri(). '/resources/assets/images/bg-ss-ab-counter.jpg';
$heading   = get_field('heading_ss_ab_counter') ?: '';
$desc      = get_field('desc_ss_ab_counter') ?: '';
$counters  = get_field('counters_ss_ab_counter') ?: '';
$cta_name  = get_field('cta_name_ss_ab_counter') ?: '';
$cta_link  = get_field('cta_link_ss_ab_counter') ?: '';
$cta_style = get_field('cta_style_ss_ab_counter') ?: 'btn-default';
?>
<section id="<?php echo $id; ?>" class="be-ss-ab-counter <?php echo $align_class; ?>"> 
   <div class="be-ss-ab-counter--bg"> 
      <img src="<?= esc_url($bg) ?>" alt="bg-image">
   </div>

   <div class="be-ss-ab-counter--content">  
      <div class="container"> 
         <div class="be-ss-ab-counter--inner"> 
            <?php if(!empty($heading)): ?>
               <h2 class="be-ss-ab-counter--heading"> <?= $heading ?> </h2>
            <?php endif; ?>   

            <?php if(!empty($desc)): ?>
               <p class="be-ss-ab-counter--desc"> <?= $desc ?> </p>
            <?php endif; ?>  

            <?php if(!empty($counters)): ?>
               <div class="be-ss-ab-counter--list-counters"> 
                  <?php 
                     $st_counter = (!empty(get_field('counter_settings_ss_ab_counter'))) ? get_field('counter_settings_ss_ab_counter') : '';
                     $duration   =  $st_counter['duration'] ?: 1000;
                     $delay      =  $st_counter['delay'] ?: 100;
                  ?>
                  <?php foreach ($counters as $key => $value): ?>
                     <?php $delay_item = (($key * 20) + $delay) ;?>
                     <div class="item-counter"> 
                        <div class="item-counter--number"> 
                           <?php if(!empty($value['numberal'])): ?>
                              <span data-counter  data-duration="<?php echo $duration ?>" data-delay="<?php echo $delay_item ?>"> <?php echo $value['numberal'] ?></span>
                           <?php endif; ?>  
                        </div>

                        <?php if(!empty($value['heading'])): ?>
                           <h4 class="item-counter--heading"> <?= esc_attr($value['heading']); ?> </h4>
                        <?php endif; ?>
                     </div>
                  <?php endforeach; ?>   
               </div>
            <?php endif; ?>   

            <?php if( !empty($cta_name) && !empty($cta_link) ): ?>   
               <div class="be-ss-ab-counter--cta be-button"> 
                  <a href="<?= esc_url($cta_link) ?>" class="btn <?= esc_attr($cta_style) ?>">
                     <?= esc_attr($cta_name) ?>
                     <?php if ($cta_style == 'btn-water') { ?>
                           <svg class="wgl-dashes inner-dashed-border animated-dashes">
                              <rect rx="0%" ry="0%"> </rect>
                           </svg>
                     <?php } ?>
                  </a>
               </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>