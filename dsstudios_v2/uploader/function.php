<?php require_once('db.php');  ?>
<?php 
function error_report($errors){
	echo '<span id="error">Error: '.$errors.'</span>';
}
?>

<?php

function login(){
	global $db, $db_host, $db_user, $db_psw;
	if((isset($_SESSION['username'])&&isset($_SESSION['password']))==NULL){
		if(isset($_POST['username'])&&$_POST['username']!=NULL){
			$username = $_POST['username'];
			
			if(isset($_POST['password'])&&$_POST['password']!=NULL){
				$password = $_POST['password'];
					$db_connect = mysql_connect($db_host, $db_user, $db_psw) or die(mysql_error());
					$db_select = mysql_select_db($db) or die(mysql_error());
					$query = mysql_query("SELECT * FROM login_tb WHERE username='$username' AND password='$password'");
					$num_rows = mysql_num_rows($query);
					
					if($num_rows>0){
						while($row=mysql_fetch_assoc($query)){
							$dbusername = $row['username'];
							$dbpassword = $row['password'];
						}
						if($dbusername===$username&&$dbpassword===$password){
							echo 'you are in';
							if(isset($_POST['save'])){
								$_SESSION['username']=$dbusername;
								$_SESSION['password']=$dbpassword;
							}else{
								setcookie('us',$username,time()+60);
								setcookie('ps',$password,time()+60);
							}
							mysql_close($db_connect);
							header('location: uploader.php');
							
						}else{//username and password checker level 1 
							error_report("Unauthorized User!");								
						}
					}else{//username and password checker level 1 				
						error_report("Invalide User Retype Credentials!");
					}
			}else{//password checker
				error_report("Password error!");
			}
		}else{//username checker
			error_report("Please Insert Your Credentials!");
		}
	}else{
		ses_login();
		//header('location: uploader.php');
	}
}//End login function...

function loginok(){
	echo 'loginok';}			
function logout(){
	echo '<input id="logout" class="btn btn-large btn-danger" type="button" value="Log out" onclick="location.href='."'logoutpage.php'".'"/>';}

function loginCheck(){
	global $db_host, $db_user, $db_psw, $db;
	if(isset($_SESSION['username'])){
		
		$ses_log_username = $_SESSION['username'];
		
		$db_connect = mysql_connect($db_host, $db_user, $db_psw) or die(mysql_error());
		$db_select = mysql_select_db($db) or die(mysql_error());
		$query = mysql_query("SELECT * FROM login_tb WHERE username='$ses_log_username'");
		$num_rows = mysql_num_rows($query);

		if($num_rows>0){
				
				while($row=mysql_fetch_assoc($query)){
					$dbusername = $row['username'];
					
				}
				
				if($ses_log_username===$dbusername){
					mysql_close($db_connect);
					
					$ses_log_password = $_SESSION['password'];
					
					$db_connect = mysql_connect($db_host, $db_user, $db_psw) or die(mysql_error());
					$db_select = mysql_select_db($db) or die(mysql_error());
					$query = mysql_query("SELECT * FROM login_tb WHERE password='$ses_log_password'");
					$num_rows = mysql_num_rows($query);					
					
					if($num_rows>0){
					
						while($row=mysql_fetch_assoc($query)){
							
							$dbpassword = $row['password'];
						}
						
						if($ses_log_password===$dbpassword){
							mysql_close($db_connect);
												
						
						}else{//check ses username and password match with db
							error_report("db password error!");					
						}			
					}else{//check ses username and password are in db
						error_report("ses password error!");		
					}	
					
				}else{//check ses username and password match with db
					error_report("db username error!");					
				}			
		}else{//check ses username and password are in db
			error_report("ses username error!");
		}
						
	}elseif(isset($_COOKIE['us'])){
		$cok_log_username = $_COOKIE['us'];
		
		$db_connect = mysql_connect($db_host, $db_user, $db_psw) or die(mysql_error());
		$db_select = mysql_select_db($db) or die(mysql_error());
		$query = mysql_query("SELECT * FROM login_tb WHERE username='$cok_log_username'");
		$num_rows = mysql_num_rows($query);

		if($num_rows>0){
				
				while($row=mysql_fetch_assoc($query)){
					$dbusername = $row['username'];
					
				}
				
				if($cok_log_username===$dbusername){
					mysql_close($db_connect);
					
					$cok_log_password = $_COOKIE['ps'];
					
					$db_connect = mysql_connect($db_host, $db_user, $db_psw) or die(mysql_error());
					$db_select = mysql_select_db($db) or die(mysql_error());
					$query = mysql_query("SELECT * FROM login_tb WHERE password='$cok_log_password'");
					$num_rows = mysql_num_rows($query);					
					
					if($num_rows>0){
					
						while($row=mysql_fetch_assoc($query)){
							
							$dbpassword = $row['password'];
						}
						
						if($cok_log_password===$dbpassword){
							mysql_close($db_connect);
												
						
						}else{//check ses username and password match with db
							error_report("cuk db password error!");					
						}			
					}else{//check ses username and password are in db
						error_report("cuk password error!");		
					}	
					
				}else{//check ses username and password match with db
					error_report("cuk db username error!");					
				}			
		}else{//check ses username and password are in db
			error_report("cuk username error!");
		}
	}else{			
		header('location: index.php');
		
	}
	
}

