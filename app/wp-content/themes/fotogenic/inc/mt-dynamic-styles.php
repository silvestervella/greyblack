<?php
/**
 * Dynamic styles
 *
 * @package Mystery Themes
 * @subpackage Fotogenic
 * @since 1.0.0
 *
 */

add_action( 'wp_enqueue_scripts', 'fotogenic_dynamic_styles' );

if( ! function_exists( 'fotogenic_dynamic_styles' ) ) :
    
    function fotogenic_dynamic_styles() {

    	$fotogenic_theme_color = get_theme_mod( 'fotogenic_theme_color', '#4ca6e5' ); 

    	$output_css = '';
        
        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.reply .comment-reply-link,.widget_search .search-submit,.mt-search-social-wrapper .fotogenic-form-wrap .search-form .search-submit:hover,.hero_image_btn:hover,.masonary-view-all-btn a,.blog-btn:hover,.mt-scroll-up,div.wpforms-container-full .wpforms-form button[type='submit'], div.wpforms-container-full .wpforms-form button[type='submit']:hover { background: ". esc_attr( $fotogenic_theme_color ) ."}\n";

        $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover,.commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.site-title a:hover,#site-navigation ul li.current-menu-item>a,#site-navigation ul li:hover>a,#site-navigation ul li.current_page_ancestor>a,#site-navigation ul li.current_page_item>a,#masthead .social-icons ul li a:hover,#masthead .fotogenic-search-icon:hover,.masonry-content-wrapper .masonry_title a:hover,.blog-title a:hover,#colophon .widget_archive a:hover, #colophon .widget_categories a:hover, #colophon .widget_recent_entries a:hover, #colophon .widget_meta a:hover, #colophon .widget_recent_comments li:hover, #colophon .widget_rss li:hover, #colophon .widget_pages li a:hover, #colophon .widget_nav_menu li a:hover,.entry-title a:hover{ color: ". esc_attr( $fotogenic_theme_color ) ."}\n";

        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.widget_search .search-submit,.mt-search-social-wrapper .fotogenic-form-wrap .search-form .search-submit:hover,.hero_image_btn:hover,.masonary-view-all-btn a,.blog-btn:hover,.error-404.not-found,div.wpforms-container-full .wpforms-form button[type='submit'], div.wpforms-container-full .wpforms-form button[type='submit']:hover { border-color: ". esc_attr( $fotogenic_theme_color ) ."}\n";

        $output_css .= ".comment-list .comment-body { border-top-color: ". esc_attr( $fotogenic_theme_color ) ."}\n";
       

        $refine_output_css = fotogenic_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'fotogenic-style', $refine_output_css );

    }

endif;