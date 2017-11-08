<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
    
    public static function getDb()
    {
        return Yii::$app->db;
    }
    
    public static function tableName()
    {
        return 'users';
    }
     public function rules()
    {
        return [
            [['role','username','email','password'], 'required'],
            [['role'], 'integer'],
            [['username', 'email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 250],
        ];
    }
}