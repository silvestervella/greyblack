<?php 
/**
 * Fotogenic manage the Customizer options of footer panel.
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

/**
 * Footer Settings Panel
 */
Kirki::add_panel( 'fotogenic_footer_content_panel', array(
    'title'          => esc_attr__( 'Footer settings', 'fotogenic' ),
    'priority'       => 90,
) );

/*-------------------------------------------------------------------------------------------------------------------*/

/**
 * Footer Layout Setting
 */

Kirki::add_section( 'fotogenic_footer_layout_section', array(
    'title'          => esc_attr__( 'Footer Layout', 'fotogenic' ),
    'panel'			 => 'fotogenic_footer_content_panel',
    'priority'       => 10,
) );


Kirki::add_field(
	'fotogenic_config', array(
		'type'     => 'radio-image',
		'settings' => 'fotogenic_footer_layout_option',
		'label'    => esc_html__( 'Footer Widget Area Layout', 'fotogenic' ),
		'section'  => 'fotogenic_footer_layout_section',
		'default'  => 'column-three',
		'priority' => 10,
		'choices'  => array(
			'column-three' 	 => get_template_directory_uri() . '/assets/images/footer-3.png',
			'column-two'     => get_template_directory_uri() . '/assets/images/footer-2.png',
			'column-one'  	 => get_template_directory_uri() . '/assets/images/footer-1.png'
		),
	)
);

/*-------------------------------------------------------------------------------------------------------------------*/

/**
 * Footer content setting
 */

Kirki::add_section( 'fotogenic_footer_copyright_section', array(
    'title'          => esc_attr__( 'Footer Content Setting', 'fotogenic' ),
    'panel'			 => 'fotogenic_footer_content_panel',
    'priority'       => 20,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'image',
	'settings'    => 'footer_logo_setting',
	'label'       => esc_attr__( 'Add image', 'fotogenic' ),
	'description' => esc_attr__( 'Add your footer logo here', 'fotogenic' ),
	'section'     => 'fotogenic_footer_copyright_section',
	'priority' 	  => 10,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'footer_contact_number_setting',
	'label'    => __( 'Add Contact number here', 'fotogenic' ),
	'section'  => 'fotogenic_footer_copyright_section',
	'priority' => 20,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'footer_email_address_setting',
	'label'    => __( 'Add Email Address here', 'fotogenic' ),
	'section'  => 'fotogenic_footer_copyright_section',
	'priority' => 30,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'footer_copyright_content_setting',
	'label'    => __( 'Copyright text', 'fotogenic' ),
	'section'  => 'fotogenic_footer_copyright_section',
	'priority' => 40,
) );

// footer back to top button
Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'toggle',
	'settings'    => 'fotogenic_back_to_top_scroll_option',
	'label'       => esc_attr__( 'Enable scroll to top button', 'fotogenic' ),
	'section'     => 'fotogenic_footer_copyright_section',
	'default'     => '1',
	'priority'    => 50,
) );

/*-------------------------------------------------------------------------------------------------------------------*/

/**
 * Footer Layout Setting
 */

Kirki::add_section( 'fotogenic_footer_layout_section', array(
    'title'          => esc_attr__( 'Footer Layout', 'fotogenic' ),
    'panel'			 => 'fotogenic_footer_content_panel',
    'priority'       => 110,
) );


Kirki::add_field(
	'fotogenic_config', array(
		'type'     => 'radio-image',
		'settings' => 'fotogenic_footer_layout_option',
		'label'    => esc_html__( 'Footer Widget Area Layout', 'fotogenic' ),
		'section'  => 'fotogenic_footer_layout_section',
		'default'  => 'column-three',
		'priority' => 10,
		'choices'  => array(
			'column-three' 	 => esc_url( get_template_directory_uri() . '/assets/images/footer-3.png' ),
			'column-two'     => esc_url( get_template_directory_uri() . '/assets/images/footer-2.png' ),
			'column-one'  	 => esc_url( get_template_directory_uri() . '/assets/images/footer-1.png' )
		),
	)
);
