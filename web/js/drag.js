
'use strict';
var extensionesPermitidas = new Array(".xlsx", ".xls");
var droppedFiles = false;
var archivoDropped = false;
	;( function ( document, window, index )
	{
		// feature detection for drag&drop upload
		var isAdvancedUpload = function()
			{
				var div = document.createElement( 'div' );
				return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
			}();


		// applying the effect for every form
		var forms = document.querySelectorAll( '.box' );
		Array.prototype.forEach.call( forms, function( form )
		{
			var input		 = form.querySelector( 'input[type="file"]' ),
				label		 = form.querySelector( 'label' ),
				errorMsg	 = form.querySelector( '.box__error span' ),
				restart		 = form.querySelectorAll( '.box__restart' ),
				showFiles	 = function( files )
				{
					
					label.textContent = files.length > 1 ? ( input.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name;
				},
				triggerFormSubmit = function()
				{
					var event = document.createEvent( 'HTMLEvents' );
					event.initEvent( 'submit', true, false );
					form.dispatchEvent( event );
				};

			// letting the server side to know we are going to make an Ajax request
			var ajaxFlag = document.createElement( 'input' );
			ajaxFlag.setAttribute( 'type', 'hidden' );
			ajaxFlag.setAttribute( 'name', 'ajax' );
			ajaxFlag.setAttribute( 'value', 1 );
			form.appendChild( ajaxFlag );

			// automatically submit the form on file select
			input.addEventListener( 'change', function( e )
			{
				if(validarExtension(e.target)){
				
				showFiles( e.target.files );
				}
				
			});

			// drag&drop files if the feature is available
			if( isAdvancedUpload )
			{
				form.classList.add( 'has-advanced-upload' ); // letting the CSS part to know drag&drop is supported by the browser

				[ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach( function( event )
				{
					form.addEventListener( event, function( e )
					{
						// preventing the unwanted behaviours
						e.preventDefault();
						e.stopPropagation();
					});
				});
				[ 'dragover', 'dragenter' ].forEach( function( event )
				{
					form.addEventListener( event, function()
					{
						form.classList.add( 'is-dragover' );
					});
				});
				[ 'dragleave', 'dragend', 'drop' ].forEach( function( event )
				{
					form.addEventListener( event, function()
					{
						form.classList.remove( 'is-dragover' );
					});
				});
				form.addEventListener( 'drop', function( e )
				{
					
					droppedFiles = e.dataTransfer.files; // the files that were dropped
					archivoDropped = e.dataTransfer.files[0];
				if(validarExtensionNombre(e.dataTransfer.files[0].name)){
					showFiles( droppedFiles );
				}
				
				//droppedFiles = null;
									});
					
			}


			// if the form was submitted
			form.addEventListener( 'submit', function( e )
			{
				
				return false;
				// preventing the duplicate submissions if the current one is in progress
				if( form.classList.contains( 'is-uploading' ) ) return false;

				form.classList.add( 'is-uploading' );
				form.classList.remove( 'is-error' );

				if( isAdvancedUpload ) // ajax file upload for modern browsers
				{
					e.preventDefault();

					// gathering the form data
					var ajaxData = new FormData( form );
					if( droppedFiles )
					{
						Array.prototype.forEach.call( droppedFiles, function( file )
						{
							ajaxData.append( input.getAttribute( 'name' ), file );
						});
					}

					// ajax request
					var ajax = new XMLHttpRequest();
					ajax.open( form.getAttribute( 'method' ), form.getAttribute( 'action' ), true );

					ajax.onload = function()
					{
						form.classList.remove( 'is-uploading' );
						if( ajax.status >= 200 && ajax.status < 400 )
						{
							var data = JSON.parse( ajax.responseText );
							form.classList.add( data.success == true ? 'is-success' : 'is-error' );
							if( !data.success ) errorMsg.textContent = data.error;
						}
						else alert( 'Error. Please, contact the webmaster!' );
					};

					ajax.onerror = function()
					{
						form.classList.remove( 'is-uploading' );
						alert( 'Error. Please, try again!' );
					};

					ajax.send( ajaxData );
				}
				else // fallback Ajax solution upload for older browsers
				{
					var iframeName	= 'uploadiframe' + new Date().getTime(),
						iframe		= document.createElement( 'iframe' );

						$iframe		= $( '<iframe name="' + iframeName + '" style="display: none;"></iframe>' );

					iframe.setAttribute( 'name', iframeName );
					iframe.style.display = 'none';

					document.body.appendChild( iframe );
					form.setAttribute( 'target', iframeName );

					iframe.addEventListener( 'load', function()
					{
						var data = JSON.parse( iframe.contentDocument.body.innerHTML );
						form.classList.remove( 'is-uploading' )
						form.classList.add( data.success == true ? 'is-success' : 'is-error' )
						form.removeAttribute( 'target' );
						if( !data.success ) errorMsg.textContent = data.error;
						iframe.parentNode.removeChild( iframe );
					});
				}
			});


			// restart the form if has a state of error/success
			Array.prototype.forEach.call( restart, function( entry )
			{
				entry.addEventListener( 'click', function( e )
				{
					e.preventDefault();
					form.classList.remove( 'is-error', 'is-success' );
					input.click();
				});
			});

			// Firefox focus bug fix for file input
			input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
			input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });

		});
	}( document, window, 0 ));


	
	window.addEventListener("dragover",function(e){
		  e = e || event;
		  e.preventDefault();
		},false);
		window.addEventListener("drop",function(e){
		  e = e || event;
		  e.preventDefault();
		},false);
		
		/**
		 * Valida archivo
		 */
		function validarExtension(sender) {
			
			var fileExt = sender.value;
		    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
		    if (extensionesPermitidas.indexOf(fileExt) < 0) {
		     
		      swal("Espera",
						"Debes subir un archivo con extension "+
			    		  extensionesPermitidas.toString() ,
						"warning");
		      
		      $("#js-label-file-excel").html('<strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.');
		      clearFileInput($(sender));
		      return false;
		    }
		    else return true;
		}
		
		/**
		 * Valida archivo
		 */
		function validarExtensionNombre(fileExt) {
		    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
		    if (extensionesPermitidas.indexOf(fileExt) < 0) {
		     
		      swal("Espera",
						"Debes subir un archivo con extension "+
			    		  extensionesPermitidas.toString() ,
						"warning");
		      
		      return false;
		    }
		    else return true;
		}
		
		/**
		 * Limpia un campo de File input
		 * 
		 * @param $input
		 */
		function clearFileInput($input) {
			if ($input.val() == '') {
				return;
			}
			// Fix for IE ver < 11, that does not clear file inputs
			// Requires a sequence of steps to prevent IE crashing but
			// still allow clearing of the file input.
			if (/MSIE/.test(navigator.userAgent)) {
				var $frm1 = $input.closest('form');
				if ($frm1.length) { // check if the input is already wrapped in a form
					$input.wrap('<form>');
					var $frm2 = $input.closest('form'), // the wrapper form
					$tmpEl = $(document.createElement('div')); // a temporary
					// placeholder element
					$frm2.before($tmpEl).after($frm1).trigger('reset');
					$input.unwrap().appendTo($tmpEl).unwrap();
				} else { // no parent form exists - just wrap a form element
					$input.wrap('<form>').closest('form').trigger('reset').unwrap();
				}
			} else { // normal reset behavior for other sane browsers
				$input.val('');
			}
			
			archivoDropped = false;
		}		