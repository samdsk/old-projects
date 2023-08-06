<!DOCTYPE html>
<html>
<!--[if IE 8]>
	<html id="ie8" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
	<head>
		<title>Ezio Colombo srl 
        <?php urlCheck();
		function urlCheck(){
			$urls = $_SERVER['REQUEST_URI'];
			$urls = explode('/', $urls);
	
			$last_id = $urls[sizeof($urls)-1];
			
			
			
			switch($last_id){
				case "": echo " | Home";
					break;
				case "index.php": echo " | Home";
					break;
				case "contatti.php": echo " | Contatta";
					break;
				case "chisiamo.php": echo " | Chi siamo";
					break;
				case "renaultway.php": echo " | Renault Way"; 
					break;
				case "servizi.php": echo " | Servizi";
					break;
				case "promozioni.php": echo " | Promozioni";
					break;
				case "process.php": echo " | Contatta";
					break;
				default: echo "";	
			}
		}
	 
		?>
	</title>
    	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
		<meta name='viewport' content='width=device-width'>
        <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/responsive.css">
       <link rel="stylesheet" type="text/css" media="screen" href="css/overstyle.css">
		<script type="text/javascript" src="js/jquerymin.js"></script>
		<script type="text/javascript" src="js/jquery.devrama.slider.js"></script>
		<script type="text/javascript">
     
	    	$(document).ready(function(){
	        	$('#my-slide').DrSlider(); //Yes! that's it!

				$('#overlay').fadeIn('fast');
				$('#box').fadeIn('slow');

				
				$(".chiudi").click(
					function(){
						$('#overlay').fadeOut('fast');
						$('#box').hide();
				});
				
					//chiusura emergenza
				$("#overlay").click(
						function(){
						$(this).fadeOut('fast');
						$('#box').hide();
				});//fine overlay
	   		});

			
		</script>
        
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <style>
        	@font-face{
				font-family:helvetica;
				src: url("HelveticaNeueLTStd-BdCn.otf");
			}
        
        </style>
            <!--[if lt IE 9]>
    	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    	<script src="js/html5.js" type="text/javascript"></script>
    <![endif]-->
	</head>
	<body>
    	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<div id="wrapper">
			<div id="headerWrapper">
				<div id="header">
					<div id="logo"><a href="index.php"><img id="logoImg" alt="logoImgage" src="img/logo.jpg"></a></div>
                    <div class="nav-line"></div>
					<div id="navBar">
                    	<div id="navBarWrapper">
                        	<ul>
                            	<li><a href="index.php">
                                	<span>Home</span></a>
                                </li>
                            	<li><a href="chisiamo.php"><span>Chi Siamo</span></a></li>
                            	<li><a href="renaultway.php"><span>Renault Way</span></a></li>
                            	<li><a href="servizi.php"><span>Servizi</span></a></li>
                            	<li><a href="http://concessionari.autoscout24.it/ezio-colombo/veicoli#atype=C&cid=1981974&ustate=U,N,A&sort=price&results=20&page=1"><span>Usate</span></a></li>
                            	<li class="has-sub-menu">
                                	<a  href="javascript:void(0);"><span>Nuove</span></a>
                                	<ul id="palazzo-menu" class="sub-menu" style="display:none;">
                                        <li class="sub-item">
                                        <a id="" class="" href="javascript:void(0);">
                                            Dacia
                                        </a>
                                        </li>
                                        <li class="sub-item">
                                        <a id="" class="" href="javascript:void(0);">
                                            Renault
                                        </a>                                
                                        </li>
                                    </ul>
                                </li>                            
                            	<li><a href="contatti.php"><span>Contatti</span></a></li>
                            </ul>
                        </div> 
                        <div id="shadow"></div>
					</div>
                    <div id="navMobileRes">
                    	<a id="navMobileHref" href="javascript:void(0);">
                            <span id="navResIcon" class="glyphicon glyphicon-align-justify" style=""></span>
                            <span id="navResText" style="font-size:40px">Menu</span>
                        </a>
                   	</div>                   	
				</div>
			</div>