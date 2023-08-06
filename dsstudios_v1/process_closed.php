<?php

/* Email Variables */

$emailSubject = 'DsStudios';
/*$webMaster = 'smds91@gmail.com';*/


/* Data Variables */
/*
$email = $_POST['Email'];
$nameF = $_POST['FirstName'];
$nameL = $_POST['LastName'];
$subject = $_POST['Subject'];
$mess = $_POST['Message'];
*/


$body = <<<EOD
<br><hr><br>
Name: $nameF $nameL <br>
Email: $email <br>
Subject = $subject<br>
Messege: $mess <br>
EOD;
/*
$headers = "From: $email\r\n";
$headers .= "Content-type: text/html\r\n";
$success = mail($webMaster, $emailSubject, $body, $headers);
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DsStudios | Contact</title>
<!--Meta Tags-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:type" content="website" />
<meta property="og:title" content="DsStudios Contact" />
<meta property="og:url" content="http://dsstudios.altervista.org/contact.html" />
<meta property="og:description" content="DsStudios mainly deal in graphic design from 2D to 3D, page layouts from digital to print. and logo design. I love to create clean and user friendly designs" />
<meta property="og:site_name" content="DsStudios Contact" />
<meta property="og:image" content="http://www.dsstudios.altervista.org/includes/images/official-site_body.jpg" />
<!--Style Sheets-->
<link rel="shortcut icon" href="http://www.dsstudios.altervista.org/includes/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="includes/css/nav.css">
<link rel="stylesheet" type="text/css" href="includes/css/form.css">



<style type="text/css">
body,td,th {
	font-family: Calibri, Arial;
	font-size:12px;
}
</style>
<!--Scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type='text/javascript' src='includes/js/jquery-1.6.4.min.js'></script>
<script type='text/javascript' src='includes/js/modernizr.custom.96418.js'></script>
<script>
$(window).load(function() {
	
	$("img").css("display", "none");
	$("img").fadeIn("slow");
	
});
</script>

</head>

<body bgcolor="#FFFFFF" text="#333333">
	
    <div id="maincontainer">
    	<div id="nav" align="center">
        	<div class="nav_bg"><a  href="index.html" title="Home" target="_self"><p>Welcome</p></a></div>
			<div class="nav_bg"><a href="portfolio.html" title="Portfolio" target="_self"><p>Portfolio</p></a></div>
            <div class="nav_bg"><a href="services.html" title="Services" target="_self"><p>Services</p></a></div>
            <div class="nav_bg_active"><a id="active_link" href="contact.html" title="Contact" target="_self"><p>Contact</p></a></div>
        </div>
        <div id="wait">
            <p>
            	<strong>Email has been sent successfully!</strong><br /><p>
                Thank you for contacting us. We will contact back you as soon as possible.<br />
                Do you have a quick question? The best way to get ahold of me
                is through <a target="_blank" href="http://twitter.com/#!/sambigds">Twitter </a>
                or the <a target="_blank" href="http://www.facebook.com/sam.bigds">Facebook page </a>. </p>
                I am always hanging around there and love to help when I can. 
            </p>
        </div>
        <!--<div id="forms">
        	
            	<fieldset>
            	<legend> Contact Me</legend>
            	<form id="fields" action="process.php" name="contact" method="POST">
                	<div class="names">
                        <label class="firstname" for="FirstName">Name</label>
                        <br/>
                        <input class="firstN" name="FirstName" type="text" autofocus="autofocus" placeholder="First Name" />
                        <input class="lastN" name="LastName" type="text"  placeholder="Last Name" />
                    </div>
                    <br/><br/>
                    <div class="subs">
                        <label class="sub" for="Subject"> Subject</label><br/>
                        <input class="SubjectS" name="Subject" type="text" placeholder="Subject" maxlength="30" />
                    </div>
                    <br/><br/>
                    <div class="emails">
                        <label class="email" for="Email"> Email</label><br/>
                        <input class="emailE" name="Email" type="email" placeholder="name@domain.com" maxlength="30" />
                    </div>
                    <br/><br/>
                    <div class="msgs">
                        <label class="msg" for="Message"> Message</label>
                        <br/>
                        <textarea class="msgarea" cols="20" rows="5" name="Message" placeholder="Write your message" ></textarea>
                    </div>
                    <br/><br/>
                    <input class="buts" type="submit"  name="submit" value="Send" />
                    <input class="buts" type="reset" name="clear"  value="Reset">
                </form>
                </fieldset>
           
        </div>       
		-->
        <div id="map_container">
            <div id="map">
                <footer>
                    <p>
                      <il class="map"><a href="index.html" title="Home">Home</a></il>
                      <il class="map"><a href="portfolio.html" title="Portfolio">Portfolio</a></il>
                      <il class="map"><a href="services.html" title="Services">Services</a></il>
                      <il class="map"><a href="contact.html" title="Contact">Contact</a></il>
                      <il class="map"><a href="links.html" title="Useful Links">Useful Links</a></il>
                      <il class="map"><a href="sf.html" title="Design Software">Design Software</a></il>
                      <il class="map"><a href="tuts.html" title="Where to find tuts">Where to find tuts  </a></il>
                    </p>
                    <p>
                    	Designed & Developed by DsStudios | SamBigDs
                    </p>
                </footer>
            </div>
        </div> 
       
<!--end main-->
    </div>

   
    

</body>
</html>