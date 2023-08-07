<?php
/**
 * Import pack data package demo
 *
 * @package Import Pack
 * @author BePlus
 */
$plugin_includes = array(
  array(
    'name'     => 'Smart Slider 3 - Pro',
    'slug'     => 'smart-slider-3-pro',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'smartslider3.zip',
  ),
  array(
    'name'     => 'GiveWP – Donation Plugin and Fundraising Platform',
    'slug'     => 'give',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'give.zip',
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
