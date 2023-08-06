<?php

$username = $_POST['username'];
$password = $_POST['password'];

if($username&&$password){
	
	mysql_connect("localhost", "root","p51024") or die(mysql_error());
	mysql_select_db("login") or die(mysql_error());
	
	$query = mysql_query("SELECT * FROM login_tb WHERE username='$username'");
	
	$num_rows = mysql_num_rows($query);
	if($num_rows==1){
		
		while($row=mysql_fetch_assoc($query)){
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		
		if($username==$dbusername&&$password==$dbpassword){
			
			
		}else{
			password_error('You have entered an incorret password');	
		}		
		
	}else{username_error('You\'re not an authorized member to update the portfolio database!');}
	
}else{nodata_error('Please enter your username and password!');}

?>

<?php

function error_report($error_to_show){echo '<div id="errors"><p>'.$error_to_show.'</p></dvi>'	;}

function username_error($error_to_show){
	error_report($error_to_show);	
	
}
function nodata_error($error_to_show){
	error_report($error_to_show);	
	
}
function password_error($error_to_show){
	error_report($error_to_show);	
	
}
?>
