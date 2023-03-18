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
            'color' => ''
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
    $typography_body = __get_field('typography_body', 'option');
    $body_font_family = $typography_body['body_font_family'];
    $body_font_weight = $typography_body['body_font_weight'];
    $body_font_size = $typography_body['body_font_size'];
    $body_line_height = $typography_body['body_line_height'];
    $body_letter_spacing = $typography_body['body_letter_spacing'];

    $typography_heading = __get_field('typography_heading', 'option');
    $heading_font_family = $typography_heading['heading_font_family'];
    $heading_font_weight = $typography_heading['heading_font_weight'];
    $heading_font_style = $typography_heading['heading_font_style'];

    $h1_font_style = __get_field('h1_font_style', 'option');
    $h1_font_size = $h1_font_style['font_size'];
    $h1_line_height = $h1_font_style['line_height'];
    $h1_letter_spacing = $h1_font_style['letter_spacing'];

    $h2_font_style = __get_field('h1_font_style', 'option');
    $h2_font_size = $h2_font_style['font_size'];
    $h2_line_height = $h2_font_style['line_height'];
    $h2_letter_spacing = $h2_font_style['letter_spacing'];

    $h3_font_style = __get_field('h1_font_style', 'option');
    $h3_font_size = $h3_font_style['font_size'];
    $h3_line_height = $h3_font_style['line_height'];
    $h3_letter_spacing = $h3_font_style['letter_spacing'];

    $h4_font_style = __get_field('h1_font_style', 'option');
    $h4_font_size = $h4_font_style['font_size'];
    $h4_line_height = $h4_font_style['line_height'];
    $h4_letter_spacing = $h4_font_style['letter_spacing'];
    
    $h5_font_style = __get_field('h1_font_style', 'option');
    $h5_font_size = $h5_font_style['font_size'];
    $h5_line_height = $h5_font_style['line_height'];
    $h5_letter_spacing = $h5_font_style['letter_spacing'];

    $h6_font_style = __get_field('h1_font_style', 'option');
    $h6_font_size = $h6_font_style['font_size'];
    $h6_line_height = $h6_font_style['line_height'];
    $h6_letter_spacing = $h6_font_style['letter_spacing'];

    $custom_css .= "@media (min-width: 1400px) {";
    $custom_css .= ":root { 
	        --max-width: {$container_width}px;    
            --body-family: '{$body_font_family}';  
            --body-font-weight: {$body_font_weight};  
            --body-font-size: {$body_font_size};  
            --body-line-height: {$body_line_height};  
            --body-letter-spacing: {$body_letter_spacing};  
            --heading-family: '{$heading_font_family}';  
            --heading-font-weight: {$heading_font_weight};  
            --heading-font-style: {$heading_font_style};   
            --h1-font-size: {$h1_font_size};  
            --h1-line-height: {$h1_line_height};  
            --h1-letter-spacing: {$h1_letter_spacing};  
            --h2-font-size: {$h2_font_size};  
            --h2-line-height: {$h2_line_height};  
            --h2-letter-spacing: {$h2_letter_spacing};  
            --h3-font-size: {$h3_font_size};  
            --h3-line-height: {$h3_line_height};  
            --h3-letter-spacing: {$h3_letter_spacing}; 
            --h4-font-size: {$h4_font_size};  
            --h4-line-height: {$h4_line_height};  
            --h4-letter-spacing: {$h4_letter_spacing}; 
            --h5-font-size: {$h5_font_size};  
            --h5-line-height: {$h5_line_height};  
            --h5-letter-spacing: {$h5_letter_spacing}; 
            --h6-font-size: {$h6_font_size};  
            --h6-line-height: {$h6_line_height};  
            --h6-letter-spacing: {$h6_letter_spacing};             
	    }";
    $custom_css .= "}";

    return $custom_css;
}
