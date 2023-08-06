<?php 
function error_report($errors){
	echo '<span id="error">Error: '.$errors.'</span>';
}
?>

<?php
function login(){
	if((isset($_SESSION['username'])&&isset($_SESSION['password']))==NULL){
		if(isset($_POST['username'])&&$_POST['username']!=NULL){
			$username = $_POST['username'];
			
			if(isset($_POST['password'])&&$_POST['password']!=NULL){
				$password = $_POST['password'];
					$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
					$db_select = mysql_select_db("my_dsstudios") or die(mysql_error());
					$query = mysql_query("SELECT * FROM login_tb WHERE username='$username' AND password='$password'");
					$num_rows = mysql_num_rows($query);
					
					if($num_rows>0){
						while($row=mysql_fetch_assoc($query)){
							$dbusername = $row['username'];
							$dbpassword = $row['password'];
						}
						if($dbusername===$username&&$dbpassword===$password){
							echo 'you are in';
							$_SESSION['username']=$dbusername;
							$_SESSION['password']=$dbpassword;
							mysql_close($db_connect);
							header('location: uploader.php');
							
						}else{//username and password checker level 1 
							error_report("invalide user level 2!");								
						}
					}else{//username and password checker level 1 				
						error_report("invalide user level 1!");
					}
			}else{//password checker
				error_report("password error!");
			}
		}else{//username checker
			error_report("Please log to upload");
		}
	}else{
		ses_login();
		//header('location: uploader.php');
	}
}//End login function...
?>

<?php 
function loginCheck(){
	if((isset($_SESSION['username'])&&isset($_SESSION['password']))==true){
				function loginok(){
			echo 'loginok';}			
		function logout(){
			echo '<input id="logout" type="button" value="Log out" onclick="location.href='."'logoutpage.php'".'"/>';}
		
	}else{	
		header('location: index.php');
	}
	
}
?>
<?PHP
function ses_login(){
	if(isset($_SESSION['username'])){
		$ses_log_username = $_SESSION['username'];
		
		if(isset($_SESSION['password'])){
			$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
			$db_select = mysql_select_db("my_dsstudios") or die(mysql_error());
				
			$ses_log_password = $_SESSION['password'];
			
			$ses_query = mysql_query("SELECT * FROM login_tb WHERE username='$ses_log_username' AND password='$ses_log_password'");
			$num_rows = mysql_num_rows($ses_query); 
			
			if($num_rows>0){
				
				while($row=mysql_fetch_assoc($ses_query)){
					$dbusername = $row['username'];
					$dbpassword = $row['password'];
				}
				
				if($ses_log_username===$dbusername&&$ses_log_password===$dbpassword){
					mysql_close($db_connect);
					header('location: uploader.php');					
			
				}else{//check ses username and password match with db
					error_report("db username and password error!");					
				}			
			}else{//check ses username and password are in db
				error_report("ses username and password error!");		
							}
		}else{//ses password checker
			error_report("ses username error!");	
		}
	}else{//ses username checker
		error_report("ses username error!");	
	}
}
?>

<?php
function uploader(){
if(	isset($_POST['project'])&&
	isset($_POST['img_type'])&&
	isset($_POST['img_title'])&&
	isset($_POST['description'])&&
	isset($_POST['designer'])&&
	isset($_POST['software'])&&
	isset($_FILES['img_file'])
){	
	$project = $_POST['project'];
	$img_title = $_POST['img_title'];	
	$img_type = $_POST['img_type'];
	$description = $_POST['description'];
	$designer = $_POST['designer'];
	$software = $_POST['software'];
	$file = $_FILES['img_file']['tmp_name'];
	$file_type = $_FILES['img_file']['type'];
	if(
		($file_type == 'image/jpeg') 
	||  ($file_type == 'image/png') 
	||  ($file_type == 'image/pjpeg')	
	||	($file_type == 'image/jpg')
	){
		if($_FILES['img_file']['size']<10000000){
			
			if($_FILES["img_file"]["error"] == NULL){
				
				$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
				$db_select = mysql_select_db('my_dsstudios') or die(mysql_error());
				
				$img_file = $file;
				$img_file_type = $file_type;
				$img_file_name = $_FILES['img_file']['name'];
				$img_file_size = $_FILES['img_file']['size'];
				
				$folder_path = "uploaded_images/";
				$dateinfo = date('d M Y H:i:s');
				
				$image_path = $folder_path.basename($img_file_name);
			
				$img_file_size_kb = ($img_file_size/1024);
				$img_file_size_kb = round($img_file_size_kb, 3);
				
				if(!file_exists($image_path)){
					if(move_uploaded_file($file,$image_path)){
						echo "<br/> The file ".  basename($img_file_name). " has been uploaded";
						$cover = ((isset($_POST['album_cover'])))? 1:0;
						echo $cover;

						
						$db_query = "INSERT INTO image_tb VALUES('','$project','$img_title','$img_type','$description','$designer','$software','$cover','$image_path','$img_file_type','$img_file_size_kb','$dateinfo')";
						
						mysql_query($db_query);
						
						cover($cover,$project,$img_title);
						
						mysql_close($db_connect);

					}else{
						error_report("Error during uploading!");
					}
				}else{error_report("File already exists!");}				
			}else{
				
				error_report("Error image!");
			}//End file error checker			
		}else{
			error_report("Please choose a file less than 10mb!");
		}//End size checker
	}else{
		
		error_report("Extension error!");
	}// End type checker
	
}// End first if...
}// End function uploader...
function cover($cover,$project,$img_title){
	if($cover === 1){
		$cover_reset_query = "UPDATE image_tb SET cover=0 WHERE project='$project'";
		$cover_set_query = "UPDATE image_tb SET cover=1 WHERE img_title='$img_title'";
		mysql_query($cover_reset_query);
		mysql_query($cover_set_query);
	}else{
		echo 'finished with cover=0';
	}
}
?>

