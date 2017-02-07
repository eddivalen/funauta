<?php

namespace app\controllers;

use Yii;
use app\models\TerapiaEspecialista;
use app\models\TerapiaEspecialistaSerch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TerapiaEspecialistaController implements the CRUD actions for TerapiaEspecialista model.
 */
class TerapiaEspecialistaController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all TerapiaEspecialista models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TerapiaEspecialistaSerch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TerapiaEspecialista model.
     * @param integer $tpa_id
     * @param integer $eta_cedula
     * @return mixed
     */
    public function actionView($tpa_id, $eta_cedula)
    {
        return $this->render('view', [
            'model' => $this->findModel($tpa_id, $eta_cedula),
        ]);
    }

    /**
     * Creates a new TerapiaEspecialista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TerapiaEspecialista();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TerapiaEspecialista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $tpa_id
     * @param integer $eta_cedula
     * @return mixed
     */
    public function actionUpdate($tpa_id, $eta_cedula)
    {
        $model = $this->findModel($tpa_id, $eta_cedula);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TerapiaEspecialista model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $tpa_id
     * @param integer $eta_cedula
     * @return mixed
     */
    public function actionDelete($tpa_id, $eta_cedula)
    {
        $this->findModel($tpa_id, $eta_cedula)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TerapiaEspecialista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $tpa_id
     * @param integer $eta_cedula
     * @return TerapiaEspecialista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tpa_id, $eta_cedula)
    {
        if (($model = TerapiaEspecialista::findOne(['tpa_id' => $tpa_id, 'eta_cedula' => $eta_cedula])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
