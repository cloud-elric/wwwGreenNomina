<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_comunicados_enviados".
 *
 * @property string $id_comunicado_enviado
 * @property string $id_comunicado
 * @property string $id_lista
 *
 * @property CatComunicados $idComunicado
 * @property EntListasUsuariosRegistrados $idLista
 */
class EntComunicadosEnviados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_comunicados_enviados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comunicado', 'id_lista'], 'integer'],
            [['id_comunicado'], 'exist', 'skipOnError' => true, 'targetClass' => CatComunicados::className(), 'targetAttribute' => ['id_comunicado' => 'id_comunicado']],
            [['id_lista'], 'exist', 'skipOnError' => true, 'targetClass' => EntListasUsuariosRegistrados::className(), 'targetAttribute' => ['id_lista' => 'id_lista_usuario_registrado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comunicado_enviado' => 'Id Comunicado Enviado',
            'id_comunicado' => 'Id Comunicado',
            'id_lista' => 'Lista de envio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComunicado()
    {
        return $this->hasOne(CatComunicados::className(), ['id_comunicado' => 'id_comunicado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLista()
    {
        return $this->hasOne(EntListasUsuariosRegistrados::className(), ['id_lista_usuario_registrado' => 'id_lista']);
    }
}
