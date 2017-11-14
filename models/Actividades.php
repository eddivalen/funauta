<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actividades".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $nombre_act
 *
 * @property ActRep[] $actReps
 */
class Actividades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actividades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_act'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripción',
            'nombre_act' => 'Nombre Actividad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActReps()
    {
        return $this->hasMany(ActRep::className(), ['ate_id' => 'id']);
    }
}
