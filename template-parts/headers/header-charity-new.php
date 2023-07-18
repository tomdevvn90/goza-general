<?php

/**
 * Header template transparent
 */

$classes = [
   'site-header',
   'site-header-charity-new'
];
$logo = goza_get_logo_header_site();
$header_btn = __get_field('goza_header_button', 'option');
$goza_phone_number = __get_field('goza_phone_number', 'option');
$icon_cart = __get_field('goza_enable_cart', 'option');
?>

<header class="<?php echo implode(' ', $classes) ?>">
   <div class="container">
      <div class="goza-header-main">
         <div class="goza-header-main--logo">
            <?php
            if ($logo) {
               echo '<a href="/"><img src="' . esc_url($logo) . '" alt="' . get_bloginfo('name') . '"></a>';
            } else {
               echo '<h1><a href="' . get_site_url() . '">' . get_bloginfo('name') . '</a></h1>';
            }
            ?>
         </div>
         <div class="goza-header-main--menus">
            <div class="goza-header-main--menu">
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
               <?php if ($header_btn) { ?>
                  <a class="goza-header-button" href="<?= esc_attr($header_btn['url']) ?>" target="<?= ($header_btn['target']) ? $header_btn['target'] : '' ?>"><?= esc_attr($header_btn['title']) ?></a>
               <?php } ?>
               <div id="goza-hamberger"><i class="fa fa-reorder"></i></div>
            </div>
            <?php if ($goza_phone_number) { ?>
               <div class="goza-header-main--phone">
                  <a class="goza-header-phone" href="tel:<?= esc_attr($goza_phone_number) ?>"><i class="fa fa-phone"></i><?= esc_attr($goza_phone_number) ?></a>
               </div>
            <?php } ?>
         </div>
      </div>
   </div>

</header> <!-- #site-header -->