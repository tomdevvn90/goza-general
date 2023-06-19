<?php

/**
 * Header template transparent
 */

$classes = [
   'site-header',
   'site-header-ngo'
];
$logo = goza_get_logo_header_site();
$header_btn = __get_field('goza_header_button', 'option');
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
               <?php if ($icon_cart && class_exists( 'WooCommerce' )) { ?>
                  <div class="goza-header-cart-icon">
                     <i class="fa fa-shopping-basket"></i>
                     <span class="goza-total-cart"><?= WC()->cart->cart_contents_count ?></span>
                  </div>
               <?php   } ?>
               <?php if ($header_btn) { ?>
                  <a class="d-none d-lg-block goza-header-button" href="<?= esc_attr($header_btn['url']) ?>" target="<?= ($header_btn['target']) ? $header_btn['target'] : '' ?>"><?= esc_attr($header_btn['title']) ?></a>
               <?php } ?>
               <div id="goza-hamberger" class="d-block d-lg-none"><i class="fa fa-reorder"></i></div>
            </div>
         </div>
      </div>
   </div>

</header> <!-- #site-header -->