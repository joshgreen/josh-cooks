<?php
/**
 * Template Name: Sousviderecipe Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package josh-cooks
 */

get_header(); ?>

	<div id="primary" class="content-area max">
		<main id="main" class="site-main" role="main">
<!-- 		<h1>Sousviderecipe.php</h1> -->

			            <table class="sous-vide-table">
			            	<tr>
			            		<th>Food</th>
			            		<th>Temperature</th>
			            		<th>Cooking time</th>
			            	</tr>
			<?php
			    $args = array(
			      'post_type' => 'sousviderecipe',
			      'posts_per_page'         => '40'

			    );
			    $recipe = new WP_Query( $args );
			    if( $recipe->have_posts() ) {
			      while( $recipe->have_posts() ) {
			        $recipe->the_post();
			        ?>





			            	<tr>
			            		<td>
					            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						            	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						            </a>
			            		</td>
			            		<td><?php the_field('temperature'); ?></td>
			            		<td><?php the_field('cooking_time'); ?></td>





			        <?php
			      }
			    }
			    else { echo 'Oh no Sous vide recipes!'; }
			 ?>
	  	</tr>
    </table>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
