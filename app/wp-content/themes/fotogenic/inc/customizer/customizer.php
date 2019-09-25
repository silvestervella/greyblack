<?php
/**
 * fotogenic Theme Customizer
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fotogenic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


    $wp_customize->get_section( 'header_image' )->panel        = 'fotogenic_general_panel';
    $wp_customize->get_section( 'header_image' )->title        = esc_html__( 'Innerpages Header Image', 'fotogenic' );
    $wp_customize->get_section( 'header_image' )->priority      = '50';
    $wp_customize->get_section( 'title_tagline' )->panel        = 'fotogenic_general_panel';
    $wp_customize->get_section( 'title_tagline' )->priority     = '10';
    $wp_customize->get_section( 'colors' )->panel               = 'fotogenic_general_panel';
    $wp_customize->get_section( 'colors' )->priority            = '15';
    $wp_customize->get_section( 'background_image' )->panel     = 'fotogenic_general_panel';
    $wp_customize->get_section( 'background_image' )->priority  = '20';
    $wp_customize->get_section( 'static_front_page' )->panel    = 'fotogenic_general_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '25';


    // Require upsell customizer section class.
	require get_template_directory() . '/inc/customizer/customizer-upsell-class.php';

	/**
     * Register custom section types.
     *
     * @since 1.0.2
     */
	$wp_customize->register_section_type( 'Fotogenic_Customize_Section_Upsell' );

	/**
     * Register theme upsell sections.
     *
     * @since 1.0.2
     */
    $wp_customize->add_section( new Fotogenic_Customize_Section_Upsell(
        $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Buy Fotogenic Pro', 'fotogenic' ),
                'pro_url'  => 'https://mysterythemes.com/wp-themes/fotogenic-pro/',
                'priority'  => 1,
            )
        )
    );



	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'fotogenic_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'fotogenic_customize_partial_blogdescription',
		) );
	}

}

add_action( 'customize_register', 'fotogenic_customize_register' );

/*----------------------------------------------------------------------------------------------------------------------------------------*/

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fotogenic_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fotogenic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/*----------------------------------------------------------------------------------------------------------------------------------------*/

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fotogenic_customize_preview_js() {
	wp_enqueue_script( 'fotogenic-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'fotogenic_customize_preview_js' );


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function fotogenic_customize_backend_scripts() {

	global $fotogenic_theme_version;

	wp_enqueue_style( 'fotogenic--admin-customizer-style', get_template_directory_uri() . '/assets/css/customizer-style.css', array(), esc_attr( esc_attr( $fotogenic_theme_version ) ) );

	wp_enqueue_script( 'fotogenic--admin-customizer-script', get_template_directory_uri() . '/assets/js/customizer-controls.js', array( 'jquery', 'customize-controls' ), esc_attr( $fotogenic_theme_version ), true );

}
add_action( 'customize_controls_enqueue_scripts', 'fotogenic_customize_backend_scripts', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------*/

/**
 * Add Kirki customizer library file
 */
require get_template_directory() . '/inc/kirki/kirki.php';

/**
 * Configuration for Kirki Framework
 */
function fotogenic_kirki_configuration() {
	return array(
		'url_path' => get_template_directory_uri() . '/inc/kirki/',
	);
}

add_filter( 'kirki/config', 'fotogenic_kirki_configuration' );


/**
 * Fotogenic Kirki Config
 */
Kirki::add_config( 'fotogenic_config', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );



/**
 * Kirki Customizer additions.
 */

require get_template_directory() . '/inc/customizer/kirki-homepage-panel.php';
require get_template_directory() . '/inc/customizer/kirki-customizer-footer-panel.php';
require get_template_directory() . '/inc/customizer/kirki-customizer-design-panels.php';
require get_template_directory() . '/inc/customizer/kirki-customizer-additional-panels.php';
require get_template_directory() . '/inc/customizer/kirki-customizer-general-panels.php';
