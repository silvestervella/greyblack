<?php
/**
 * 0. Generic
 * 0.1 Variables
 * 0.2 Front page sections Id incrementor
 * 0.3 Output a single menu item + link
 * 0.4 Output image by id 
 * 
 * 1. Register and enqueue script and styles
 * 2. Add theme and post type support
 * 3. Add custom logo + check for svg
 * 4. Add top section background selector in customizer
 * 5. Redirect wp-login url to homepage 
 * 6. woocommerce
 */

 
/**
 * 0. Generic
 */

/* 0.1 Variables */



/* 0.2 Front page sections Id incrementor  */
function greyblack_genId($arg1) {
    static $idInc = 0;
    $idInc++;
    echo "$arg1-fp-sec-$idInc";
}

/* 0.3 Output a single menu item + link  */
function greyblack_get_page_links($posts) {
    echo '<ul>';
    foreach ($posts as &$value) {
        $post_content = get_post($value);
        $post_perma = get_post_permalink($value);
        if ($post_content) {
            echo '<li><a href="'.$post_perma.'">' . $post_content->post_title . '</a></li>';
        }
    }
    echo '</ul>';
}

/* 0.4 Output image by id  */
function greyblack_get_attc($img_id, $img_size) {
    $attc = wp_get_attachment_image_src( $img_id , $img_size );
    echo $attc[0];
}





/**
 * 1. Register and enqueue script and styles
 */
    // De-register HTML5 Blank styles
    function greyblack_styles_make_child_active()
    {
    wp_deregister_style('html5blank'); // Enqueue it!
    }
    add_action('wp_enqueue_scripts', 'greyblack_styles_make_child_active', 100); // Add Theme Child Stylesheet

    // Load HTML5 Blank Child styles
    function greyblack_styles_child()
    {
    // Register Child Styles
    wp_register_style('child-fontawesome', get_stylesheet_directory_uri() . '/css/fontawsome/css/all.css', array(), '1.0', 'all');
    wp_register_style('greyblack-child', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
    //wp_register_style('child-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_register_style('owlcarousel-style', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), '1.0', 'all');
    wp_register_style('owlcarousel-animate', get_stylesheet_directory_uri() . '/css/animate.css', array(), '1.0', 'all');
    wp_register_style('child-all', get_stylesheet_directory_uri() . '/css/all.css', array(), '1.0', 'all');

    // Enqueue Child Styles
    //wp_enqueue_style('child-bootstrap'); 
    wp_enqueue_style('child-fontawesome'); 
    wp_enqueue_style('owlcarousel-style'); 
    wp_enqueue_style('owlcarousel-animate'); 
    wp_enqueue_style('greyblack-child'); 
    wp_enqueue_style('child-all');

    //Register Child Scripts
    //wp_register_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_register_script( 'theme-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ) );
    wp_register_script( 'owlcarousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ) );
    
    // Enqueue Child Scripts
    //wp_enqueue_script( 'bootstrap' ); 
    wp_enqueue_script( 'theme-script' );   
    wp_enqueue_script( 'owlcarousel' );   

}
add_action('wp_enqueue_scripts', 'greyblack_styles_child', 20); // Add Theme Child Stylesheet



/**
 * 2. Add theme and post type support
 */
function greyblack_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
    ) );
    add_theme_support( 'custom-background', array(
        'wp-head-callback' => 'greyblack_set_top_home_back',
        'default-color'    => '000000',
        'default-image'    => '%1$s/images/background.jpg',
    ));

    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'greyblack_setup' );


/**
 * 3. Add custom logo + check for svg
 */
function greyblack_get_logo() {
    $upload = wp_upload_dir();
    $logo_file = $upload['basedir'] . '/includes/images/logo.svg';

    if ( file_exists( $logo_file ) ) {
        include($logo_file);
     } else {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        echo "<img src='$image[0]' alt='logo' />";
     }
}



/*
 * 4. Add top section background selector in customizer
*/
function greyblack_set_top_home_back() {
    ob_start();
    _custom_background_cb(); // Default handler
    $style = ob_get_clean();
    $style = str_replace( 'body.custom-background', '#top', $style );
    echo $style;
}


/**
 * 5. Redirect wp-login url to homepage 
 */
// add_action(  'login_init', 'greyblack_user_registration_login_init'  );
// function greyblack_user_registration_login_init () {
//      if( ! is_user_logged_in() ) {
//         wp_redirect( '/' );
//         exit;
//       }
// }


/**
 * 6. woocommerce
 */
add_action ( 'genesis_before_loop', 'themeprefix_remove_post_info' );
// Remove Post Info, Post Meta from CPT
function themeprefix_remove_post_info() {
	if ('product' == get_post_type()) {//add in your CPT name
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
	}
}
?>