<?php
	session_start();
	if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		
		if((isset($_SESSION['username'])&&isset($_SESSION['password']))==NULL){
			echo 'You had Log out!';
			header('Location: index.php');
		}	
	}
?>