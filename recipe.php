<?php
/**
 * Template Name: Recipes Page
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
		<h1>recipe.php</h1>
			<?php
			    $args = array(
			      'post_type' => 'recipe',
			      'posts_per_page'         => '40'

			    );
			    $recipe = new WP_Query( $args );
			    if( $recipe->have_posts() ) {
			      while( $recipe->have_posts() ) {
			        $recipe->the_post();
			        ?>


			          <li class="holder">
			            <div class="email-design-main">

			            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			            	<?php
			            	    if (has_post_thumbnail()) {
			            	        echo '<div class="single-post-thumbnail clear">';
			            	        echo the_post_thumbnail('large-thumb');
			            	        echo '</div>';
			            	    }
			            	?>

			            	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			            </a>


			          </div> <!-- .email-design-main -->
			          </li> <!-- .holder -->

			        <?php
			      }
			    }
			    else { echo 'Oh no recipes!'; }
			 ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
