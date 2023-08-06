<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Nerds-Esport
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="msvalidate.01" content="647CDE6CF1FE492C7AB60EBC9ADD3195" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href=" <?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet"> 
<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
<link rel="shortcut icon" type="image/png" href="http://nerds-esport.com/favicon.png"/>

<!-- meta -->
<meta name=”description” content=”Nerds-eSport - Siamo un clan improntato principalmente su Battlefield e accettiamo sempre di buon grado nuovi membri” />
<link rel=”author” href=”https://plus.google.com/u/0/+SamDsk/about“/>
<meta property=”og:title” content=”Nerds-eSport | Gaming Community”/>
<meta property=”og:type” content=”website”/>
<meta property=”og:image” content=”http://nerds-esport.com/n/wp-content/themes/nerds/img/logo_main.png”/>
<meta property=”og:url” content=”http://nerds-esport.com”/>
<meta property=”og:description” content=”Nerds-eSport - Siamo un clan improntato principalmente su Battlefield e accettiamo sempre di buon grado nuovi membri”/>

<?php wp_head(); ?>

<link type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
    <!--[if lt IE 9]>
    	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/codedSlider.css" type="text/css" media="screen" />
    
     
<script type="text/javascript">
	/*function loader(){
		 document.getElementById("loader").style.display = "none";
         document.getElementById("loaded-content").style.display = "block";
		 console.log('loaded');
	}
	window.onload = loader;
	*/
	jQuery(document).ready(function() {
		$(".fancybox").fancybox();
		codedSlider(); 	

	});
</script>
</head>

<body <?php body_class(); ?>>
<!--<div id="loader">
	<h2 class="loader-text">Wait! we are loading...</h2>
</div>-->
<div id="loaded-content">
<?php include_once("analyticstracking.php") ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
    	<div id="head-img" class="img-head">
        	<!--<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            </a>-->
            <!--<img class="" src="<?php echo get_template_directory_uri(); ?>/img/header.png" />-->
        </div>
		<nav id="site-navigation" class="main-navigation" role="navigation">			
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
