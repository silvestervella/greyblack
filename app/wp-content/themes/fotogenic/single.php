<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

get_header();
?>

	<div class="mt-thumb-title-wrapper" style="background: url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>) no-repeat fixed center center/cover; ">
		
		<div class="mt-single-title-meta-wrap">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php
			while ( have_posts() ) :
				the_post(); ?>
				<div class="entry-meta">
					<?php
					fotogenic_posted_on();
					fotogenic_posted_by();
					fotogenic_entry_footer(); ?>
				</div><!-- .entry-meta -->
			<?php endwhile; ?>
		</div> <!-- mt-single-title-meta-wrap -->
	</div> <!-- mt-thumb-title-wrapper -->
	
	<div class="mt-container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div><!-- .mt-container -->
<?php
get_footer();
