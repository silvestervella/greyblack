<?php
/**
 * The template for displaying Link post formats.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php parvati_article_schema( 'CreativeWork' ); ?>>
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
			<?php
			/**
			 * parvati_before_entry_title hook.
			 *
			 */
			do_action( 'parvati_before_entry_title' );

			the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( parvati_get_link_url() ) ), '</a></h2>' );

			/**
			 * parvati_after_entry_title hook.
			 *
			 *
			 * @hooked parvati_post_meta - 10
			 */
			do_action( 'parvati_after_entry_title' );
			?>
		</header><!-- .entry-header -->

		<?php
		/**
		 * parvati_after_entry_header hook.
		 *
		 *
		 * @hooked parvati_post_image - 10
		 */
		do_action( 'parvati_after_entry_header' );

		if ( parvati_show_excerpt() ) : ?>

			<div class="entry-summary" itemprop="text">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		<?php else : ?>

			<div class="entry-content" itemprop="text">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'parvati' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

		<?php endif;

		/**
		 * parvati_after_entry_content hook.
		 *
		 *
		 * @hooked parvati_footer_meta - 10
		 */
		do_action( 'parvati_after_entry_content' );

		/**
		 * parvati_after_content hook.
		 *
		 */
		do_action( 'parvati_after_content' );
		?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
