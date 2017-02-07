<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluacion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property PacienteEvaluacion[] $pacienteEvaluacions
 */
class Evaluacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluacion';
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
    public function getPacienteEvaluacions()
    {
        return $this->hasMany(PacienteEvaluacion::className(), ['ecn_id' => 'id']);
    }
}
