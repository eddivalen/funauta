<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tratamiento".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $mto_id
 * @property integer $pte_cedula
 *
 * @property Historia[] $historias
 * @property Medicamento $mto
 * @property Paciente $pteCedula
 */
class Tratamiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tratamiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'mto_id', 'pte_cedula'], 'required'],
            [['mto_id', 'pte_cedula'], 'integer'],
            [['descripcion'], 'string', 'max' => 256],
            [['mto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicamento::className(), 'targetAttribute' => ['mto_id' => 'id']],
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
            'descripcion' => 'Descripcion',
            'mto_id' => 'Mto ID',
            'pte_cedula' => 'Pte Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorias()
    {
        return $this->hasMany(Historia::className(), ['tto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMto()
    {
        return $this->hasOne(Medicamento::className(), ['id' => 'mto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPteCedula()
    {
        return $this->hasOne(Paciente::className(), ['cedula' => 'pte_cedula']);
    }
}
