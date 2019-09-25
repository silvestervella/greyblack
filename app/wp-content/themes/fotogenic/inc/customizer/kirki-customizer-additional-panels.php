<?php 
/**
 * Fotogenic manage the Customizer options of additional panel.
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */


/**
 * Additional Settings Panel
 */
Kirki::add_panel( 'fotogenic_additional_panel', array(
	'priority' => 60,
	'title'    => esc_html__( 'Additional Setting', 'fotogenic' ),
) );


/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Extra header settings section
 */

Kirki::add_section( 'fotogenic_extra_header_section', array(
    'title'          => esc_attr__( 'Extra Header Setting', 'fotogenic' ),
    'panel'          => 'fotogenic_additional_panel',
    'priority'       => 5,
) );


Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'toggle',
	'settings'    => 'fotogenic_search_icon_option',
	'label'       => esc_attr__( 'Enable Search Icon', 'fotogenic' ),
	'section'     => 'fotogenic_extra_header_section',
	'default'     => '1',
	'priority'    => 10,
) );


Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'toggle',
	'settings'    => 'fotogenic_sticky_menu_option',
	'label'       => esc_attr__( 'Enable Sticky Menu', 'fotogenic' ),
	'section'     => 'fotogenic_extra_header_section',
	'default'     => '1',
	'priority'    => 20,
) );


/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Social Icons section
 */

Kirki::add_section( 'fotogenic_social_icon_section', array(
    'title'          => esc_attr__( 'Social Icon Setting', 'fotogenic' ),
    'panel'          => 'fotogenic_additional_panel',
    'priority'       => 10,
) );


Kirki::add_field( 
	'fotogenic_config', array(
		'type'        	=> 'repeater',
		'label'       	=> esc_html__( 'Add Social Icons here', 'fotogenic' ),
		'description' 	=> esc_html__( 'Drag & Drop items to re-arrange the order', 'fotogenic' ),
		'section'     	=> 'fotogenic_social_icon_section',
		'priority'		=> 5,
		'choices'		=> array(
			'limit'		=> 5
		),
		'row_label'   	=> array(
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'fotogenic' ),
			'field' => 'social_icon',
		),
		'settings'    => 'fotogenic_social_icons_lists',
		'default'     => array(
			array(
				'social_icon' => 'facebook',
				'social_url'  => '#',
			),
			array(
				'social_icon' => 'twitter',
				'social_url'  => '#',
			),
		),
		'fields'      => array(
			'social_icon' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Social Icon', 'fotogenic' ),
				'default' => 'facebook',
				'choices' => fotogenic_fontawesome_social_icons_lists(),
			),
			'social_url'  => array(
				'type'    => 'link',
				'label'   => esc_html__( 'Social Link URL', 'fotogenic' ),
				'default' => '',
			),
		),
	)
);
