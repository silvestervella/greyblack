<?php
/*
 * Template Name: Home Template
 */


 ?>
 <?php get_header(); 
 ?>

<!-- <section id="home-back-vid">
 <?php /* echo greyblack_generate_home_top_adverts(array(
                'posts_per_page' => '0',
                'orderby' => 'date',
                'order' => 'ASC',
                'taxonomy' => 'ad_placement',
                'terms' => 'home-top' ) ); */ ?>
 </section> --> 

<main role="main">
    <div class="posts-sec-outer">
        <div class="container">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php if (!empty(get_the_content())) { ?>
                    <div class="page-text"><?php the_content(); ?></div>
                <?php } ?>
                <?php endwhile; else: ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
            
            <section id="home-prods">
                <?php echo greyblack_generate_product_posts_home(array(
                'posts_per_page' => '0',
                'orderby' => 'date',
                'order' => 'ASC',
                'taxonomy' => 'placement',
                'terms' => 'home' ) ); ?>
            </section>
            <div id="link-to-prods">
                <a href="<?php echo get_post_permalink(23) ?>">view more..</a>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>