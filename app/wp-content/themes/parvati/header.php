<?php
/**
 * The template for displaying the header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php parvati_body_schema();?> <?php body_class(); ?>>
	<?php
	/**
	 * parvati_before_header hook.
	 *
	 *
	 * @hooked parvati_do_skip_to_content_link - 2
	 * @hooked parvati_top_bar - 5
	 * @hooked parvati_add_navigation_before_header - 5
	 */
	do_action( 'parvati_before_header' );

	/**
	 * parvati_header hook.
	 *
	 *
	 * @hooked parvati_construct_header - 10
	 */
	do_action( 'parvati_header' );

	/**
	 * parvati_after_header hook.
	 *
	 *
	 * @hooked parvati_featured_page_header - 10
	 */
	do_action( 'parvati_after_header' );
	?>

	<div id="page" class="hfeed site grid-container container grid-parent">
		<div id="content" class="site-content">
			<?php
			/**
			 * parvati_inside_container hook.
			 *
			 */
			do_action( 'parvati_inside_container' );
