<?php

namespace app\controllers;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
class EnviarCorreosController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
             'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
                    ], 
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

}
