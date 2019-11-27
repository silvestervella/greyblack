<?php

/*
Plugin Name: GreyBlack Theme - Products
Plugin URI: https://mygreyblack.com/
Description: Products generator plugin
Author: ..
Version: 1.0
*/

define( 'greyblack_products', '1.0.0' );

defined( 'ABSPATH' ) or die( 'Oops!' );

global $wp_rewrite;

function greyblack_products() {
//   register_post_type( 'product',
//   array(
//     'labels' => array(
//       'name' => __( 'Product' ),
//       'singular_name' => __( 'Product' )
//     ),
//     'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
//     'publicly_queryable' => true,  // you should be able to query it
//     'show_ui' => true,  // you should be able to edit it in wp-admin
//     'exclude_from_search' => false,  // you should exclude it from search results
//     'show_in_nav_products' => false,  // you shouldn't be able to add it to products
//     'has_archive' => false,  // it shouldn't have archive page
//     'rewrite' => false,  // it shouldn't have rewrite rules
//     //'taxonomies'  => array( 'item_type' , 'gender' ),
//     'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields','excerpt' ),
//   )
//   );

  $taxonomies = array(
    array(
        'slug'         => 'item_type',
        'single_name'  => 'Type',
        'plural_name'  => 'Types',
        'post_type'    => 'product',
        'rewrite'      => array( 'slug' => 'item_type' ),
        'hierarchical' => true,
    ),
    array(
        'slug'         => 'gender',
        'single_name'  => 'Gender',
        'plural_name'  => 'Gender',
        'post_type'    => 'product',
        'rewrite'      => array( 'slug' => 'gender' ),
        'hierarchical' => true,
    ),
    array(
        'slug'         => 'placement',
        'single_name'  => 'Placement',
        'plural_name'  => 'Placement',
        'post_type'    => 'product',
        'rewrite'      => array( 'slug' => 'placement' ),
        'hierarchical' => true,
    ),
    array(
        'slug'         => 'collection',
        'single_name'  => 'Collection',
        'plural_name'  => 'Collections',
        'post_type'    => 'product',
        'rewrite'      => array( 'slug' => 'collection' ),
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
 * Display products in home page
 * 
 * 
 */
  function greyblack_generate_product_posts_home($atts) {
      $product_section = '';
      $product_section_home = '';

          $args = array(
              'post_type' => 'product',
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

          $term = get_term_by('slug', $atts['terms'], 'collection'); 
          /*
          $name = $term->name;
          $name_no_space = str_replace(" ", "-", $name);

          $stack = array();
          array_push($stack, $name);
          */

          $query1 = new WP_query ( $args );
          while($query1->have_posts()) : $query1->the_post();
          $amazonLink = esc_url(get_post_meta(get_the_ID(), "amazon-link", true ));
          $postBack = esc_url(get_post_meta(get_the_ID(), "post-back", true ));

              $product_section .= '<div class="product-item">';

              $product_section .= '<div class="product-info-wrap">';
              $product_section .= '<div class="feat-img-wrap" style="background-image: url('.esc_url($postBack).')">'; 
              $product_section .= '<div id="home-prods-overlay">';
              $product_section .= '<div class="left"></div>';
              $product_section .= '<div class="right"></div>';
              $product_section .= '</div>';
              $product_section .= '</div>';

              $product_section .= '<div class="prod-info">';

              //$product_section .= var_dump(get_term_link('collection-1' , 'collection'));
              //$product_section .= var_dump($terms[0]->slug);



              $product_section .= '<h4 class="product-title">';
              $product_section .= get_the_title( );

              $terms = get_the_terms(get_the_ID() , 'collection');
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    foreach ( $terms as $term ) {
                        $product_section .= '<a href="'.get_term_link($term->name , 'collection').'"><span class="collection-title">' . $term->name . '</span></a>';
                    }
                }

              $product_section .= '</h4>';

              $product_section .= '<div class="product-content">';
              $product_section .= strip_shortcodes(get_the_content( ));
              $product_section .= '</div>';

              /*
              $product_section .= '<div class="prod-thumbs">';

              if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :

                $ids = explode( ",", $gallery['ids'] );

                foreach( $ids as $id ) {

                $link = wp_get_attachment_url( $id );
                $src = wp_get_attachment_image_src($id , 'thumbnail');

                $product_section .= '<div class="thumb-wrap gall-img-wrap">';                   
                $product_section .=  '<img src="' . $src[0] . '" class="gall-img" alt="Product image" fullurl="'. $link .'" />';
                $product_section .= '</div>';
                }
              endif;
              $product_section .= '</div>';
              

              $product_section .= '<div class="az-link">';
              $product_section .= '<a href="" target="_blank">BUY</a>';
              $product_section .= '<span> ...directly from Amazon</span>';
              $product_section .= '</div>';
              */

              $product_section .= '</div>';

              $product_section .= '</div>';

              // /.prod-info-wrap
              
              $product_section .= '</div>';
          endwhile;

          wp_reset_postdata(); // reset the query

      return $product_section;
  }
  add_shortcode( 'get_product_items' , 'greyblack_generate_product_posts_home' );


/**
 * 
 * 
 * Display products
 * 
 * 
 */
  function greyblack_generate_product_posts($atts) {
      $product_section = '';

          $args = array(
              'post_type' => 'product',
              'posts_per_page' => $atts['posts_per_page'],
              'orderby' => $atts['orderby'],
              'tax_query' => array(
                  array(
                      'taxonomy' => $atts['taxonomy'],
                      'field' => 'slug',
                      'terms' => $atts['terms'],
                  )
              )
          );

          $term = get_term_by('slug', $atts['terms'], $atts['taxonomy']); 
          $name = $term->name;
          $term_back_img = get_term_meta($term->term_id , "__term_meta_text");

          $product_section .= '<div class="product-type">';

          $product_section .= '<div class="items">';

          $query1 = new WP_query ( $args );
          while($query1->have_posts()) : $query1->the_post();
          $amazonLink = esc_url(get_post_meta(get_the_ID(), "amazon-link", true ));

              $product_section .= '<div class="product-item">';

              $product_section .= '<div class="product-cont">';

              $product_section .= '<div class="product-thumbs">';
              $product_section .= '<div class="thumb-wrap feat-img-wrap gall-img-wrap">';
              $product_section .= get_the_post_thumbnail( );
              $product_section .= '</div>';

              /*
              if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :
                // Loop through all the image and output them one by one.
                foreach ( $gallery['src'] AS $src ) {
                $product_section .= '<div class="thumb-wrap gall-img-wrap">';                   
                $product_section .=  '<img src="' . $src . '" class="gall-img" alt="Product image" />';
                $product_section .= '</div>';
                }
              endif;
              */

              $product_section .= '</div>';

              $product_section .= '<div class="prod-info">';
              $product_section .= '<h4 class="product-title">'.get_the_title( ).'</h4>';

              $product_section .= '<div class="view-link">';
              $product_section .= '<a href="'.get_post_permalink().'">View</a>';
              $product_section .= '</div>';

              $product_section .= '</div>';

              $product_section .= '</div>';
              $product_section .= '</div>';
          endwhile;

          $product_section .= '</div>'; // items

          $product_section .= '<div class="type-image" style="background-image: url('.$term_back_img[0].')">';
          $product_section .= '<div class="product-type-title">';
          $product_section .= $name;
          $product_section .= '</div>';
          $product_section .= '</div>';

        $product_section .= '</div>'; // / .product-type

          wp_reset_postdata(); // reset the query

      return $product_section;
  }
  add_shortcode( 'get_product_items_home' , 'greyblack_generate_product_posts' );

}

add_action('init', 'greyblack_products');
?>