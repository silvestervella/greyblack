<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

?>
	</div><!-- #content -->

	<?php

		/**
		 * fotogenic_footer_section hook
		 *
		 * @hooked - fotogenic_footer_section_start - 10
		 * @hooked - fotogenic_footer_widget_area - 20
		 * @hooked - fotogenic_footer_site_info - 30
		 * @hooked - fotogenic_scroll_top_content - 40
		 * @hooked - fotogenic_footer_section_end - 50
		 * 
		 * @since 1.0.0
		 */
		do_action( 'fotogenic_footer_section' );

	?>

</div><!-- #page -->

<?php
	/**
     * fotogenic_after_page hook
     *
     * @since 1.0.0
     */
    do_action( 'fotogenic_after_page' );
?>

<?php wp_footer(); ?>

</body>
</html>
