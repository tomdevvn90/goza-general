<?php

// create id attribute for specific styling
$id = 'hero-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
// $image = get_field('image');
// $headline = get_field('headline');
// $paragraph = get_field('paragraph');
// $cta = get_field('cta');

?>
<section id="<?php echo $id; ?>" class="hero <?php echo $align_class; ?>">
    <a href="#">This is demo block</a> 
</section>