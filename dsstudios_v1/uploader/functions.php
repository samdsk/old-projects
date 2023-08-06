<?php //login function

function login(){
	if((isset($_SESSION['username'])&&isset($_SESSION['password']))==NULL){	
		if(isset($_POST['username'])&&isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			if($username&&$password){
				
				$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
				$db_select = mysql_select_db("my_dsstudios") or die(mysql_error());
				
				$query = mysql_query("SELECT * FROM login_tb WHERE username='$username'");
				
				$num_rows = mysql_num_rows($query);
				if($num_rows==1){
					
					while($row=mysql_fetch_assoc($query)){
						$dbusername = $row['username'];
						$dbpassword = $row['password'];
					}
					
					if($username==$dbusername&&$password==$dbpassword){
						$_SESSION['username']=$dbusername;
						$_SESSION['password']=$dbpassword;
						
						$ses_username = $_SESSION['username'];
						$ses_password = $_SESSION['password'];
						
						//echo $ses_username.' '.$ses_password;
						function uploader_query(){
							echo '
							$(document).ready(function(){
								openUploader();
							});';
						}
						function loginok(){
							echo 'Welcome DsStudios!';
							


						}
						function logout(){
							echo '<input id="logout" type="button" value="Log out" onclick="location.href='."'logoutpage.php'".'"/>';
						}					
						
					}else{
						function error_report(){
							echo "Ops! Password typed it's look like a wrong password!";		
						}
					}		
					
				}else{
					function error_report(){
						echo "Ops! I think that you're not authorized for this section!";		
					}
				}
				
			}else{
				function error_report(){
					echo "Ops! something went wrong re-enter your username and password!";		
				}
			}
		}
	}else{
		ses_login();
	}
}
?>

<?PHP
	function ses_login(){
		if(isset($_SESSION['username'])&&isset($_SESSION['password'])){
			$ses_log_username = $_SESSION['username'];
			$ses_log_password = $_SESSION['password'];
			
			$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
			$db_select = mysql_select_db("my_dsstudios") or die(mysql_error());	
			
			$ses_query = mysql_query("SELECT * FROM login_tb WHERE username='$ses_log_username'");
			$num_rows = mysql_num_rows($ses_query); 
			
			if($num_rows==1){
				
				while($row=mysql_fetch_assoc($ses_query)){
					$dbusername = $row['username'];
					$dbpassword = $row['password'];
				}
				
				if($ses_log_username==$dbusername&&$ses_log_password==$dbpassword){
					
					//echo $ses_log_username.' '.$ses_log_password;
					function uploader_query(){
						echo '
						$(document).ready(function(){
							openUploader();
						});';
					}
					function loginok(){
						echo 'Welcome DsStudios!';
						
						
					}
					function logout(){
						echo '<input id="logout" type="button" value="Log out" onclick="location.href='."'logoutpage.php'".'"/>';
					}				
					

				}else{
					function error_report(){
						echo "Ops! Password typed it's look like a wrong password!";		
					}
				}			
			}else{
				function error_report(){
					echo "Ops! I think that you're not authorized for this section!";		
				}
			}
		}
	}
