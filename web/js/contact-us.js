$(document).ready(function(){
 	$('body').on(
		'beforeSubmit',
		'#form-contact-us',
		function() {
			
			var button = document.getElementById('js-submit-contact-us');
			var l = Ladda.create(button);
		 	l.start();
			
			var form = $(this);
			// return false if form still have some validation errors
			if (form.find('.has-error').length) {
				l.stop();
				return false;
			}
			var data = $('#form-contact-us').serialize();
			
			$.ajax({
				url: 'contact-us',
				data:data,
				type:'POST',
				success:function(res){
					$('#contact-us-modal').modal('hide');
					document.getElementById("form-contact-us").reset();
					l.stop();
					swal("", "Muchas gracias por tu reporte, en breve un asesor se pondrá en contacto a través de tu correo electrónico.", "success")
				},error:function(){
					l.stop();
				}
			});
		
			return false;		
		});

	$(window).bind('pageshow', function(event) {
if (event.originalEvent.persisted) {
    window.location.reload() 
}
});
	
});