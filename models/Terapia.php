<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terapia".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $tipo
 *
 * @property TerapiaEspecialista[] $terapiaEspecialistas
 * @property Especialista[] $etaCedulas
 */
class Terapia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terapia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 256],
            [['tipo'], 'string', 'max' => 45],
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
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerapiaEspecialistas()
    {
        return $this->hasMany(TerapiaEspecialista::className(), ['tpa_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtaCedulas()
    {
        return $this->hasMany(Especialista::className(), ['cedula' => 'eta_cedula'])->viaTable('terapia_especialista', ['tpa_id' => 'id']);
    }
}
