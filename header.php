<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Todd Productions Inc.
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
	<div class="container">
	<div class="row">

	<div class="col-12 col-md-4">
		<?php 
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		?>
		
		<div class="logo">
			<a href="<?php echo get_home_url(); ?>" title="<?php echo get_bloginfo('name') . " Home Page"; ?>">
				<img src="<?php echo $image[0]; ?>"/>
			</a>
		</div><!--logo-->
	</div>
	<div class="col-md col-12">

		<div class="top-header">
		
			<div class="d-inline mr-4">
				<i class="fas fa-phone"></i> <span class="phone-number-text"><?php echo get_theme_mod('siferds_phone'); ?></span>
			</div>
			<div class="d-md-inline d-sm-none d-none social-icons">
				
				<?php if(get_theme_mod('siferds_fb')): ?>
				
				<a href="<?php echo get_theme_mod('siferds_fb'); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
				
				<?php endif; if(get_theme_mod('siferds_twitter') !== '' && get_theme_mod('siferds_twitter') !== 'twitter.com' && get_theme_mod('siferds_twitter') !== 'http://twitter.com'):?>

				<a href="<?php echo get_theme_mod('siferds_twitter'); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
				
				<?php endif; ?>
			</div><!--social-icons-->

		</div><!--top-header-->
		<div class="header-nav">
		
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="mobile-menu-button-container"><button class="menu-toggle btn btn-primary btn-block" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i> <?php esc_html_e( 'Navigation', 'siferds' ); ?></button></div>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

		</div><!--header-nav-->

	</div>

	</div><!--row-->
	</div><!--.container-->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
