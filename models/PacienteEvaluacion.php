<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente_evaluacion".
 *
 * @property string $fecha
 * @property string $motivo
 * @property integer $pte_cedula
 * @property integer $ecn_id
 *
 * @property Evaluacion $ecn
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
            [['fecha', 'motivo', 'pte_cedula', 'ecn_id'], 'required'],
            [['fecha'], 'safe'],
            [['pte_cedula', 'ecn_id'], 'integer'],
            [['motivo'], 'string', 'max' => 256],
            [['ecn_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evaluacion::className(), 'targetAttribute' => ['ecn_id' => 'id']],
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
            'motivo' => 'Motivo',
            'pte_cedula' => 'Pte Cedula',
            'ecn_id' => 'Ecn ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcn()
    {
        return $this->hasOne(Evaluacion::className(), ['id' => 'ecn_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPteCedula()
    {
        return $this->hasOne(Paciente::className(), ['cedula' => 'pte_cedula']);
    }
}
