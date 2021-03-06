<?php
/**
 * Template Name: FRONT
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
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
      $the_query  = new  WP_Query( array(
        'showposts' => 5,
        'post_type' => array('post', 'recipe', 'sousviderecipe'),
        'paged' => $paged,
        'order' => 'DESC',
        'orderby' => 'date'
        ));


      // The Loop
          if ( $the_query ->have_posts() ) :
              $i = 0;
              while ( $the_query ->have_posts() ) :
                  $the_query ->the_post();
                  if ( $i == 0 ) : ?>
                    <div class="first-blog-posts">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-link">
                        <?php if (has_post_thumbnail()) {
                        echo '<div class="first-image">';

                        echo the_post_thumbnail('feature-image');
                        echo '</div>';
                            }
                        ?>
                        <div class="post-box">
                          <h1 class="blog-title color-primary"><?php the_title(); ?></h1>
                          <?php the_excerpt(); ?>
                        </div>
                      </a>
                    </div>
                    <div class="small-blogs">
                  <?php endif;
                   if ( $i != 0 ) : ?>

                    <div class="blog-posts">
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
                    </div>



                   <?php   ?>

                    <?php endif; ?>



                  <?php $i++;

              endwhile;

//echo  the_posts_navigation();
?>

<section class="bottom-pagination">


<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav class="prev-next-posts">
    <h4>Navigation</h4>
    <div class="prev-posts-link">
      <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>
    </div>
    <div class="next-posts-link">
      <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
    </div>
  </nav>

<?php } ?>
</section>
<?php

          endif;?>


          </div> <!-- .small-blogs -->


    </main><!-- #main -->

  </div><!-- #primary -->


<?php get_footer(); ?>