?>
<?php
function uploader(){
	if(	isset($_POST['progect'])&&
		isset($_POST['image_type'])&&
		isset($_POST['image_title'])&&
		isset($_POST['description'])&&
		isset($_POST['designer'])&&
		isset($_POST['software'])&&
		isset($_FILES['image_file'])
	){	
		$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
		$db_select = mysql_select_db("my_dsstudios") or die(mysql_error());
		
		$progect = $_POST['progect'];
		$image_type = $_POST['image_type'];
		$image_title = $_POST['image_title'];
		$description = $_POST['description'];
		$designer = $_POST['designer'];
		$software = $_POST['software'];
		$image_file = $_FILES['image_file']['tmp_name'];
		
		$uploaded_image_path = "uploaded_images/";
		
		
		echo $showdetails = $progect.' '.$image_type.' '.$image_title.' '.$description.' '.$designer.' '.$software.' '.$image_file; 
		
		if($_FILES["image_file"]["error"] == NULL){
			$image_file_loaded = addslashes(file_get_contents($image_file));
			$loaded_image_name = $_FILES['image_file']['name'];
			$loaded_image_type = $_FILES['image_file']['type'];
			$loaded_image_size = $_FILES['image_file']['size'];
			

			$uploaded_image_path = $uploaded_image_path.basename($loaded_image_name);
			
			$loaded_image_size_kb = ($loaded_image_size/1024);
			$loaded_image_size_kb = round($loaded_image_size_kb, 3);
			
			echo '<br/> '.$loaded_image_size_kb.' kb'.'<br/>'.'uploaded image path: '.$uploaded_image_path;
			
			if(move_uploaded_file($_FILES['image_file']['tmp_name'], $uploaded_image_path)){
				
				echo "<br/> The file ".  basename( $_FILES['image_file']['name']). " has been uploaded";
			}else{
			
				echo "There was an error uploading the file, please try again!";
			}
			$insertQuery = "INSERT INTO image_tb VALUES('','$progect','$image_type','$image_title','$description','$designer','$software','$uploaded_image_path','$loaded_image_name','$loaded_image_type','$loaded_image_size_kb')";
			mysql_query($insertQuery);
			
			$last_id = mysql_insert_id();


			
			if($last_id > 0){
				function last_image_loaded_func(){
					
				$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
				$db_select = mysql_select_db("my_dsstudios") or die(mysql_error());
					
					$folder_path = "uploaded_images/";
					$last_id_of_image_loaded = mysql_insert_id();
					
					$last_row_loaded = mysql_query("SELECT * FROM image_tb WHERE id=$last_id_of_image_loaded");					
					
					if($last_row_loaded){
						
						while($row = mysql_fetch_assoc($last_row_loaded)){

							$last_image_progect = $row['progect'];
							$last_image_type = $row['image_type'];
							$last_image_title = $row['image_title'];
							$last_image_description = $row['description'];
							$last_image_designer = $row['designer'];
							$last_image_software = $row['software_used'];
							$last_image_loaded_path = basename($row['image_location']);
							$last_loaded_image_name = $row['loaded_image_name'];
							$last_loaded_image_type = $row['loaded_image_type'];
							$last_loaded_image_size = $row['loaded_image_size'];
							
							echo '<div id="uploaded_info" style="display:none;"><h5 id="loaded_image_details">Progect name - <span>'.$last_image_progect.'</span></h5>';
							echo '<h5 id="loaded_image_details">Image type - <span>'.$last_image_type.'</span></h5>';
							echo '<h5 id="loaded_image_details">Image title - <span>'.$last_image_title.'</span></h5>';
							echo '<h5 id="loaded_image_details">Description - <span>'.$last_image_description.'</span></h5>';
							echo '<h5 id="loaded_image_details">Designer - <span>'.$last_image_designer.'</span></h5>';
							echo '<h5 id="loaded_image_details">Software used - <span>'.$last_image_software.'</span></h5>';
							echo '<h5 id="loaded_image_details">Path - <span>uploaded/'.$last_image_loaded_path.'</span></h5>';
							echo '<h5 id="loaded_image_details">Image name - <span>'.$last_loaded_image_name.'</span></h5>';
							echo '<h5 id="loaded_image_details">Image extention - <span>'.$last_loaded_image_type.'</span></h5>';
							echo '<h5 id="loaded_image_details">Image size - <span>'.$last_loaded_image_size.'Kb</span></h5>';
							
							echo '<img id="loaded_image_details" src="'.$folder_path.$last_image_loaded_path.'" width="70%" height="70%" /></div>';

						}
					}else{
						
						//echo '<br/> error here';
					}
				
				
					
				mysql_close($db_connect);	
					
				}
			}else{
				function image_uploading_error_report(){
					echo 'Error during loading file level 2,'.' '.$_FILES["image_file"]["error"];
				}
			}
		}else{ 
			function image_uploading_error_report(){
				echo 'Error during loading file level 1,'.' '.$_FILES["image_file"]["error"];
			}			
		}
	
	}else{
		function image_uploading_error_report(){
			 echo 'Please compile all fields and choose the image to upload.';
		}
	}
}
?>
<?php 
	function call_loaded_images(){
		$db_connect = mysql_connect("localhost", "dsstudios","p51024") or die(mysql_error());
		$db_select = mysql_select_db("my_dsstudios") or die(mysql_error());
		
		$callQuery = "SELECT id FROM image_tb";
		$elems = mysql_query($callQuery);
		$folder_path = "uploaded_images/";
		while($row = mysql_fetch_assoc($elems)){
			$id_num[] = $row['id'];
			echo $row['id'].' ';
			
		}
		//echo '<br/>'.$id_num[2];
		
		$array_lenght = count($id_num);
		for($count=0;$count<=$array_lenght-1;$count++){
			
			$id_to_select = $id_num[$count];
			
			echo '<br/>'.$id_num[$count];
			
			$call_image_query ="SELECT loaded_image_name FROM image_tb WHERE id='$id_to_select'";
			
			$result = mysql_query($call_image_query);
			
			while($r = mysql_fetch_assoc($result)){
				$last_image_loaded_path = $r['loaded_image_name'];
			}
			$imgDetails = getimagesize($folder_path.$last_image_loaded_path);
			
			echo '<img id="called_images" src="'.$folder_path.$last_image_loaded_path.'" width="'.$imgDetails[0].'" height="'.$imgDetails[1].'"/><br/>';
		}
		
		
		
	}
