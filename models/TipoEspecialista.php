<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_especialista".
 *
 * @property integer $eta_cedula
 * @property integer $tpo_id
 *
 * @property Especialista $etaCedula
 * @property Tipo $tpo
 */
class TipoEspecialista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_especialista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eta_cedula', 'tpo_id'], 'required'],
            [['eta_cedula', 'tpo_id'], 'integer'],
            [['eta_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Especialista::className(), 'targetAttribute' => ['eta_cedula' => 'cedula']],
            [['tpo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['tpo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eta_cedula' => 'Eta Cedula',
            'tpo_id' => 'Tpo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtaCedula()
    {
        return $this->hasOne(Especialista::className(), ['cedula' => 'eta_cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'tpo_id']);
    }
}
