<?php
/*
 * Template Name: Menu Template
 */
 ?>
 <?php get_header(); 
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
$greyblack_logo =  wp_get_attachment_url(20);
$angray_logo =  wp_get_attachment_url(77);

$greyblack_img =  wp_get_attachment_url(45);
$angray_img =  wp_get_attachment_url(73);
 ?>

<main role="main" style="background-image: url(<?php echo $featured_img_url ?>)">

    <section id="menu-wrapper">
        <div id="menus">

            <a href="https://mygreyblack.com/home">
                <div class="menu-outer" style="background-image: url(<?php echo $greyblack_img ?>)">
                    <div class="menu-overlay"></div>
                    <div class="menu-logo">
                        <img src="<?php echo $greyblack_logo ?>" alt="logo" />
                    </div>
                    <div class="menu-desc"></div>
                </div><!-- menu-outer -->
            </a>

            <a href="https://angraymode.com" target="_blank">
                <div class="menu-outer" style="background-image: url(<?php echo $angray_img ?>)">
                    <div class="menu-overlay"></div>
                    <div class="menu-logo">
                        <img src="<?php echo $angray_logo ?>" alt="logo" />
                    </div>
                    <div class="menu-desc"></div>
                </div><!-- menu-outer -->
            </a>

        </div> <!-- menus -->
    </section> <!-- menu-wrapper -->

</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>