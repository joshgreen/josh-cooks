<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package josh-cooks
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<base href="<?php bloginfo( 'template_url' ); ?>/">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">



<?php wp_head(); ?>
</head>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <a class="skip-link" href="#content"><?php _e( 'Skip to content', 'josh-cooks' ); ?></a>
<div id="content" class="site-content">
<header id="masthead" class="site-header" role="banner">
  <div class="site-branding <?php if(is_front_page() ) { ?><?php echo 'current-item'; ?><?php }?>">
    <div class="logo">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php bloginfo('template_url'); ?>/images/logo-1.png" alt="<?php bloginfo( 'name' ); ?>" class="logo"></a></h1>

    </div>
  </div><!-- .site-branding -->
  <div id="header" class="site-navigation">
    <nav>
       <?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_id' => '',
        'depth' => 2,
        // This one is the important part:
        'walker' => new Custom_Walker_Nav_Menu
      )); ?>


    </nav>
  </div> <!-- .site-navigation -->
</header>
