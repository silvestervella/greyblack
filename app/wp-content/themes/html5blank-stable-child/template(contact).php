<?php
/*
 * Template Name: Contact Template
 */

 ?>
 <?php get_header(); 
 ?>

<main role="main">
    <div class="posts-sec-outer">
        <div class="container">
            <h3><?php the_title(); ?></h3>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php if (!empty(get_the_content())) { ?>
                    <div class="page-text"><?php the_content(); ?></div>
                <?php } ?>
                <?php endwhile; else: ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
            
        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>
