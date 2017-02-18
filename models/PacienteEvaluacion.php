<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente_evaluacion".
 *
 * @property string $fecha
 * @property integer $pte_cedula
 * @property string $motivo
 * @property string $descripcion
 *
 * @property Paciente $pteCedula
 */
class PacienteEvaluacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paciente_evaluacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'pte_cedula', 'motivo'], 'required'],
            [['fecha'], 'safe'],
            [['pte_cedula'], 'integer'],
            [['motivo'], 'string', 'max' => 256],
            [['descripcion'], 'string', 'max' => 250],
            [['pte_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['pte_cedula' => 'cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fecha' => 'Fecha',
            'pte_cedula' => 'Pte Cedula',
            'motivo' => 'Motivo',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPteCedula()
    {
        return $this->hasOne(Paciente::className(), ['cedula' => 'pte_cedula']);
    }
}
