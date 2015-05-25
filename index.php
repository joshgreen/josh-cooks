<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package josh-cooks
 */

get_header(); ?>

  <div id="primary" class="content-area max">
    <main id="main" class="site-main" role="main">

      <?php
      $queryObject = new  Wp_Query( array(
          'showposts' => 5,
          'post_type' => array('recipe'),
          'orderby' => 1,
          ));

      // The Loop
      if ( $queryObject->have_posts() ) :
          $i = 0;
          while ( $queryObject->have_posts() ) :
              $queryObject->the_post();
              if ( $i == 0 ) : ?>
                  <div class="first-post">
                    <?php if (has_post_thumbnail()) {
                      echo '<div class="">';
                      echo the_post_thumbnail('blog-thumb');
                      echo '</div>';
                          }
                      ?>

                  </div>
              <?php endif;
               if ( $i != 0 ) : ?>
                  <div class="secondary-post">
                      <?php endif; ?>
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                          <?php the_title(); ?>
                      </a>
              </div>

              <?php $i++;

          endwhile;
      endif;?>



    </main><!-- #main -->

  </div><!-- #primary -->


<?php get_footer(); ?>
