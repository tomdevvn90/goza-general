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
   <div class="container">
      <div class="goza-header-main">
         <div class="goza-header-main--logo">
            <?php
            if (has_custom_logo()) {
               echo '<a href="/"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '"></a>';
            } else {
               echo '<h1><a href="' . get_site_url() . '">' . get_bloginfo('name') . '</a></h1>';
            }
            ?>
         </div>
      </div>
   </div>

</header> <!-- #site-header -->