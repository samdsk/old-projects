<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Shape
 * @since Shape 2.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="We are a Multigaming Clan for Fun. With no restrictions but Sempre fidelis! Hooah!" /> 
    <!-- Twitter Card data -->
	<meta name="twitter:card" value="summary">
    
    <!-- Google Authorship and Publisher Markup -->
    <link rel="author" href="https://plus.google.com/106770991066429307773/posts"/>
    <link rel="publisher" href="https://plus.google.com/114653403747877734908/114653403747877734908"/> 
    
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="The Division - Multigaming">
    <meta itemprop="description" content="This is the page description">
    <meta itemprop="image" content="http://www.thedivision.altervista.org/image.jpg"> 
    
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@sambigds">
    <meta name="twitter:title" content="The Division">
    <meta name="twitter:description" content="We are a Multigaming Clan for Fun. With no restrictions but Sempre fidelis! Hooah!">
    <meta name="twitter:creator" content="@sambigds">
    
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="http://thedivision.altervista.org/image.jpg"> 
    
    <!-- Open Graph data -->
    <meta property="og:title" content="Multigaming Clan - The Division" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.thedivision.altervista.org/" />
    <meta property="og:image" content="http://www.thedivision.altervista.org/image.jpg" />
    <meta property="og:description" content="We are a Multigaming Clan. With no restrictions but Sempre fidelis! Hooah!" /> 
    <meta property="og:site_name" content="The Division" />
    <meta property="fb:admins" content="1447969768801851" />    
    
    <title><?php
		/*
		* Print the <title> tag based on what is being viewed.
		*/
		global $page, $paged;
		 
		wp_title( '|', true, 'right' );
		 
		// Add the blog name.
		bloginfo( 'name' );
		 
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
		 
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );
     
    ?></title>
    
    <link type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--start Bootstrap -->
    <link href=" <?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">    
 
    <!-- End Bootstrap -->
    <!--[if lt IE 9]>
    	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
     <header id="masthead" class="site-header" role="banner">     
          <hgroup>          	
          	<img id="header_img" src="<?php echo get_template_directory_uri(); ?>/img/clan_logo.png" alt="header_clan_logo" />
          	     <h1 class="site-title h1">
                 	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<strong><?php bloginfo( 'name' ); ?></strong>
                    </a>
                </h1>
     			<h2 class="site-description h4"><?php bloginfo( 'description' ); ?></h2>
          </hgroup>
          <div id="nav_group">
              <nav role="navigation" class="site-navigation main-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
              </nav><!-- .site-navigation .main-navigation -->
          </div>
     </header><!-- #masthead .site-header -->
