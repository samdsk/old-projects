<?php /*Template Name: Portfolio*/?>
<?php require_once('uploader/function.php');?>
<?php get_header(); ?>
    <div id="mainContainerPortfolio">
    	<script type="application/javascript">
        var wp_url = "<?php $url_wp = get_bloginfo('template_url'); echo $url_wp;?>";
		console.log('wp_url is: '+wp_url);
        </script>
		<?php if(function_exists('imgLoader')){imgLoader();}?>
    </div>
<?PHP get_footer(); ?>