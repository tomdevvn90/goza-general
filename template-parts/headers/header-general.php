<?php

/**
 * Header template
 */

$classes = [
   'site-header',
   'site-header-default',
];
$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
$header_btn = __get_field('goza_header_button', 'option');
$icon_cart = __get_field('goza_enable_cart', 'option');
$goza_enable_topbar = __get_field('goza_enable_topbar', 'option');
$goza_button_type = __get_field('goza_button_type', 'option');
$goza_form_donation = __get_field('goza_form_donation', 'option');
?>
<header class="<?php echo implode(' ', $classes) ?>">
   <!-- Topbar -->
   <?php if ($goza_enable_topbar) do_action('goza_hook_topbar'); ?>

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
         <div class="goza-header-main--menus">
            <div class="d-none d-lg-block goza-header-main--menu">
               <?php
               wp_nav_menu([
                  'theme_location' => 'main-menu',
                  'menu_class' => 'main-menu',
                  'container_class' => 'menu-container',
                  'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                  'bootstrap' => false
               ]);
               ?>
            </div>
            <div class="goza-header-main--cta">
               <?php if ($icon_cart && class_exists('WooCommerce')) { ?>
                  <div class="goza-header-cart-icon">
                     <i class="fa fa-shopping-basket"></i>
                     <span class="goza-total-cart"><?= WC()->cart->cart_contents_count ?></span>
                  </div>
               <?php   } ?>
               <?php if ($goza_button_type == 'df_link') { ?>
                  <a class="d-none d-lg-block goza-header-button btn btn-general" href="<?= esc_attr($header_btn['url']) ?>" target="<?= ($header_btn['target']) ? $header_btn['target'] : '' ?>"><?= esc_attr($header_btn['title']) ?></a>
               <?php } else { ?>
                  <a class="d-none d-lg-block goza-header-button btn btn-general btn-donation-form" href="javascript:void(0)"><?= esc_html_e('DONATE NOW', 'goza') ?></a>
               <?php } ?>
               <div id="goza-hamberger" class="d-block d-lg-none"><i class="fa fa-reorder"></i></div>
            </div>
         </div>
      </div>
   </div>
</header> <!-- #site-header -->