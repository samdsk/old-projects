$(document).ready(function(){
	

	var loc = $(location).attr('href');
	var url = window.location.pathname;
	
	var filename = url.substring(url.lastIndexOf('/')+1);
	
	if(filename == 0){
		filename = 'index.php';
	}
	//var color = '#152B3C';
	
	if($.browser.opera){
		$('#header nav ul h4').css('top','-10px !important');
	}
	$('#header nav ul a=[href="'+filename+'"]') ? navBg(filename) : console.log('not found');	
	//$('#header a').click(navBg(filename));

	

	function navBg(filename){
		var currentClass = $('#header nav a=[href="'+filename+'"]').children('li').attr('class');
		$('#header nav a=[href="'+filename+'"]').parent().removeClass('btn btn-large').addClass('btn btn-inverse btn-large');
		$('#header nav a=[href="'+filename+'"]').children('li').removeClass().addClass(currentClass+' icon-white');		
		$('#header nav a=[href="'+filename+'"]').children('li').append('<span  style="position:relative !important;top:18px;" class="icon-chevron-down"></span>');
		console.log('asd')
	}

	projectImgLoader();	
	$('#mainContainerPortfolio #activateBox').click(function(){
		


		var alt = $(this).children('img').attr('alt');
		alt = alt.split('--');

		var imgs = $('#mainContainerPortfolio #projectImg[alt*="'+alt[0]+'"]');
		
		var widths = imgs.map(function(index, elem) {return(elem.width);}).get();
		var heights = imgs.map(function(index, elem) {return(elem.height);}).get();
		var srcs = imgs.map(function(index, elem) {return(elem.src);}).get();
		var alts = imgs.map(function(index, elem) {return(elem.alt);}).get();

		var nowImg = $(this).children('img');
		nowImg = nowImg[0].src;
		
		var imgIndex = srcs.indexOf(nowImg);
		

		
		$('#mainContainerPortfolio').append('<div id="imgBox"></div>');
		$('#mainContainerPortfolio').append('<div id="shadow"></div>');
		$('#imgBox').append('<div id="nextImg"><a href="JavaScript:void(0);"><img src="img/right.png" width="50" height="50"/></a></div>');
		$('#imgBox').append('<div id="prevImg"><a href="JavaScript:void(0);"><img src="img/left.png" width="50" height="50"/></a></div>');
		$('#imgBox').append('<div id="closeImg"><a href="JavaScript:void(0);"><img src="img/closer.png" width="42" height="42"/></a></div>');
		$('#imgBox').append('<img id="loader" width="24" height="24" src="img/loading.gif"/>');
		$('#loader').css('display','none');
		$('#nextImg').hide();
		$('#prevImg').hide();
		
		
		var elem = $('#imgBox');
		if(elem) {
			
			var elemOffset = elem.offset();

			$('html').scrollTop(elemOffset.top);
			//$('html').scrollLeft(elemOffset.left);
		}
		
		imgBox(imgIndex);		
		button(imgIndex);
		
		function imgBox(imgIndex){
			$('#loader').show(function(){
				$('<img/>').attr({id:'imgBoxImg',src:srcs[imgIndex],width:widths[imgIndex],height:heights[imgIndex]}).load(function(){
					$('#imgBox').append(this);
					$('#imgBoxImg').hide();
					console.log(imgIndex);					
					boxSize();
					$('#loader').fadeOut(function(){
						$('#imgBoxImg').fadeIn('slow');
						imgInfo(imgIndex);
					});
				});
			});
		}
		
		$('#nextImg').click(nextImg);
		$('#prevImg').click(prevImg);
		$('#closeImg').click(closeImg);
		$('#shadow').click(closeImg);
		
		function closeImg(){
			$('#imgBox,#shadow').fadeOut('slow',function(){
				$(this).remove();
			});
		}
		
		function nextImg(){
			removeImgInfo();
			
			if(imgIndex<srcs.length){	
				imgIndex=imgIndex+1;
					
				$('#imgBoxImg').fadeOut('slow').remove();
				imgBox(imgIndex);
				console.log(imgIndex);
				boxSize();
				button(imgIndex);
			}



		}
		function prevImg(){
			removeImgInfo();

			if(srcs.length>0){
				imgIndex = imgIndex-1;
								
				$('#imgBoxImg').fadeOut('slow').remove();
				imgBox(imgIndex);
				console.log(imgIndex);
				boxSize();
				button(imgIndex);
			}
			

		}
		function boxSize(){
			$('#imgBox').animate({
				width:widths[imgIndex],
				height:heights[imgIndex]
			},1000);
			loaderPosition();
			function loaderPosition(){
				var width = widths[imgIndex]/2;
				var height = heights[imgIndex]/2;
			

			$('#prevImg').css('top',height);
			$('#nextImg').css('top',height);
			$('#loader').css({
				left:width,
				top:height
			});
			
			}
		}
			
		function button(imgIndex){
			if(imgIndex>=srcs.length-1){
				$('#nextImg').hide();
			}else{
				$('#nextImg').show();
			}
			if(imgIndex<=0){
				$('#prevImg').hide();
			}else{
				$('#prevImg').show();
			}
			if(srcs.length==0){$('#prevImg').hide(); $('#nextImg').hide();}
		}
		
		function imgInfo(imgIndex){	
			var k =	imgIndex;
			var altN =  alts[k];

			
			var alt_box_img = altN.split('--');
			
			$('#imgBox').append('<div id="imgInfo"></div>');

			$('#imgInfo').css('display','none');
			$('#imgInfo').append('<span id="imgInfoProject" title="Project">'+alt_box_img[0]+'</span>');
			$('#imgInfo').append('<div id="imgInfoOther"></div>');
			$('#imgInfoOther').append('<span id="imgInfoImgTitle" title="Image Title">'+alt_box_img[1]+'</span>');
			$('#imgInfoOther').append('<span id="imgInfoImgType" title="Image Type">'+alt_box_img[2]+'</span>');
			$('#imgInfoOther').append('<span id="imgInfoDes" title="Description">'+alt_box_img[3]+'</span>');
			$('#imgInfoOther').append('<span id="imgInfoDesigner" title="Designer">'+alt_box_img[4]+'</span>');
			$('#imgInfoOther').append('<span id="imgInfoSoft" title="Software">'+alt_box_img[5]+'</span>');			
			$('#imgInfo').fadeIn('slow');
		}
		
		function removeImgInfo(){
			$('div#imgInfo').remove();

		}
	});
	
	
	function projectImgLoader(){
		$('#imgContainer img[id="cover"]').hide();
		var imgL = $('#imgContainer img[id="cover"]');	
		console.log(imgL.length);
		var imgLSrcs = imgL.map(function(index, elem) {return(elem.src);}).get();
		console.log(imgLSrcs.length);
		var imgLWidths = imgL.map(function(index, elem) {return(elem.width);}).get();
		var imgLHeights = imgL.map(function(index, elem) {return(elem.height);}).get();
		$('.portfolioPost').append('<img id="pLoader" width="24" height="24" src="img/loading.gif"/>');
		$('#imgContainer #pLoader ').css('display','none');
		
		$('#pLoader').show(function(){			
			$.each(imgLSrcs,function(i,k){
				setInterval(function(){
					
					$('<img/>').attr('src',imgLSrcs[i]).load(function(){
						$('.portfolioPost #pLoader ').eq(i).fadeOut(function(){
							$('#imgContainer img[id="cover"]').eq(i).attr('src',imgLSrcs[i]).fadeIn('slow');					
						});										
					});
					
				},1000 + ( i * 1000 ));
	
					
			});			
		});
	}
	
});