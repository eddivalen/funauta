<?php

namespace app\controllers;

use Yii;
use app\models\Paciente;
use app\models\Inscripcion;
use app\models\PacienteSerch;
use app\models\Institucion;
use app\models\InstitucionSerch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;
class InscripcionController extends \yii\web\Controller
{
	 public function behaviors()
    {
        return [
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
        $searchModel = new PacienteSerch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $paciente = new Paciente();
        $institucion = new Institucion();

        if ($paciente->load(Yii::$app->request->post()) && $institucion->load(Yii::$app->request->post()) && Model::validateMultiple([$paciente, $institucion])) {
        	$paciente->save(false);
        	$institucion->id = $paciente->ico_id;
        	$institucion->save(false);

            return $this->redirect(['view', 'id' => $paciente->cedula]);
        } else {
            return $this->render('create', [
                'paciente' => $paciente,
                'institucion'=> $institucion,
            ]);
        }
    }/*
    public function actionCreate()
    {
        $institucionForm = new Inscripcion();
        $institucionForm->institucion = new Institucion;
        $institucionForm->setAttributes(Yii::$app->request->post());
        if (Yii::$app->request->post() && $institucionForm->save()) {
            Yii::$app->getSession()->setFlash('success', 'institucion has been created.');
            return $this->redirect(['update', 'id' => $institucionForm->institucion->id]);
        } elseif (!Yii::$app->request->isPost) {
            $institucionForm->load(Yii::$app->request->get());
        }
        return $this->render('create', ['institucionForm' => $institucionForm]);
    }
      public function actionUpdate($id)
    {
        $institucionForm = new Inscripcion();
        $institucionForm->institucion = $this->findModel($id);
        $institucionForm->setAttributes(Yii::$app->request->post());
        if (Yii::$app->request->post() && $institucionForm->save()) {
            Yii::$app->getSession()->setFlash('success', 'institucion has been updated.');
            return $this->redirect(['update', 'id' => $institucionForm->institucion->id]);
        } elseif (!Yii::$app->request->isPost) {
            $institucionForm->load(Yii::$app->request->get());
        }
        return $this->render('update', ['institucionForm' => $institucionForm]);
    }
    */
    protected function findModel($id)
    {
        if (($model = Institucion::findOne($id)) !== null) {
            return $model;
        }
        throw new HttpException(404, 'The requested page does not exist.');
    }
}
