<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package josh-cooks
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info max">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'josh-cooks' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'josh-cooks' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'josh-cooks' ), 'josh-cooks', '<a href="http://joshgreendesign.com/" rel="designer">Josh Green</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
