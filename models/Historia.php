<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historia".
 *
 * @property integer $id
 * @property string $fecha
 * @property string $observaciones
 * @property integer $tto_id
 * @property integer $tta_tpa_id
 * @property integer $tta_eta_cedula
 *
 * @property TerapiaEspecialista $ttaTpa
 * @property Tratamiento $tto
 */
class Historia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'observaciones', 'tto_id', 'tta_tpa_id', 'tta_eta_cedula'], 'required'],
            [['fecha'], 'safe'],
            [['tto_id', 'tta_tpa_id', 'tta_eta_cedula'], 'integer'],
            [['observaciones'], 'string', 'max' => 256],
            [['tta_tpa_id', 'tta_eta_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => TerapiaEspecialista::className(), 'targetAttribute' => ['tta_tpa_id' => 'tpa_id', 'tta_eta_cedula' => 'eta_cedula']],
            [['tto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tratamiento::className(), 'targetAttribute' => ['tto_id' => 'id']],
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
            'observaciones' => 'Observaciones',
            'tto_id' => 'Tto ID',
            'tta_tpa_id' => 'Tta Tpa ID',
            'tta_eta_cedula' => 'Tta Eta Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTtaTpa()
    {
        return $this->hasOne(TerapiaEspecialista::className(), ['tpa_id' => 'tta_tpa_id', 'eta_cedula' => 'tta_eta_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTto()
    {
        return $this->hasOne(Tratamiento::className(), ['id' => 'tto_id']);
    }
}
