<?php

// create id attribute for specific styling
$id = 'be-socials-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$heading = get_field('heading_bl_socials');
$items   = get_field('list_items_bl_socials');
$ctColor = get_field('custom_color_bl_socials');
$bg      = (!empty(get_field('bg_bl_socials')) && $ctColor) ? get_field('bg_bl_socials') : "#fff";
$bgHover = (!empty(get_field('bg_hover_bl_socials')) && $ctColor) ? get_field('bg_hover_bl_socials') : "";
echo $bg;
$is_style = isset($block['className']) ? $block['className'] : "is-style-default";

?>
<div id="<?php echo $id; ?>" class="be-socials-block <?php echo $align_class; ?> <?php echo $is_style?>"> 
   <div class="be-socials-block-inner"> 
      <?php if(!empty($heading)): ?>
         <h6 class="be-socials-block--heading"> <?php echo $heading ?> </h6>
      <?php endif; ?>   

      <?php if(!empty($items)): ?>
         <ul class="be-socials-block--items" style="--bg:<?php echo $bg?>; --bgHover:<?php echo $bgHover ?>">
            <?php foreach ($items as $key => $value) : ?>
               <?php if(!empty($value['icon']) && !empty($value['link'])): ?>
                  <li> 
                     <a href="<?php echo $value['link'] ?>">
                        <img src="<?php echo $value['icon'] ?>" alt="icon">
                     </a>
                  </li>
               <?php endif; ?>   
            <?php endforeach; ?>   
         </ul>
      <?php endif; ?>   
   </div>
</div>