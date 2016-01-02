<?php
/**
 * @package josh-cooks
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	    if (has_post_thumbnail()) {
	        echo '<div class="single-post-thumbnail clear">';
	        echo the_post_thumbnail('feature-image');
	        echo '</div>';
	    }
	?>

	<header class="entry-header">
<!-- 	<h1>content-recipe.php</h1> -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php josh_cooks_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'josh-cooks' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php naked_social_share_buttons(); ?>
		<?php josh_cooks_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
