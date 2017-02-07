<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terapia_especialista".
 *
 * @property integer $tpa_id
 * @property integer $eta_cedula
 * @property integer $pte_cedula
 *
 * @property Historia[] $historias
 * @property Especialista $etaCedula
 * @property Paciente $pteCedula
 * @property Terapia $tpa
 */
class TerapiaEspecialista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terapia_especialista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpa_id', 'eta_cedula', 'pte_cedula'], 'required'],
            [['tpa_id', 'eta_cedula', 'pte_cedula'], 'integer'],
            [['eta_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Especialista::className(), 'targetAttribute' => ['eta_cedula' => 'cedula']],
            [['pte_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['pte_cedula' => 'cedula']],
            [['tpa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Terapia::className(), 'targetAttribute' => ['tpa_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tpa_id' => 'Tpa ID',
            'eta_cedula' => 'Eta Cedula',
            'pte_cedula' => 'Pte Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorias()
    {
        return $this->hasMany(Historia::className(), ['tta_tpa_id' => 'tpa_id', 'tta_eta_cedula' => 'eta_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtaCedula()
    {
        return $this->hasOne(Especialista::className(), ['cedula' => 'eta_cedula']);
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
    public function getTpa()
    {
        return $this->hasOne(Terapia::className(), ['id' => 'tpa_id']);
    }
}
