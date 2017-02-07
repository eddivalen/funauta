<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historial_terapias".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property HisTerapiasPaciente[] $hisTerapiasPacientes
 * @property Paciente[] $pteCedulas
 */
class HistorialTerapias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historial_terapias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHisTerapiasPacientes()
    {
        return $this->hasMany(HisTerapiasPaciente::className(), ['hpa_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPteCedulas()
    {
        return $this->hasMany(Paciente::className(), ['cedula' => 'pte_cedula'])->viaTable('his_terapias_paciente', ['hpa_id' => 'id']);
    }
}
