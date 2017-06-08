<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meses".
 *
 * @property integer $id
 * @property string $mes
 * @property string $anio
 * @property string $info
 *
 * @property MensualidadMeses[] $mensualidadMeses
 */
class Meses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mes', 'anio'], 'required'],
            [['mes', 'anio', 'info'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mes' => 'Mes',
            'anio' => 'Año',
            'info' => 'Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensualidadMeses()
    {
        return $this->hasMany(MensualidadMeses::className(), ['mss_id' => 'id']);
    }
}
