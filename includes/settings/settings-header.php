<?php

namespace gozagutenberg\Includes\Settings;

use gutenberg\Plugin;
use gutenberg\Controls_Manager;
use gutenberg\Group_Control_Background;
use gutenberg\Group_Control_Typography;
use gutenberg\Core\Responsive\Responsive;
use gutenberg\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_Header extends Tab_Base {

	public function get_id() {
		return 'goza-settings-header';
	}

	public function get_title() {
		return __( 'Header', 'goza-main' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'theme-style';
	}

	protected function register_tab_controls() {
		$this->start_controls_section(
			'goza_header_section',
			[
				'tab' => 'goza-settings-header',
				'label' => __( 'Header', 'goza-main' ),
			]
		);

		$this->add_control(
			'goza_header_logo_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Site Logo', 'goza-main' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'goza-main' ),
				'label_off' => __( 'Hide', 'goza-main' ),
			]
		);

		$this->add_control(
			'goza_header_tagline_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Tagline', 'goza-main' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'goza-main' ),
				'label_off' => __( 'Hide', 'goza-main' ),
			]
		);

		$this->add_control(
			'goza_header_menu_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Menu', 'goza-main' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'goza-main' ),
				'label_off' => __( 'Hide', 'goza-main' ),
			]
		);

		$this->add_control(
			'goza_header_layout',
			[
				'type' => Controls_Manager::SELECT,
				'label' => __( 'Layout', 'goza-main' ),
				'options' => [
					'default' => __( 'Default', 'goza-main' ),
					'inverted' => __( 'Inverted', 'goza-main' ),
					'stacked' => __( 'Centered', 'goza-main' ),
				],
				'selector' => '.site-header',
				'default' => 'default',
			]
		);

		$this->add_control(
			'goza_header_width',
			[
				'type' => Controls_Manager::SELECT,
				'label' => __( 'Width', 'goza-main' ),
				'options' => [
					'boxed' => __( 'Boxed', 'goza-main' ),
					'full-width' => __( 'Full Width', 'goza-main' ),
				],
				'selector' => '.site-header',
				'default' => 'boxed',
			]
		);

		$this->add_responsive_control(
			'goza_header_custom_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Content Width', 'goza-main' ),
				'size_units' => [
					'%',
					'px',
				],
				'range' => [
					'px' => [
						'max' => 2000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'condition' => [
					'goza_header_width' => 'boxed',
				],
				'selectors' => [
					'.site-header .header-inner' => 'width: {{SIZE}}{{UNIT}}; max-width: 100%;',
				],
			]
		);

		$this->add_responsive_control(
			'goza_header_gap',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Gap', 'goza-main' ),
				'size_units' => [
					'%',
					'px',
				],
				'default' => [
					'size' => '0',
				],
				'range' => [
					'px' => [
						'max' => 2000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'.site-header' => 'padding-right: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}}',
				],
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'goza_header_layout',
							'operator' => '!=',
							'value' => 'stacked',
						],
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'goza_header_background',
				'label' => __( 'Background', 'goza-main' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '.site-header',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'goza_header_logo_section',
			[
				'tab' => 'goza-settings-header',
				'label' => __( 'Site Logo', 'goza-main' ),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'goza_header_logo_display',
							'operator' => '=',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'goza_header_logo_type',
			[
				'label' => __( 'Type', 'goza-main' ),
				'type' => Controls_Manager::SELECT,
				'default' => ( has_custom_logo() ? 'logo' : 'title' ),
				'options' => [
					'logo' => __( 'Logo', 'goza-main' ),
					'title' => __( 'Title', 'goza-main' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'goza_header_logo_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Logo Width', 'goza-main' ),
				'description' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s logo', 'goza-main' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'size_units' => [
					'%',
					'px',
					'vh',
				],
				'range' => [
					'px' => [
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'condition' => [
					'goza_header_logo_display' => 'yes',
					'goza_header_logo_type' => 'logo',
				],
				'selectors' => [
					'.site-header .site-branding .site-logo img' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'goza_header_title_color',
			[
				'label' => __( 'Text Color', 'goza-main' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'goza_header_logo_display' => 'yes',
					'goza_header_logo_type' => 'title',
				],
				'selectors' => [
					'.site-header h1.site-title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goza_header_title_typography',
				'label' => __( 'Typography', 'goza-main' ),
				'description' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s title and tagline', 'goza-main' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'condition' => [
					'goza_header_logo_display' => 'yes',
					'goza_header_logo_type' => 'title',
				],
				'selector' => '.site-header h1.site-title',
			]
		);

		$this->add_control(
			'goza_header_title_link',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s title and tagline', 'goza-main' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'content_classes' => 'gutenberg-control-field-description',
				'condition' => [
					'goza_header_logo_display' => 'yes',
					'goza_header_logo_type' => 'title',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'goza_header_tagline',
			[
				'tab' => 'goza-settings-header',
				'label' => __( 'Tagline', 'goza-main' ),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'goza_header_tagline_display',
							'operator' => '=',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'goza_header_tagline_color',
			[
				'label' => __( 'Text Color', 'goza-main' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'goza_header_tagline_display' => 'yes',
				],
				'selectors' => [
					'.site-header .site-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goza_header_tagline_typography',
				'label' => __( 'Typography', 'goza-main' ),
				'condition' => [
					'goza_header_tagline_display' => 'yes',
				],
				'selector' => '.site-header .site-description',
			]
		);

		$this->add_control(
			'goza_header_tagline_link',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s title and tagline', 'goza-main' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'content_classes' => 'gutenberg-control-field-description',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'goza_header_menu_tab',
			[
				'tab' => 'goza-settings-header',
				'label' => __( 'Menu', 'goza-main' ),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'goza_header_menu_display',
							'operator' => '=',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$available_menus = wp_get_nav_menus();

		$menus = [ '0' => __( '— Select a Menu —', 'goza-main' ) ];
		foreach ( $available_menus as $available_menu ) {
			$menus[ $available_menu->term_id ] = $available_menu->name;
		}

		if ( 1 === count( $menus ) ) {
			$this->add_control(
				'goza_header_menu_notice',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'goza-main' ) . '</strong><br>' . sprintf( __( 'Go to <a href="%s" target="_blank">Menus screen</a> to create one.', 'goza-main' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'gutenberg-panel-alert gutenberg-panel-alert-info',
				]
			);
		} else {
			$this->add_control(
				'goza_header_menu',
				[
					'label' => __( 'Menu', 'goza-main' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'goza-main' ), admin_url( 'nav-menus.php' ) ),
				]
			);

			$this->add_control(
				'goza_header_menu_warning',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => __( 'Changes will be reflected in the preview only after the page reloads.', 'goza-main' ),
					'content_classes' => 'gutenberg-panel-alert gutenberg-panel-alert-info',
				]
			);

			$this->add_control(
				'goza_header_menu_layout',
				[
					'label' => __( 'Menu Layout', 'goza-main' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'horizontal',
					'options' => [
						'horizontal' => __( 'Horizontal', 'goza-main' ),
						'dropdown' => __( 'Dropdown', 'goza-main' ),
					],
					'frontend_available' => true,
				]
			);

			$breakpoints = Responsive::get_breakpoints();

			$this->add_control(
				'goza_header_menu_dropdown',
				[
					'label' => __( 'Breakpoint', 'goza-main' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'tablet',
					'options' => [
						/* translators: %d: Breakpoint number. */
						'mobile' => sprintf( __( 'Mobile (< %dpx)', 'goza-main' ), $breakpoints['md'] ),
						/* translators: %d: Breakpoint number. */
						'tablet' => sprintf( __( 'Tablet (< %dpx)', 'goza-main' ), $breakpoints['lg'] ),
						'none' => __( 'None', 'goza-main' ),
					],
					'selector' => '.site-header',
					'condition' => [
						'goza_header_menu_layout!' => 'dropdown',
					],
				]
			);

			$this->add_control(
				'goza_header_menu_color',
				[
					'label' => __( 'Color', 'goza-main' ),
					'type' => Controls_Manager::COLOR,
					'condition' => [
						'goza_header_menu_display' => 'yes',
					],
					'selectors' => [
						'.site-header .site-navigation ul.menu li a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'goza_header_menu_toggle_color',
				[
					'label' => __( 'Toggle Color', 'goza-main' ),
					'type' => Controls_Manager::COLOR,
					'condition' => [
						'goza_header_menu_display' => 'yes',
					],
					'selectors' => [
						'.site-header .site-navigation-toggle i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'goza_header_menu_typography',
					'label' => __( 'Typography', 'goza-main' ),
					'condition' => [
						'goza_header_menu_display' => 'yes',
					],
					'selector' => '.site-header .site-navigation .menu li',
				]
			);
		}

		$this->end_controls_section();
	}

	public function on_save( $data ) {
		// Save chosen header menu to the WP settings.
		if ( isset( $data['settings']['goza_header_menu'] ) ) {
			$menu_id = $data['settings']['goza_header_menu'];
			$locations = get_theme_mod( 'nav_menu_locations' );
			$locations['menu-1'] = (int) $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	public function get_additional_tab_content() {
		if ( ! defined( 'gutenberg_PRO_VERSION' ) ) {
			return sprintf( '
				<div class="goza-gutenberg gutenberg-nerd-box">
					<img src="%4$s" class="gutenberg-nerd-box-icon">
					<div class="gutenberg-nerd-box-message">
						<p class="gutenberg-panel-heading-title gutenberg-nerd-box-title">%1$s</p>
						<p>%2$s</p>
					</div>
					<a class="gutenberg-button gutenberg-button-default gutenberg-nerd-box-link" target="_blank" href="https://go.gutenberg.com/goza-theme-header/">%3$s</a>
				</div>
				',
				__( 'Create a custom header with multiple options', 'goza-main' ),
				__( 'Upgrade to gutenberg Pro and enjoy free design and many more features', 'goza-main' ),
				__( 'Upgrade', 'goza-main' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} else {
			return sprintf( '
				<div class="goza-gutenberg gutenberg-nerd-box">
					<img src="%4$s" class="gutenberg-nerd-box-icon">
					<div class="gutenberg-nerd-box-message">
						<p class="gutenberg-panel-heading-title gutenberg-nerd-box-title">%1$s</p>
						<p class="gutenberg-nerd-box-message">%2$s</p>
					</div>
					<a class="gutenberg-button gutenberg-button-success gutenberg-nerd-box-link" target="_blank" href="%5$s">%3$s</a>
				</div>
				',
				__( 'Create a custom header with the new Theme Builder', 'goza-main' ),
				__( 'With the new Theme Builder you can jump directly into each part of your site', 'goza-main' ),
				__( 'Create Header', 'goza-main' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg',
				get_admin_url( null, 'admin.php?page=gutenberg-app#/site-editor/templates/header' )
			);
		}
	}
}
