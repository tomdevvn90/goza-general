<?php
/**
 * Theme functions and definitions
 *
 * @package gozagutenberg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! defined( 'THEME_VERSION' ) ) {
	define( 'THEME_VERSION', WP_DEBUG ? rand() : '1.0' );
}

require get_template_directory() . '/resources/functions/reset.php';
require get_template_directory() . '/resources/functions/initialize.php';
require get_template_directory() . '/resources/functions/assets.php';
require get_template_directory() . '/resources/functions/acf-options.php';
require get_template_directory() . '/resources/functions/menus.php';
require get_template_directory() . '/resources/functions/widgets.php';
require get_template_directory() . '/resources/functions/post-types.php';
require get_template_directory() . '/resources/functions/meta.php';
require get_template_directory() . '/resources/functions/images.php';
require get_template_directory() . '/resources/functions/helpers.php';
require get_template_directory() . '/resources/functions/template-tags.php';
require get_template_directory() . '/resources/functions/template-func.php';
require get_template_directory() . '/resources/functions/hooks.php';

/**
 * Theme install
 */
require get_template_directory() . '/install/plugin-required.php';
require  get_template_directory() . '/install/import-pack/functions.php';