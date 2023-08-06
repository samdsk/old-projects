<?php session_start(); require_once('function.php'); ?>
<?php 
	if(function_exists('loginCheck')){loginCheck();}
	//if(function_exists('uploader')){uploader();}
?>
<!doctype html>
<html>
	<head>
    	<title>Uploader</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="">
        <script type='text/javascript' src='jquery.js'></script>		 
    </head>
    <body>
    <div id="interactive">
        <div id="log_funcs">
        	<?php if(function_exists('logout')){logout();} ?>
        	<h3 id="loginok"><?php if(function_exists('loginok')){loginok();} ?></h3> 
        </div>
    </div>
    <div id="fieldDiv">
        <fieldset id="uploaderFieldset">
            <legend>Upload your new works</legend>
            <form enctype="multipart/form-data" method="POST" action="uploader.php" id="uploaderForm">
            <lable>Project:</lable>
            <input type="text" required maxlength="50" placeholder="Project Name" autofocus name="project" class="project" id="uploaderInput"/><br>
            <lable>Image type:</lable>
            <input type="text" required maxlength="50" placeholder="Image Type" name="img_type" class="imageType" id="uploaderInput"/><br>
            <lable>Image title:</lable>
            <input type="text" required maxlength="50" placeholder="Image title" name="img_title" class="imageTitle" id="uploaderInput"/><br>
            <lable>Description:</lable>
            <input type="text" required maxlength="200" placeholder="Description" name="description" class="description" id="uploaderInput"/><br>
            <lable>Designer:</lable>
            <input type="text" required maxlength="50" placeholder="Designer Of progect" name="designer" class="designer" id="uploaderInput"/><br>
            <lable>Software used:</lable>
            <input type="text" required maxlength="50" placeholder="Software used" name="software" class="software" id="uploaderInput"/><br>
            Make album cover<input type="checkbox" name="album_cover" class="albumCover" id="uploaderInput" value="1"/><br>
            <div id="uploaderInputFileWrapper">
            <lable>Browse</lable>
            <input type="file" required name="img_file" class="choosefile" id="uploaderInputFile"/><br>
            </div>	
            <input type="submit" value="Upload" class="submit" id="uploaderInputSubmit"/><br></form>
        </fieldset>
	</div>
        <?php if(function_exists('uploader')){uploader();}	?>
    	<script type='text/javascript' src='js.js'></script>
    </body>
</html>

