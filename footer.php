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
  <div class="top-bar">

      <div class="social">
        <ul>
          <li><a href="https://twitter.com/josh_cooks"><img src="images/twitter.svg"></a></li>
          <li><a href="https://instagram.com/_pixelpanda/"><img src="images/instagram.svg"></a></li>
          <li><a href="https://www.youtube.com/channel/UCywHUd9DjsW6WEjoZ9NNxgA"><img src="images/youtube.svg"></a></li>
          <li><a href="https://plus.google.com/u/2/b/107094187720810907704/107094187720810907704/about"><img src="images/googleplus.svg"></a></li>
          <li><a href="https://www.flickr.com/photos/joshpuffpuff/"><img src="images/flickr.svg"></a></li>
        </ul>
      </div> <!-- .social -->
      <div class="search-box">
        <?php get_search_form(); ?>
      </div> <!-- .search-box -->

  </div> <!-- .top-bar -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy; 2011 - <?php echo date("Y"); echo " "; bloginfo('name'); ?> by <a href="http://joshgreendesign.com/" rel="designer">Josh Green</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
