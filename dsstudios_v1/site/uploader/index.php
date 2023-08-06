<?php session_start(); require_once('function.php'); ?>
<!DOCTYPE html>
<html>
	<head>
    	<title>index</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="">
        <script type='text/javascript' src='jquery.js'></script>		 
    </head>
    <body>
        <div id="login">	
            <fieldset id="loginForm">
                <legend id="loginFormLegend">STAFF AREA</legend>
                <form  action="index.php" method="POST" enctype="application/x-www-form-urlencoded"> 
                <input id="loginInput" class="username" type="text" name="username" autofocus placeholder="Username" maxlength="30"/>
                <input id="loginInput" class="password" type="password" name="password" placeholder="Password" maxlength="15"/>
                <input id="loginInput" class="submit" type="submit" value="Login" onClick="window.location.reload" />
                </form>
            </fieldset>
            <?php if(function_exists('login')){login();} ?>
		</div>
        <div id="interactive">
        	<h2></h2>
        </div>
        <script type='text/javascript'>


        </script>
    	<script type='text/javascript' src="js.js"	></script>
    </body>
</html>
