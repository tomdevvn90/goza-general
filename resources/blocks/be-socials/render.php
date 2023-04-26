<?php

// create id attribute for specific styling
$id = 'be-socials-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$heading = get_field('heading_bl_socials');
$items   = get_field('list_items_bl_socials');
$is_style = isset($block['className']) ? $block['className'] : "is-style-default";

?>
<div id="<?php echo $id; ?>" class="be-socials-block <?php echo $align_class; ?> <?php echo $is_style?>"> 
   <div class="be-socials-block-inner"> 
      <?php if(!empty($heading)): ?>
         <h6 class="be-socials-block--heading"> <?php echo $heading ?> </h6>
      <?php endif; ?>   

      <?php if(!empty($items)): ?>
         <ul class="be-socials-block--items">
            <?php foreach ($items as $key => $value) : ?>
               <?php $icon = $value['icon']; ?>
               <?php if(!empty($value['url'])): ?>
                  <li> 
                     <a href="<?php echo $value['url'] ?>"> <i class="fa fa-<?php echo $icon['value'] ?>" aria-hidden="true"></i></a> </a> 
                  </li>
               <?php endif; ?>   
            <?php endforeach; ?>   
         </ul>
      <?php endif; ?>   
   </div>
</div>