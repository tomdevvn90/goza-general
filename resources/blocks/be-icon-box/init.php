<?php
function be_item_icon_box($block){
    $is_style = (isset($block['className']) && !empty($block['className'])) ? $block['className'] : "is-style-default";

    // ACF field variables
    $heading = get_field('heading_icon_box');
    $link    = get_field('link_icon_box');
    $icon    = (!empty(get_field('icon__icon_box'))) ? get_field('icon__icon_box') : get_template_directory_uri(). '/resources/assets/images/icon-box-default.svg' ;
    $button  = get_field('button_icon_box');
   
    switch ($is_style) {
        case "is-style-2":
            be_template_icon_box_style_2($heading, $icon, $button, $link);
            break;

        case "is-style-3":
            be_template_icon_box_style_3($heading, $icon, $button, $link);
            break; 

        default:
            be_template_icon_box_default($heading, $icon, $button, $link);
            break; 
    } 
}

function be_template_icon_box_style_3($heading, $icon, $button, $link){ ?>
    <div class="be-icon-box-block-inner--content"  data-aos="zoom-in"> 
        <div class="be-icon-box-block--icon"> 
            <img src="<?php echo $icon ?>" alt="icon">
        </div>

        <?php if(!empty($heading)): ?>
            <h3 class="be-icon-box-block--heading"> 
                <?php if(!empty($link)){ ?>
                    <a href="<?php echo $link ?>">  <?php echo $heading ?>  </a>
                <?php }else{
                    echo $heading;
                } ?>
            </h3>
        <?php endif; ?>  
    </div>
<?php }

function be_template_icon_box_style_2($heading, $icon, $button, $link){ ?>
    <div class="be-icon-box-block-warp" data-aos="zoom-in"> 
        <div class="be-icon-box-block--icon"> 
            <img src="<?php echo $icon ?>" alt="icon">
        </div>

        <?php if(!empty($heading)): ?>
            <h3 class="be-icon-box-block--heading"> 
                <?php if(!empty($link)){ ?>
                    <a href="<?php echo $link ?>">  <?php echo $heading ?>  </a>
                <?php }else{
                    echo $heading;
                } ?>
            </h3>
        <?php endif; ?>    
    </div> 

    <div class="be-icon-box-block-hover"> 
        <div class="be-icon-box-block-hover--inner"> 
            <?php if(!empty($heading)): ?>
                <h3 class="be-icon-box-block--heading"> 
                    <?php if(!empty($link)){ ?>
                        <a href="<?php echo $link ?>">  <?php echo $heading ?>  </a>
                    <?php }else{
                        echo $heading;
                    } ?>
                </h3>
            <?php endif; ?>  

            <?php if(!empty($button['text']) && !empty($button['link'])): ?>
                <div class="be-icon-box-block--button"> 
                    <a href="<?php echo $button['link'] ?>"> <?php echo $button['text'] ?> </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php }

function be_template_icon_box_default($heading, $icon, $button, $link){ ?>
    <div class="be-icon-box-block-warp" data-aos="zoom-in"> 
        <div class="be-icon-box-block--icon"> 
            <img src="<?php echo $icon ?>" alt="icon">
        </div>

        <?php if(!empty($heading)): ?>
            <h3 class="be-icon-box-block--heading"> 
                <?php if(!empty($link)){ ?>
                    <a href="<?php echo $link ?>">  <?php echo $heading ?>  </a>
                <?php }else{
                    echo $heading;
                } ?>
            </h3>
        <?php endif; ?>    
    </div> 

    <div class="be-icon-box-block-hover"> 
        <?php if(!empty($button['text']) && !empty($button['link'])): ?>
            <div class="be-icon-box-block--button"> 
                <a href="<?php echo $button['link'] ?>"> <?php echo $button['text'] ?> </a>
            </div>
        <?php endif; ?>
    </div>
<?php }