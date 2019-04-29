<?php
/*
 * Template Name: Home Template
 */
 ?>
 <?php get_header(); 
 $about = get_post(49);
 //var_dump($about);
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
            <div id="large-img">
                <img src="" alt="product image" />
            </div>

            <section id="home-about">
                    <div id="about-wrap">
                        <div id="about-back" style="background-image: url(<?php echo get_post_meta( $about->ID, 'post-back', true ) ?>)"></div>
                        <div class="excerpt">
                        <?php echo $about->post_excerpt ?>
                        <a href="<?php echo $about->guid ?>">Read more...</a>
                        </div>
                        <div class="feat-img">
                           <?php echo  get_the_post_thumbnail( $about->ID ) ?>
                        </div>
                        <div class="quote"><?php echo get_post_meta( $about->ID, 'quote', true ) ?></div>
                    </div>
            </section>
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>