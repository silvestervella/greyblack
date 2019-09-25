<?php 
/**
 * Fotogenic manage the Customizer options of general panel.
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

/**
 * General Settings Panel
 */
Kirki::add_panel( 'fotogenic_general_panel', array(
	'priority' => 5,
	'title'    => esc_html__( 'General Settings', 'fotogenic' ),
) );

 // Color Picker field for theme Color
Kirki::add_field( 
	'fotogenic_config', array(
		'type'        => 'color',
		'settings'    => 'fotogenic_theme_color',
		'label'       => __( 'Theme Color', 'fotogenic' ),
		'section'     => 'colors',
		'default'     => '#4ca6e5',
	)
);

/*-------------------------------------------------------------------------------------------------------------------------------*/

/**
 * Site layout Settings
 */
Kirki::add_section( 'fotogenic_site_section', array(
	'title'    => esc_html__( 'Site Settings', 'fotogenic' ),
	'panel'    => 'fotogenic_general_panel',
	'priority' => 40,
) );

// Radio Image field for Site layout
Kirki::add_field(
	'fotogenic_config', array(
		'type'     => 'radio-image',
		'settings' => 'fotogenic_site_layout',
		'label'    => esc_html__( 'Site Layout', 'fotogenic' ),
		'section'  => 'fotogenic_site_section',
		'default'  => 'wide-layout',
		'priority' => 5,
		'choices'  => array(
			'wide-layout'   => esc_url( get_template_directory_uri() . '/assets/images/full-width.png'),
			'boxed-layout'  => esc_url( get_template_directory_uri() . '/assets/images/boxed-layout.png')
		),
	)
);

/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Checkbox for latest posts at frontpage
 *
 * @since 1.0.0
 */

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'checkbox',
	'settings'    => 'frontpage_latest_post_view_setting',
	'label'       => esc_attr__( 'Checked to hide latest posts in homepage.', 'fotogenic' ),
	'description' => esc_attr__( 'Option to show/hide latest posts in frontpage', 'fotogenic' ),
	'section'     => 'static_front_page',
	'default'     => false,
	'priority'    => 5
) );