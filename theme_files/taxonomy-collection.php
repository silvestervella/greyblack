<?php
/*
 * Template Name: Products Template
 */

 ?>
 <?php get_header(); ?>

 <main role="main">
    <div class="posts-sec-outer">
        <div class="container">            
            <section id="products">
            <?php
            $term = $wp_query->get_queried_object();

                echo greyblack_generate_product_posts(array(
                    'posts_per_page' => '0',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'taxonomy' => $term->taxonomy,
                    'terms' => $term->name ) );

                wp_reset_postdata();
            ?>
            </section>
        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>