<?php 
function imgLoader(){
	$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
	$db_select = mysql_select_db("my_dsstudios") or die(mysql_error());
	
$file_path = 'uploader/';
	
	$distinct_projects = "select distinct project from image_tb";
	//$get_cover_imgs = "select file_path from image_tb where cover=1";
	$get_cover_details = "select * from image_tb where cover=1";
	
	$db_projects = mysql_query($distinct_projects);

	$db_get_cover_details = mysql_query($get_cover_details);
	
	while($projects = mysql_fetch_assoc($db_projects)){
		$project[]=$projects['project'];		
	}
	//print_r($project);
	
	while($cover_details=mysql_fetch_assoc($db_get_cover_details)){
		$cover_img_path[] = $cover_details['file_path'];
		$cover_img_project[] = $cover_details['project'];
		$cover_img_title[] = $cover_details['img_title'];
		$cover_img_type[] = $cover_details['img_type'];
		$cover_img_des[] = $cover_details['description'];
		$cover_img_designer[] = $cover_details['designer'];
		$cover_img_soft[] = $cover_details['software'];
		$cover_img_date[] = $cover_details['date_info'];
				
	}
	//print_r($cover_img_path);
		
	$projects_lenght = count($project);

	for($count = $projects_lenght-1; $count>=0; $count--){

		$project_img_path = NULL;
		$project_img_project = NULL;
		$project_img_title = NULL;
		$project_img_type = NULL;
		$project_img_des = NULL;
		$project_img_designer = NULL;
		$project_img_soft = NULL;
		$project_img_date = NULL;
		
		$project_to_get = $cover_img_project[$count];
		$project_imgs = "select * from image_tb where project='$project_to_get'";
		$db_project_imgs = mysql_query($project_imgs);
		
		
		while($r_project_imgs = mysql_fetch_array($db_project_imgs)){
			$project_img_path[] = $r_project_imgs['file_path'];
			$project_img_project[] = $r_project_imgs['project'];
			$project_img_title[] = $r_project_imgs['img_title'];
			$project_img_type[] = $r_project_imgs['img_type'];
			$project_img_des[] = $r_project_imgs['description'];
			$project_img_designer[] = $r_project_imgs['designer'];
			$project_img_soft[] = $r_project_imgs['software'];
			$project_img_date[] = $r_project_imgs['date_info'];
			

		}
				
		$project_img_lenght = count($project_img_project);
		

		for($p_count = 0; $p_count<$project_img_lenght ; $p_count++ ){
			
			$p_imgDetails = getimagesize($file_path.$project_img_path[$p_count]);
			
			$p_width = $p_imgDetails[0];
		
			$p_width = $p_width/2;
		
			$p_height = $p_imgDetails[1];
		
			$p_height = $p_height/2;
			
			echo(' <img id="projectImg"   style="display:none;" width="'.$p_width.'" height="'.$p_height.'" alt="'.$project_img_project[$p_count].'--'
				.$project_img_title[$p_count].'--'
				.$project_img_type[$p_count].'--'
				.$project_img_des[$p_count].'--'
				.$project_img_designer[$p_count].'--'
				.$project_img_soft[$p_count].'" src="'.$file_path.$project_img_path[$p_count].'"/>
				
			');
		}
		
		$imgDetails = getimagesize($file_path.$cover_img_path[$count]);
		
		$date_info = explode(' ',$cover_img_date[$count]);
		
		$width = $imgDetails[0];
		
		$width = $width/2;
		
		$height = $imgDetails[1];
		
		$height = $height/2;
		
		
		
		
		echo ('	<div id="post'.$count.'" class="portfolioPost">
					<div id="whiteBorder">
						<div id="imgContainer">
							<a id="activateBox" href="JavaScript:void(0);">
								<img id="cover" src="'.$file_path.$cover_img_path[$count].'" width="'.$width.'" height="'.$height.'" alt="'.$project[$count].'"/>
							</a>
						</div>
						<div id="infoContainer" >							
							<div id="projectHead">
									<span id="projectTitle" title="Project Name">'.$cover_img_project[$count].'</span>
								<div id="dateLoaded" >
									<span id="projectDate">'.$date_info[0].'</span>
									<li id="arrowUp" class="icon-chevron-down"></li>
									<span id="projectMonth">'.$date_info[1].'</span>
									
									<span id="projectYear">'.$date_info[2].'</span>
									<li id="arrowDown" class="icon-chevron-up"></li>
								</div>
							</div>
							<div id="otherInfo">
								<span id="imgTitle" title="Image Name">'.$cover_img_title[$count].'</span>
								<span id="imgType" title="Image Type">'.$cover_img_type[$count].'</span>
								<span id="imgDes" title="Description">'.$cover_img_des[$count].'</span>
								<span id="imgDesigner" title="Designer">'.$cover_img_designer[$count].'</span>
								<span id="imgSoft" title="Software">'.$cover_img_soft[$count].'</span>
							</div>							
						</div>
					</div>
				</div>');
	}
mysql_close($db_connect);
}
?>