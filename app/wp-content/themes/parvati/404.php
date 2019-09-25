<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php parvati_content_class(); ?>>
		<main id="main" <?php parvati_main_class(); ?>>
			<?php
			/**
			 * parvati_before_main_content hook.
			 *
			 */
			do_action( 'parvati_before_main_content' );
			?>

			<div class="inside-article">

				<?php
				/**
				 * parvati_before_content hook.
				 *
				 *
				 * @hooked parvati_featured_page_header_inside_single - 10
				 */
				do_action( 'parvati_before_content' );
				?>

				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php echo apply_filters( 'parvati_404_title', __( 'Oops! That page can&rsquo;t be found.', 'parvati' ) ); // WPCS: XSS OK. ?></h1>
				</header><!-- .entry-header -->

				<?php
				/**
				 * parvati_after_entry_header hook.
				 *
				 *
				 * @hooked parvati_post_image - 10
				 */
				do_action( 'parvati_after_entry_header' );
				?>

				<div class="entry-content" itemprop="text">
					<?php
					echo '<p>' . apply_filters( 'parvati_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'parvati' ) ) . '</p>'; // WPCS: XSS OK.

					get_search_form();
					?>
				</div><!-- .entry-content -->

				<?php
				/**
				 * parvati_after_content hook.
				 *
				 */
				do_action( 'parvati_after_content' );
				?>

			</div><!-- .inside-article -->

			<?php
			/**
			 * parvati_after_main_content hook.
			 *
			 */
			do_action( 'parvati_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * parvati_after_primary_content_area hook.
	 *
	 */
	 do_action( 'parvati_after_primary_content_area' );

	 parvati_construct_sidebars();

get_footer();
