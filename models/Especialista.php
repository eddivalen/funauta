<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "especialista".
 *
 * @property integer $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $correo
 *
 * @property TerapiaEspecialista[] $terapiaEspecialistas
 * @property Terapia[] $tpas
 * @property TipoEspecialista $tipoEspecialista
 */
class Especialista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especialista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre', 'apellido'], 'required'],
            [['cedula'], 'integer'],
            [['nombre', 'apellido', 'telefono', 'correo'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }
    public function getfullName(){
                return $this->nombre.' '.$this->apellido;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerapiaEspecialistas()
    {
        return $this->hasMany(TerapiaEspecialista::className(), ['eta_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpas()
    {
        return $this->hasMany(Terapia::className(), ['id' => 'tpa_id'])->viaTable('terapia_especialista', ['eta_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEspecialista()
    {
        return $this->hasOne(TipoEspecialista::className(), ['eta_cedula' => 'cedula']);
    }
}