function ses_login(){
	global $db, $db_host, $db_user, $db_psw;
	if(isset($_SESSION['username'])){
		$ses_log_username = $_SESSION['username'];
		
		if(isset($_SESSION['password'])){
			$db_connect = mysql_connect($db_host, $db_user, $db_psw) or die(mysql_error());
			$db_select = mysql_select_db($db) or die(mysql_error());
				
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
	}elseif(isset($_COOKIE['us'])&&isset($_COOKIE['ps'])){
		header('location: uploader.php');
	}
	else{//ses username checker
		error_report("ses username error!");	
	}
}

function uploader(){
global $db, $db_host, $db_user, $db_psw, $url_ds;
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
				
				$db_connect = mysql_connect($db_host, $db_user, $db_psw) or die(mysql_error());
				$db_select = mysql_select_db($db) or die(mysql_error());
				
				$img_file = $file;
				$img_file_type = $file_type;
				$img_file_name = $_FILES['img_file']['name'];
				$img_file_size = $_FILES['img_file']['size'];
				
				$img_file_name = str_replace(' ','_', $img_file_name);
				
				$folder_path = "uploaded_images/";
				$dateinfo = date('d M Y H:i:s');
				echo ' this folder path: '.$folder_path;
				$image_path = $folder_path.basename($img_file_name);
				echo $image_path;
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
	if($cover == 1){
		$cover_reset_query = "UPDATE image_tb SET cover=0 WHERE project='$project'";
		$cover_set_query = "UPDATE image_tb SET cover=1 WHERE img_title='$img_title'";
		mysql_query($cover_reset_query);
		mysql_query($cover_set_query);
		
	}else{
		$cover_check_query = mysql_query("SELECT * FROM image_tb WHERE project='$project' AND cover=1");
		$cover_check_num = mysql_num_rows($cover_check_query);
		
		if($cover_check_num==0){
		
			$cover_reset_query = "UPDATE image_tb SET cover=0 WHERE project='$project'";
			$cover_set_query = "UPDATE image_tb SET cover=1 WHERE img_title='$img_title'";
			mysql_query($cover_reset_query);
			mysql_query($cover_set_query);	
			
			echo 'finished with cover=1 because this was the first image!';
				
		}else{
		
			echo 'finished with cover=0';
		}
	}
}
 
function imgLoader(){
global $db, $db_host, $db_user, $db_psw, $url_wp_up;	
	$db_connect = mysql_connect($db_host, $db_user, $db_psw) or die(mysql_error());
	$db_select = mysql_select_db($db) or die(mysql_error());
		
	
	$file_path = $url_wp_up.'/uploader/';
	//echo 'file_path is : '.$file_path;
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
		
		$width_tt = $imgDetails[0];
		
		
		
		$height_tt = $imgDetails[1];
		
		
		
		$width_th = ((200*$width_tt)/$height_tt); //$width/2;
		$width = ($width_th<300)?$width_th+50:$width_th;
		
		$height_th = (($width_th*$height_tt)/$width_tt); //$height/2;
		$height = (($width_th<300)&&($height_th<200))?$height_th+50:$height_th;
		
		$width = round($width);
		$height = round($height);
		
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
}
?>