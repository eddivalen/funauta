<?php

namespace app\controllers;

use Yii;
use app\models\PacienteEvaluacion;
use app\models\PacienteEvaluacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PacienteEvaluacionController implements the CRUD actions for PacienteEvaluacion model.
 */
class PacienteEvaluacionController extends Controller
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
     * Lists all PacienteEvaluacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PacienteEvaluacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PacienteEvaluacion model.
     * @param integer $id
     * @param string $fecha
     * @return mixed
     */
    public function actionView($id, $fecha)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $fecha),
        ]);
    }

    /**
     * Creates a new PacienteEvaluacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PacienteEvaluacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'fecha' => $model->fecha]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PacienteEvaluacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $fecha
     * @return mixed
     */
    public function actionUpdate($id, $fecha)
    {
        $model = $this->findModel($id, $fecha);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'fecha' => $model->fecha]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PacienteEvaluacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $fecha
     * @return mixed
     */
    public function actionDelete($id, $fecha)
    {
        $this->findModel($id, $fecha)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PacienteEvaluacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $fecha
     * @return PacienteEvaluacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $fecha)
    {
        if (($model = PacienteEvaluacion::findOne(['id' => $id, 'fecha' => $fecha])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
