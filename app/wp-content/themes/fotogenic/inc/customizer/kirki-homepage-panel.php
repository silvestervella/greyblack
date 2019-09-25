<?php
/**
 * Fotogenic manage the Customizer options of homepage panel.
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

/**
 * Homepage Settings Panel
 */
Kirki::add_panel( 'fotogenic_homepage_panel', array(
	'priority' => 50,
	'title'    => esc_html__( 'Homepage Panel', 'fotogenic' ),
) );

/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Hero Image Section
 */
Kirki::add_section( 'frontpage_hero_image_section', array(
    'title'          => esc_attr__( 'Hero Image Section', 'fotogenic' ),
    'panel'          => 'fotogenic_homepage_panel',
    'priority'       => 5,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'image',
	'settings'    => 'frontpage_hero_image_setting',
	'label'       => __( 'Add hero image here', 'fotogenic' ),
	'section'     => 'frontpage_hero_image_section',
	'default'     => get_template_directory_uri().'/assets/images/hero_image.jpg',
	'priority'    => 5,
) );

// Toggle field for icon scroll down
Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'toggle',
	'settings'    => 'hero_scroll_icon_opt',
	'label'       => esc_attr__( 'Show/Hide Scroll Icon', 'fotogenic' ),
	'section'     => 'frontpage_hero_image_section',
	'default'     => true,
	'priority'    => 5,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'link',
	'settings'    => 'frontpage_video_url_setting',
	'label'       => __( 'Add video url here', 'fotogenic' ),
	'section'     => 'frontpage_hero_image_section',
	'priority'    => 10,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_hero_image_subtitle_setting',
	'label'    => __( 'Subtitle', 'fotogenic' ),
	'section'  => 'frontpage_hero_image_section',
	'default'  => __( 'Fashion', 'fotogenic' ),
	'priority' => 15,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_hero_image_title_setting',
	'label'    => __( 'Main title', 'fotogenic' ),
	'section'  => 'frontpage_hero_image_section',
	'default'  => __( 'Creative Photoshoot', 'fotogenic' ),
	'priority' => 20,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'textarea',
	'settings' => 'frontpage_hero_image_content_setting',
	'label'    => __( 'Content', 'fotogenic' ),
	'section'  => 'frontpage_hero_image_section',
	'default'  => __( 'Cupcake ipsum dolor sit amet jujubes. Bear claw chocolate cake bear claw marshmallow. Carrot cake tart cotton candy.', 'fotogenic' ),
	'priority' => 25,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_hero_image_button_label_setting',
	'label'    => __( 'Button Label', 'fotogenic' ),
	'section'  => 'frontpage_hero_image_section',
	'default'  => __( 'View Our Works', 'fotogenic' ),
	'priority' => 30,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'link',
	'settings'    => 'frontpage_button_url_setting',
	'label'       => __( 'Add button url here', 'fotogenic' ),
	'section'     => 'frontpage_hero_image_section',
	'priority'    => 40,
) );


/*------------------------------------------------------------------------------------------------------------------*/
/**
 * About Section
 */

Kirki::add_section( 'frontpage_about_section', array(
    'title'          => esc_attr__( 'About Section', 'fotogenic' ),
    'panel'          => 'fotogenic_homepage_panel',
    'priority'       => 10,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'image',
	'settings'    => 'frontpage_about_bg_image_setting',
	'label'       => esc_attr__( 'Add background image', 'fotogenic' ),
	'section'     => 'frontpage_about_section',
	'priority' 	  => 10,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_about_title_setting',
	'label'    => __( 'Section Title', 'fotogenic' ),
	'section'  => 'frontpage_about_section',
	'priority' => 20,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'textarea',
	'settings' => 'frontpage_about_content_setting',
	'label'    => __( 'About Content', 'fotogenic' ),
	'section'  => 'frontpage_about_section',
	'priority' => 30,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_about_button_label_setting',
	'label'    => __( 'Button Label', 'fotogenic' ),
	'section'  => 'frontpage_about_section',
	'priority' => 40,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'link',
	'settings'    => 'frontpage_about_button_url_setting',
	'label'       => __( 'Add button url here', 'fotogenic' ),
	'section'     => 'frontpage_about_section',
	'priority'    => 50,
) );

