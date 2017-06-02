<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente_evaluacion".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $pte_cedula
 * @property string $motivo
 * @property string $descripcion
 * @property integer $eta_cedula
 *
 * @property Paciente $pteCedula
 * @property Especialista $etaCedula
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
            [['fecha', 'pte_cedula', 'motivo', 'eta_cedula'], 'required'],
            [['fecha'], 'safe'],
            [['pte_cedula', 'eta_cedula'], 'integer'],
            [['motivo'], 'string', 'max' => 256],
            [['descripcion'], 'string', 'max' => 250],
            [['pte_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['pte_cedula' => 'cedula']],
            [['eta_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Especialista::className(), 'targetAttribute' => ['eta_cedula' => 'cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'pte_cedula' => 'Paciente',
            'motivo' => 'Motivo',
            'descripcion' => 'Descripcion',
            'eta_cedula' => 'Especialista',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPteCedula()
    {
        return $this->hasOne(Paciente::className(), ['cedula' => 'pte_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtaCedula()
    {
        return $this->hasOne(Especialista::className(), ['cedula' => 'eta_cedula']);
    }
}
