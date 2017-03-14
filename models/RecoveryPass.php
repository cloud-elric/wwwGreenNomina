<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\modules\ModUsuarios\models\EntUsuarios;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RecoveryPass extends Model
{
    public $email;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email'], 'required', 'message'=>'Campo requerido'],
        		[
        		[
        				'email'
        		],
        		'exist',
        		'skipOnError' => false,
        		'message'=>'El usuario no se encuentra en la base datos.',
        		'targetClass' => EntEmpleadosContactos::className (),
        		'targetAttribute' => [
        				'email' => 'txt_mail_contacto',
        		],
        		//'filter'=>'b_usado=0'
        				] ,
        		[
        		'email',
        		'trim'
        				],
        		[
        		'email', 'email', 'message'=>'Formato de correo no valido'
        				],
            // rememberMe must be a boolean value
        ];
    }

}
