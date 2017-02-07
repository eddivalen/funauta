<?php

namespace app\controllers;

use Yii;
use app\models\HisTerapiasPaciente;
use app\models\HisTerapiasPacienteSerch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HisTerapiasPacienteController implements the CRUD actions for HisTerapiasPaciente model.
 */
class HisTerapiasPacienteController extends Controller
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
     * Lists all HisTerapiasPaciente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HisTerapiasPacienteSerch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HisTerapiasPaciente model.
     * @param integer $pte_cedula
     * @param integer $hpa_id
     * @return mixed
     */
    public function actionView($pte_cedula, $hpa_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pte_cedula, $hpa_id),
        ]);
    }

    /**
     * Creates a new HisTerapiasPaciente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HisTerapiasPaciente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pte_cedula' => $model->pte_cedula, 'hpa_id' => $model->hpa_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HisTerapiasPaciente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $pte_cedula
     * @param integer $hpa_id
     * @return mixed
     */
    public function actionUpdate($pte_cedula, $hpa_id)
    {
        $model = $this->findModel($pte_cedula, $hpa_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pte_cedula' => $model->pte_cedula, 'hpa_id' => $model->hpa_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HisTerapiasPaciente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $pte_cedula
     * @param integer $hpa_id
     * @return mixed
     */
    public function actionDelete($pte_cedula, $hpa_id)
    {
        $this->findModel($pte_cedula, $hpa_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HisTerapiasPaciente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $pte_cedula
     * @param integer $hpa_id
     * @return HisTerapiasPaciente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pte_cedula, $hpa_id)
    {
        if (($model = HisTerapiasPaciente::findOne(['pte_cedula' => $pte_cedula, 'hpa_id' => $hpa_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
