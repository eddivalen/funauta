<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivel_socioeconomico".
 *
 * @property integer $id
 * @property string $vivienda
 * @property string $transporte
 * @property double $ingresos
 *
 * @property Representante[] $representantes
 */
class NivelSocioeconomico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivel_socioeconomico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingresos'], 'number'],
            [['vivienda', 'transporte'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vivienda' => 'Vivienda',
            'transporte' => 'Transporte',
            'ingresos' => 'Ingresos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepresentantes()
    {
        return $this->hasMany(Representante::className(), ['nvo_id' => 'id']);
    }
}
