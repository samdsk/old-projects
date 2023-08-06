$(document).ready(function() {
	if($('#error')){
		var x = $('#error').html();
		$('#error').remove('#error');
		$('#loginForm').after('<h3/>');
		$('h3').attr('id','eroor_report').html(x);				
	}

});