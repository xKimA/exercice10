<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

///////////////////////////front-page.php ///////////////////////

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.

			//The Query
			$args = array( 'category_name' => 'evenement',
			 				'posts_per_page' => 3);
			$query1 = new WP_Query( $args );

			if ( $query1->have_posts() ) {
				// The Loop
			?>
			<div class ="wrapper2">
			<?php
				while ( $query1->have_posts() ) {
					$query1->the_post();
					/*echo '<li>' . get_the_title() . '</li>';*/
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				}
				?>
				</div>
				<?php
				/* Restore original Post Data 
				* NB: Because we are using new WP_Query we aren't stomping on the 
				* original $wp_query and it does not need to be reset with 
				* wp_reset_query(). We just need to set the post data back up with
				* wp_reset_postdata().
				*/
				wp_reset_postdata();
			}
			?>

 

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
