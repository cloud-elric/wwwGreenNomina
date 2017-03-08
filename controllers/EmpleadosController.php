<?php

namespace app\controllers;

use Yii;
use app\models\EntEmpleados;
use app\models\EntEmpleadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EntDatosBancarios;
use app\models\EntEmpleadosContactos;
use app\models\WrkPagosEmpleados;
use yii\data\ActiveDataProvider;
use app\models\WrkPagosExtras;
use yii\filters\AccessControl;
use app\models\Utils;
use app\models\ViewPagos;
use app\models\WrkDeduccionesEmpleado;

/**
 * EmpleadosController implements the CRUD actions for EntEmpleados model.
 */
class EmpleadosController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),
						'only' => [ 
								'index',
								'agregar-pago',
								'create',
								'delete',
								'delete-pago-extra',
								'pagos-extras',
								'update',
								'update-pago-extra',
								'view',
								'view-pago-extra',
								'pagos' 
						],
						'rules' => [ 
								[ 
										'actions' => [ 
												'index',
												'agregar-pago',
												'create',
												'delete',
												'delete-pago-extra',
												'pagos-extras',
												'update',
												'update-pago-extra',
												'view',
												'view-pago-extra',
												'pagos' 
										],
										'allow' => true,
										'roles' => [ 
												'@' 
										] 
								] 
						] 
				],
				'verbs' => [ 
						'class' => VerbFilter::className (),
						'actions' => [ 
								'delete' => [ 
										'POST' 
								] 
						] 
				] 
		];
	}
	
	/**
	 * Lists all EntEmpleados models.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new EntEmpleadosSearch ();
		$dataProvider = $searchModel->search ( Yii::$app->request->queryParams );
		//echo Yii::$app->user->identity->id_usuario; exit();
		
		return $this->render ( 'index', [ 
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider 
		] );
	}
	
	/**
	 * Displays a single EntEmpleados model.
	 *
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionView($id) {
		$query = WrkPagosEmpleados::find ()->where ( [ 
				'id_empleado' => $id 
		] );
		
		// add conditions that should always apply here
		
		$dataProvider = new ActiveDataProvider ( [ 
				'query' => $query 
		] );
		
		return $this->render ( 'view', [ 
				'model' => $this->findModel ( $id ),
				'dataProvider' => $dataProvider 
		] );
	}
	
	/**
	 * Creates a new EntEmpleados model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new EntEmpleados ();
		$model2 = new EntDatosBancarios ();
		$model3 = new EntEmpleadosContactos ();
		
		if ($model->load ( Yii::$app->request->post () )) {
			$model->fch_alta = Utils::changeFormatDateInput ( $model->fch_alta );
			if ($model->save ()) {
				$model2->id_empleado = $model->id_empleado;
				$model3->id_empleado = $model->id_empleado;
				if ($model2->load ( Yii::$app->request->post () ) && $model2->save ()) {
					if ($model3->load ( Yii::$app->request->post () ) && $model3->save ()) {
						return $this->redirect ( [ 
								'view',
								'id' => $model->id_empleado 
						] );
					}
				}
			}
		} else {
			return $this->render ( 'create', [ 
					'model' => $model,
					'model2' => $model2,
					'model3' => $model3 
			] );
		}
	}
	
	/**
	 * Updates an existing EntEmpleados model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel ( $id );
		$model2 = EntDatosBancarios::find ()->where ( [ 
				'id_empleado' => $id 
		] )->one ();
		$model3 = EntEmpleadosContactos::find ()->where ( [ 
				'id_empleado' => $id 
		] )->one ();
		
		if ($model->load ( Yii::$app->request->post () )) {
			$model->fch_alta = Utils::changeFormatDateInput ( $model->fch_alta );
			if ($model->save ()) {
				return $this->redirect ( [ 
						'view',
						'id' => $model->id_empleado 
				] );
			}
		} else {
			return $this->render ( 'update', [ 
					'model' => $model,
					'model2' => $model2,
					'model3' => $model3 
			] );
		}
	}
	
	/**
	 * Deletes an existing EntEmpleados model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionDelete($id) {
		$empleado = $this->findModel ( $id );
		$empleado->b_habilitado = 0;
		$empleado->save ();
		
		return $this->redirect ( [ 
				'index' 
		] );
	}
	
	/**
	 * Finds the EntEmpleados model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param string $id        	
	 * @return EntEmpleados the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = EntEmpleados::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	public function actionPagosExtras($id) {
		$pagos = WrkPagosEmpleados::find ()->where ( [ 
				'id_empleado' => $id 
		] );
		$dataProvider = new ActiveDataProvider ( [ 
				'query' => $pagos 
		] );
		
		$empleado = EntEmpleados::find()->where([
				'id_empleado'=>$id
		])->one();
		return $this->render ( 'pagosExtras', [ 
				'dataProvider' => $dataProvider,
				'empleado'=>$empleado
		] );
	}
	public function actionAgregarPago($id, $idPago) {
		$empleadoV = EntEmpleados::find()->where(['id_empleado'=>$id])->one();
		$extras = new WrkPagosExtras ();
		$extras->id_empleado = $id;
		$extras->id_nomina = $idPago;
		
		$pagos = WrkPagosExtras::find ()->where(['id_empleado' => $id])->andWhere(['id_nomina'=>$idPago])->andWhere(['b_deposito'=>1]);
		$dataProvider = new ActiveDataProvider ( [ 
			'query' => $pagos 
		] );
		
		if ($extras->load ( Yii::$app->request->post())){
			$extras->b_deposito = 1;
			if($extras->save ()){
			
// 				$extras2 = new WrkPagosExtras ();
// 				$extras2->id_empleado = $id;
				
// 				$pagos2 = WrkPagosExtras::find ()->where ( [ 
// 						'id_empleado' => $id 
// 				] );
// 				$dataProvider = new ActiveDataProvider ( [ 
// 						'query' => $pagos2 
// 				] );
				
				return $this->redirect([ 
					'agregar-pago',
					'id' => $id,
					'idPago' => $idPago
				]);
			}
		}
		
		return $this->render('agregarPagos', [
				'empleadoV'=>$empleadoV,
				'extras' => $extras,
				'dataProvider' => $dataProvider 
		]);
	}
	public function actionViewPagoExtra($id) {
		$extra = WrkPagosExtras::find ()->where ( [ 
				'id_pago_extra' => $id 
		] )->one ();
		
		return $this->render ( 'viewPagosExtras', [ 
				'extra' => $extra 
		] );
	}
	public function actionUpdatePagoExtra($id) {
		$extra = WrkPagosExtras::find ()->where ( [ 
				'id_pago_extra' => $id 
		] )->one ();
		
		if ($extra->load ( Yii::$app->request->post () ) && $extra->save ()) {
			return $this->redirect ( [ 
					'view-pago-extra',
					'id' => $extra->id_pago_extra 
			] );
		}
		
		return $this->render ( 'updatePagosExtras', [ 
				'extra' => $extra 
		] );
	}
	public function actionDeletePagoExtra($id) {
		$extra = WrkPagosExtras::find ()->where ( [ 
				'id_pago_extra' => $id 
		] )->one ();
		$id = $extra->id_empleado;
		$extra->delete ();
		return $this->redirect ( [ 
				'agregar-pago',
				'id' => $id 
		] );
	}
	
	/**
	 */
	public function actionPagos() {
		$query = ViewPagos::find ()->orderBy('fch_pago DESC');
		$dataProvider = new ActiveDataProvider ( [ 
				'query' => $query 
		] );
		
		return $this->render ( 'pagos', [ 
				'dataProvider' => $dataProvider 
		] );
	}
	
	
	public function actionPagosRealizados($fch=null){
		$searchModel = new EntEmpleadosSearch ();
		$dataProvider = $searchModel->searchPagos ( Yii::$app->request->queryParams, $fch);
		
		return $this->render ( 'pagosRealizados', [ 
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				'fch'=>$fch
		] );
	}
	
	public function actionPagoEmpleadoFecha($id, $idPago){
		
		$ultimoPago = WrkPagosEmpleados::find()->where(['id_empleado'=>$id, 'id_pago_empleado'=>$idPago])->orderBy('fch_pago DESC')->one();
		
		$empleado = EntEmpleados::find()->where(['id_empleado'=>$id])->one();
		
		$deducciones = WrkDeduccionesEmpleado::find ()->where ( [
				'id_empleado' => $id,
				'id_nomina'=>$ultimoPago->id_pago_empleado
		] )->all ();
		$extras = WrkPagosExtras::find ()->where ( [
				'id_empleado' => $id,
				'id_nomina'=>$ultimoPago->id_pago_empleado,
				'b_deposito'=>0
		] )->all ();
		
		$depositos = WrkPagosExtras::find ()->where ( [
				'id_empleado' => $id,
				'id_nomina'=>$ultimoPago->id_pago_empleado,
				'b_deposito'=>1
		] )->all ();
		
		
		return $this->render ( 'pagoEmpleado', [
				'empleado'=>$empleado,
				'deducciones' => $deducciones,
				'extras' => $extras ,
				'ultimoPago'=>$ultimoPago,
				'depositos'=>$depositos
		] );
		
	}
}
