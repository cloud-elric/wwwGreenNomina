<?php 

$this->registerJsFile ( '@web/js/drag.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/plugins/sweetAlert/js/sweetalert.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerCssFile ( '@web/plugins/sweetAlert/css/sweetalert.css', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );


$this->registerCssFile ( '@web/plugins/ladda-bootstrap/dist/ladda-themeless.min.css', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/plugins/ladda-bootstrap/dist/spin.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/plugins/ladda-bootstrap/dist/ladda.min.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/js/subirArchivo.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );
?>
<style>
			

				.box
				{
					font-size: 1.25rem; /* 20 */
					background-color: #c8dadf;
					position: relative;
					padding: 100px 20px;
				}
				.box.has-advanced-upload
				{
					outline: 2px dashed #92b0b3;
					outline-offset: -10px;

					-webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
					transition: outline-offset .15s ease-in-out, background-color .15s linear;
				}
				.box.is-dragover
				{
					outline-offset: -20px;
					outline-color: #c8dadf;
					background-color: #fff;
				}
					.box__dragndrop,
					.box__icon
					{
						display: none;
					}
					.box.has-advanced-upload .box__dragndrop
					{
						display: inline;
					}
					.box.has-advanced-upload .box__icon
					{
						width: 100%;
						height: 80px;
						fill: #92b0b3;
						display: block;
						margin-bottom: 40px;
					}

					.box.is-uploading .box__input,
					.box.is-success .box__input,
					.box.is-error .box__input
					{
						visibility: hidden;
					}

					.box__uploading,
					.box__success,
					.box__error
					{
						display: none;
					}
					.box.is-uploading .box__uploading,
					.box.is-success .box__success,
					.box.is-error .box__error
					{
						display: block;
						position: absolute;
						top: 50%;
						right: 0;
						left: 0;

						-webkit-transform: translateY( -50% );
						transform: translateY( -50% );
					}
					.box__uploading
					{
						font-style: italic;
					}
					.box__success
					{
						-webkit-animation: appear-from-inside .25s ease-in-out;
						animation: appear-from-inside .25s ease-in-out;
					}
						@-webkit-keyframes appear-from-inside
						{
							from	{ -webkit-transform: translateY( -50% ) scale( 0 ); }
							75%		{ -webkit-transform: translateY( -50% ) scale( 1.1 ); }
							to		{ -webkit-transform: translateY( -50% ) scale( 1 ); }
						}
						@keyframes appear-from-inside
						{
							from	{ transform: translateY( -50% ) scale( 0 ); }
							75%		{ transform: translateY( -50% ) scale( 1.1 ); }
							to		{ transform: translateY( -50% ) scale( 1 ); }
						}

					.box__restart
					{
						font-weight: 700;
					}
					.box__restart:focus,
					.box__restart:hover
					{
						color: #39bfd3;
					}

					.box__file
					{
						width: 0.1px;
						height: 0.1px;
						opacity: 0;
						overflow: hidden;
						position: absolute;
						z-index: -1;
					}
					.box__file + label
					{
						max-width: 80%;
						text-overflow: ellipsis;
						white-space: nowrap;
						cursor: pointer;
						display: inline-block;
						overflow: hidden;
					}
					.box__file + label:hover strong,
					.box__file:focus + label strong,
					.box__file.has-focus + label strong
					{
						color: #39bfd3;
					}
					.box__file:focus + label,
					.box__file.has-focus + label
					{
						outline: 1px dotted #000;
						outline: -webkit-focus-ring-color auto 5px;
					}
						.box__file + label *
						{
							/* pointer-events: none; */ /* in case of FastClick lib use */
						}

					.no-js .box__file + label
					{
						display: none;
					}

					.no-js .box__button
					{
						display: block;
					}
					.box__button
					{
						font-weight: 700;
						color: #e5edf1;
						background-color: #39bfd3;
						display: block;
						padding: 8px 16px;
						margin: 40px auto 0;
					}
						.box__button:hover,
						.box__button:focus
						{
							background-color: #0f3c4b;
						}
						
						 .box__file {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.box__input label strong{
	color:#548422;
}
	</style>
<div class="col-md-6 col-md-offset-3">
<form method="post" enctype="multipart/form-data" class="box has-advanced-upload" id="js-form-upload-excel">

		
		<div class="box__input text-center">
			<svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"></path></svg>
			<input type="file" name="fileUpload" id="js-file-excel" class="box__file" data-multiple-caption="{count} files selected">
			<label for="js-file-excel" id="js-label-file-excel"><strong>Selecciona un archivo</strong><span class="box__dragndrop"> o arrastralo aquí</span>.</label>
			<button type="submit" class="js-subir-registros box__button ladda-button" id="js-upload-button-ladda" data-style="zoom-in"><span class="ladda-label">Upload</span></button>
		</div>

		
		<div class="box__uploading">Uploading…</div>
		<div class="box__success">Done! <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" class="box__restart" role="button">Upload more?</a></div>
		<div class="box__error">Error! <span></span>. <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" class="box__restart" role="button">Try again!</a></div>
	<input type="hidden" name="ajax" value="1"></form>
</div>

<br><br><br><br>

<div class="col-md-6 col-md-offset-3 js-data-excel">
	<div class="panel">
	<div class="panel-heading">
	<h3></h3>
	</div>
		<div class="panel-body">
		</div>
	</div>

</div>