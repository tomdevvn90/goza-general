<?php

// create id attribute for specific styling
$id = 'be-ss-ic-text-img' . $block['id'];

// ACF field 
$heading   = get_field('hd_ss_itm') ? : '';
$sub_hd    = get_field('sub_hd_ss_itm') ? : '';
$image     = get_field('sub_hd_ss_itm') ? : '';
$list_ict  = get_field('list_icon_text_ss_itm') ? : '';
$bg_cl     = get_field('bg_cl_ss_itm') ? : '#043958';
$bg_img    = get_field('bg_img_ss_itm') ? : ' ';
$hd_cl     = get_field('hd_cl_ss_itm') ? : '';
$sub_hd_cl = get_field('sub_hd_cl_ss_itm') ? : '';


// // ACF field 

// // tab General
// $heading = get_field('hd_ss_ab_vd');
// $sub_hd  = get_field('sub_hd_ss_ab_vd') ? : '';
// $desc    = get_field('desc_hd_ss_ab_vd') ? : '';
// $img     = get_field('img_ss_ab_vd') ? : 'https://picsum.photos/1920/900?1';

// if(!empty($heading) && isset($heading)){
//    $hd_name = $heading['name'] ? : '';
//    $hd_url  = $heading['url'] ? : '';
// }

// // tab Video
// $vd_st = get_field('vd_ss_ab_vd');

// if(!empty($vd_st) && isset($vd_st)){
//    $vd_url = $vd_st['url'] ? : '';
// }

// // tab CTA
// $cta_name  = get_field('cta_name_ss_ab_vd') ? : '';
// $cta_link  = get_field('cta_link_ss_ab_vd') ? : '';
// $cta_style = get_field('cta_style_ss_ab_vd') ? : 'style_default';

// // tab Styles
// $color_hd     = get_field('color_hd_ss_ab_vd') ? : '';
// $color_sub_hd = get_field('color_sub_hd_ss_ab_vd') ? : '';

?>
<section id="<?php echo $id; ?>" class="be-ss-ic-text-img-block"> 
   <div class="be-ss-ic-text-img-block-inner"> 
      <div class="be-ss-ic-text-img-block-left" style="background-color:<?= $bg_cl ?>"> 
            <div class="be-ss-ic-text-img-block-left--inner">
               <?php if(!empty($sub_hd) && isset($sub_hd)): ?>
                  <p class="be-ss-ic-text-img-block--sub-heading" style="color:<?= $sub_hd_cl ?>"> <?= esc_attr($sub_hd) ?> </p>
               <?php endif; ?>

               <?php if(!empty($heading) && isset($heading)): ?>
                  <h2 class="be-ss-ic-text-img-block--heading" style="color:<?= $hd_cl ?>"> <?= esc_attr($heading) ?> </h2>
               <?php endif; ?>

               <?php if(!empty($list_ict) && isset($list_ict)): ?>
                  <div class="be-ss-ic-text-img-block--list-icon-text"> 
                     <?php foreach ($list_ict as $key => $value): ?>
                        <div class="item-icon-text">
                           <div class="item-icon-text--inner">
                              <?php $icon_url = $value['icon']['url'] ? : get_template_directory_uri(). '/resources/assets/images/icon-box-default.svg'; ?>
                              <div class="item-icon-text--thumbnail"> 
                                 <?php if(is_array($icon_url)){
                                    $srcset = wp_get_attachment_image_srcset($value['icon']['id']) ? : '';
                                 ?>
                                    <img src="<?= esc_url($icon_url) ?>" srcset="<?= $srcset ?>" alt="icon"  />
                                 <?php }else { ?>
                                    <img src="<?= esc_url($icon_url) ?>" alt="icon" />
                                 <?php } ?>
                              </div>

                              <div class="item-icon-text--content"> 
                                 <?php if(!empty($value['heading']) && isset($value['heading'])): ?>
                                    <h3 class="item-icon-text--heading"> <?= esc_attr($value['heading']) ?>  </h3>
                                 <?php endif; ?>   

                                 <?php if(!empty($value['desc']) && isset($value['desc'])): ?>
                                    <p class="item-icon-text--desc"> <?= esc_attr($value['desc']) ?>  </p>
                                 <?php endif; ?>   
                              </div>
                           </div>
                        </div>
                     <?php endforeach; ?> 
                  </div>
               <?php endif; ?>   
            </div>
      </div>
      <div class="be-ss-ic-text-img-block-right"> </div>
   </div>
</section>