<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	/**
     * fotogenic_before_page hook
     *
     * @since 1.0.0
     */
    do_action( 'fotogenic_before_page' );
?>
	
<div id="page" class="site">
	
	<?php

		/**
	     * fotogenic_before_header hook
	     *
	     * @since 1.0.0
	     */

	    do_action( 'fotogenic_before_header' );

	    /**
	     * fotogenic_header_section hook
	     *
	     * @hooked - fotogenic_header_start - 10
	     * @hooked - fotogenic_site_branding - 20
	     * @hooked - fotogenic_primary_nav - 30
	     * @hooked - fotogenic_social_icons_content - 40
	     * @hooked - fotogenic_header_end - 50
	     *
	     * @since 1.0.0
	     */

	    do_action( 'fotogenic_header_section' );

		/**
	     * fotogenic_innerpage_header_title hook
	     *
	     * @hooked - fotogenic_innerpage_header_title_section - 10
	     *
	     * @since 1.0.0
	     */

	    do_action( 'fotogenic_innerpage_header_title' );

		/**
	     * fotogenic_before_content hook
	     *
	     * @since 1.0.0
	     */
	    do_action( 'fotogenic_before_content' );

	?>

	<div id="content" class="site-content">