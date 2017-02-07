<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "act_rep".
 *
 * @property integer $id
 * @property integer $ate_id
 * @property integer $rte_cedula
 *
 * @property Actividades $ate
 * @property Representante $rteCedula
 */
class ActRep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'act_rep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ate_id', 'rte_cedula'], 'required'],
            [['ate_id', 'rte_cedula'], 'integer'],
            [['ate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actividades::className(), 'targetAttribute' => ['ate_id' => 'id']],
            [['rte_cedula'], 'exist', 'skipOnError' => true, 'targetClass' => Representante::className(), 'targetAttribute' => ['rte_cedula' => 'cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ate_id' => 'Ate ID',
            'rte_cedula' => 'Rte Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAte()
    {
        return $this->hasOne(Actividades::className(), ['id' => 'ate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRteCedula()
    {
        return $this->hasOne(Representante::className(), ['cedula' => 'rte_cedula']);
    }
}
