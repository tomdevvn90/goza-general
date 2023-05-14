<?php
function goza_block_assets()
{
	wp_register_style('goza-block-style-css', get_template_directory_uri() . '/editor/dist/blocks.style.build.css', is_admin() ? array('wp-editor') : null, null);
	wp_register_script('goza-block-js', get_template_directory_uri() . '/editor/dist/blocks.build.js', array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), null,  true);
	wp_register_style('goza-block-editor-css', get_template_directory_uri() . '/editor/dist/blocks.editor.build.css', array('wp-edit-blocks'), null);

	register_block_type(
		'goza/block-my-block',
		array(
			'style'         => 'goza-block-style-css',
			'editor_script' => 'goza-block-js',
			'editor_style'  => 'goza-block-editor-css',
		)
	);
}
add_action('init', 'goza_block_assets');

function addBlocksStyles($block)
{
	$style_html = '';
	$blockName = $block['blockName'];
	$blockAttrs = $block['attrs'];

	if ($blockName) {
		// Get styles for parent blocks
		$style_html .= advgb_SetStylesForBlocks($blockAttrs, $blockName);
	}

	$style_html = $style_html ? '<style type="text/css" class="goza-blocks-styles-renderer">' . $style_html . '</style>' : '';

	return preg_replace('/\s\s+/', '', $style_html);
}

function contentPreRender($block)
{
	// Search for needed blocks then add styles to it
	$style = addBlocksStyles($block);
	array_push($block['innerContent'], $style);
	return $block;
}

add_filter('render_block_data', 'contentPreRender');

function advgb_SetStylesForBlocks($blockAttrs, $blockName)
{
	$html_style = '';
	switch ($blockName) {
		case 'goza-blocks/goza-button':
			// Styles
			$html_style = advgb_AdvancedButtonStyles($blockAttrs);
			break;
		default:
			// Nothing to do here
			break;
	}

	return $html_style;
}

function advgb_AdvancedButtonStyles($blockAttrs)
{
	// Decide to include or not CSS color property for outlined styles
	if (
		!isset($blockAttrs['textColor'])
		&& isset($blockAttrs['className'])
		&& (strpos($blockAttrs['className'], 'is-style-squared-outline') !== false
			|| strpos($blockAttrs['className'], 'is-style-outlined') !== false
		)
	) {
		$enable_text_color = false;
	} else {
		$enable_text_color = true;
	}

	$block_class    = esc_html($blockAttrs['id']);
	$font_size      = isset($blockAttrs['textSize']) ? esc_html(intval($blockAttrs['textSize'])) : 18;
	$color          = isset($blockAttrs['textColor']) ? esc_html($blockAttrs['textColor']) : '#fff';
	$bg_color       = isset($blockAttrs['bgColor']) ? esc_html($blockAttrs['bgColor']) : '#2196f3';
	$mg_top         = isset($blockAttrs['marginTop']) ? esc_html(intval($blockAttrs['marginTop'])) : 0;
	$mg_right       = isset($blockAttrs['marginRight']) ? esc_html(intval($blockAttrs['marginRight'])) : 0;
	$mg_bottom      = isset($blockAttrs['marginBottom']) ? esc_html(intval($blockAttrs['marginBottom'])) : 0;
	$mg_left        = isset($blockAttrs['marginLeft']) ? esc_html(intval($blockAttrs['marginLeft'])) : 0;
	$pd_top         = isset($blockAttrs['paddingTop']) ? esc_html(intval($blockAttrs['paddingTop'])) : 10;
	$pd_right       = isset($blockAttrs['paddingRight']) ? esc_html(intval($blockAttrs['paddingRight'])) : 30;
	$pd_bottom      = isset($blockAttrs['paddingBottom']) ? esc_html(intval($blockAttrs['paddingBottom'])) : 10;
	$pd_left        = isset($blockAttrs['paddingLeft']) ? esc_html(intval($blockAttrs['paddingLeft'])) : 30;
	$border_width   = isset($blockAttrs['borderWidth']) ? esc_html(intval($blockAttrs['borderWidth'])) : 1;
	$border_color   = isset($blockAttrs['borderColor']) ? esc_html($blockAttrs['borderColor']) : '';
	$border_style   = isset($blockAttrs['borderStyle']) ? esc_html($blockAttrs['borderStyle']) : 'none';
	$border_radius  = isset($blockAttrs['borderRadius']) ? esc_html(intval($blockAttrs['borderRadius'])) : 50;
	$hover_t_color  = isset($blockAttrs['hoverTextColor']) ? esc_html($blockAttrs['hoverTextColor']) : '';
	$hover_bg_color = isset($blockAttrs['hoverBgColor']) ? esc_html($blockAttrs['hoverBgColor']) : '';
	$hover_sh_color = isset($blockAttrs['hoverShadowColor']) ? esc_html($blockAttrs['hoverShadowColor']) : '#ccc';
	$hover_sh_h     = isset($blockAttrs['hoverShadowH']) ? esc_html(intval($blockAttrs['hoverShadowH'])) : 1;
	$hover_sh_v     = isset($blockAttrs['hoverShadowV']) ? esc_html(intval($blockAttrs['hoverShadowV'])) : 1;
	$hover_sh_blur  = isset($blockAttrs['hoverShadowBlur']) ? esc_html(intval($blockAttrs['hoverShadowBlur'])) : 12;
	$hover_sh_sprd  = isset($blockAttrs['hoverShadowSpread']) ? esc_html(intval($blockAttrs['hoverShadowSpread'])) : 0;
	$hover_opacity  = isset($blockAttrs['hoverOpacity']) ? esc_html(intval($blockAttrs['hoverOpacity']) / 100) : 1;
	$transition_spd = isset($blockAttrs['transitionSpeed']) ? esc_html(floatval($blockAttrs['transitionSpeed']) / 1000) : 0.2;

	$style_html  = '.' . $block_class . '{';
	$style_html .= 'font-size:' . $font_size . 'px;';
	if ($enable_text_color == true) $style_html .= 'color:' . $color . ' !important;';
	$style_html .= 'background-color:' . $bg_color . ' !important;';
	$style_html .= 'margin:' . $mg_top . 'px ' . $mg_right . 'px ' . $mg_bottom . 'px ' . $mg_left . 'px !important;';
	$style_html .= 'padding:' . $pd_top . 'px ' . $pd_right . 'px ' . $pd_bottom . 'px ' . $pd_left . 'px;';
	$style_html .= 'border-width:' . $border_width . 'px !important;';
	if (!empty($border_color)) $style_html .= 'border-color:' . $border_color . ' !important;';
	$style_html .= 'border-style:' . $border_style . ($border_style === 'none' ? '' : ' !important') . ';';
	$style_html .= 'border-radius:' . $border_radius . 'px !important;';
	$style_html .= '}';

	$style_html .= '.' . $block_class . ':hover{';
	if (!empty($hover_t_color)) $style_html .= 'color:' . $hover_t_color . ' !important;';
	if (!empty($hover_bg_color)) $style_html .= 'background-color:' . $hover_bg_color . ' !important;';
	$style_html .= 'box-shadow:' . $hover_sh_h . 'px ' . $hover_sh_v . 'px ' . $hover_sh_blur . 'px ' . $hover_sh_sprd . 'px ' . $hover_sh_color . ';';
	$style_html .= 'opacity:' . $hover_opacity . ';';
	$style_html .= 'transition:all ' . $transition_spd . 's ease;';
	$style_html .= '}';

	return $style_html;
}
