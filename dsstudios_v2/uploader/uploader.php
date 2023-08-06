
<?php session_start(); require_once('function.php'); ?>
<?php if(function_exists('loginCheck')){loginCheck();}else{ header('location: index.php');} ?>
<!doctype html>
<html>
	<head>
    	<title>Uploader</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style_log.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <script type='text/javascript' src='jquery.js'></script>		 
    </head>
    <body>
    <div id="wrapper_u">
        <div id="fieldDiv">
        	<div id="log_funcs">                
                <h3 id="loginok"><?php if(function_exists('loginok')){loginok();} ?></h3> 
            </div>
            <fieldset id="uploaderFieldset">
                <legend><h1><strong>Upload Your New Works</strong></h1></legend>
                <form class="" enctype="multipart/form-data" method="POST" action="uploader.php" id="uploaderForm">                
                <div class="control-group">
                <input type="text" required maxlength="50" placeholder="Project Name" autofocus name="project" class="project" id="uploaderInput"/>
                <br>
                </div>
                <div class="control-group">
                <input type="text" required maxlength="50" placeholder="Image Type" name="img_type" class="imageType" id="uploaderInput"/>
                <br>
                </div>
                <div class="control-group">              	
                <input type="text" required maxlength="50" placeholder="Image title" name="img_title" class="imageTitle" id="uploaderInput"/>
                <br>
                </div>
                <div class="control-group">
                <input type="text" required maxlength="200" placeholder="Description" name="description" class="description" id="uploaderInput"/>
                <br>
                </div>
                <div class="control-group"> 
                <input type="text" required maxlength="50" placeholder="Designer Of progect" name="designer" class="designer" id="uploaderInput"/>
                <br>
                </div>
                <div class="control-group">
                <input type="text" required maxlength="50" placeholder="Software used" name="software" class="software" id="uploaderInput"/>
                <br><br>              
                <span class="make_d">Make album cover &nbsp;
                <input type="checkbox" name="album_cover" class="albumCover" id="uploaderInput" value="1"/>
                </span>
                <br>
                <br>
                <input type="file" required name="img_file" class="btn btn-large btn-primary" class="choosefile" id="uploaderInputFile"/>
                <br>
                <br>
                <br>
                <br>
                <input type="submit" value="Upload" class="btn btn-large btn-success" class="submit" id="uploaderInputSubmit"/>
                <br>
                <br>
                <?php if(function_exists('logout')){logout();} ?>
                <a id="index_u" class="btn btn-large btn-inverse" href="http://www.dsstudios.altervista.org">Index</a>
                </form>
            </fieldset>
        </div>
        <div id="interactive">

        </div>
	</div>
        <?php if(function_exists('uploader')){uploader();}	?>
    	<script type='text/javascript' src='js.js'></script>
    </body>
</html>

