<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "his_terapias_paciente".
 *
 * @property integer $pte_cedula
 * @property integer $hpa_id
 * @property string $tiempo
 *
 * @property HistorialTerapias $hpa
 * @property Paciente $pteCedula
 */
class HisTerapiasPaciente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'his_terapias_paciente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pte_cedula', 'hpa_id', 'tiempo'], 'required'],
            [['pte_cedula', 'hpa_id'], 'integer'],
            [['tiempo'], 'string', 'max' => 45],
            [['hpa_id'], 'exist', 'skipOnError' => true, 'targetClass' => HistorialTerapias::className(), 'targetAttribute' => ['hpa_id' => 'id']],
            [['pte_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['pte_cedula' => 'cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pte_cedula' => 'Pte Cedula',
            'hpa_id' => 'Hpa ID',
            'tiempo' => 'Tiempo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHpa()
    {
        return $this->hasOne(HistorialTerapias::className(), ['id' => 'hpa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPteCedula()
    {
        return $this->hasOne(Paciente::className(), ['cedula' => 'pte_cedula']);
    }
}
