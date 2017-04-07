
var l = Ladda.create(document.getElementById("js-upload-button-ladda"));

$(document).ready(function() {

	$('.js-subir-registros').on('click', function(e) {
		e.preventDefault();
	 	l.start();
		// la variable droppedFiles se encuentra en el archivo drag.js
		if(archivoDropped || $('#js-file-excel').val()){
			uploadFile();
		}else{
			 swal("Espera",
						"Debes subir un archivo.",
						"warning");
			 l.stop();
		}
		
	});
	
});

function uploadFile(){
	$('.js-data-excel .panel-body').html('');
	 $('.js-data-excel .panel-heading h3').html('');
	var form = document.getElementById('js-form-upload-excel');
	// var data = new FormData(form);

	// gathering the form data
		var ajaxData = new FormData( form );
		if( archivoDropped )
		{
			ajaxData.append('fileUpload', archivoDropped);
		}
	
	$.ajax({
		url: basePath+'site/upload-file',
		type : "POST",
        data : ajaxData,
        dataType:'JSON',
        processData : false,
        contentType : false,
        cache : false,
        xhr : function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload
                    .addEventListener(
                            "progress",
                            function(
                                    evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded
                                            / evt.total;
                                    console
                                            .log('upload'
                                                    + percentComplete);
                                }
                            },
                            false);
            // Download progress
            xhr
                    .addEventListener(
                            "progress",
                            function(
                                    evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded
                                            / evt.total;
                                    // Do
                                    // something
                                    // with
                                    // download
                                    // progress
                                    console
                                            .log('download'
                                                    + percentComplete);
                                }
                            },
                            false);
            return xhr;
        },
        error : function() {
            alert("Failed");
            l.stop();
        },
		success:function(resp){
			
			 swal("Listo",
						"Se ha cargado la información correctamente.",
						"success");
			 $('.js-data-excel .panel-heading h3').html('Usuarios sin correo electronico');
			 
			 $.each(resp.noValid, function (i, data) {
				 console.log(resp.noValid[i]);
				 $('.js-data-excel .panel-body').append(resp.noValid[i]);
				})	
				
			
			l.stop();
			
		}
	})
}