<?php 
/**
 * Fotogenic manage the Customizer options of design panel.
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

/**
 * Design Settings Panel
 */
Kirki::add_panel( 'fotogenic_design_panel', array(
	'priority' => 50,
	'title'    => esc_html__( 'Design Settings', 'fotogenic' ),
) );


/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Archive Section
 *
 */
Kirki::add_section( 'fotogenic_archive_section', array(
    'title'          => esc_attr__( 'Archive Layout Settings', 'fotogenic' ),
    'panel'          => 'fotogenic_design_panel',
    'priority'       => 10,
) );


Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'radio-image',
	'settings'    => 'fotogenic_archive_layout_setting',
	'label'       => esc_html__( 'Archive/Blog Sidebar layout', 'fotogenic' ),
	'section'     => 'fotogenic_archive_section',
	'default'     => 'right-sidebar',
	'priority'    => 10,
	'choices'     => array(
		'no-sidebar'   			=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		'left-sidebar'  		=> get_template_directory_uri() . '/assets/images/left-sidebar.png',
		'right-sidebar' 		=> get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar-center'  	=> get_template_directory_uri() . '/assets/images/box.png',
	),
));


/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Page Section
 *
 */

Kirki::add_section( 'fotogenic_page_section', array(
    'title'          => esc_attr__( 'Page Layout Settings', 'fotogenic' ),
    'panel'          => 'fotogenic_design_panel',
    'priority'       => 20,
) );



Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'radio-image',
	'settings'    => 'fotogenic_page_layout_setting',
	'label'       => esc_html__( 'Page Sidebar layout', 'fotogenic' ),
	'section'     => 'fotogenic_page_section',
	'default'     => 'right-sidebar',
	'priority'    => 10,
	'choices'     => array(
		'no-sidebar'   		=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		'left-sidebar'  	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',
		'right-sidebar' 	=> get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar-center' => get_template_directory_uri() . '/assets/images/box.png',
	),
) );

/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Post Section
 *
 */

Kirki::add_section( 'fotogenic_post_section', array(
    'title'          => esc_attr__( 'Post Layout Settings', 'fotogenic' ),
    'panel'          => 'fotogenic_design_panel',
    'priority'       => 30,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'radio-image',
	'settings'    => 'fotogenic_post_layout_setting',
	'label'       => esc_html__( 'Post Sidebar layout', 'fotogenic' ),
	'section'     => 'fotogenic_post_section',
	'default'     => 'right-sidebar',
	'priority'    => 10,
	'choices'     => array(
		'no-sidebar'   		=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		'left-sidebar'  	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',
		'right-sidebar' 	=> get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar-center' => get_template_directory_uri() . '/assets/images/box.png',
	),
) );

/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Gallery Page
 *
 */

Kirki::add_section( 'fotogenic_gallery_page_section', array(
    'title'          => esc_attr__( 'Gallery Page Settings', 'fotogenic' ),
    'panel'          => 'fotogenic_design_panel',
    'priority'       => 40,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'toggle',
	'settings'    => 'fotogenic_masonry_show_option',
	'label'       => esc_attr__( 'Enable Masonry Gallery', 'fotogenic' ),
	'section'     => 'fotogenic_gallery_page_section',
	'default'     => '0',
	'priority'    => 10,
) );
