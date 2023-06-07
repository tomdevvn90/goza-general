<?php

// create id attribute for specific styling
$id = 'be-give-form-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$bgImage = (!empty(get_field('be_background_form'))) ? get_field('be_background_form') : '';
$is_style = isset($block['className']) ? $block['className'] : "is-style-default";
//var_dump($be_donation_form);
?>
<div id="<?php echo $id; ?>" class="be-give-form-box-block <?php echo $align_class; ?> <?php echo $is_style?>"> 
   <div class="be-give-form-box-block-inner" style="background-image: url('<?php echo $bgImage ?>')"> 
        <?php be_item_give_form_box($block) ?>
   </div>
</div>
