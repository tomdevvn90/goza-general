<?php
/**
 * Import pack data package demo
 *
 * @package Import Pack
 * @author BePlus
 */
$plugin_includes = array(
  array(
    'name'     => 'Yoast SEO',
    'slug'     => 'wordpress-seo',
  ),
  array(
    'name'      => 'Advanced Custom Fields',
    'slug'      => 'advanced-custom-fields', 
  ),
  array(
    'name'      => 'Woocommerce',
    'slug'      => 'woocommerce', 
  ),

);

return apply_filters( 'beplus/import_pack/package_demo', [
    [
        'package_name' => 'goza-main',
        'preview' => IMPORT_URI . '/images/goza-main-preview.png', // image size 680x475
        'url_demo' => 'https://gozashop.beplusthemes.com/',
        'title' => __( 'goza Main', 'beplus' ),
        'description' => __( 'goza main demo, include home demos & full inner page (Contact, About, Company, blog, etc.).' ),
        'plugins' => $plugin_includes,
    ],
] );
