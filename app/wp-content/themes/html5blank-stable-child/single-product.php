<?php
/**
 * The template for displaying all single product posts
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main>

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation(
						array(
							/* translators: %s: parent post link */
							'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
						)
					);
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
						)
					);
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

            endwhile; // End of the loop.
            $back_img = esc_url(get_post_meta(get_the_ID(), "post-back", true ));

            $product_html = '';
            $product_html .= '<div class="prod-outer">';

            $product_html .= '<div class="prod-left">';

            $product_html .= '<div class="prod-title">';
            $product_html .= '<h2>'.get_the_title().'</h2>';
            $product_html .= '</div>'; // .prod-title

            $product_html .= '<div class="prod-info">';

            $product_html .= '<div class="prod-content">'.strip_shortcodes(get_the_content( )).'</div>';

            $product_html .= '</div>'; // .prod-info

            

            if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :

                $ids = explode( ",", $gallery['ids'] );

                $product_html .= '<div class="prod-thumbs">';

                foreach( $ids as $id ) {

                $link = wp_get_attachment_url( $id );
                $src = wp_get_attachment_image_src($id , 'thumbnail');

                $product_html .= '<div class="thumb-wrap gall-img-wrap">';                   
                $product_html .=  '<img src="' . $src[0] . '" class="gall-img" alt="Product image" fullurl="'. $link .'" />';
                $product_html .= '</div>';
                }
                $product_html .= '</div>';
              endif;

              $product_html .= '<div class="az-link">';
              $product_html .= '<a href="" target="_blank">BUY</a>';
              $product_html .= '<span> from Amazon</span>';
              $product_html .= '</div>';

            $product_html .= '</div>'; // .prod-left

            $product_html .= '<div class="prod-right">';

            $product_html .= '<div class="prod-back-img" style="background-image: url('.$back_img.')">';
            $product_html .= '</div>'; // .prod-back-img

            $product_html .= '</div>'; // .prod-right

            $product_html .= '</div>'; // .prod-outer

            echo $product_html;

			?>

		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
