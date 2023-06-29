<?php
// create id attribute for specific styling
$id = 'be-progressbar-' . $block['id'];

// ACF field
$link_op = get_field('goza_link_color_op', 'option') ? : '';
if(!empty($link_op) && isset($link_op)){
    $link_color = $link_op['link_color'] ? : '#ec5e87';
}

$shape    = get_field('shape_pb_bl') ? : 'line';
$value    = get_field('value_pb_bl') ? : 0;
$text     = get_field('text_pb_bl') ? : '';
$height   = get_field('height_pb_bl') ? : 0;
$strokeCl = get_field('stroke_color_pb_bl') ? : $link_color;
$trailCl  = get_field('trail_color_pb_bl') ? : '#000';
$size     = get_field('size_pb_bl') ? : '';



// ACF field tab General
// $count_down = get_field('time_count_down_bl') ? : '';

?>

<div id="<?= $id; ?>" class="be-progressbar-block <?= $shape; ?>" data-shape="<?= $shape ?>" data-value="<?= $value ?>" 
    data-height="<?= $height ?>" data-stroke-color="<?= $strokeCl ?>" data-trail-color="<?= $trailCl ?>"
    style="--size:<?= $size ?>">

    <div id="be-progressbar-block-warp-<?= $block['id'] ?>" class="be-progressbar-block-warp"> </div>
    <div class="be-progressbar-block-warp __editor"> 
        <?php if($shape == 'circle'){
            $radius = 100; // Bán kính của hình tròn
            $strokeWidth = 8; // Độ rộng của đường viền
            
            $circumference = 2 * pi() * $radius; // Chu vi của hình tròn
            $length = $circumference - $strokeWidth; // Chiều dài thực tế của đường viền

            echo $value;
            
            $dashPercentage = 80; // Tỷ lệ phần trăm dash (trong ví dụ này là 80%)

            $dashLength = ($dashPercentage / 100) * $length; // Chiều dài dash dựa trên tỷ lệ phần trăm
            $gapLength = $length - $dashLength; // Chiều dài khoảng trống

            // echo $dashLength;

            // echo $gapLength;

            $strokeDashoffset = $gapLength / 2; // Khoảng cách offset từ đầu đến dash đầu tiên

            // echo $strokeDashoffset;

            // $strokeDasharray = $dashLength . ' ' . $gapLength; // Chuỗi giá trị dasharray

            
            ?>
            <svg viewBox="0 0 100 100">
                <path d="M 50,50 m 0,-46 a 46,46 0 1 1 0,92 a 46,46 0 1 1 0,-92" stroke="<?= $trailCl ?>" stroke-width="<?= $height ?>" fill-opacity="0"></path>
                <path d="M 50,50 m 0,-46 a 46,46 0 1 1 0,92 a 46,46 0 1 1 0,-92" stroke="<?= $strokeCl ?>" stroke-width="<?= $height ?>" fill-opacity="0" style="stroke-dasharray: <?= $dashLength  ?>, <?= $gapLength  ?>; stroke-dashoffset: <?= $strokeDashoffset   ?>;"></path>
            </svg>
        <? }else{ ?>
            <?php $line = 100 - $value; ?>
            <?php if($line > 0){ ?>
                <svg viewBox="0 0 100 1" preserveAspectRatio="none" style="display: block; width: 100%; height: <?=$height?>px;">
                    <path d="M 0,0.5 L 100,0.5" stroke="<?= $trailCl ?>" stroke-width="1" fill-opacity="0"></path>
                    <path d="M 0,0.5 L 100,0.5" stroke="<?= $strokeCl ?>" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 100, 100; stroke-dashoffset: <?= $line ?>;"></path>
                </svg>
            <?php } ?>
        <?php } ?>
    </div>
</div>