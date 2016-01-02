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
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


<?php wp_head(); ?>
</head>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <a class="skip-link" href="#content"><?php _e( 'Skip to content', 'josh-cooks' ); ?></a>

<header id="masthead" class="site-header" role="banner">
  <div class="site-branding">
    <div class="logo">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php bloginfo('template_url'); ?>/images/logo-1.png" alt="<?php bloginfo( 'name' ); ?>" class="logo"></a></h1>

    </div>
  </div><!-- .site-branding -->
  <div id="header">
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

<div id="content" class="site-content">
