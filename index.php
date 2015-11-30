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

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php
      $queryObject = new  WP_Query( array(
        'showposts' => 5,
        'post_type' => array('post', 'recipe'),
        'orderby' => 0,
        ));


      // The Loop
          if ( $queryObject->have_posts() ) :
              $i = 0;
              while ( $queryObject->have_posts() ) :
                  $queryObject->the_post();
                  if ( $i == 0 ) : ?>
                    <div class="first-blog-posts">
                      <?php if (has_post_thumbnail()) {
                      echo '<div class="first-image">';
                      echo the_post_thumbnail('blog-thumb');
                      echo '</div>';
                          }
                      ?>
                      <div class="post-box">
                        <h2 class="blog-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                        <div class="buttonbox">
                          <a href="<?php the_permalink(); ?>" class="button-primary" title="<?php the_title(); ?>">Read more</a>
                        </div>
                      </div>
                    </div>
                    <div class="small-blogs">
                  <?php endif;
                   if ( $i != 0 ) : ?>

                    <div class="blog-posts">
                      <?php if (has_post_thumbnail()) {
                      echo '<div class="blog-image">';
                      echo the_post_thumbnail('blog-thumb');
                      echo '</div>';
                      }
                      ?>
                      <div class="blog-title">
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                      </div>
                      <div class="blog-text">
                        <?php the_excerpt(); ?>
                      </div>


                      <div class="blog-button">
                        <a href="<?php the_permalink(); ?>" class="button-primary" title="<?php the_title(); ?>">Read more</a>
                      </div>
                    </div>
                    <?php endif; ?>


                  <?php $i++;

              endwhile;
          endif;?>
          </div> <!-- .small-blogs -->



    </main><!-- #main -->

  </div><!-- #primary -->


<?php get_footer(); ?>
