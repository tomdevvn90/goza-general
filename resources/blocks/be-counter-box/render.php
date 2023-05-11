<?php
// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$counter_bg_img = get_field('bg_image_counter_box');
$counter_number = get_field('number_counter_box');
$counter_number_after = get_field('after_number_counter_box');
$counter_number_before = get_field('before_number_counter_box');
$counter_heading = get_field('heading_counter_box');

$bg_img = !empty( $counter_bg_img )? 'background-image: url('.esc_url( $counter_bg_img ).');' : '';

$counter_duration = get_field('duration_counter_box');
$counter_delay = get_field('delay_counter_box');

$number_color = get_field('number_color_counter_box');
$heading_color = get_field('heading_color_counter_box');
$number_color_style = !empty( $number_color )? 'color:'.esc_attr( $number_color ).';' : '';
$heading_color_style = !empty( $heading_color )? 'color:'.esc_attr( $number_color ).';' : '';

?>
<div id="<?php echo $id; ?>" class="be-counter-up <?php echo $align_class; ?>">
    <div class="be-counter-up-box" style="<?php echo $bg_img; ?>">
        <h2 class="be-counter-up-box__number" style="<?php echo $number_color_style; ?>">
            <?php if( !empty( $counter_number_before ) ): ?>
            <span class="counter-up-before"><?php echo __( $counter_number_before, 'goza' ); ?></span>
            <?php endif; ?>
            <span class="counter-up" 
                data-counter="<?php echo esc_attr( $counter_number ); ?>"
                data-duration="<?php echo esc_attr( $counter_duration ); ?>"
                data-delay="<?php echo esc_attr( $counter_delay ); ?>">
                <?php echo esc_attr( $counter_number ); ?>
            </span>
            <?php if( !empty( $counter_number_after ) ): ?>
            <span class="counter-up-after"><?php echo __( $counter_number_after, 'goza'); ?></span>
            <?php endif; ?>
        </h2>
        <h5 class="be-counter-up-box__heading" style="<?php echo $heading_color_style; ?>">
            <?php echo __( $counter_heading, 'goza' ); ?>
        </h5>
    </div>
</div>