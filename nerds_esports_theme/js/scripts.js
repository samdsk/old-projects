jQuery(document).ready(function(e) {
    jQuery('article .entry-content h1').attr('class','h1');
	jQuery('article .entry-content h2').attr('class','h2');
	jQuery('article .entry-content h3').attr('class','h3');
	jQuery('article .entry-content h4').attr('class','h4');
	jQuery('article .entry-content h5').attr('class','h5');
	jQuery('article .entry-content h6').attr('class','h6');	
	jQuery('#bp-login-widget-submit').attr('class','btn btn-primary btn-sm');	
	
	jQuery('.reddit-header').css('display', 'none');
	
	jQuery('.server_block_widget .offline a').attr('title', 'Server is offline!');
	jQuery('.server_block_widget .online a').attr('title', 'Server is healthy and online!');
});

jQuery(document).ready(function(){
	
	var urls = "http://www.nerds-esport.com/";
	urls = urls + 'n/bg/';
	//console.log(urls);
	var nImgs = 4;
	var urlsArray = new Array;
	var number = Math.floor(Math.random() * nImgs);
	
	for(var i = 1;i<nImgs+1;i++){
		var urlToLoad = urls+i+'.jpg';
		urlsArray.push(urlToLoad);
		jQuery.ajax({
			url: urlToLoad,
			timeout:5000,
			cache:false,
			beforeSend: function(){
				//$('body #page').css({display:'none'});
				//$('body').append('<div id="loader"></div>').css({display:'block', width: (100/4)*i});
				
			},
			success: function(){				
				
			},
			complete: function(){				
				changeBg();
				//$('body #loader').remove();
				//$('body').css({display:'block'});
			}
		});
	}
	
	function changeBg() {		
		 
		var x = 0;
		if(urlsArray.length == nImgs){
				
				nextBackground();		

			
		}
		function nextBackground() {
			
			jQuery('body').css({'background-image':'url("'+urlsArray[number]+'")'});
			
			//console.log(number);
			//setTimeout(nextBackground, 2000);
			
			//jQuery('body').css({'background-image':'url("'+urlsArray[x = 0]+'")'});
		}
	}
	team_img_toggle();
	function team_img_toggle(){
		jQuery('.team-a-nfx').click(
			function(){
				jQuery('.team-table-nfx').toggle();
			});
		jQuery('.team-a-lol').click(
			function(){
				jQuery('.team-table-lol').toggle();
			});
	}

});

jQuery(document).ready(function($){
	//$('.calendar-archives').archivesCW();
});

