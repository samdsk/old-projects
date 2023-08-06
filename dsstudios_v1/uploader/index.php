<?php	session_start();	include('functions.php');	?>
<!DOCTYPE html>
<html>
	<head>
    	<title>Uploader</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type='text/javascript' src='jquery.js'></script>
		<script type='text/javascript' src='js.js'></script>    	
    </head>
    <body>
    <div id="staffArea">
        <div id="login">	
            <fieldset id="loginForm">
                <legend id="loginFormLegend">STAFF AREA</legend>
                <form  action="index.php" method="POST" enctype="application/x-www-form-urlencoded"> 
                <input id="loginInput" class="username" type="text" name="username" autofocus placeholder="Username" maxlength="30"/>
                <input id="loginInput" class="password" type="password" name="password" placeholder="Password" maxlength="15"/>
                <input id="loginInput" class="submit" type="submit" value="Login" onClick="window.location.reload" />
                </form>
            </fieldset>
            <?php login();	?>
            <div id="log_funcs">
                <?php if(function_exists('logout')){logout();} ?>
                <h3><?php if(function_exists('error_report')){error_report();} ?></h3>
                <h3 id="loginok"><?php if(function_exists('loginok')){loginok();} ?></h3> 
  
            </div>
        </div>
    </div>
    
    <?php uploader();	?>
    <div id="lastLogin">
    	<?PHP if(function_exists('last_login')){last_login();} ?>
    </div>  
    <h3 id="loginok"><?php if(function_exists('image_uploading_error_report')){image_uploading_error_report();} ?></h3>
    <div id="uploaded_image_details">
    <?php if(function_exists('last_image_loaded_func')){last_image_loaded_func();} ?>
    </div>
    <div id="showImages">
    	<?PHP if(function_exists('call_loaded_images')){call_loaded_images();} ?>
    </div>            
	<script type="application/javascript">
    	<?php if(function_exists('uploader_query')){uploader_query();} ?>
    </script>

	<script type="text/javascript" >
	
	/*$(document).load(function() {
		

		var imgs = document.getElementsByTagName('img');
		var imgLength = imgs.length;
		
		for(var i=0; i<= imgLength-1;i++){
			
			var imgWidth = imgs[i].clientWidth;
			var imgHeight = imgs[i].clientHeight;
		
			$('img').eq(i).attr({width:imgWidth, height: imgHeight});
		
			console.log(imgWidth);
		}
		
		console.log(imgLength);	

    });*/
	
	$(document).ready(function() {


     var imgs = $('img');
	 
     var imgLength = imgs.length;

     for(var i=0; i<= imgLength-1;i++){

         var imgWidth = imgs[i].clientWidth;
         var imgHeight = imgs[i].clientHeight;
		 
		 var imgWH = imgWidth/2;
		 var imgHH = imgHeight/2;

         $('img').eq(i).attr({width:imgWH, height: imgHH});

         console.log(imgWidth);
     }

     console.log(imgLength); 

	});

	
	
    </script>
    </body>  
</html>