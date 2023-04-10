<div class="site-menu-mobile">
        <span class="off-canvas-menu-closed"><i class="fa fa-close"></i></span>
        <div class="site-menu-mobile-wrap-menu">
            <?php
            wp_nav_menu([
                'theme_location' => 'mobile-menu',
                'menu_class' => 'mobile-menu',
                'container_class' => 'menu-container',
                'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                'bootstrap' => false
            ]);
            ?>
        </div>
</div>