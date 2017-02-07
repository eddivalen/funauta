<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property integer $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property string $lugar_nacimiento
 * @property integer $edad
 * @property string $sexo
 * @property integer $rte_cedula
 * @property integer $ico_id
 * @property integer $nca_id
 *
 * @property HisTerapiasPaciente[] $hisTerapiasPacientes
 * @property HistorialTerapias[] $hpas
 * @property Institucion $ico
 * @property NucleoFamiliar $nca
 * @property Representante $rteCedula
 * @property PacienteEvaluacion[] $pacienteEvaluacions
 * @property TerapiaEspecialista[] $terapiaEspecialistas
 * @property Tratamiento[] $tratamientos
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre', 'apellido', 'fecha_nacimiento', 'lugar_nacimiento', 'edad', 'sexo', 'rte_cedula', 'ico_id', 'nca_id'], 'required'],
            [['cedula', 'edad', 'rte_cedula', 'ico_id', 'nca_id'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['sexo'], 'string'],
            [['nombre', 'apellido', 'lugar_nacimiento'], 'string', 'max' => 45],
            [['ico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institucion::className(), 'targetAttribute' => ['ico_id' => 'id']],
            [['nca_id'], 'exist', 'skipOnError' => true, 'targetClass' => NucleoFamiliar::className(), 'targetAttribute' => ['nca_id' => 'id']],
            [['rte_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Representante::className(), 'targetAttribute' => ['rte_cedula' => 'cedula']],
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
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'lugar_nacimiento' => 'Lugar Nacimiento',
            'edad' => 'Edad',
            'sexo' => 'Sexo',
            'rte_cedula' => 'Rte Cedula',
            'ico_id' => 'Ico ID',
            'nca_id' => 'Nca ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHisTerapiasPacientes()
    {
        return $this->hasMany(HisTerapiasPaciente::className(), ['pte_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHpas()
    {
        return $this->hasMany(HistorialTerapias::className(), ['id' => 'hpa_id'])->viaTable('his_terapias_paciente', ['pte_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIco()
    {
        return $this->hasOne(Institucion::className(), ['id' => 'ico_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNca()
    {
        return $this->hasOne(NucleoFamiliar::className(), ['id' => 'nca_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRteCedula()
    {
        return $this->hasOne(Representante::className(), ['cedula' => 'rte_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacienteEvaluacions()
    {
        return $this->hasMany(PacienteEvaluacion::className(), ['pte_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerapiaEspecialistas()
    {
        return $this->hasMany(TerapiaEspecialista::className(), ['pte_cedula' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTratamientos()
    {
        return $this->hasMany(Tratamiento::className(), ['pte_cedula' => 'cedula']);
    }
}
