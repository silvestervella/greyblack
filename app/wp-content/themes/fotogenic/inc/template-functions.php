<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fotogenic_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if( is_archive() ){ 
		$archive_layout = get_theme_mod( 'fotogenic_archive_layout_setting', 'right-sidebar' );
		if( $archive_layout == "left-sidebar" ){
			$classes[] = esc_attr( $archive_layout );	
		}
		elseif ( $archive_layout == "right-sidebar" ) {
			$classes[] = esc_attr( $archive_layout );
		}
		elseif ( $archive_layout == "no-sidebar-center" ) {
			$classes[] = esc_attr( $archive_layout );	
		}
		else{
			$classes[] = esc_attr( $archive_layout );	
		}
	}

	if( is_page() ){
		$page_layout = get_theme_mod( 'fotogenic_page_layout_setting', 'right-sidebar' );
		if( $page_layout == "left-sidebar" ){
			$classes[] = esc_attr( $page_layout );	
		}
		elseif ( $page_layout == "right-sidebar" ) {
			$classes[] = esc_attr( $page_layout );
		}
		elseif ( $page_layout == "no-sidebar-center" ) {
			$classes[] = esc_attr( $page_layout );	
		}
		else{
			$classes[] = esc_attr( $page_layout );	
		}

		$gallery_layout = get_theme_mod( 'fotogenic_masonry_show_option', '0' );
		if( true == esc_attr( $gallery_layout ) ):
			$classes[] = 'photo_masonry';
		endif;
	}

	if( is_single() ){ 
		$post_layout = get_theme_mod( 'fotogenic_post_layout_setting', 'right-sidebar' );
		if( $post_layout == "left-sidebar" ){
			$classes[] = esc_attr( $post_layout );	
		}
		elseif ( $post_layout == "right-sidebar" ) {
			$classes[] = esc_attr( $post_layout );
		}
		elseif ( $post_layout == "no-sidebar-center" ) {
			$classes[] = esc_attr( $post_layout );	
		}
		else{
			$classes[] = esc_attr( $post_layout );	
		}
	}

	$fotogenic_site_layout = get_theme_mod( 'fotogenic_site_layout', 'wide-layout' );
	$classes[] = esc_attr( $fotogenic_site_layout );

	return $classes;
}
add_filter( 'body_class', 'fotogenic_body_classes' );

/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fotogenic_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'fotogenic_pingback_header' );

/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Enqueue fonts.
 */
