<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Todd Productions Inc.
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer hidden-xs" role="contentinfo">
		<div class="site-info container">
		<nav class="footer-nav">
			<?php

			if( has_nav_menu( 'footer-menu' ) ){
				wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'footer-menu' ) );
				}
				
			?>

		</nav><!--footer-nav-->

		<div class="footer-note text-center">
		<?php bloginfo( 'name' ); ?> - <?php echo bloginfo('description'); ?><br/>
				<small><?php echo date("Y"); ?> Website Developed By <a href="http://toddproductions.com" target="_blank">Todd Productions Inc.</a></small>
		</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
