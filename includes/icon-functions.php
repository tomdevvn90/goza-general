<?php
/**
 * SVG icons related functions
 *
 * @package WordPress
 * @subpackage Goza
 * @since Goza 2.0
 */

/**
 * Gets the SVG code for a given icon.
 */
function goza_get_icon_svg( $icon, $size = 24 ) {
	return Goza_SVG_Icons::get_svg( 'ui', $icon, $size );
}

/**
 * Gets the SVG code for a given social icon.
 */
function goza_get_social_icon_svg( $icon, $size = 24 ) {
	return Goza_SVG_Icons::get_svg( 'social', $icon, $size );
}
