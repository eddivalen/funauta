<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nucleo_familiar".
 *
 * @property integer $id
 * @property integer $madre
 * @property integer $padre
 * @property integer $compmadre
 * @property integer $comppadre
 * @property integer $hermanos
 * @property integer $hermanas
 * @property integer $tias
 * @property integer $tios
 * @property integer $abuelo
 * @property integer $otros
 * @property string $descripcion
 *
 * @property Paciente[] $pacientes
 */
class NucleoFamiliar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nucleo_familiar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['madre', 'padre', 'compmadre', 'comppadre', 'hermanos', 'hermanas', 'tias', 'tios', 'abuelo', 'otros'], 'integer'],
            [['descripcion'], 'string', 'max' => 254],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'madre' => 'Madre',
            'padre' => 'Padre',
            'compmadre' => 'Compmadre',
            'comppadre' => 'Comppadre',
            'hermanos' => 'Hermanos',
            'hermanas' => 'Hermanas',
            'tias' => 'Tias',
            'tios' => 'Tios',
            'abuelo' => 'Abuelo',
            'otros' => 'Otros',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacientes()
    {
        return $this->hasMany(Paciente::className(), ['nca_id' => 'id']);
    }
}
