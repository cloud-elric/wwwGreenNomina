<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\EntEmpleados;
use app\models\ViewEmpleadoCompleto;
use app\models\WrkDeduccionesEmpleado;
use app\models\WrkPagosExtras;
use app\models\CatBancos;
use app\models\CatNominas;
use app\models\CatSucursales;
use app\models\CatTiposContratos;
use app\models\EntEmpleadosContactos;
use app\models\EntDatosBancarios;
use app\models\WrkPagosEmpleados;
use app\modules\ModUsuarios\models\Utils;

class SiteController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),
						'only' => [ 
								'logout', 'index','empleado-quincena', 'subir-archivo', 'upload-file' 
						],
						'rules' => [ 
								[ 
										'actions' => [ 
												'logout','index','empleado-quincena', 'subir-archivo', 'upload-file' 
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
								'logout' => [ 
										'post' 
								] 
						] 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [ 
				'error' => [ 
						'class' => 'yii\web\ErrorAction' 
				],
				'captcha' => [ 
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null 
				] 
		];
	}
	
	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {
		return $this->render ( 'index' );
	}
	
	/**
	 * Login action.
	 *
	 * @return string
	 */
	public function actionLogin() {
		if (! Yii::$app->user->isGuest) {
			return $this->goHome ();
		}
		
		$model = new LoginForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->login ()) {
			return $this->goBack ();
		}
		return $this->render ( 'login', [ 
				'model' => $model 
		] );
	}
	
	/**
	 * Logout action.
	 *
	 * @return string
	 */
	public function actionLogout() {
		Yii::$app->user->logout ();
		
		return $this->goHome ();
	}
	
	/**
	 * Displays contact page.
	 *
	 * @return string
	 */
	public function actionContact() {
		$model = new ContactForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->contact ( Yii::$app->params ['adminEmail'] )) {
			Yii::$app->session->setFlash ( 'contactFormSubmitted' );
			
			return $this->refresh ();
		}
		return $this->render ( 'contact', [ 
				'model' => $model 
		] );
	}
	
	/**
	 * Vista para poder agregar un archivo excel
	 */
	public function actionSubirArchivo() {
		return $this->render ( 'subirArchivo' );
	}
	
	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout() {
		return $this->render ( 'about' );
	}
	public $columnasEmpleado = [ 
			'txt_rfc' => 5,
			'txt_nombre' => 7,
			'txt_observaciones' => 36,
			'num_empleado' => 10,
			'num_seguro_social' => 11,
			'fch_alta' => 12,
			'fch_baja' => 13 
	];
	public $columnasBanco = [ 
			'txt_nombre' => 17 
	];
	public $columnasNominas = [ 
			'txt_nombre' => 14 
	];
	public $columnasSucursales = [ 
			'txt_nombre' => 8 
	];
	public $columnasTiposContratos = [ 
			'txt_nombre' => 9 
	];
	public $columnasDatosBancarios = [ 
			'txt_numero_cuenta' => 15,
			'txt_clabe' => 16 
	];
	public $columnasContactos = [ 
			'txt_telefono_contacto' => 37,
			'txt_mail_contacto' => 38 
	];
	public $columnasPago = [ 
			'num_dias_trabajados' => 18,
			'num_sueldo' => 19,
			'num_total_sueldo_fijo' => 20,
			'num_facturacion' => 21,
			'fch_pago' => 40 
	];
	
	public $columnasPagosExtras = [
		'extra1'=>23,
		'extra2'=>26,
		'extra3'=>29
	];
	
	/**
	 */
	public function actionUploadFile() {
		Yii::$app->response->format = Response::FORMAT_HTML;
		ini_set ( 'max_execution_time', 36000 );
		ini_set ( 'memory_limit', '512M' );
		$alias = Yii::getAlias ( '@app' ) . '/vendor/PHPExcel/Classes';
		require ($alias . DIRECTORY_SEPARATOR . 'PHPExcel.php');
		// require($alias.DIRECTORY_SEPARATOR.'Shared'.DIRECTORY_SEPARATOR.'Date.php');
		
		$file = UploadedFile::getInstanceByName ( 'fileUpload' );
		
		if ($file) {
			$objPHPExcel = \PHPExcel_IOFactory::load ( $file->tempName );
			$objWorksheet = $objPHPExcel->getActiveSheet ();
			
			$highestRow = $objWorksheet->getHighestRow ();
			$highestColumn = $objWorksheet->getHighestColumn ();
			
			$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString ( $highestColumn );
			
			for($row = 8; $row <= $highestRow; ++ $row) {
				
				// for($col = 5; $col <= $highestColumnIndex; ++ $col) {
				
				// if (\PHPExcel_Shared_Date::isDateTime ( $objWorksheet->getCellByColumnAndRow ( $col, $row ) )) {
				// $InvDate = $objWorksheet->getCellByColumnAndRow ( $col, $row )->getValue ();
				// date ( "Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP ( $InvDate ) ) . '</td>' . "\n";
				// ;
				// } else {
				
				// $objWorksheet->getCellByColumnAndRow ( $col, $row )->getCalculatedValue () . '</td>' . "\n";
				// }
				// }
				$banco = $this->loadBancos ( $objWorksheet, $row );
				$nomina = $this->loadNominas ( $objWorksheet, $row );
				$sucursales = $this->loadSucursales ( $objWorksheet, $row );
				$tiposContratos = $this->loadTipoContrato ( $objWorksheet, $row );
				$empleado = $this->loadEmpleados ( $objWorksheet, $row, $sucursales->id_sucursal, $tiposContratos->id_tipo_contrato, $nomina->id_nomina );
				$datosBancario = $this->loadDatosBancarios ( $objWorksheet, $row, $empleado->id_empleado, $banco->id_banco );
				$contacto = $this->loadEmpleadosContactos ( $objWorksheet, $row, $empleado->id_empleado );
				$pago = $this->loadPago ( $objWorksheet, $row, $empleado->id_empleado, $banco->id_banco, $sucursales->id_sucursal, $tiposContratos->id_tipo_contrato, $nomina->id_nomina );
				$this->loadPagosExtras($objWorksheet, $row, $empleado->id_empleado, $pago->id_pago_empleado);
			}
			echo ':D';
		}
		
		// return ['status'=>'error'];
	}
	
	/**
	 *
	 * @param unknown $objWorksheet        	
	 * @return \app\models\CatBancos|\app\models\CatBancos|\yii\db\ActiveRecord|NULL
	 */
	public function loadBancos($objWorksheet, $row) {
		$nombreBanco = $objWorksheet->getCellByColumnAndRow ( $this->columnasBanco ['txt_nombre'], $row )->getCalculatedValue ();
		$banco = CatBancos::find ()->where ( [ 
				'txt_nombre' => $nombreBanco 
		] )->one ();
		
		if (empty ( $banco )) {
			$banco = new CatBancos ();
			$banco->txt_nombre = $nombreBanco;
			$banco->save ();
			return $banco;
		}
		
		return $banco;
	}
	
	/**
	 *
	 * @param unknown $objWorksheet        	
	 * @param unknown $row        	
	 * @return \app\models\CatNominas|\app\models\CatNominas|\yii\db\ActiveRecord|NULL
	 */
	public function loadNominas($objWorksheet, $row) {
		$nombreNomina = $objWorksheet->getCellByColumnAndRow ( $this->columnasNominas ['txt_nombre'], $row )->getCalculatedValue ();
		$nomina = CatNominas::find ()->where ( [ 
				'txt_nombre' => $nombreNomina 
		] )->one ();
		
		if (empty ( $nomina )) {
			$nomina = new CatNominas ();
			$nomina->txt_nombre = $nombreNomina;
			$nomina->save ();
			return $nomina;
		}
		
		return $nomina;
	}
	
	/**
	 *
	 * @param unknown $objWorksheet        	
	 * @param unknown $row        	
	 * @return \app\models\CatSucursales|\app\models\CatSucursales|\yii\db\ActiveRecord|NULL
	 */
	public function loadSucursales($objWorksheet, $row) {
		$nombreSucursal = $objWorksheet->getCellByColumnAndRow ( $this->columnasSucursales ['txt_nombre'], $row )->getCalculatedValue ();
		$sucursal = CatSucursales::find ()->where ( [ 
				'txt_nombre' => $nombreSucursal 
		] )->one ();
		
		if (empty ( $sucursal )) {
			$sucursal = new CatSucursales ();
			$sucursal->txt_nombre = $nombreSucursal;
			$sucursal->save ();
			return $sucursal;
		}
		
		return $sucursal;
	}
	
	/**
	 *
	 * @param unknown $objWorksheet        	
	 * @param unknown $row        	
	 * @return \app\models\CatTiposContratos|\app\models\CatTiposContratos|\yii\db\ActiveRecord|NULL
	 */
	public function loadTipoContrato($objWorksheet, $row) {
		$nombreContrato = $objWorksheet->getCellByColumnAndRow ( $this->columnasTiposContratos ['txt_nombre'], $row )->getCalculatedValue ();
		$contrato = CatTiposContratos::find ()->where ( [ 
				'txt_nombre' => $nombreContrato 
		] )->one ();
		
		if (empty ( $contrato )) {
			$contrato = new CatTiposContratos ();
			$contrato->txt_nombre = $nombreContrato;
			$contrato->save ();
			return $contrato;
		}
		
		return $contrato;
	}
	
	/**
	 *
	 * @param unknown $objWorksheet        	
	 * @param unknown $row        	
	 * @param unknown $idSucursal        	
	 * @param unknown $idTipoContrato        	
	 * @param unknown $idNomina        	
	 * @return \app\models\EntEmpleados|\yii\db\ActiveRecord|NULL
	 */
	public function loadEmpleados($objWorksheet, $row, $idSucursal, $idTipoContrato, $idNomina) {
		$nombreEmpleado = $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['txt_nombre'], $row )->getCalculatedValue ();
		$numEmpleado = $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['num_empleado'], $row )->getCalculatedValue ();
		$observaciones = $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['txt_observaciones'], $row )->getCalculatedValue ();
		$rfc = $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['txt_rfc'], $row )->getCalculatedValue ();
		$numSeguroSocial = $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['num_seguro_social'], $row )->getCalculatedValue ();
		
		if (\PHPExcel_Shared_Date::isDateTime ( $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['fch_alta'], $row ) )) {
			$InvDate = $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['fch_alta'], $row )->getValue ();
			$fchAlta = date ( "Y-m-d H:i:s", \PHPExcel_Shared_Date::ExcelToPHP ( $InvDate ) );
		} else {
			
			$fchAlta = null;
		}
		
		if (\PHPExcel_Shared_Date::isDateTime ( $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['fch_baja'], $row ) )) {
			$InvDate = $objWorksheet->getCellByColumnAndRow ( $this->columnasEmpleado ['fch_baja'], $row )->getValue ();
			$fchBaja = date ( "Y-m-d H:i:s", \PHPExcel_Shared_Date::ExcelToPHP ( $InvDate ) );
		} else {
			
			$fchBaja = null;
		}
		
		$empleado = EntEmpleados::find ()->where ( [ 
				'txt_nombre' => $nombreEmpleado,
				'num_empleado' => $numEmpleado 
		] )->one ();
		
		if (empty ( $empleado )) {
			$empleado = new EntEmpleados ();
			$empleado->txt_usuario = $this->random_username($nombreEmpleado);
			$empleado->txt_password = $this->randomPassword();
		}
		
		$empleado->id_sucursal = $idSucursal;
		$empleado->id_tipo_contrato = $idTipoContrato;
		$empleado->id_nomina = $idNomina;
		$empleado->txt_nombre = $nombreEmpleado;
		$empleado->txt_observaciones = $observaciones;
		$empleado->txt_rfc = $rfc;
		$empleado->num_empleado = $numEmpleado;
		$empleado->num_seguro_social = $numSeguroSocial;
		$empleado->fch_alta = $fchAlta;
		$empleado->fch_baja = $fchBaja;
		$empleado->save ();
		
		return $empleado;
	}
	public function random_username($string) {
		$pattern = " ";
		$firstPart = strstr ( strtolower ( $string ), $pattern, true );
		$secondPart = substr ( strstr ( strtolower ( $string ), $pattern, false ), 0, 3 );
		$nrRand = rand ( 0, 100 );
		
		$username = trim ( $firstPart ) . trim ( $secondPart ) . trim ( $nrRand );
		return $username;
	}
	
	public function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
	/**
	 *
	 * @param unknown $objWorksheet        	
	 * @param unknown $row        	
	 * @param unknown $idEmpleado        	
	 * @param unknown $idBanco        	
	 * @return \app\models\EntDatosBancarios|\yii\db\ActiveRecord|NULL
	 */
	public function loadDatosBancarios($objWorksheet, $row, $idEmpleado, $idBanco) {
		$numeroCuenta = $objWorksheet->getCellByColumnAndRow ( $this->columnasDatosBancarios ['txt_numero_cuenta'], $row )->getCalculatedValue ();
		$clabe = $objWorksheet->getCellByColumnAndRow ( $this->columnasDatosBancarios ['txt_clabe'], $row )->getCalculatedValue ();
		$datosBancario = EntDatosBancarios::find ()->where ( [ 
				'id_empleado' => $idEmpleado,
				'txt_numero_cuenta' => $numeroCuenta,
				'b_habilitado' => 1 
		] )->one ();
		
		if (empty ( $datosBancario )) {
			$datosBancario = new EntDatosBancarios ();
			$datosBancario->id_banco = $idBanco;
			$datosBancario->id_empleado = $idEmpleado;
			$datosBancario->txt_clabe = $clabe;
			$datosBancario->txt_numero_cuenta = $numeroCuenta;
			$datosBancario->save ();
		}
		
		return $datosBancario;
	}
	
	/**
	 *
	 * @param unknown $objWorksheet        	
	 * @param unknown $row        	
	 * @param unknown $idEmpleado        	
	 * @return \app\models\EntEmpleadosContactos|\yii\db\ActiveRecord|NULL
	 */
	public function loadEmpleadosContactos($objWorksheet, $row, $idEmpleado) {
		$contacto = EntEmpleadosContactos::find ()->where ( [ 
				'id_empleado' => $idEmpleado 
		] )->one ();
		$telefono = $objWorksheet->getCellByColumnAndRow ( $this->columnasContactos ['txt_telefono_contacto'], $row )->getCalculatedValue ();
		$mail = $objWorksheet->getCellByColumnAndRow ( $this->columnasContactos ['txt_mail_contacto'], $row )->getCalculatedValue ();
		
		if (empty ( $contacto )) {
			$contacto = new EntEmpleadosContactos ();
			$contacto->id_empleado = $idEmpleado;
			$contacto->txt_telefono_contacto = $telefono;
			$contacto->txt_mail_contacto = $mail;
			$contacto->save ();
		}
		
		return $contacto;
	}
	
	public function loadPagosExtras($objWorksheet, $row, $idEmpleado, $idPago) {
		
		$pagosExtras = WrkPagosExtras::deleteAll(['id_empleado'=>$idEmpleado, 'id_nomina'=>$idPago]);
		
		$pago1 = $objWorksheet->getCellByColumnAndRow ( $this->columnasPagosExtras ['extra1'], $row )->getCalculatedValue ();
		$pago2 = $objWorksheet->getCellByColumnAndRow ( $this->columnasPagosExtras ['extra2'], $row )->getCalculatedValue ();
		$pago3 =$objWorksheet->getCellByColumnAndRow ( $this->columnasPagosExtras ['extra3'], $row )->getCalculatedValue ();
		
		$pagoExtra = new WrkPagosExtras();
		$pagoExtra2 = new WrkPagosExtras();
		$pagoExtra3 = new WrkPagosExtras();
		
		$pagoExtra->id_empleado = $idEmpleado;
		$pagoExtra->id_nomina = $idPago;
		$pagoExtra->txt_concepto = 'Venta playa';
		$pagoExtra->num_monto = $pago1;
		$pagoExtra->b_deposito = 0;
		$pagoExtra->save();
		
		$pagoExtra2->id_empleado = $idEmpleado;
		$pagoExtra2->id_nomina = $idPago;
		$pagoExtra2->txt_concepto = 'Minivacs';
		$pagoExtra2->num_monto = $pago2;
		$pagoExtra2->b_deposito = 0;
		$pagoExtra2->save();
		
		$pagoExtra3->id_empleado = $idEmpleado;
		$pagoExtra3->id_nomina = $idPago;
		$pagoExtra3->txt_concepto = 'Cita';
		$pagoExtra3->num_monto = $pago3;
		$pagoExtra3->b_deposito = 0;
		$pagoExtra3->save();
	
		
	}
	
	/**
	 *
	 * @param unknown $objWorksheet        	
	 * @param unknown $row        	
	 * @param unknown $idEmpleado        	
	 * @param unknown $idBanco        	
	 * @param unknown $idSucursal        	
	 * @param unknown $idTipoContrato        	
	 * @param unknown $idNomina        	
	 * @return \app\models\WrkPagosEmpleados|\yii\db\ActiveRecord|NULL
	 */
	public function loadPago($objWorksheet, $row, $idEmpleado, $idBanco, $idSucursal, $idTipoContrato, $idNomina) {
		$diasTrabajados = $objWorksheet->getCellByColumnAndRow ( $this->columnasPago ['num_dias_trabajados'], $row )->getCalculatedValue ();
		$sueldo = $objWorksheet->getCellByColumnAndRow ( $this->columnasPago ['num_sueldo'], $row )->getCalculatedValue ();
		$sueldoFijo = $objWorksheet->getCellByColumnAndRow ( $this->columnasPago ['num_total_sueldo_fijo'], $row )->getCalculatedValue ();
		$facturacion = $objWorksheet->getCellByColumnAndRow ( $this->columnasPago ['num_facturacion'], $row )->getCalculatedValue ();
		$fechaPago = $objWorksheet->getCellByColumnAndRow ( $this->columnasPago ['fch_pago'], $row )->getCalculatedValue ();
		
		if (\PHPExcel_Shared_Date::isDateTime ( $objWorksheet->getCellByColumnAndRow ( $this->columnasPago ['fch_pago'], $row ) )) {
			$InvDate = $objWorksheet->getCellByColumnAndRow ( $this->columnasPago ['fch_pago'], $row )->getValue ();
			$fechaPago = date ( "Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP ( $InvDate ) );
		} else {
			
			$fechaPago = Utils::getFechaActual ();
		}
		
		$ultimoPago = WrkPagosEmpleados::find ()->where ( [ 
				'id_empleado' => $idEmpleado 
		] )->orderBy ( 'fch_pago DESC' )->one ();
		
		if (! $ultimoPago) {
			$ultimoPago = new WrkPagosEmpleados ();
		}
		
		$ultimoPago->id_empleado = $idEmpleado;
		$ultimoPago->id_banco = $idBanco;
		$ultimoPago->id_nomina = $idNomina;
		$ultimoPago->id_sucursal = $idSucursal;
		$ultimoPago->id_tipo_contrato = $idTipoContrato;
		$ultimoPago->num_dias_trabajados = $diasTrabajados;
		$ultimoPago->num_sueldo = $sueldo;
		$ultimoPago->num_total_sueldo_fijo = $sueldoFijo;
		$ultimoPago->num_facturacion = $facturacion;
		$ultimoPago->fch_pago = $fechaPago;
		
		$ultimoPago->save ();
		return $ultimoPago;
	}
	public function actionEmpleadoQuincena() {
		$this->enableCsrfValidation = false;
		
		$session = Yii::$app->session;
		$usu = null;
		$pass = null;
		
		
		
			if($sesionEmpleado = $session->get ( 'empleado')){
				$usu = $sesionEmpleado->txt_usuario;
				$pass = $sesionEmpleado->txt_password;
			}else if(isset($_POST ['usu']) && $_POST ['pass']){
				$usu = $_POST ['usu'];
				$pass = $_POST['pass'];
			}
			
		
		
		$empleado = $session->get ( 'empleado' );
		
		
		// echo $usu;
		// echo $pass;
		// exit();
		
		$emp = EntEmpleados::find ()->where ( [ 
				'txt_usuario' =>  $usu
		] )->andWhere ( [ 
				'txt_password' => $pass
		] )->one ();
		
		if(empty($emp)){
			
			return $this->redirect(['login-empleados']);
		}
		
		$session->set ( 'empleado', $emp);
		
		
		$empleado = ViewEmpleadoCompleto::find ()->where ( [ 
				'id_empleado' => $emp->id_empleado, 
		] )->all ();
		$deducciones = WrkDeduccionesEmpleado::find ()->where ( [ 
				'id_empleado' => $emp->id_empleado 
		] )->all ();
		$extras = WrkPagosExtras::find ()->where ( [ 
				'id_empleado' => $emp->id_empleado,
				'b_deposito'=>0
		] )->all ();
		
		$ultimoPago = WrkPagosEmpleados::find()->where(['id_empleado'=>$emp->id_empleado])->orderBy('fch_pago DESC')->one();
		
		return $this->render ( 'empleadoQuincena', [ 
				'empleado' => $empleado,
				'deducciones' => $deducciones,
				'extras' => $extras ,
				'ultimoPago'=>$ultimoPago
		] );
		
	}
	public function actionLoginEmpleados() {
		$session = Yii::$app->session;
		$session->set ( 'empleado', [ ] );
		
		return $this->render ( 'loginEmpleados' );
	}
}
