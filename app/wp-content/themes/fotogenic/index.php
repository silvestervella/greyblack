<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

get_header();
?>

<?php
	
	/**
     * fotogenic_homepage_sections hook
     *
     * @hooked - fotogenic_header_hero_image_sec - 10
     * @hooked - fotogenic_homepage_about_sec - 20
     * @hooked - fotogenic_homepage_masonry_sec - 30
     * @hooked - fotogenic_homepage_testimonial_sec - 40
     * @hooked - fotogenic_homepage_blog_sec - 50
     *
     * @since 1.0.0
     */

	do_action( 'fotogenic_homepage_sections' );
?>

<?php 
if(  is_front_page()  &&  get_theme_mod( 'frontpage_latest_post_view_setting' ) == false ) { ?>
	<div class="mt-container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php

				if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php 
							endif;

						
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								the_posts_navigation();
							

					else :

						get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
			<?php  get_sidebar(); ?>
	</div>

<?php
}

get_footer();
