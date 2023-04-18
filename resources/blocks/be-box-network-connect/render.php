<?php

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

ob_start();

?>

<div id="<?= esc_attr($block['id']); ?>" class="be-box-network-connect-block <?php echo $align_class?>"> 
   Aloha
</div>
<?php 