<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "representante".
 *
 * @property integer $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $nacionalidad
 * @property integer $edad
 * @property string $edo_civil
 * @property string $direccion
 * @property string $telefono_local
 * @property string $telefono_celular
 * @property string $correo
 * @property string $ocupacion
 * @property string $empresa
 * @property string $horario_trabajo
 * @property string $actividad
 * @property string $disponibilidad
 * @property integer $nvo_id
 *
 * @property ActRep[] $actReps
 * @property Paciente[] $pacientes
 * @property NivelSocioeconomico $nvo
 */
class Representante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'representante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre', 'apellido', 'nacionalidad', 'edad', 'edo_civil', 'direccion', 'nvo_id'], 'required'],
            [['cedula', 'edad', 'nvo_id'], 'integer'],
            [['nacionalidad', 'edo_civil', 'disponibilidad'], 'string'],
            [['nombre', 'apellido', 'direccion', 'telefono_local', 'telefono_celular', 'correo', 'ocupacion', 'empresa', 'horario_trabajo', 'actividad'], 'string', 'max' => 45],
            [['nvo_id'], 'exist', 'skipOnError' => true, 'targetClass' => NivelSocioeconomico::className(), 'targetAttribute' => ['nvo_id' => 'id']],
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
            'nacionalidad' => 'Nacionalidad',
            'edad' => 'Edad',
            'edo_civil' => 'Edo Civil',
            'direccion' => 'Direccion',
            'telefono_local' => 'Telefono Local',
            'telefono_celular' => 'Telefono Celular',
            'correo' => 'Correo',
            'ocupacion' => 'Ocupacion',
            'empresa' => 'Empresa',
            'horario_trabajo' => 'Horario Trabajo',
            'actividad' => 'Actividad',
            'disponibilidad' => 'Disponibilidad',
            'nvo_id' => 'Nvo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActReps()
    {
        return $this->hasMany(ActRep::className(), ['rte_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacientes()
    {
        return $this->hasMany(Paciente::className(), ['rte_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNvo()
    {
        return $this->hasOne(NivelSocioeconomico::className(), ['id' => 'nvo_id']);
    }
}
