$(document).ready(function() {
    
	var urls = $('title').html();
	
	urls = urls.split("|");
	var titleUrl = urls[urls.length-1];
	titleUrl = $.trim(titleUrl);
	
	
	
	switch(titleUrl){
		case ("Home") : $("#navBar a[href='index.php']").addClass("navActivePage");
			break;
		case ("Chi siamo") : $("#navBar a[href='chisiamo.php']").addClass("navActivePage");
			break; 
		case ("Renault Way") : $("#navBar a[href='renaultway.php']").addClass("navActivePage");
			break; 
		case ("Servizi") : $("#navBar a[href='servizi.php']").addClass("navActivePage");
			break; 
		case ("Contatta") : $("#navBar a[href='contatti.php']").addClass("navActivePage");
			break;
		case ("Contatta") : $("#navBar a[href='contatti.php']").addClass("navActivePage");
			break; 
 
		default: null;
	}
	$("#navMobileHref").click( function() {
		
		$("#navBarWrapper, #shadow").css("display","block");
	});
	$("#shadow").click( function() {
		$("#navBarWrapper , #shadow").css("display","none");
	});
	headerImgRes();
	
	function headerImgRes(){
		function getOrientation(){
			return Math.abs(window.orientation) - 90 == 0 ? "landscape" : "portrait";
		}
		function getMobileWidth(){
			return getOrientation() == "landscape" ? screen.availHeight : screen.availWidth;
		}
		function getMobileHeight(){
			return getOrientation() == "landscape" ? screen.availWidth : screen.availHeight;
		}
		
		var screenWidth = window.screen.availWidth;
		var screenHeight = window.screen.availHeight;

		
		//$("#header").html(screenWidth+" "+screenHeight);
		
		console.log(screenWidth+" "+screenHeight );
		
		if(screenWidth < 1024){
			
			$("#logoImg").attr('src','img/logo_header_res.jpg');
			
		}
		if(screenWidth < 300){
			$("#logoImg").attr('src','img/logo_header_res.jpg');
		}
	}
	//navBarMobile();
	function navBarMobile(){
		var navResult = $("#header #navBar a").css('display');
		if(navResult == "none"){
			
		}
	}
});
$(document).ready(function() {
	
	submenuHover();
	
    function submenuHover(){
		$(".has-sub-menu").hover(function(){
			$('.sub-menu').css({
				"display":"inline-block",
			})
		},function(){
			$('.sub-menu').css({
				"display":"none",
			})
		});
	}	
});










