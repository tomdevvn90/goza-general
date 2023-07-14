<?php
/**
 * The template for displaying sidebar.
 *
 * @package gozagutenberg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * This file is here to avoid the Deprecated Message for sidebar by wp-includes/theme-compat/sidebar.php.
 */

 ?>
<div class="col-md-4 col-sm-12 bt-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<div class="bt-col-inner">
		<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
			<?php dynamic_sidebar( 'shop-sidebar' ); ?>
		<?php } ?>
	</div><!-- /.inner -->
</div><!-- /.sidebar -->
