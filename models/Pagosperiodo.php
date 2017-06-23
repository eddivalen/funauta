<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagosperiodo".
 *
 * @property integer $id
 * @property string $id_pago
 * @property string $startmonth
 * @property string $endmonth
 * @property string $fecha_pago
 * @property string $banco
 * @property integer $pte_cedula
 * @property string $pte_nombre
 * @property double $monto
 */
class Pagosperiodo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pagosperiodo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startmonth', 'endmonth', 'fecha_pago'], 'safe'],
            [['pte_cedula'], 'integer'],
            [['monto'], 'number'],
            [['id_pago', 'banco', 'pte_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pago' => 'Id Pago',
            'startmonth' => 'Startmonth',
            'endmonth' => 'Endmonth',
            'fecha_pago' => 'Fecha Pago',
            'banco' => 'Banco',
            'pte_cedula' => 'Pte Cedula',
            'pte_nombre' => 'Pte Nombre',
            'monto' => 'Monto',
        ];
    }
}
