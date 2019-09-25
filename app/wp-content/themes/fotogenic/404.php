<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

get_header();
?>

<div class="mt-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<div class="error-num"> <?php esc_html_e( '404', 'fotogenic' ); ?> <span><?php esc_html_e( 'error', 'fotogenic' );?></span> </div>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fotogenic' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'fotogenic' ); ?></p>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- mt-container -->

<?php
get_footer();
