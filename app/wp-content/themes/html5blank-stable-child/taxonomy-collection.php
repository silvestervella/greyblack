<?php get_header(); ?>

	<main role="main">
		<!-- section -->
        <div class="prod-outer">

        <div class="prod-left">
			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>
        </div>

        <?php 
		    $back_img = esc_url(get_post_meta(get_the_ID(), "post-back", true ));
            
            $term = $wp_query->get_queried_object();
            
            $term_back_img = get_term_meta($term->term_id , "__term_meta_text");
            $product_html = '';
            $product_html .= '<div class="prod-right">';
            $product_html .= '<div class="tax-back-img" style="background-image: url('.$term_back_img[0].')">';
            $product_html .= '<div class="product-type-title">';
            $product_html .=  $term->name;
            $product_html .= '</div>';
            $product_html .= '</div>'; // .prod-back-img
            $product_html .= '</div>'; // .prod-right

            $product_html .= '</div>'; // .prod-outer
            echo $product_html;
		?>
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
