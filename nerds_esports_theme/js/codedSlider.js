// JavaScript Document

function codedSlider(){
	
	//configuration
	var slider = $('#codedSlider');
	var timer = 5000;
	var clickedImg = null;
	var srcImg;
	var slideCaps = [];
	var indexer = 1;
	var int;
	var x = null;
	var sImg;
	
	if(slider.length > 0 ){
		
		//Looking for Slider Items		
		var sliderItems = slider.find('#codedSliderItems');
		var imgs = sliderItems.find('.slide');	
			
		var frame = sliderItems.find('.sliderFrame');		
		frame = frame.attr('src');
		
		//Indexing Slider Captions
		if(slider.find('div.slideCaption')){			
			for(var j=0;j<imgs.length;j++){							
				var selector = sliderItems.find('li').eq(j+1);								
				if(selector.find('.slideCaption').length > 0){					
					slideCaps[j] = selector.find('.slideCaption').html();
				}else{
					slideCaps[j] = (" ");					
				}
			}
		}
		
		//Caching images via ajax		
		for(var b=0;b<imgs.length;b++){				
			srcImg = imgs[b];		
			srcImg = srcImg.src;			
			$.ajax({
				url: srcImg,
				timeout:5000,
				cache:true
			});
		}
		
		//Creating DOM items for slider
				
		slider.append('<img id="frameImg" class="frameImg" src="'+frame+'"/>');
		slider.append('<div id="sliderWrapper" class=""></div>');	
		slider.find('#sliderWrapper').append('<img id="slide-'+1+'" class="slideImg" src="'+imgs[0].src+'"/>');
		slider.append('<ul id="sliderNav" class=""></ul>');
		
		var sliderNav = slider.find('#sliderNav');
		var sliderWrapper = slider.find('#sliderWrapper');
		
		sliderWrapper.append('<div id="slideCaptionWrapper"><div id="caption"></div></div>');
		
		$.each(imgs, function (i){
			slider.find('#sliderNav').append('<a href="javascript:void(0);"><li id="sliderNav-'+(i)+'" class="sliderNavItems"></li></a>');
		});
		
		//Setting up first slide				
		sliderWrapper.find('#caption').append(slideCaps[indexer-1]);	
		sliderNav.find('a li[id="sliderNav-0"]').addClass('sliderNavActive');		
		
		
		
		sliderNav.find('a').click(function(){
			var navp = $(this).children('li').attr('id');
			navp = navp.split('-');
			
			x = parseInt(navp[1]);
			slideImg(x);
			
			
		});		
		
		//Slider Automation		
		function sliderAutomation(){
				if(x!=null){ indexer = (x+1); x = null;}
				
				if(indexer === imgs.length){indexer = 0;}	
							
				slideImg(indexer);	
				indexer++;
		}
		
		function slideImg(ind){
			
			var i = ind;
							
			sImg = imgs[i];					
			sImg = sImg.src;				

			
			//Removing last slide
			sliderNav.find('a li').removeClass('sliderNavActive');
			$('#caption').remove();
			
			
			//Creating next slide
			sliderWrapper.append('<img id="slide-'+i+'" class="slideImg slideActive" src="'+sImg+'"/>');
			sliderNav.find('a li[id="sliderNav-'+i+'"]').addClass('sliderNavActive');
			sliderWrapper.find('#slideCaptionWrapper').append('<div id="caption"></div>');
			
			var sliderCaption = sliderWrapper.find('#caption');
			
			sliderCaption.append(slideCaps[i]).css({display : 'none'});										
			sliderCaption.slideDown('slow');
			
			//Active slide animation
			
			$('.slideActive').animate({top:'0px', opacity:1},1000, function(){
				var v = i-1;
				if(v == 0){v = 5;}						
				$('#slide-'+v).remove();						
			});
		}
		
		function slide(){
			
			int = setInterval(sliderAutomation,timer);
		}
		
		function pauseSlider() {
        	clearInterval(int);
    	}
		
		slider.on('mouseenter', pauseSlider).on('mouseleave', slide);

		slide();
		
	}
} 




