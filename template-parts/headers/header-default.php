<?php

/**
 * Header template
 */

$classes = [
   'site-header',
];
$custom_logo_id = get_theme_mod('custom_logo');
?>
<header class="<?php echo implode(' ', $classes) ?>">
   
   <?php do_action('goza_hook_topbar'); ?>
</header> <!-- #site-header -->