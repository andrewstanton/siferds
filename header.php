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

	<div id="top-bar">
		<div class="container">
			<div class="d-inline mr-5">
				<i class="fas fa-envelope"></i> <?php echo get_theme_mod('siferds_email'); ?>
			</div>
			<div class="d-inline mr-5">
				<i class="fas fa-phone"></i> <?php echo get_theme_mod('siferds_phone'); ?>
			</div>
			<div class="d-inline social-icons">
				<a href="<?php echo get_theme_mod('siferds_fb'); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
			</div>

		</div>
	</div>

	<header id="masthead" class="site-header" role="banner">
	<div class="container">
	<div class="row">

	<div class="col-12 col-md-5">
		<div class="logo">
			<?php 
				echo '<a href="'.get_home_url().'" title="Home Page">';
			?>
			<div class="row">
				<div class="col-auto">
					<span class="tree-block"><i class="fas fa-tree"></i></span>
				</div>
				<div class="col">
				<?php
					echo bloginfo( 'name' ) . '<br/>';
				?>
				<span class="sub-logo"> <?php echo bloginfo( 'description' ); ?></span>
				</div>
			</div><!--row-->
			<?php echo '</a>'; ?>
		</div><!--logo-->
	</div>
	<div class="col-md col-12">

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="mobile-menu-button-container"><button class="menu-toggle btn btn-primary btn-block" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i> <?php esc_html_e( 'Navigation', 'big_trees' ); ?></button></div>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</div>

	</div><!--row-->
	</div><!--.container-->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
