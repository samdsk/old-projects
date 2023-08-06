// JavaScript Document

$(document).ready(function() {
	
	
	$('a[rel="candle1"]').click(function(){
		
		var getImgs = $('a[rel="candle1"]'); getImgs.attr('href');
		var imgArray = $.makeArray(getImgs);
		var initIndex = $('a[rel="candle1"]').index(this);
		var imgLink = '<img id="full" src="'+imgArray[initIndex]+'" width="" height="" alt="Fullimage"/>';
		
		nodeMaker();
		
		$('.closer').click(closer);
		
		$('.turnLeft').click(prevImg);
		$('.turnRight').click(nextImg);
		
		but_left();
		but_right();
		
		console.log(initIndex);
		console.log(imgArray.length);
		
		return false;
		
		
	function nodeMaker(){
		$('body').append('<div id="candle_shadow_container"></div>');
		//$('#candle_shadow_container').append('<div id="shadow"></div>');
		$('#candle_shadow_container').append('<div id="candle_shadow"></div>');
		$('#candle_shadow').append('<div id="closer"></div>');
		$('#closer').append('<a class="closer" href="javascript: void(0);"><img id="closerbut" src="closer.png" /></a>');
		$('#candle_shadow').append('<div id="img_container" align="center">');
		$('#img_container').append('<div id="img">'+imgLink+'</div>');
		$('#candle_shadow').append('<div id="img_caption"></div>');	
		//$('#img_caption').append('<p>Project ID: '+idGetHref+'</p>');	
		//$('#img_caption').append('<p>Description: '+imgDes+'</p>');	
		//$('#img_caption').append('<p>Designer: '+designer+'</p>');	
		//$('#img_caption').append('<p id="dev">Jquery plugin Designed & Developed by DsStudios | SamBigDs</p>');	
		$('#candle_shadow').append('<div id="left_but"><a class="turnLeft" href="javascript: void(0);"><img id="leftbut" src="left.png" /></a></div>');	
		$('#candle_shadow').append('<div id="right_but"><a class="turnRight" href="javascript: void(0);"><img id="rightbut" src="right.png" /></a></div>');	
	}
	
	function closer(){
		$('#candle_shadow_container').remove();
	}
				
	function prevImg(){
		$('#img img').hide('fast');
		$('#img img').attr('src', imgArray[initIndex=initIndex-1]);	
		$('#img img').show('slow');		
		but_left();
		but_right();
	}
	
	function but_left(){
			
		if(initIndex > 0){
			$('#left_but').show('fast');
		}else{
			$('#left_but').hide('fast');
		}	
	}
	
	function nextImg(){
		$('#img').hide('fast');
		$('#img img').attr('src', imgArray[initIndex=initIndex+1]);	
		$('#img').show('slow');
		but_right();
		but_left();
	}
	
	function but_right(){
			
		if(initIndex+1 < imgArray.length){
			$('#right_but').show('fast');
		}else{
			$('#right_but').hide('fast');
		}
	
	}
			
	});
});

