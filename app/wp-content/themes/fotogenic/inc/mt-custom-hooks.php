<?php
/**
 * Files to managed the custom hooks.
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

/*------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'fotogenic_header_start' ) ) :

	/**
	 * Header start
	 *
	 */
	function fotogenic_header_start() {

		$fotogenic_stick_menu = get_theme_mod('fotogenic_sticky_menu_option', true );
		$stick_menu_class = '';
		if( true === $fotogenic_stick_menu ) {
			$stick_menu_class = 'header_sticky';
		}

		echo '<header id="masthead" class="site-header '. esc_attr( $stick_menu_class ) .'" >';
		echo '<div class="mt-container">';

	}

endif;

if( ! function_exists( 'fotogenic_site_branding' ) ) :

	/**
	 * Site branding
	 *
	 */

	function fotogenic_site_branding() {
?>
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() || is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$fotogenic_description = get_bloginfo( 'description', 'display' );
			if ( $fotogenic_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $fotogenic_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
<?php
	}

endif;

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_primary_nav' ) ) :

	/**
	 * Primary Menu
	 *
	 */

	function fotogenic_primary_nav() {
?>
		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
<?php
	}

endif;

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_social_icons_content' ) ) :

	/**
	 * Social icons
	 *
	 */

	function fotogenic_social_icons_content() {
?>
		<div class="mt-search-social-wrapper">
            <div class="menu-toggle"> <?php esc_html_e( 'menu', 'fotogenic' ); ?> <i class="fa fa-navicon"> </i> </div>
			<?php
				/**
			     * fotogenic_social_icons hook
			     *
			     * @hooked - fotogenic_social_icons_sec - 10
			     *
			     * @since 1.0.0
			     */
				do_action( 'fotogenic_social_icons' );
			
				$fotogenic_search_icon = get_theme_mod( 'fotogenic_search_icon_option', true );
				if( true === $fotogenic_search_icon ) {
			?>
					<div class="fotogenic-search-icon">
						<i class="fa fa-search"></i>
					</div>
					<div class="fotogenic-form-wrap">
						<div class="fotogenic-form-close"> 
							<i class="fa fa-close"></i>
						</div>
						<?php get_search_form(); ?>
					</div>
			<?php  } ?>
		</div>
<?php
	}

endif;

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_header_end' ) ) :

	/**
	 * Header end
	 *
	 */
	function fotogenic_header_end() {

		echo '</div><!-- .mt-container -->';
		echo '</header><!-- #masthead -->';
	
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed functions about header sections in particular hook
 *
 */

add_action( 'fotogenic_header_section', 'fotogenic_header_start', 10 );
add_action( 'fotogenic_header_section', 'fotogenic_site_branding', 20 );
add_action( 'fotogenic_header_section', 'fotogenic_primary_nav', 30 );
add_action( 'fotogenic_header_section', 'fotogenic_social_icons_content', 40 );
add_action( 'fotogenic_header_section', 'fotogenic_header_end', 50 );

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_innerpage_header_title_section' ) ) :

	/**
	 * Innerpage header title section
	 *
	 */

	function fotogenic_innerpage_header_title_section() {

		if( !is_front_page() && !is_single() ) {
			$site_header_image = get_header_image();
?>
			<section class="fotogenic-header-img" <?php if( !empty( $site_header_image ) ) { ?>style="background: url( <?php echo esc_url( $site_header_image ); ?> )  no-repeat fixed center center/cover;" <?php } ?> >	
				<header class="page-header">
					<?php if( is_404() ){ ?>
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fotogenic' ); ?></h1>
					<?php } 
					elseif( is_search() ) { 
							if(have_posts()): ?>
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'fotogenic' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							<?php endif; ?>
					<?php }
					elseif( is_archive() ) { 
						 the_archive_title( '<h1 class="page-title">', '</h1>' ); 
					} 
					elseif ( is_page() ) { ?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php } ?>
				</header><!-- .page-header -->
			</section>
<?php
		}
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed functions about innerpage header title sections in particular hook
 *
 */

add_action( 'fotogenic_innerpage_header_title', 'fotogenic_innerpage_header_title_section', 10 );

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_header_hero_image_sec' ) ) :
/*
 * Frontpage hero image function
 *
 */

function fotogenic_header_hero_image_sec() { ?>

	<!-- mt-fotogenic-frontpage-hero-image-section -->

	<?php $fotogenic_hero_image = get_theme_mod( 'frontpage_hero_image_setting', get_template_directory_uri().'/assets/images/hero_image.jpg' ); ?>
	<section class="mt-fotogenic-frontpage-hero-image-wrap">
		<div class="mt-fotogenic-content-wrapper" <?php if( !empty($fotogenic_hero_image) ){ ?>style="background-image: url( <?php echo esc_url( $fotogenic_hero_image ); ?> ); " <?php } ?>>
			<?php 
				$fotogenic_hero_section_bg_video = get_theme_mod( 'frontpage_video_url_setting' );
				if(  !empty( $fotogenic_hero_section_bg_video) ) {  ?>
					<div id="hero_video-bg" class="bg-video player js-video" data-property="{videoURL:'<?php echo esc_attr( $fotogenic_hero_section_bg_video ); ?>', autoPlay:true}"></div><!-- .bg-video -->
	 		<?php } ?>
			<div class="hero-block-wrapper">
				<div class="mt-container">
					<div class="hero_image_subtitle">
						<?php echo esc_html( get_theme_mod( 'frontpage_hero_image_subtitle_setting', __( 'Fashion', 'fotogenic' ) ) ); ?>
					</div>

					<h2 class="hero_image_title"><?php echo esc_html( get_theme_mod( 'frontpage_hero_image_title_setting', __( 'Creative Photoshoot', 'fotogenic' ) ) ); ?></h2>
					<div class="hero_image_desc"><?php echo esc_html( get_theme_mod( 'frontpage_hero_image_content_setting', __( 'Cupcake ipsum dolor sit amet jujubes. Bear claw chocolate cake bear claw marshmallow. Carrot cake tart cotton candy.', 'fotogenic' ) ) ); ?></div>
					<?php
                        $frontpage_button_url = get_theme_mod( 'frontpage_button_url_setting' );
                        $frontpage_button_label = get_theme_mod( 'frontpage_hero_image_button_label_setting', __( 'View Our Works', 'fotogenic' ) );
                        if( !empty( $frontpage_button_label ) ) { ?>
							<a class="hero_image_btn" href="<?php echo esc_url( $frontpage_button_url ); ?>"><?php echo esc_html( $frontpage_button_label ); ?></a>
					<?php } ?>
				</div>
			</div> <!-- hero-block-wrapper -->
			<?php
				$hero_scroll_icon_opt = get_theme_mod( 'hero_scroll_icon_opt', true );
				if( true == esc_attr( $hero_scroll_icon_opt ) ){ ?>
             	   <div class="icon-scroll"></div>
        		<?php 
        		} ?>
		</div> 
	</section>

<?php }

endif;

/*------------------------------------------------------------------------------------------------------------------*/


if( ! function_exists( 'fotogenic_homepage_about_sec' ) ) :

/*
 * Frontpage about section function
 *
 */

function fotogenic_homepage_about_sec() { 

	$about_title   = get_theme_mod( 'frontpage_about_title_setting' );
	$about_content = get_theme_mod( 'frontpage_about_content_setting' );
	if( empty( $about_title ) && empty( $about_content ) ){
		return;
	}

	?>

	<!-- mt-fotogenic-about-section -->
	<?php $fotogenic_about_bg = get_theme_mod( 'frontpage_about_bg_image_setting' ); ?>

	<section class="mt-fotogenic-about-wrap" <?php if( !empty($fotogenic_about_bg) ) { ?>style="background: url( <?php echo esc_url( $fotogenic_about_bg ); ?> )  no-repeat fixed center top;" <?php } ?>>
		<div class="section-wrapper">
			<div class="mt-container">
				<div class="about_content">
					<?php  
					if( !empty($about_title) ){ ?>
					<h2 class="section-title"><?php echo esc_html( $about_title ); ?></h2>
				<?php } ?>
					
					<div class="about-desc"><?php echo esc_html( $about_content ); ?>  </div>
				</div>

				<?php  $about_button_label = get_theme_mod( 'frontpage_about_button_label_setting' );
				if( ! empty( $about_button_label ) ){ ?>
					<div class="about_btn">
						<?php if( get_theme_mod( 'frontpage_about_button_url_setting' ) != " " ) { ?>
						<a href="<?php echo esc_url( get_theme_mod( 'frontpage_about_button_url_setting' ) ); ?>">
							<?php echo esc_html( get_theme_mod( 'frontpage_about_button_label_setting' ) ); ?>
						</a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

<?php }
endif;


/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_homepage_portfolio_sec' ) ) :

/*
 * Frontpage masonry section function
 *
 */

function fotogenic_homepage_portfolio_sec() {

	$fotogenic_cat_name = get_theme_mod( 'frontpage_portfolio_category_select_setting' );

	if( empty( $fotogenic_cat_name ) ) {
		return;
	}
?>

	<!-- mt-fotogenic-masonry-section -->
	<section class="mt-fotogenic-masonry-wrap">
		<?php $fotogenic_portfolio_title = get_theme_mod( 'frontpage_portfolio_title_setting' ); 
		if(  !empty ( $fotogenic_portfolio_title ) ) { ?>
			<h2 class="section-title"><?php echo esc_html( $fotogenic_portfolio_title ); ?></h2>
		<?php } ?>

		<div class="fotogenic_masonry_images">
			<?php
				$portfolio_count = apply_filters( 'fotogenic_portfolio_count', 9 );
				$fotogenic_portfolio_posts = new WP_Query( array( 
						'category_name' 	=> esc_attr( $fotogenic_cat_name ),
						'posts_per_page' 	=> absint( $portfolio_count ),
						'order_by' 			=> 'date',
						'order' 			=> 'ASC'
					)
				);  

				if( $fotogenic_portfolio_posts -> have_posts() ) :
					while( $fotogenic_portfolio_posts -> have_posts() ) : $fotogenic_portfolio_posts -> the_post(); ?>

						<div class="masonry_item">
							 <?php if( get_the_post_thumbnail_url() != " " ) { ?>
									<a href="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" rel="prettyPhoto">
										<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
									</a>
									<div class="masonry-content-wrapper">
										<h2 class="masonry_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<div class="masonary_excerpt"> <?php the_excerpt(); ?> </div>
									</div> <!-- masonry-content-wrapper -->
							<?php } ?>
						</div>

			<?php endwhile; wp_reset_postdata(); endif; ?>	

		</div>
		<?php 
			$section_button_url = get_theme_mod( 'frontpage_portfolio_button_url_setting' ); 
			$section_button_label = get_theme_mod( 'frontpage_portfolio_botton_label_setting' );
			if( !empty ( $section_button_label ) ) { ?>
				<div class="masonary-view-all-btn">
					<a class="hero_image_btn" href="<?php echo esc_url( $section_button_url ); ?>"><?php echo esc_html( $section_button_label ); ?></a>
				</div>
		<?php } ?>

	</section>

<?php }

endif;

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_homepage_testimonial_sec' ) ) :

/*
 * Frontpage Testimonial section function
 *
 */

function fotogenic_homepage_testimonial_sec() { ?>

	<!-- mt-fotogenic-testimonial-section -->
	<?php
		$fotogenic_testimonial_bg = get_theme_mod( 'frontpage_testimonial_bg_image_setting' );

		$fotogenic_testimonial_cat_name = get_theme_mod( 'frontpage_testimonial_post_select_setting' );

		if( empty( $fotogenic_testimonial_cat_name ) ) {
			return;
		}
		$frontpage_testimonial_post_count = get_theme_mod( 'frontpage_testimonial_post_count', 3 );
	?>

	<section class="mt-fotogenic-testimonial-wrap" <?php if( !empty($fotogenic_testimonial_bg) ) { ?>style="background: url( <?php echo esc_url( $fotogenic_testimonial_bg ); ?> ) no-repeat fixed center top;" <?php } ?>>
		<div class="section-wrapper">
			<div class="mt-container">
				<div class="about_content">
				
				<?php $testimonial_title = get_theme_mod( 'frontpage_testimonial_title_setting' ); 
				if( !empty($testimonial_title )) { ?>
					<h2 class="section-title"><?php echo esc_html( $testimonial_title ); ?></h2>
				<?php } ?>	

				<ul class="testimonial_slider">	
					<?php 
					$fotogenic_testimonial_post = new WP_Query( array( 
							'category_name' => esc_attr( $fotogenic_testimonial_cat_name ),
							'posts_per_page' => esc_attr( $frontpage_testimonial_post_count ) ));  

					if( $fotogenic_testimonial_post -> have_posts() ) :
						while( $fotogenic_testimonial_post -> have_posts() ) : $fotogenic_testimonial_post -> the_post(); ?>

									<li>
										<div class="testimonial-content">
											<?php the_content(); ?>
										</div>
										<h2 class="testimonial-title"><?php the_title(); ?></h2>
										<div class="testimonial-caption">
											<?php the_post_thumbnail_caption(); ?>
										</div>
									</li>



						<?php endwhile; wp_reset_postdata(); endif; ?>
				</ul>		
					
				</div>
			</div>
		</div>
	</section>
	
<?php } 

endif;

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_homepage_blog_sec' ) ) :

/*
 * Frontpage Blog section function
 *
 */

function fotogenic_homepage_blog_sec() {

	$fotogenic_blog_cat_name = get_theme_mod( 'frontpage_blog_category_select_setting' );

	if( empty( $fotogenic_blog_cat_name ) ) {
		return;
	}
	$frontpage_blog_post_count = get_theme_mod( 'frontpage_blog_post_count', 2 );
?>
		<section class="fotogenic_blog_content">
			<?php 
			$fotogenic_blog_posts = new WP_Query( array( 
						'category_name' => esc_attr( $fotogenic_blog_cat_name ),
						'posts_per_page' => esc_attr( $frontpage_blog_post_count ) ));  

				if( $fotogenic_blog_posts -> have_posts() ) :
					while( $fotogenic_blog_posts -> have_posts() ) : $fotogenic_blog_posts -> the_post(); ?>

						<div class="blog_content">
							 <?php if( get_the_post_thumbnail_url() != " " ) { ?>
								<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
								<div class="blog-content-wrapper">
									<div class="blog-meta"><?php echo get_the_date(); ?> </div>
									<h2 class="blog-title" ><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
									<div class="blog-desc"><?php the_excerpt(); ?> </div>
									<?php $blog_btn_label = get_theme_mod( 'frontpage_blog_button_text_setting' );
									if( !empty($blog_btn_label) ){ ?>
										<a class="btn blog-btn" href="<?php the_permalink(); ?>">
											<?php echo esc_html( $blog_btn_label ); ?>
										</a> <!-- blog-content-wrapper -->
									<?php } ?>
								</div>
							<?php } ?>
						</div> <!-- blog_content -->

					<?php endwhile; wp_reset_postdata(); endif; ?>
		</section>

<?php }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed functions about homepage sections in particular hook
 *
 */

add_action( 'fotogenic_homepage_sections', 'fotogenic_header_hero_image_sec', 10 );
add_action( 'fotogenic_homepage_sections', 'fotogenic_homepage_about_sec', 20 );
add_action( 'fotogenic_homepage_sections', 'fotogenic_homepage_portfolio_sec', 30 );
add_action( 'fotogenic_homepage_sections', 'fotogenic_homepage_testimonial_sec', 40 );
add_action( 'fotogenic_homepage_sections', 'fotogenic_homepage_blog_sec', 50 );

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_footer_section_start' ) ) :

	/**
	 * function for section start
	 *
	 */

	function fotogenic_footer_section_start() {

		$footer_column = get_theme_mod( 'fotogenic_footer_layout_option', 'column-three' );
?>
		<footer id="colophon" class="site-footer footer-<?php echo esc_attr( $footer_column ); ?>">
			<div class="mt-container">
<?php
	}
endif;

if( ! function_exists( 'fotogenic_footer_widget_area' ) ) :

	/**
	 * function for widget area
	 *
	 */

	function fotogenic_footer_widget_area() {
	$footer_column = get_theme_mod( 'fotogenic_footer_layout_option', 'column-three' ); ?>
		<div class="footer-widget-area-wrapper">
			<div class="mt-column-wrapper">
				<?php if( is_active_sidebar( 'footer-widget-area-1' ) ) { ?>
					<div class="dynamic_sidebar_one mt-footer-coumn mt-column-3">
						<?php dynamic_sidebar( 'footer-widget-area-1' ); ?>
					</div>
				<?php } ?>

				<?php if( is_active_sidebar( 'footer-widget-area-2' ) && ( $footer_column ) != 'column-one' ) { ?>
					<div class="dynamic_sidebar_two mt-footer-coumn mt-column-3">
						<?php dynamic_sidebar( 'footer-widget-area-2' ); ?>
					</div>
				<?php } ?>

				<?php if( is_active_sidebar( 'footer-widget-area-2' ) && ( $footer_column ) == 'column-three' ) { ?>
					<div class="dynamic_sidebar_three mt-footer-coumn mt-column-3">
						<?php dynamic_sidebar( 'footer-widget-area-3' ); ?>
					</div>
				<?php } ?>
			</div>
		</div>	<!-- footer-widget-area-wrapper -->
<?php
	}

endif;

if( ! function_exists( 'fotogenic_footer_site_info' ) ) :

	/**
	 * function about footer site info
	 *
	 */

	function fotogenic_footer_site_info() {
?>
		<div class="site-info">
			<div class="footer-image">
				 
				<?php $footer_logo = get_theme_mod( 'footer_logo_setting' );
				if( !empty ($footer_logo) ) { ?>
					<a href="<?php echo esc_url( site_url() ); ?>"><img src="<?php echo esc_url( $footer_logo ); ?>"></a>
				<?php } ?>
			</div>
			<div class="footer-info-wrap">
				<div class="footer-info"> <?php echo esc_html( get_theme_mod( 'footer_contact_number_setting' ) ); ?> </div>
				<div class="footer-info"> <?php echo esc_html( get_theme_mod( 'footer_email_address_setting' ) ); ?> </div>
			</div>
			<div class="footer-copyright-wrap">
				<span> <?php echo esc_html( get_theme_mod( 'footer_copyright_content_setting' ) ); ?> </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html( 'Theme %1$s designed by %2$s', 'fotogenic' ), 'Fotogenic', '<a href="https://mysterythemes.com/">Mysterythemes</a>' ); ?>
			</div> <!-- footer-copyright-wrap -->
		</div><!-- .site-info -->
<?php
	}

endif;

if( ! function_exists( 'fotogenic_scroll_top_content' ) ) :

	/**
	 * Function for scroll top
	 *
	 * @since 1.0.0
	 */

	function fotogenic_scroll_top_content() {

		$fotogenic_back_to_top_scroll_option = get_theme_mod( 'fotogenic_back_to_top_scroll_option', true );
		if( false === $fotogenic_back_to_top_scroll_option ) {
			return;
		}

        echo '<div class="mt-scroll-up"> <i id="fotogenic-scrollup" class="animated fa fa-arrow-up"></i></div>';
        
	}

endif;

if( ! function_exists( 'fotogenic_footer_section_end' ) ) :

	/**
	 * function for section end
	 *
	 */

	function fotogenic_footer_section_end() {
?>
			</div> <!-- mt-container -->
		</footer><!-- #colophon -->
<?php
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed functions about footer content in particular hook
 *
 */
add_action( 'fotogenic_footer_section', 'fotogenic_footer_section_start', 10 );
add_action( 'fotogenic_footer_section', 'fotogenic_footer_widget_area', 20 );
add_action( 'fotogenic_footer_section', 'fotogenic_footer_site_info', 30 );
add_action( 'fotogenic_footer_section', 'fotogenic_scroll_top_content', 40 );
add_action( 'fotogenic_footer_section', 'fotogenic_footer_section_end', 50 );