/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Portfolio Section
 *
 */

Kirki::add_section( 'frontpage_portfolio_section', array(
    'title'          => esc_attr__( 'Portfolio Section', 'fotogenic' ),
    'panel'          => 'fotogenic_homepage_panel',
    'priority'       => 15,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_portfolio_title_setting',
	'label'    => __( 'Section Title', 'fotogenic' ),
	'section'  => 'frontpage_portfolio_section',
	'priority' => 20,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'select',
	'settings'    => 'frontpage_portfolio_category_select_setting',
	'label'       => __( 'Choose category', 'fotogenic' ),
	'section'     => 'frontpage_portfolio_section',
	'priority'    => 30,
	'choices'     => fotogenic_select_categories_list(),
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_portfolio_botton_label_setting',
	'label'    => __( 'Button Label', 'fotogenic' ),
	'section'  => 'frontpage_portfolio_section',
	'priority' => 40,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'link',
	'settings'    => 'frontpage_portfolio_button_url_setting',
	'label'       => __( 'Add button url here', 'fotogenic' ),
	'section'     => 'frontpage_portfolio_section',
	'priority'    => 50,
) );

/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Testimonial Section
 *
 *
 */

Kirki::add_section( 'fotogenic_testimonial_section', array(
    'title'          => esc_attr__( 'Testimonial Section', 'fotogenic' ),
    'panel'          => 'fotogenic_homepage_panel',
    'priority'       => 20,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'image',
	'settings'    => 'frontpage_testimonial_bg_image_setting',
	'label'       => esc_attr__( 'Add background image', 'fotogenic' ),
	'section'     => 'fotogenic_testimonial_section',
	'priority' 	  => 10,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_testimonial_title_setting',
	'label'    => __( 'Section Title', 'fotogenic' ),
	'section'  => 'fotogenic_testimonial_section',
	'priority' => 20,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'select',
	'settings'    => 'frontpage_testimonial_post_select_setting',
	'label'       => __( 'Choose category', 'fotogenic' ),
	'section'     => 'fotogenic_testimonial_section',
	'priority'    => 30,
	'choices'     => fotogenic_select_categories_list(),
) );

// Post count
Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'number',
	'settings'    => 'frontpage_testimonial_post_count',
	'label'       => esc_attr__( 'No of posts', 'fotogenic' ),
	'section'     => 'fotogenic_testimonial_section',
	'default'     => 3,
	'choices'     => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1,
	),
	'priority'    => 40,
) );


/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Blog Section
 *
 */

Kirki::add_section( 'fotogenic_blog_section', array(
    'title'          => esc_attr__( 'Blog Section', 'fotogenic' ),
    'panel'          => 'fotogenic_homepage_panel',
    'priority'       => 25,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'select',
	'settings'    => 'frontpage_blog_category_select_setting',
	'label'       => __( 'Choose category', 'fotogenic' ),
	'section'     => 'fotogenic_blog_section',
	'priority'    => 30,
	'choices'     => fotogenic_select_categories_list(),
) );

// Post count
Kirki::add_field( 'fotogenic_config', array(
	'type'        => 'number',
	'settings'    => 'frontpage_blog_post_count',
	'label'       => esc_attr__( 'No of posts', 'fotogenic' ),
	'section'     => 'fotogenic_blog_section',
	'default'     => 2,
	'choices'     => array(
		'min'  => 0,
		'max'  => 20,
		'step' => 1,
	),
	'priority'    => 40,
) );

Kirki::add_field( 'fotogenic_config', array(
	'type'     => 'text',
	'settings' => 'frontpage_blog_button_text_setting',
	'label'    => __( 'Button text', 'fotogenic' ),
	'section'  => 'fotogenic_blog_section',
	'priority' => 40,
) );
