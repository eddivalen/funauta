<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicamento".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $tipo
 * @property string $descripcion
 *
 * @property Tratamiento[] $tratamientos
 */
class Medicamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo', 'descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTratamientos()
    {
        return $this->hasMany(Tratamiento::className(), ['mto_id' => 'id']);
    }
}
