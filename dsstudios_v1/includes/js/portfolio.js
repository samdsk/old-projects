$(document).ready(function() {
	var myArray1 = 	['<div id="pic_dsstudios"><a href="includes/js/port/full/official-site_lightbox_1.jpg" title="DsStudios" ><img class="pic1" src="includes/js/port/thums/thum1.png" title="Portfolio" width="314" height="212"/></a></div>',
					'<div id="pic_dsstudios"><a href="includes/js/port/full/official-site_lightbox_2.jpg" title="DsStudios" ><img class="pic2" src="includes/js/port/thums/thum2.png" title="Portfolio" width="314" height="212"/></a></div>',
					'<div id="pic_dsstudios"><a href="includes/js/port/full/official-site_lightbox_3.jpg" title="DsStudios" ><img class="pic3" src="includes/js/port/thums/thum3.png" title="Portfolio" width="314" height="212"/></a></div>',
					'<div id="pic_dsstudios"><a href="includes/js/port/full/official-site_lightbox_4.jpg" title="DsStudios" ><img class="pic4" src="includes/js/port/thums/thum4.png" title="Portfolio" width="314" height="212"/></a></div>',
					'<div id="pic_dsstudios"><a href="includes/js/port/full/official-site_lightbox_5.jpg" title="DsStudios" ><img class="pic5" src="includes/js/port/thums/thum5.png" title="Portfolio" width="314" height="212"/></a></div>']
		
	var myArray2 = 	['<div id="pic_designers"><a href="includes/js/port/full/official-site_lightbox_6.jpg" title="Designers Showcase" ><img class="pic6" src="includes/js/port/thums/thum6.png" title="Portfolio" width="314" height="212"/></a></div>']
	
	var myArray3 = 	['<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_7.jpg" title="Designers Showcase" ><img class="pic7" src="includes/js/port/thums/thum7.png" title="Portfolio" width="314" height="212"/></a></div>',
					 '<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_8.jpg" title="Designers Showcase" ><img class="pic8" src="includes/js/port/thums/thum8.png" title="Portfolio" width="314" height="212"/></a></div>',
					  '<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_9.jpg" title="Designers Showcase" ><img class="pic9" src="includes/js/port/thums/thum9.png" title="Portfolio" width="314" height="212"/></a></div>',
					  '<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_10.jpg" title="Designers Showcase" ><img class="pic10" src="includes/js/port/thums/thum10.png" title="Portfolio" width="314" height="212"/></a></div>',
					  '<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_11.jpg" title="Designers Showcase" ><img class="pic11" src="includes/js/port/thums/thum11.png" title="Portfolio" width="314" height="212"/></a></div>',
					  '<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_12.jpg" title="Designers Showcase" ><img class="pic12" src="includes/js/port/thums/thum12.png" title="Portfolio" width="314" height="212"/></a></div>',
					  '<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_13.jpg" title="Designers Showcase" ><img class="pic13" src="includes/js/port/thums/thum13.png" title="Portfolio" width="314" height="212"/></a></div>',
					  '<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_14.jpg" title="Designers Showcase" ><img class="pic14" src="includes/js/port/thums/thum14.png" title="Portfolio" width="314" height="212"/></a></div>',
					  '<div id="pic_typo"><a href="includes/js/port/full/official-site_lightbox_15.jpg" title="Designers Showcase" ><img class="pic15" src="includes/js/port/thums/thum15.png" title="Portfolio" width="314" height="212"/></a></div>']
	
	var myArray4 = 	['<div id="pic_web_official"><a href="includes/js/port/web/web_official.jpg" title="Designers Showcase" ><img class="pic6" src="includes/js/port/thums/thums_official.png" title="Portfolio" width="181px" height="218px"/></a></div>']
	
	
	/*$.each(linksArray, function links(index, value){
		console.log(index + ': ' + value);	
	});	*/	
	/*$('#imgwrapper').append('<div id="imgcontainer">'+myArray+'</div>');*/
//arrays		
	$.each(myArray1, function(index, value){
		$('#imgwrapper1').append(value);	
		$('#pic_dsstudios a').attr('rel','candle1');
		
	});	
	
	$.each(myArray2, function(index, value){
		$('#imgwrapper2').append(value);
		$('#pic_designers a').attr('rel','candle1');	
		
	});	
	
	$.each(myArray3, function(index, value){
		$('#imgwrapper3').append(value);	
		$('#pic_typo a').attr('rel','candle1');
		
	});	
	
	$.each(myArray4, function(index, value){
		$('#webwrapper1').append(value);
		$('#pic_web_official a').attr('rel','candle1');	
		
	});	
//clickhandler	
	$('.image_dsstudios').click(function(){	
	
		$('#imgwrapper1').toggle('slow');	
	 });
	 
	 $('.image_designers').click(function(){	
	
		$('#imgwrapper2').toggle('slow');	
	 });
	 
	 $('.image_typo').click(function(){	
	
		$('#imgwrapper3').toggle('slow');	
	 });
	 
	 $('.pic_web_official').click(function(){	
	
		$('#webwrapper1').toggle('slow');	
	 });
	 
	 
	 
});