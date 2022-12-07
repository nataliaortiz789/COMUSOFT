tinymce.init({
	selector: "textarea",
	plugins: [
		"code ",
		"paste"
	],
	toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code ",
	menubar:false,
    statusbar: false,
	height: 200,
	/*width:700*/
});


$( document ).ready(function() {	
	$(document).on('click', '.saveButton', function() {
		console.log(this.id);
		var clickedId = this.id;
		if(clickedId == 'preview'){
			if(tinymce.activeEditor.getContent()) {
				$('#previewModal').modal({
					backdrop: 'static',
					keyboard: false
				});
			}
		} else if(clickedId == 'save') {
			$('#codeForm').submit();			
		}	
	});	
	
	$(document).on('click', '#cancel', function() {
		$('#previewModal').modal('hide');		
	});
	
	$("#previewModal").on("shown.bs.modal", function () { 
		$('#previewCode').html(tinymce.activeEditor.getContent());
	});
});