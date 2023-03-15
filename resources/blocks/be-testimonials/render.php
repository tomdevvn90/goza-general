<?php

// create id attribute for specific styling
$id = 'be-testominials-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$testominials     = get_field('list_items');
$carousel_setting = get_field('slider_setting');

$data_carousel = array(
    'slidesToShow'   =>  $carousel_setting['slidesToShow'] ? intval($carousel_setting['slidesToShow']) : 1,
    'slidesToScroll' =>  $carousel_setting['slidesToScroll'] ? intval($carousel_setting['slidesToScroll']) : 1,
    'arrows'         =>  $carousel_setting['arrows'] ? $carousel_setting['arrows'] : false,
    'dots'           =>  $carousel_setting['dots'] ? $carousel_setting['dots'] : false,
    'autoplay'       =>  $carousel_setting['autoplay'] ? $carousel_setting['autoplay'] : false,
    'loop'           =>  $carousel_setting['loop'] ? $carousel_setting['loop'] : false,
);

$is_style = isset($block['className']) ? $block['className'] : "is-style-default";

?>
<div id="<?php echo $id; ?>" class="be-testominials-block <?php echo $align_class; ?> <?php echo $is_style?>" data-style="<?php echo $is_style?>"  data-carousel='<?= json_encode($data_carousel) ?>'> 
    <?php if(!empty($testominials)): ?>        
        <div class="be-testominials-block-carousel"> 
            <?php foreach ($testominials as $testominial): ?>
                <div class="item-testominial"> 
                    <div class="item-testominial-inner"> 
                        <div class="item-testominial-thumbnail"> 
                            <?php if(!empty($testominial['image'])): ?>
                                <img src="<?php echo $testominial['image'] ?>" alt="image">
                            <?php endif; ?>
                        </div>

                        <div class="item-testominial-content"> 
                            <?php if(!empty($testominial['description'])): ?>
                                <p class="item-testominial-desc"> <?php echo $testominial['description'] ?> </p>
                            <?php endif; ?> 
                            
                            <div class="item-testominial-info">
                                <?php if(!empty($testominial['user_name'])): ?>
                                    <h3 class="item-testominial-name"> <?php echo $testominial['user_name'] ?> </h3>
                                <?php endif; ?>
                                
                                <?php if(!empty($testominial['position'])): ?>
                                    <p class="item-testominial-position"> <?php echo $testominial['position'] ?> </p>
                                <?php endif; ?>
                            </div>   
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>   
        </div>
    <?php endif; ?>    
</div>