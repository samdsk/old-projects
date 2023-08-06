<?php

function urlCheck($checker){
	$urls = $_SERVER['REQUEST_URI'];
	$urls = explode('/', $urls);
	
	$last_id = $urls[sizeof($urls)-2];
	
	if($checker===$last_id){
		$r = "active-menu-tab";
		return $r;
	}else{
		echo "error-url";
	}
}


?>