<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensualidad_meses".
 *
 * @property integer $id
 * @property integer $mdd_id
 * @property string $mes
 * @property double $monto
 *
 * @property Mensualidad $mdd
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
            [['mdd_id', 'mes', 'monto'], 'required'],
            [['mdd_id'], 'integer'],
            [['mes'], 'safe'],
            [['monto'], 'number'],
            [['mdd_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mensualidad::className(), 'targetAttribute' => ['mdd_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mdd_id' => 'ID Mensualidad',
            'mes' => 'Mes',
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
}
