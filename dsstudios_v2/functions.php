<?php 

function urlCheck(){
	$urls = $_SERVER['REQUEST_URI'];
	$urls = explode('/', $urls);
	
	$last_id = $urls[sizeof($urls)-2];
	
	switch($last_id){

		case "portfolio": echo " | Portfolio";
			break;
		case "contact": echo " | Contact";
			break;
		case "blog": echo " | Blog";
			break;
		default: echo "";
	
	}

}
function new_excerpt_length($length){
	
	return 70;
}	
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more(){
	return ' <a id="read_more" href="'.get_permalink($post->ID).'">[Read More]</a>';
}
add_filter('excerpt_more','new_excerpt_more');



?>