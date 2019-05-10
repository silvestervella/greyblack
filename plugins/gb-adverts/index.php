<?php
/*
Plugin Name: GreyBlack Theme - Adverts
Plugin URI: https://mygreyblack.com/
Description: Advert generator plugin
Author: ..
Version: 1.0
*/

define( 'greyblack_adverts', '1.0.0' );

defined( 'ABSPATH' ) or die( 'Oops!' );

global $wp_rewrite;

function greyblack_adverts() {

  register_post_type( 'advert',
  array(
    'labels' => array(
      'name' => __( 'Advert' ),
      'singular_name' => __( 'Advert' )
    ),
    'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
    'publicly_queryable' => true,  // you should be able to query it
    'show_ui' => true,  // you should be able to edit it in wp-admin
    'exclude_from_search' => false,  // you should exclude it from search results
    'show_in_nav_products' => false,  // you shouldn't be able to add it to products
    'has_archive' => false,  // it shouldn't have archive page
    'rewrite' => false,  // it shouldn't have rewrite rules
    //'taxonomies'  => array( 'item_type' , 'gender' ),
    'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields','excerpt' ),
  )
  );

  $taxonomies = array(
    array(
        'slug'         => 'ad_placement',
        'single_name'  => 'Placement',
        'plural_name'  => 'Placement',
        'post_type'    => 'advert',
        'rewrite'      => array( 'slug' => 'ad_placement' ),
        'hierarchical' => true,
    )
);
foreach( $taxonomies as $taxonomy ) {
    $labels = array(
        'name' => $taxonomy['plural_name'],
        'singular_name' => $taxonomy['single_name'],
        'search_items' =>  'Search ' . $taxonomy['plural_name'],
        'all_items' => 'All ' . $taxonomy['plural_name'],
        'parent_item' => 'Parent ' . $taxonomy['single_name'],
        'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
        'edit_item' => 'Edit ' . $taxonomy['single_name'],
        'update_item' => 'Update ' . $taxonomy['single_name'],
        'add_new_item' => 'Add New ' . $taxonomy['single_name'],
        'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
        'menu_name' => $taxonomy['plural_name']
    );
    
    $rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
    $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;

    register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
        'hierarchical' => $hierarchical,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => $rewrite,
    ));
    }



/**
 * 
 * 
 * Display top adverts in home page
 * 
 * 
 */
    function greyblack_generate_home_top_adverts($atts) {  
            $args = array(
                'post_type' => 'advert',
                'posts_per_page' => $atts['posts_per_page'],
                'orderby' => $atts['orderby'],
                'order' => $atts['order'],
                'tax_query' => array(
                    array(
                        'taxonomy' => $atts['taxonomy'],
                        'field' => 'slug',
                        'terms' => $atts['terms'],
                    )
                )
            );
  
            $query1 = new WP_query ( $args );
            while($query1->have_posts()) : $query1->the_post();

            $advert_sec = '';
            $amazonLink = esc_url(get_post_meta(get_the_ID(), "amazon-link", true ));
            $advertLink = esc_url(get_post_meta(get_the_ID(), "advert-link", true ));
            $videoLink = get_post_meta(get_the_ID(), "advert-vids", true );
  
                $advert_sec .= '<div class="advert-item">';

                if (metadata_exists('post' , get_the_ID() , 'advert-vids')) {
                    $advert_sec .= '<video autoplay loop>';
                    $advert_sec .= '<source src="https://mygreyblack.com/wp-content/uploads/videos/'.$videoLink.'.mp4" type="video/mp4">';
                    $advert_sec .= '<source src="https://mygreyblack.com/wp-content/uploads/videos/'.$videoLink.'.ogg" type="video/ogg">';
                    $advert_sec .= 'Your browser does not support the video tag.';
                    $advert_sec .= '</video>';
                } else {
                    $back_img = esc_url(get_the_post_thumbnail_url( get_the_ID() ) );
                    $advert_sec .= '<div class="ad-img" style="background-image: url('.$back_img.')"></div">';
                }

  
                $advert_sec .= '<div class="ad-info">';
                $advert_sec .= '<h4 class="ad-title">';
                $advert_sec .= get_the_title( );
                $advert_sec .= '</h4>';
                $advert_sec .= '<a href="'.$advertLink.'">View more...</a>';
                $advert_sec .= '</div>'; // .ad-info;

                $advert_sec .= '</div>'; // .advert-item;
                
            endwhile;

            return $advert_sec;
  
            wp_reset_postdata(); // reset the query
  
    }
    add_shortcode( 'get_product_ads' , 'greyblack_generate_home_top_adverts' );

}


add_action('init', 'greyblack_adverts'); 

?>