function fotogenic_fonts_url(){
	$fonts_url = '';

	$fotigenic_Archivo = _x( 'on', 'Archivo: on or off', 'fotogenic' );
	$fotigenic_Playfair_Display = _x( 'on', 'Playfair Display: on or off', 'fotogenic' );

	if ( 'off' !== $fotigenic_Archivo && 'off' !== $fotigenic_Playfair_Display ) {

		$font_families = array();

		if ( 'off' !== $fotigenic_Archivo ) {
				$font_families[] = 'Archivo:400,500,600,700,';
		}

		if ( 'off' !== $fotigenic_Playfair_Display ) {
				$font_families[] = 'Playfair Display:400,700,900';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}

/*------------------------------------------------------------------------------------------------------------------*/

/**
 * Enqueue scripts and styles.
 */
function fotogenic_scripts() {

	global $fotogenic_theme_version;

	wp_enqueue_style( 'fotogenic-fonts', fotogenic_fonts_url(), array(), null );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'lightslider-css', get_template_directory_uri() . '/assets/library/lightslider/css/lightslider.min.css', array(), 'v1.1.3' );

	wp_enqueue_style( 'pretty-Photo', get_template_directory_uri() . '/assets/library/prettyPhoto/prettyPhoto/css/prettyPhoto.css', array(), '3.1.6' );

	wp_enqueue_style( 'fotogenic-style', get_stylesheet_uri(), array(), esc_attr( $fotogenic_theme_version ) );
    
    wp_enqueue_style( 'fotogenic-responsive-style', get_template_directory_uri() . '/assets/css/fotogenic-responsive.css', array(), esc_attr( $fotogenic_theme_version ) );

	wp_enqueue_script( 'fotogenic-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fotogenic-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_stylesheet_directory_uri() . '/assets/library/stickysidebar/theia-sticky-sidebar.js', array( 'jquery' ), '1.4.0', true );

	wp_enqueue_script( 'pretty-Photo', get_template_directory_uri() . '/assets/library/prettyPhoto/prettyPhoto/js/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.6', true );

	wp_enqueue_script( 'mt-player', get_template_directory_uri() . '/assets/library/mt-player/jquery.mb.YTPlayer.min.js', array( 'jquery' ), ' ', true );

	wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/assets/library/lightslider/js/lightslider.min.js', array('jquery'), 'v1.1.3', true );

	wp_enqueue_script( 'imageloaded.pkgd', get_template_directory_uri() . '/assets/library/imagesloaded/imagesloaded.pkgd.min.js', array(), '4.1.4', true );

	wp_enqueue_script( 'masonry' );
	
	wp_enqueue_script( 'custom-main-js', get_template_directory_uri() . '/assets/js/custom-main.js', array('jquery'), esc_attr( $fotogenic_theme_version ) , true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fotogenic_scripts' );

/*------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_select_categories_list' ) ) :

	/**
	 * function to return category lists
	 *
	 * @return $fotogenic_get_categories_list in array
	 */
	
	function fotogenic_select_categories_list() {

		$fotogenic_get_categories = get_categories( array( 'hide_empty' => 0 ) );
		$fotogenic_get_categories_list[''] = __( 'Select Category', 'fotogenic' );

        foreach ( $fotogenic_get_categories as $category ) {
            $fotogenic_get_categories_list[esc_attr( $category->slug )] = esc_html( $category->cat_name );
        }
        
        return $fotogenic_get_categories_list;
	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_fontawesome_social_icons_lists' ) ) :

	/**
     * Font Awesome
     *
     * @param string $file_path font awesome css file path
     * @param string $class_prefix change this if the class names does not start with `fa-`
     * @return array
     */

	function fotogenic_fontawesome_social_icons_lists() {

		$social_icons_array = array( 'facebook-square', 'facebook', 'facebook-official', 'twitter-square', 'twitter', 'github', 'behance', 'behance-square', 'whatsapp', 'qq', 'wechat', 'weixin', 'tumblr', 'tumblr-square', 'instagram', 'google-plus-circle', 'google-plus-official', 'google-plus-square', 'google-plus', 'dribbble', 'skype', 'snapchat', 'snapchat-ghost', 'snapchat-square', 'pinterest', 'pinterest-square', 'pinterest-p', 'linkedin-square', 'linkedin', 'reddit', 'reddit-square', 'youtube-square', 'youtube', 'youtube-play', 'yelp' );

		foreach ( $social_icons_array as $icon ) {
			$icon_name = ucfirst( str_ireplace( array( '-' ), array( ' ' ), $icon ) );
			$font_awesome_icons[esc_attr( $icon )] = esc_html( $icon_name );
		}
		return $font_awesome_icons;

	}

endif;

/*------------------------------------------------------------------------------------------------------------------*/

add_action( 'fotogenic_social_icons', 'fotogenic_social_icons_sec', 10 );

if( ! function_exists( 'fotogenic_social_icons_sec' ) ) :
/*
 * Top Header Social Icons Section
 *
 */

function fotogenic_social_icons_sec() { ?>
	
	<div class="social-icons">
		<?php
		$fotogenic_social_icons = get_theme_mod( 'fotogenic_social_icons_lists', array(
			array(
				'social_icon' => 'facebook',
				'social_url'  => '#',
			),
			array(
				'social_icon' => 'twitter',
				'social_url'  => '#',
					),
				) );

				if ( ! empty( $fotogenic_social_icons ) && is_array( $fotogenic_social_icons ) ) {
			?>

					<ul class="mt-fotogenic-social-icon-wrap">
						<?php
							foreach ( $fotogenic_social_icons as $fotogenic_social_icon ) {
								if ( ! empty( $fotogenic_social_icon['social_url'] ) ) {
						?>
									<li class="mt-social-icon">
										<a href="<?php echo esc_url( $fotogenic_social_icon['social_url'] ); ?>">
											<i class="fa fa-<?php echo esc_attr( $fotogenic_social_icon['social_icon'] ); ?>"></i>
										</a>
									</li>
						<?php
								}
							}
						?>
					</ul>
			<?php 
				}
			?>
	</div>

<?php }

endif;


/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotogenic_css_strip_whitespace' ) ) :
	
	/**
	 * Get minified css and removed space
	 *
	 * @since 1.0.0
	 */

    function fotogenic_css_strip_whitespace( $css ){
        $replace = array(
            "#/\*.*?\*/#s" => "",  // Strip C style comments.
            "#\s\s+#"      => " ", // Strip excess whitespace.
        );
        $search = array_keys( $replace );
        $css = preg_replace( $search, $replace, $css );

        $replace = array(
            ": "  => ":",
            "; "  => ";",
            " {"  => "{",
            " }"  => "}",
            ", "  => ",",
            "{ "  => "{",
            ";}"  => "}", // Strip optional semicolons.
            ",\n" => ",", // Don't wrap multiple selectors.
            "\n}" => "}", // Don't wrap closing braces.
            "} "  => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys( $replace );
        $css = str_replace( $search, $replace, $css );

        return trim( $css );
    }

endif;
