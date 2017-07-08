<?php

namespace app\models;
use app\models\Representante;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property integer $id
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $subject
 * @property string $content
 * @property string $attachment
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiver_email'], 'required'],
            [['content'], 'string'],
            [['receiver_name', 'receiver_email', 'subject'], 'string', 'max' => 200],
            [['attachment'], 'string', 'max' => 255],
            [['receiver_email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'subject' => 'Asunto',
            'content' => 'Contenido',
            'attachment' => 'Adjunto',
        ];
    }

    public function getRepresentanteDropdown(){
        $listRepresentante  = Representante::find()->select('nombre,correo')
            ->all();
        $list   = ArrayHelper::map($listRepresentante,'nombre','correo');
        return $list;
    }
}
