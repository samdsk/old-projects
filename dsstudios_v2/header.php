<?php require_once('functions.php'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />   
	<title>
    <?php
	
	global $page, $paged;
	bloginfo( 'name' );
	
	if(function_exists('urlcheck')){urlCheck();}
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if(is_front_page()){
		echo '';
	}
	$postTitle = get_the_title(); 
	if(is_single()){
		echo ' | Blog | '.$postTitle;
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | Blog | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?>
    </title>
	<link type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
    <link type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php bloginfo('template_url');  ?>/js/jquery.js"></script>
    
   	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Facebook Meta -->
    <meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/bg.jpg"/>
    <meta property="og:title" content="<?php $postTitle = get_the_title(); if($postTitle == "home"){echo "DsStudios | Sam. K.";}else{echo $postTitle;}  ?>"/>
    <meta property="og:url" content="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?> "/>
    <meta property="og:site_name" content="DsStudios | Sam K."/>
    <meta property="og:type" content="blog"/>
    <META NAME="google-site-verification" CONTENT="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34="/>
    <meta name="resource-type" content="website" />
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1I" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="author" content="Sam. K." />
    <meta name="contact" content="http://www.dsstudios.altervista.org/contact/" />
    <meta name="copyright" content="Copyright (c) Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Italy License. All Rights Reserved." />
    <meta name="description" content="
		<?php
		//description standard del blog
		$standard_desc = get_bloginfo( 'description', 'display' );
		
		if (  (is_home()) || (is_front_page())  ) {//in homepage
		
			echo $standard_desc;//scrive la descrizione standard
		
		} elseif (is_single() || is_page()) {//nelle altre pagine
		
		if (have_posts()) {//se c'è un post
			while (have_posts()) {
				
				the_post();
				$post_desc = get_the_excerpt();//ricava le prime 55 parole del post
				echo strip_tags( $post_desc );//scrive il riassunto senza i tag HTML
			}
		}
		} else {//se nessuna delle condizioni è vera
			echo $standard_desc;//scrive la descrizione standard
		}
		?>" />
	<meta name="keywords" content="
		<?php
		//lettura dei tags
		$posttags = get_the_tags();
		if ($posttags) {
			foreach($posttags as $tag) {
				echo $tag->name . ', ';
			}
		}
		?> dsstudios, sambigds, sam k, lil tips and tricks, wordpress blog, web design, graphic design, milano, italy" 
    />
    <meta name="google" content="notranslate" />
</head>

<body>
<div id="wrapper">
	<div id="header">
		<nav>
        	<div id="navContainer">
                <a href="<?php echo site_url();?>/home/" title="Home"><div class="btn btn-large"><li class="icon-home"></li></div></a>
                <a href="<?php echo site_url();?>/portfolio/" title="Portfolio"><div class="btn btn-large"><li class="icon-briefcase"></li></div></a>
                <a href="<?php echo site_url();?>/blog/" title="Blog"><div class="btn btn-large"><li class="icon-file"></li></div></a>
                <a href="<?php echo site_url();?>/contact/" title="Contact Me"><div class="btn btn-large"><li class="icon-envelope"></li></div></a>                
            </div>
            <div id="site_pop">                
                <span id="site_pop_up"></span>
            </div>
            <span id="maintain_on" style="background:#333;font-size:24px;padding:5px;font-weight:500;color:#fff;height:auto;position:relative;top:10px;">
            Site is under development. <a href="http://www.dsstudios.altervista.org/old" target="_self" >visit my old site</a>
            </span>
        </nav>
    </div>