$(document).ready(function() {
	
	$('a[rel="candle"]').click(function(){
		
		if ($('a[rel="candle"]')){
			
		var imgDes = $(this).children('img').attr('alt');
		
		var idGetHref = $(this).attr('href');

		var saveHref = idGetHref; 
		
		var designer = "DsStudios | SamBigDs"; // designer of project
		
		var imgLink = '<img id="full" src="'+saveHref+'" width="'+imgWidth+'px" height="'+imgHeight+'px" alt="Fullimage"/>';
		var imgGetter = $('#candle_shadow #img_container #img img');
		var imgWidth = imgGetter.width();
		var imgHeight = imgGetter.height();
		nodeMaker();
		
		$('.closer, #shadow').click(function(){
		
			$('#candle_shadow_container').remove();
						
		});
		if($.browser.msie == true){
			$('#img img').attr({width: '100%', height:'100%'});
		}
		return false;
		
		}
	
		function nodeMaker(){
			$('body').append('<div id="candle_shadow_container"></div>');
			$('#candle_shadow_container').append('<div id="shadow"></div>');
			$('#candle_shadow_container').append('<div id="candle_shadow"></div>');
			$('#candle_shadow').append('<div id="closer"></div>');
			$('#closer').append('<a class="closer" href="javascript: void(0);"><img id="closerbut" src="includes/candleshadow/closer.png" /></a>');
			$('#candle_shadow').append('<div id="img_container" align="center">');
			$('#img_container').append('<div id="img">'+imgLink+'</div>');
			$('#candle_shadow').append('<div id="img_caption"></div>');	
			$('#img_caption').append('<p>Project ID: '+idGetHref+'</p>');	
			$('#img_caption').append('<p>Description: '+imgDes+'</p>');	
			$('#img_caption').append('<p>Designer: '+designer+'</p>');	
			$('#img_caption').append('<p id="dev">Jquery plugin Designed & Developed by DsStudios | SamBigDs</p>');	
			$('#candle_shadow').append('<div id="nav_but"></div>');		
		}
		
	});
	
	
		
	
	$('a[rel="candle1"]').click(function(){
		
		var getImgs = $('a[rel="candle1"]'); getImgs.attr('href');
		var imgArray = $.makeArray(getImgs);
		var initIndex = $('a[rel="candle1"]').index(this);
		var imgLink = '<img id="full" src="'+imgArray[initIndex]+'" width="'+imgWidth+'px" height="'+imgHeight+'px" alt="Fullimage"/>';
		var imgWidth;
		var imgHeight;
		var imgGetter = $('#candle_shadow #img_container #img img');
		if($.browser.msie == false){
			imgWidth = imgGetter.width();
			imgHeight = imgGetter.height();
		}else{
			imgWidth = '100%';
			imgHeight = '100%';	
		}
		//var imgDes = $('#img img').attr('alt');		
		var idGetHref;
		var designer = "DsStudios | SamBigDs"; // designer of project
		nodeMaker();
		ieFix();
		//preload();
		$('.closer, #shadow').click(closer);
		
		$('#left_but_area').mouseenter(function(){
			$('.turnLeft').fadeIn('slow');	
		});
		$('#right_but_area').mouseenter(function(){
			$('.turnRight').fadeIn('slow');		
		});
		$('#img').mouseenter(function(){
			$('.turnLeft').fadeOut('slow');
			$('.turnRight').fadeOut('slow');		
		});
		$('.turnLeft').click(prevImg);
		$('.turnRight').click(nextImg);
		resize();
		but_left();
		but_right();

		//console.log(initIndex);
		//console.log(imgArray.length);
		
		return false;
		
		
		function nodeMaker(){
			$('body').append('<div id="candle_shadow_container"></div>');
			$('#candle_shadow_container').append('<div id="shadow"></div>');
			$('#candle_shadow_container').append('<div id="candle_shadow"></div>');
			$('#candle_shadow').append('<div id="closer"></div>');
			$('#closer').append('<a class="closer" href="javascript: void(0);"><img id="closerbut" src="includes/candleshadow/closer.png" /></a>');
			$('#candle_shadow').append('<div id="img_container" align="center">');
			$('#img_container').append('<div id="img">'+imgLink+'</div>');
			$('#candle_shadow').append('<div id="img_caption"></div>');	
			//$('#img_caption').append('<p>Project ID: '+idGetHref+'</p>');	
			//$('#img_caption').append('<p>Description: '+imgDes+'</p>');	
			$('#img_caption').append('<p>Designer: '+designer+'</p>');	
			$('#img_caption').append('<p id="dev">Jquery plugin Designed & Developed by DsStudios | SamBigDs</p>');	
			$('#candle_shadow').append('<div id="left_but"><a class="turnLeft" href="javascript: void(0);"><img id="leftbut" src="includes/candleshadow/left.png" /></a></div>');	
			$('#candle_shadow').append('<div id="left_but_area"></div>');	
			$('#candle_shadow').append('<div id="right_but"><a class="turnRight" href="javascript: void(0);"><img id="rightbut" src="includes/candleshadow/right.png" /></a></div>');	
			$('#candle_shadow').append('<div id="right_but_area"></div>');	
		}
	
		function closer(){
			$('#candle_shadow_container').remove();
		}
					
		function prevImg(){
			//$('#img img').fadeOut();
			$('#img img').attr('src', imgArray[initIndex=initIndex-1]);	
			ieFix();
			but_left();
			but_right();
			resize();
			//preload();
		}
		
		function but_left(){
				
			if(initIndex > 0){
				$('#left_but').show();
			}else{
				$('#left_but').hide();
			}	
		}
		
		function nextImg(){
			//$('#img img').fadeOut();
			$('#img img').attr('src', imgArray[initIndex=initIndex+1]);	
			ieFix();
			but_right();
			but_left();
			resize();
			//preload();
		}
		
		function but_right(){
				
			if(initIndex+1 < imgArray.length){
				$('#right_but').show();
			}else{
				$('#right_but').hide();
			}		
		}
		
		function preload(){
			$('#candle_shadow #img img').load(function(){
				$('#candle_shadow').css('display','none');
			});	
			
			$('#candle_shadow').css('display','block');
		}
		
		function resize(){
			if($.browser.iems==false){
				var imgGetter = $('#candle_shadow #img_container #img img');
				var imgWidth = imgGetter.width();
				var imgHeight = imgGetter.height();
			}
			//console.log(imgWidth +' x '+imgHeight);
		}
		
		//ie fix width and height
		
		function ieFix(){
			if($.browser.msie == true){
				$('#img img').attr({width: '100%', height:'100%'});
			}
		}
		
	});
	
});