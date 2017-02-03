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

class SiteController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),
						'only' => [ 
								'logout' 
						],
						'rules' => [ 
								[ 
										'actions' => [ 
												'logout' 
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
	
	/**
	 */
	public function actionUploadFile() {
		Yii::$app->response->format = Response::FORMAT_HTML;
		ini_set ( 'max_execution_time', 36000 );
		ini_set ( 'memory_limit', '512M' );
		$alias = Yii::getAlias ( '@app' ) . '/vendor/PHPExcel/Classes';
		require ($alias . DIRECTORY_SEPARATOR . 'PHPExcel.php');
		
		$file = UploadedFile::getInstanceByName ( 'fileUpload' );
		
		if ($file) {
			$objPHPExcel = \PHPExcel_IOFactory::load ( $file->tempName );
			$objWorksheet = $objPHPExcel->getActiveSheet ();
			
			$highestRow = $objWorksheet->getHighestRow ();
			$highestColumn = $objWorksheet->getHighestColumn ();
			
			$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString ( $highestColumn );
			
			echo '<table border="1">' . "\n";
			for($row = 7; $row <= $highestRow; ++ $row) {
				echo '<tr>' . "\n";
				
				for($col = 5; $col <= $highestColumnIndex; ++ $col) {
					echo '<td>' . $objWorksheet->getCellByColumnAndRow ( $col, $row )->getCalculatedValue () . '</td>' . "\n";
				}
				
				echo '</tr>' . "\n";
			}
			echo '</table>' . "\n";
		}
		
		// return ['status'=>'error'];
	}
}
