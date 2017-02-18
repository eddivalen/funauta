<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "his_terapias_paciente".
 *
 * @property integer $id
 * @property integer $pte_cedula
 * @property string $tiempo
 * @property string $descripcion
 *
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
            [['pte_cedula', 'tiempo'], 'required'],
            [['pte_cedula'], 'integer'],
            [['tiempo'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200],
            [['pte_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['pte_cedula' => 'cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pte_cedula' => 'Pte Cedula',
            'tiempo' => 'Tiempo',
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
