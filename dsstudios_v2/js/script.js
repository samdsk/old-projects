$(document).ready(function(){
	jQuery.fx.interval = 10;
	remove_iframe_alter();
	nav_marker();		
	dsstuiods_candleBox();
	projectImgLoader();
	opacitychange();
	
});



function remove_iframe_alter(){
		$('#av_toolbar_regdiv').remove();
		$('#av_toolbar_iframe').remove();
}

function nav_marker(){
	
	var title_blog = $('title').html();
	title_blog = title_blog.split(' | ');
	console.log(title_blog);
	var loc = $(location).attr('href');
	var url = window.location.pathname;
	loc = loc.split('/');
	var lLoc = loc.length;
	lLoc = lLoc-2
	var filename;
	
	console.log(loc[lLoc]);
	
	if(loc[lLoc] == 'blog'){
		filename = loc[lLoc];
		
	}else if(($.inArray('portfolio',loc)) != -1){
		filename = 'portfolio';
	}else if($.inArray('Blog', title_blog) != -1){
		filename = 'blog';
	}else if(($.inArray('contact',loc)) != -1){
		filename = 'contact';
	}else{filename = 'home';}
	//var color = '#152B3C';
	
	if($.browser.opera){
		$('#header nav ul h4').css('top','-10px !important');
	}
	
	$('#header nav ul a=[href="'+filename+'/"]') ? navBg(filename) : console.log('not found');	
	//$('#header a').click(navBg(filename));
	
	site_pop(filename);
	
	function site_pop(x){
		
		var site_poper = x;
		site_pop = $.trim(site_pop);
		
		var nwid = $('#header nav #site_pop').width();
		
		console.log('width is: '+nwid);
		$('#header nav #site_pop #site_pop_up').html(site_poper).animate({width:nwid},1000);
	}
}


function navBg(filename){
	var currentClass = $('#header nav a=[href*="'+filename+'"]').children('div').children('li').attr('class');
	$('#header nav a=[href*="'+filename+'"]').children('div').removeClass('btn btn-large').addClass('btn btn-inverse btn-large');
	$('#header nav a=[href*="'+filename+'"]').children('div').children('li').removeClass().addClass(currentClass+' icon-white');		
	$('#header nav a=[href*="'+filename+'"]').children('div').children('li').append('<span  style="position:relative !important;top:18px;" class="icon-chevron-down"></span>');
	console.log('asd')
}

function dsstuiods_candleBox(){	
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
		$('#imgBox').append('<div id="nextImg"><a href="JavaScript:void(0);"><img src="'+wp_url+'/img/right.png" width="50" height="50"/></a></div>');
		$('#imgBox').append('<div id="prevImg"><a href="JavaScript:void(0);"><img src="'+wp_url+'/img/left.png" width="50" height="50"/></a></div>');
		$('#imgBox').append('<div id="closeImg"><a href="JavaScript:void(0);"><img src="'+wp_url+'/img/closer.png" width="42" height="42"/></a></div>');
		$('#imgBox').append('<img id="loader" width="24" height="24" src="'+wp_url+'/img/loading.gif"/>');
		$('#loader').css('display','none');
		$('#nextImg').hide();
		$('#prevImg').hide();
		
		
		var elem = $('#imgBox');
		if(elem) {
			
			var elemOffset = elem.offset();

			$('html,body').animate({scrollTop:elemOffset.top-150, scrollLeft:elemOffset.left}, 'slow');
			
		}
		
		imgBox(imgIndex);
		loaderPosition();		
		boxSize();
		button(imgIndex);
		
		function imgBox(imgIndex){
			$('#loader').show(function(){
				$('<img/>').attr({id:'imgBoxImg',src:srcs[imgIndex],width:widths[imgIndex],height:heights[imgIndex]}).load(function(){
					$('#imgBox').append(this);
					$('#imgBoxImg').hide();										
					
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
				imgIndexForBox = imgIndex;
				loaderPosition_for_button(imgIndexForBox);
				boxSize();	
				button(imgIndex);
				$('#imgBoxImg').fadeOut('slow').remove();
				imgBox(imgIndex);
				console.log(imgIndex);				
			}
		}
		function prevImg(){
			removeImgInfo();
			imgIndexForBox = imgIndex
			if(srcs.length>0){
				imgIndex = imgIndex-1;
				imgIndexForBox = imgIndex;
				loaderPosition_for_button(imgIndexForBox);
				boxSize();	
				button(imgIndex);			
				$('#imgBoxImg').fadeOut('slow').remove();
				imgBox(imgIndex);
				console.log(imgIndex);
			}
		}
		function boxSize(){				
			$('#imgBox').animate({
				width:widths[imgIndex],
				height:heights[imgIndex]
			},1000, function(){centering();});
			
		}				
		
		function centering(){
			var wWidth = $(document).width();
			
			var wHeight = $(document).height();
			var currentBoxP = $('#imgBox').offset();
			var iWidth = widths[imgIndex];
			var iHeight = heights[imgIndex];
			
			iWidth = iWidth/2;
			wWidth = wWidth/2;
			
			var boxP = wWidth - iWidth;
			
			$('#imgBox').css({left:currentBoxP.left}).animate({left:boxP},1000);
			
			
			//console.log(wWidth+' '+iWidth+' '+boxP+' '+currentBoxP.left);
		}				
		function loaderPosition(){
			var width = widths[imgIndex]/2;
			var height = heights[imgIndex]/2;			

			$('#prevImg').animate({top:height},1000);
			$('#nextImg').animate({top:height},1000);
			$('#loader').css({left:width,top:height});			
		}	
		function loaderPosition_for_button(imgIndexForBox){
			var width = widths[imgIndexForBox]/2;
			var height = heights[imgIndexForBox]/2;			

			$('#prevImg').animate({top:height},1000);
			$('#nextImg').animate({top:height},1000);
			$('#loader').css({left:width,top:height});			
		}			
		function button(imgIndex){
			if(imgIndex>=srcs.length-1){
				$('#nextImg').fadeOut();
			}else{
				$('#nextImg').fadeIn('slow');
			}
			if(imgIndex<=0){
				$('#prevImg').fadeOut();
			}else{
				$('#prevImg').fadeIn('slow');
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

	});//end click function for imgBox;
}//end function dsstudios_candleBox end;

function projectImgLoader(){
	
	$('#imgContainer img[id="cover"]').hide();
	var imgL = $('#imgContainer img[id="cover"]');	
	console.log(imgL.length);
	var imgLSrcs = imgL.map(function(index, elem) {return(elem.src);}).get();
	console.log(imgLSrcs.length);
	var imgLWidths = imgL.map(function(index, elem) {return(elem.width);}).get();
	var imgLHeights = imgL.map(function(index, elem) {return(elem.height);}).get();
	$('.portfolioPost').append('<img id="pLoader" width="24" height="24" src="'+wp_url+'/img/loading.gif"/>');
	$('#imgContainer #pLoader ').css('display','none');
	
	$('#pLoader').show(function(){			
		$.each(imgLSrcs,function(i,k){
			setInterval(function(){
				
				$('<img/>').attr('src',imgLSrcs[i]).load(function(){
					$('.portfolioPost #pLoader').eq(i).fadeOut(function(){
						
						$('#imgContainer img[id="cover"]').eq(i).attr('src',imgLSrcs[i]).fadeIn('slow');					
					});										
				});
				
			},1000 + ( i * 1000 ));

				
		});			
	});
}

function opacitychange(){
	
	$('#imgContainer img').hover(
		function(){
			$(this).css('opacity','0.5');

	},function(){
		$(this).css('opacity','1');
	});
	
}
