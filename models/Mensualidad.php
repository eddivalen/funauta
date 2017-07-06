<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensualidad".
 *
 * @property integer $id
 * @property string $id_pago
 * @property string $fecha
 * @property string $banco
 * @property integer $rte_cedula
 *
 * @property Representante $rteCedula
 * @property MensualidadMeses[] $mensualidadMeses
 */
class Mensualidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $rango_fecha;
    public $fullname_representante;
    public static function tableName()
    {
        return 'mensualidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pago', 'fecha', 'rte_cedula','monto'], 'required'],
            [['fecha','rango_fecha'], 'safe'],
            [['rte_cedula'], 'integer'],
            [['monto'], 'number'],
            [['id_pago', 'banco'], 'string', 'max' => 45],
            [['rte_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Representante::className(), 'targetAttribute' => ['rte_cedula' => 'cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pago' => 'Numero de pago',
            'fecha' => 'Fecha',
            'banco' => 'Banco',
            'rte_cedula' => 'Representante',
            'monto' => 'Monto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRteCedula()
    {
        return $this->hasOne(Representante::className(), ['cedula' => 'rte_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensualidadMeses()
    {
        return $this->hasMany(MensualidadMeses::className(), ['mdd_id' => 'id']);
    }
}
