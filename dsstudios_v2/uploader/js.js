$(document).ready(function() {
	if($('#error')){
		var x = $('#error').html();
		$('#error').remove('#error');
		$('#loginForm').after('<h3/>');
		$('h3').attr('id','error_report').html(x);				
	}
	$('#av_toolbar_regdiv').remove();
	$('#av_toolbar_iframe').remove();
});
