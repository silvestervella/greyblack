<?php
/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * parvati_before_footer hook.
 *
 */
do_action( 'parvati_before_footer' );
?>

<div <?php parvati_footer_class(); ?>>
	<?php
	/**
	 * parvati_before_footer_content hook.
	 *
	 */
	do_action( 'parvati_before_footer_content' );

	/**
	 * parvati_footer hook.
	 *
	 *
	 * @hooked parvati_construct_footer_widgets - 5
	 * @hooked parvati_construct_footer - 10
	 */
	do_action( 'parvati_footer' );

	/**
	 * parvati_after_footer_content hook.
	 *
	 */
	do_action( 'parvati_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * parvati_after_footer hook.
 *
 */
do_action( 'parvati_after_footer' );

wp_footer();
?>

</body>
</html>
