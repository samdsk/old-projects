jQuery(document).ready(function(){
	
	var urls = "http://nerds-esport.com/";
	urls = urls + 'n/bg/';
	console.log(urls);
	var nImgs = 5;
	var urlsArray = new Array;
	var number = Math.floor(Math.random() * nImgs);
	
	for(var i = 1;i<nImgs+1;i++){
		var urlToLoad = urls+i+'.jpg';
		urlsArray.push(urlToLoad);
		jQuery.ajax({
			url: urlToLoad,
			timeout:5000,
			cache:true,
			success: function(){				
				
			},
			complete: function(){				
				changeBg();
				
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

});


