<?php session_start(); require_once('function.php'); ?>

<!DOCTYPE html>
<html>
	<head>
    	<title>Uploader</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style_log.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script type='text/javascript' src='jquery.js'></script>		 
    </head>
    <body>
    <div id="wrapper_i">
        <div id="login">	
            <fieldset id="loginForm">
                <legend id="loginFormLegend"><h1><strong>Staff Area</strong></h1></legend>
                <form  action="index.php" class="" method="POST" enctype="application/x-www-form-urlencoded"> 
                <input id="loginInput" class="username" type="text" name="username" autofocus placeholder="Username" maxlength="30"/>
                &nbsp;
                <input id="loginInput" class="password" type="password" name="password" placeholder="Password" maxlength="15"/>
                &nbsp; &nbsp;        
                <input id="loginInput" class="btn btn-large btn-primary" type="submit" value="Login" onClick="window.location.reload" /><br/>
                <span class="checkbox_d"><input id="loginInput"  type="checkbox" name="save" />&nbsp; I'll be back! &nbsp; &nbsp;</span>
                <br/><br/>
				<?php if(function_exists('login')){login();} ?>
                </form>
            </fieldset>
		</div>
        <a id="index_i" class="btn btn-large btn-inverse" href="http://www.dsstudios.altervista.org">Index</a>
	</div>
        <script type='text/javascript'>
        </script>
    	<script type='text/javascript' src="js.js"	></script>
    </body>
</html>
