<?php
/*
 * Template Name: Products Template
 */

 ?>
 <?php get_header(); ?>

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
            
            <section id="products">
            <?php
            $_terms = get_terms( array('item_type') );

            foreach ($_terms as $term) :
                $term_slug = $term->slug;
                echo greyblack_generate_product_posts(array(
                    'posts_per_page' => '0',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'taxonomy' => 'item_type',
                    'terms' => $term->slug ) );

                wp_reset_postdata();

            endforeach;
            ?>
            </section>
        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>
