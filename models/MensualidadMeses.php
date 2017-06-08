<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensualidad_meses".
 *
 * @property integer $id
 * @property integer $mdd_id
 * @property integer $mss_id
 * @property double $monto
 *
 * @property Mensualidad $mdd
 * @property Meses $mss
 */
class MensualidadMeses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mensualidad_meses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mdd_id', 'mss_id', 'monto'], 'required'],
            [['mdd_id', 'mss_id'], 'integer'],
            [['monto'], 'number'],
            [['mdd_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mensualidad::className(), 'targetAttribute' => ['mdd_id' => 'id']],
            [['mss_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meses::className(), 'targetAttribute' => ['mss_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mdd_id' => 'Mensualidad',
            'mss_id' => 'Mes',
            'monto' => 'Monto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMdd()
    {
        return $this->hasOne(Mensualidad::className(), ['id' => 'mdd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMss()
    {
        return $this->hasOne(Meses::className(), ['id' => 'mss_id']);
    }
}
