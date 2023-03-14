<?php

function goza_generate_styles_theme()
{

    global $wp_filesystem;

    if (empty($wp_filesystem)) {
        require_once ABSPATH . '/wp-admin/includes/file.php';
        WP_Filesystem();
    }

    /*Generate custom css*/
    $general_css = '';

    $general_css .= goza_theme_options_styles();


    /*Create dir or update*/
    $upload_dir = wp_upload_dir();

    if (!$wp_filesystem->is_dir($upload_dir['basedir'] . '/styles_uploads')) {
        wp_mkdir_p($upload_dir['basedir'] . '/styles_uploads');
    }

    $general_style_file = $upload_dir['basedir'] . '/styles_uploads/variable-css.css';

    /*Update V*/
    $current_v = get_option('general_styles_version', 1) + 1;
    update_option('general_styles_version', $current_v);

    $wp_filesystem->put_contents($general_style_file, $general_css, FS_CHMOD_FILE);
}

function goza_get_style($key = '')
{
    $args = array(
        'prefix' => '',
        'affix'  => ''
    );

    $metrix = array(
        'padding-top',
        'padding-bottom',
        'margin-bottom',
        'line-height',
        'border-width',
        'max-width'
    );

    $src = array(
        'background-image'
    );

    /*Set px*/
    if (in_array($key, $metrix)) {
        $args['affix'] = 'px';
    }

    /*Set url*/
    if (in_array($key, $src)) {
        $args['prefix'] = 'url("';
        $args['affix'] = '")';
    }

    return $args;
}

function goza_theme_options_styles()
{
    $custom_css = '';

    $styles = array(
        'a' => array(
            'color' => 'blue'
        ),
        'a:hover' => array(
            'color' => 'red'
        ),
        'div' => array(
            'color' => __get_field('goza_topbar_bg_color', 'option')
        ),
        'p' => array(
            'margin-bottom' => '10',
            'line-height'   => '20'
        )
    );

    foreach ($styles as $element => $element_styles) {
        $custom_css .= "{$element}{";
        foreach ($element_styles as $parent_prop => $parent_value) {
            if (!empty($parent_value)) {
                $helpers = goza_get_style($parent_prop);
                $prefix = $helpers['prefix'];
                $affix = $helpers['affix'];

                /*Second lvl*/
                if (is_array($parent_value)) {
                    $custom_css .= "} {$element} {$parent_prop} {";
                    foreach ($parent_value as $prop => $value) {
                        $helpers = goza_get_style($parent_prop);
                        $prefix = $helpers['prefix'];
                        $affix = $helpers['affix'];

                        $custom_css .= "{$prop}:{$prefix}{$value}{$affix};";
                    }
                } else {
                    /*First lvl*/
                    $custom_css .= "{$parent_prop}:{$prefix}{$parent_value}{$affix};";
                }
            }
        }
        $custom_css .= '}';
    }

    $container_width = __get_field('goza_site_width', 'option');
    $bg_preloader = __get_field('goza_preloader_color', 'option');
	if(!empty($container_width)) {
		$custom_css .= "@media (min-width: 1400px) {";
		$custom_css .= ":root { 
	        --max-width: {$container_width}px;
	    }";
		$custom_css .= "}";
	}

    return $custom_css;
}
