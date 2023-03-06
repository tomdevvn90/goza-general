<?php

namespace gozagutenberg\Includes\Settings;

use gutenberg\Controls_Manager;
use gutenberg\Group_Control_Background;
use gutenberg\Group_Control_Typography;
use gutenberg\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_Footer extends Tab_Base {

	public function get_id() {
		return 'goza-settings-footer';
	}

	public function get_title() {
		return __( 'Footer', 'goza-main' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'theme-style';
	}

	protected function register_tab_controls() {

		$this->start_controls_section(
			'goza_footer_section',
			[
				'tab' => 'goza-settings-footer',
				'label' => __( 'Footer', 'goza-main' ),
			]
		);

		$this->add_control(
			'goza_footer_logo_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Site Logo', 'goza-main' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'goza-main' ),
				'label_off' => __( 'Hide', 'goza-main' ),
				'selector' => '.site-footer .site-branding',
			]
		);

		$this->add_control(
			'goza_footer_tagline_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Tagline', 'goza-main' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'goza-main' ),
				'label_off' => __( 'Hide', 'goza-main' ),
				'selector' => '.site-footer .site-description',
			]
		);

		$this->add_control(
			'goza_footer_menu_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Menu', 'goza-main' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'goza-main' ),
				'label_off' => __( 'Hide', 'goza-main' ),
				'selector' => '.site-footer .site-navigation',
			]
		);

		$this->add_control(
			'goza_footer_copyright_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Copyright', 'goza-main' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'goza-main' ),
				'label_off' => __( 'Hide', 'goza-main' ),
				'selector' => '.site-footer .copyright',
			]
		);

		$this->add_control(
			'goza_footer_layout',
			[
				'type' => Controls_Manager::SELECT,
				'label' => __( 'Layout', 'goza-main' ),
				'options' => [
					'default' => __( 'Default', 'goza-main' ),
					'inverted' => __( 'Inverted', 'goza-main' ),
					'stacked' => __( 'Centered', 'goza-main' ),
				],
				'selector' => '.site-footer',
				'default' => 'default',
			]
		);

		$this->add_control(
			'goza_footer_width',
			[
				'type' => Controls_Manager::SELECT,
				'label' => __( 'Width', 'goza-main' ),
				'options' => [
					'boxed' => __( 'Boxed', 'goza-main' ),
					'full-width' => __( 'Full Width', 'goza-main' ),
				],
				'selector' => '.site-footer',
				'default' => 'boxed',
			]
		);

		$this->add_responsive_control(
			'goza_footer_custom_width',
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
					'goza_footer_width' => 'boxed',
				],
				'selectors' => [
					'.site-footer .footer-inner' => 'width: {{SIZE}}{{UNIT}}; max-width: 100%;',
				],
			]
		);

		$this->add_responsive_control(
			'goza_footer_gap',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Gap', 'goza-main' ),
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
				'selectors' => [
					'.site-footer' => 'padding-right: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'goza_footer_layout!' => 'stacked',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'goza_footer_background',
				'label' => __( 'Background', 'goza-main' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '.site-footer',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'goza_footer_logo_section',
			[
				'tab' => 'goza-settings-footer',
				'label' => __( 'Site Logo', 'goza-main' ),
				'condition' => [
					'goza_footer_logo_display!' => '',
				],
			]
		);

		$this->add_control(
			'goza_footer_logo_type',
			[
				'label' => __( 'Type', 'goza-main' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'logo',
				'options' => [
					'logo' => __( 'Logo', 'goza-main' ),
					'title' => __( 'Title', 'goza-main' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'goza_footer_logo_width',
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
					'goza_footer_logo_display' => 'yes',
					'goza_footer_logo_type' => 'logo',
				],
				'selectors' => [
					'.site-footer .site-branding .site-logo img' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'goza_footer_title_color',
			[
				'label' => __( 'Text Color', 'goza-main' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'goza_footer_logo_display' => 'yes',
					'goza_footer_logo_type' => 'title',
				],
				'selectors' => [
					'.site-footer h4.site-title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goza_footer_title_typography',
				'label' => __( 'Typography', 'goza-main' ),
				'condition' => [
					'goza_footer_logo_display' => 'yes',
					'goza_footer_logo_type' => 'title',
				],
				'selector' => '.site-footer h4.site-title',

			]
		);

		$this->add_control(
			'goza_footer_title_link',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s title and tagline', 'goza-main' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'content_classes' => 'gutenberg-control-field-description',
				'condition' => [
					'goza_footer_logo_display' => 'yes',
					'goza_footer_logo_type' => 'title',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'goza_footer_tagline',
			[
				'tab' => 'goza-settings-footer',
				'label' => __( 'Tagline', 'goza-main' ),
				'condition' => [
					'goza_footer_tagline_display' => 'yes',
				],
			]
		);

		$this->add_control(
			'goza_footer_tagline_color',
			[
				'label' => __( 'Text Color', 'goza-main' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'goza_footer_tagline_display' => 'yes',
				],
				'selectors' => [
					'.site-footer .site-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goza_footer_tagline_typography',
				'label' => __( 'Typography', 'goza-main' ),
				'condition' => [
					'goza_footer_tagline_display' => 'yes',
				],
				'selector' => '.site-footer .site-description',
			]
		);

		$this->add_control(
			'goza_footer_tagline_link',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s title and tagline', 'goza-main' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'content_classes' => 'gutenberg-control-field-description',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'goza_footer_menu_tab',
			[
				'tab' => 'goza-settings-footer',
				'label' => __( 'Menu', 'goza-main' ),
				'condition' => [
					'goza_footer_menu_display' => 'yes',
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
				'goza_footer_menu_notice',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'goza-main' ) . '</strong><br>' . sprintf( __( 'Go to <a href="%s" target="_blank">Menus screen</a> to create one.', 'goza-main' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'gutenberg-panel-alert gutenberg-panel-alert-info',
				]
			);
		} else {
			$this->add_control(
				'goza_footer_menu',
				[
					'label' => __( 'Menu', 'goza-main' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'goza-main' ), admin_url( 'nav-menus.php' ) ),
				]
			);

			$this->add_control(
				'goza_footer_menu_warning',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => __( 'Changes will be reflected in the preview only after the page reloads.', 'goza-main' ),
					'content_classes' => 'gutenberg-panel-alert gutenberg-panel-alert-info',
				]
			);

			$this->add_control(
				'goza_footer_menu_color',
				[
					'label' => __( 'Color', 'goza-main' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'footer .footer-inner .site-navigation a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'goza_footer_menu_typography',
					'label' => __( 'Typography', 'goza-main' ),
					'selector' => 'footer .footer-inner .site-navigation a',
				]
			);
		}

		$this->end_controls_section();

		$this->start_controls_section(
			'goza_footer_copyright_section',
			[
				'tab' => 'goza-settings-footer',
				'label' => __( 'Copyright', 'goza-main' ),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'goza_footer_copyright_display',
							'operator' => '=',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'goza_footer_copyright_text',
			[
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'All rights reserved', 'goza-main' ),
			]
		);

		$this->add_control(
			'goza_footer_copyright_color',
			[
				'label' => __( 'Text Color', 'goza-main' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'goza_footer_copyright_display' => 'yes',
				],
				'selectors' => [
					'.site-footer .copyright p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goza_footer_copyright_typography',
				'label' => __( 'Typography', 'goza-main' ),
				'condition' => [
					'goza_footer_copyright_display' => 'yes',
				],
				'selector' => '.site-footer .copyright p',
			]
		);

		$this->end_controls_section();
	}

	public function on_save( $data ) {
		// Save chosen footer menu to the WP settings.
		if ( isset( $data['settings']['goza_footer_menu'] ) ) {
			$menu_id = $data['settings']['goza_footer_menu'];
			$locations = get_theme_mod( 'nav_menu_locations' );
			$locations['menu-2'] = (int) $menu_id;
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
					<a class="gutenberg-button gutenberg-button-default gutenberg-nerd-box-link" target="_blank" href="https://go.gutenberg.com/goza-theme-footer/">%3$s</a>
				</div>
				',
				__( 'Create a custom footer with multiple options', 'goza-main' ),
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
				__( 'Create a custom footer with the new Theme Builder', 'goza-main' ),
				__( 'With the new Theme Builder you can jump directly into each part of your site', 'goza-main' ),
				__( 'Create Footer', 'goza-main' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg',
				get_admin_url( null, 'admin.php?page=gutenberg-app#/site-editor/templates/footer' )
			);
		}
	}
}
