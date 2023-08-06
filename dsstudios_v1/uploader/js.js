function openUploader(){
		var divNode = '<div id="uploader"><fieldset id="uploaderFieldset"></fieldset></div>';
		var formNode = '<legend>Upload your new works</legend><form id="uploaderForm" action="index.php" method="POST" enctype="multipart/form-data"></form>';
		
		var inputProgect = '<lable>Progect:</lable><input id="uploaderInput" class="progect" type="text" name="progect" autofocus placeholder="Progect Name" maxlength="50" required/>';
		var inputType = '<lable>Image type:</lable><input id="uploaderInput" class="typoOfProgect" type="text" name="image_type" placeholder="Image type" maxlength="50" required/>';
		var inputImageTitle = '<lable>Image title:</lable><input id="uploaderInput" class="imageTitle" type="text" name="image_title" placeholder="Image title" maxlength="50" required/>';
		var inputDescription = '<lable>Description:</lable><input id="uploaderInput" class="description" type="text" name="description" placeholder="Description" maxlength="200" required/>';
		var inputDesigner = '<lable>Designer:</lable><input id="uploaderInput" class="designer" type="text" name="designer" placeholder="Designer Of progect" maxlength="50" required/>';
		var inputSoftware = '<lable>Software used:</lable><input id="uploaderInput" class="software" type="text" name="software" placeholder="Software used" maxlength="50" required/>';
		
		var inputChooseFile = '<div id="uploaderInputFileWrapper"><lable>Browse</lable><input id="uploaderInputFile" class="choosefile" type="file" name="image_file" required/></div>';
		var inputSumbit = '	<input id="uploaderInputSubmit" class="submit" type="submit" value="Upload"/>';
		
		var inputArray = [inputProgect, inputType, inputImageTitle, inputDescription, inputDesigner, inputSoftware, inputChooseFile, inputSumbit];
		
		$('#login').after(divNode);
		$('#uploaderFieldset').append(formNode);
		
		$.each(inputArray,function(index){
			$('#uploaderForm').append(inputArray[index]);
		});
		$('#uploader input').after('<br/>');
		
		if($('#logout')){
			$('#loginForm').hide();
			
		}		
}

$(document).ready(function(){
	
	if($('#uploaded_info')){
		$('#uploaded_info').fadeIn('slow');
	}
	
	
});
