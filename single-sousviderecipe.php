<?php
/**
 * The template for displaying all single posts.
 *
 * @package josh-cooks
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<!-- <h1>single-sousviderecipe.php</h1> -->
    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content', 'sousviderecipe' ); ?>

      <?php naked_social_share_buttons(); ?>

      <?php the_post_navigation(); ?>

      <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      ?>

    <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
