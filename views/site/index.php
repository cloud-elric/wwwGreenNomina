<?php

/* @var $this yii\web\View */
$this->title = 'Nomina';
?>
<div class="row">
	<div class="col-md-4">
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['empleados/index'] );?>">
			<div class="widget widget-shadow" id="widgetLineareaOne">
				<div class="widget-content">
					<div class="padding-20 padding-top-10">
						<div class="clearfix">
							<div class="grey-800 pull-left padding-vertical-10">
								<i class="glyphicon glyphicon-user"></i> Empleados
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['site/subir-archivo'] );?>">
			<div class="widget widget-shadow" id="widgetLineareaOne">
				<div class="widget-content">
					<div class="padding-20 padding-top-10">
						<div class="clearfix">
							<div class="grey-800 pull-left padding-vertical-10">
								<i class="glyphicon glyphicon-open"></i> Subir información desde Excel
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?=Yii::$app->urlManager->createAbsoluteUrl ( ['empleados/pagos'] );?>">
			<div class="widget widget-shadow" id="widgetLineareaOne">
				<div class="widget-content">
					<div class="padding-20 padding-top-10">
						<div class="clearfix">
							<div class="grey-800 pull-left padding-vertical-10">
								<i class="glyphicon glyphicon-usd"></i> Pagos
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
</div>