?>

<?php 
	function last_login(){
		$fName = "login_info.txt";
		
		file_exists($fName) ? read_file_content() : creat_file();
		delete_file_content();
		write_file_content();
		if(function_exists('login_data_store')){login_data_store();}
	}
	
	function delete_file_content(){
		$fName = "login_info.txt";
		$fHandler = fopen($fName, 'w') or die('Error during creating file!');
		fclose($fHandler);		
	} 
	
	function read_file_content(){
		$fName = "login_info.txt";
		$fHandler = fopen($fName, 'r') or die('Error during reading file!');
		$fReadString = fread($fHandler, 100);
		echo $fReadString ;	
		fclose($fHandler);
	}
	
	function creat_file(){
		$fName = "login_info.txt";
		$fHandler = fopen($fName, 'w') or die('Error during creating file!');
		fclose($fHandler);
	}
	function write_file_content(){
		$fName = "login_info.txt";
		$fHandler = fopen($fName, 'w') or die('Error during creating file!');
		$fWriteString = date('D, d M Y - e - [H:i:s]');
		$user_ip_proxy = '';
		$Users_IP_address = $_SERVER["REMOTE_ADDR"]; 
		if(function_exists('visitorIP')){
			$user_ip_proxy = visitorIP();
			return $user_ip_proxy;			
		}
		$user_ip = ($user_ip_proxy == NULL)? $Users_IP_address : $user_ip_proxy;
		fwrite($fHandler, $fWriteString.' User Ip = '.$user_ip);
		fclose($fHandler);

		function visitorIP(){ 
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		
				$TheIp=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
				$TheIp=$_SERVER['REMOTE_ADDR'];
			}
		
			return trim($TheIp);
    		}
			
	}
?>
<?php
	function login_data_store(){
		$fName = "login_data.txt";
		$fHandler = fopen($fName, 'a') or die('Error during creating file!');
		$user_ip_proxy = '';
		$Users_IP_address = $_SERVER["REMOTE_ADDR"]; 
		$fWriteString = date('D, d M Y - e - [H:i:s]').' User IP = '.$Users_IP_address."\r\n";  
		fwrite($fHandler, $fWriteString);
		
		fclose($fHandler);
		


	}
?>