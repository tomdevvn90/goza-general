<?php 
// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$infomation_list = get_field('infomation_list_block');

$info_bg_color = get_field('infomation_bg_color_block');
$info_heading_color = get_field('heading_color_infomation_block');
$info_text_color = get_field('text_color_infomation_block');
$info_margin_top = get_field('margin_top_infomation_block');
$info_box_shadow = get_field('box_shadow_infomation_block');
$info_animation = get_field('animation_infomation_block');

$info_bg_color_style = !empty($info_bg_color)? 'background-color:'.$info_bg_color.';' : '';
$info_heading_color_style = !empty($info_heading_color)? 'color:'.$info_heading_color.';' : '';
$info_text_color_style = !empty($info_text_color)? 'color:'.$info_text_color.';' : '';
$info_margin_top_style = !empty($info_margin_top)? 'margin-top:'.$info_margin_top.'px;' : '';

$shadow_class = ($info_box_shadow)? 'shadow' : '';
$data_aos_animated = ($info_animation != 'none')? $info_animation : '';

?>
<section id="<?php echo $id; ?>" class="be-infomation-section <?php echo $align_class; ?>">
    <div class="be-infomation-box">
        <div data-aos="<?php echo $data_aos_animated; ?>" class="be-infomation-list <?php echo $shadow_class; ?>" style="<?php echo $info_bg_color_style; ?><?php echo $info_margin_top_style; ?>">
            <?php if ( !empty( $infomation_list ) ) {
                
                foreach ($infomation_list as $key => $value) {
                   ?>
                    <div class="be-infmation-item">
                        <?php if( !empty( $value['icon']['url'] ) ): ?>
                        <div class="be-infmation-item--icon-wrap">
                            <img src="<?php echo $value['icon']['url']; ?>" alt="<?php echo $value['icon']['alt'] ?>">
                        </div>
                        <?php endif; ?>
                        <?php if( !empty( $value['heading'] ) || !empty( $value['text'] ) ): ?>
                        <div class="be-infmation-item--content-wrap">
                            <?php if( !empty( $value['heading'] ) ): ?>
                                <h4 class="be-infmation-item--heading" style="<?php echo $info_heading_color_style; ?>">
                                    <?php echo $value['heading']; ?>
                                </h4>
                            <?php endif; ?>
                            <?php if( !empty( $value['text'] ) ): ?>
                                <div class="be-infmation-item--text" style="<?php echo $info_text_color_style; ?>">
                                <?php echo $value['text']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                   <?php
                }
            } else{
                echo '<p>Please enter fields to show!</p>';
            } ?>
        </div>
    </div>
</section>


