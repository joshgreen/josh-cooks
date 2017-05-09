<?php
/**
 * Template Name: Ingredients Page
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
    <h4><?php the_breadcrumb(); ?></h4>


<!--    <h1>ingredients.php</h1> -->
      <ul class="recipe-list">
      <?php
          $args = array(
            'post_type' => 'ingredient',
            'posts_per_page'         => '40'

          );
          $ingredient = new WP_Query( $args );
          if( $ingredient->have_posts() ) {
            while( $ingredient->have_posts() ) {
              $ingredient->the_post();
              ?>


                <li class="holder">
                  <div class="ingredients">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-link">
                        <?php if (has_post_thumbnail()) {
                        echo '<div class="blog-image">';
                        echo the_post_thumbnail('blog-thumb');
                        echo '</div>';
                        }
                        ?>
                        <div class="blog-title">
                          <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="blog-text">
                          <?php the_excerpt(); ?>
                        </div>

                      </a>
                </div> <!-- .ingredients -->
                </li> <!-- .holder -->

              <?php
            }
          }
          else { echo 'Oh no ingredients!'; }
       ?>
      </ul> <!-- .recipe-list -->
    </main><!-- #main -->
  </div><!-- #primary -->


<?php get_footer(); ?>
