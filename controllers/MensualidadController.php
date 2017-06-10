<?php

namespace app\controllers;

use Yii;
use app\models\Mensualidad;
use app\models\MensualidadSearch;
use app\models\MensualidadMeses;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
/**
 * MensualidadController implements the CRUD actions for Mensualidad model.
 */
class MensualidadController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
             'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view'],
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

    /**
     * Lists all Mensualidad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MensualidadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mensualidad model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $mensualidad       = new Mensualidad();
        $mensualidad_meses = new MensualidadMeses();
        $mensualidad       = Mensualidad::findOne($id);
        //No puede ser findOne ---- Cambiar consulta
        $mensualidad_meses = MensualidadMeses::findAll(['mdd_id' => $id]);
        /*$dataProvider = new ActiveDataProvider(
            [
            'query' => MensualidadMeses::findAll(['mdd_id' => $id])
            ]);*/
        $dataProvider = new ArrayDataProvider([
        'key'=>'id',
        'allModels' => $mensualidad_meses,
        'sort' => [
            'attributes' => ['id', 'mdd_id', 'mss_id','monto'],
        ],
        ]);
      //  $searchModel       = new MensualidadSearch();
        //$dataProvider      = $searchModel->search($id);
        return $this->render('view', [
            'mensualidad'       => $mensualidad,
            'mensualidad_meses' => $mensualidad_meses,
            'dataProvider'      => $dataProvider,
        //    'searchModel'       => $searchModel,
 
        ]);
    }

    /**
     * Creates a new Mensualidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $mensualidad = new Mensualidad();
        $mensualidad_meses = new MensualidadMeses();
         if ($mensualidad->load(Yii::$app->request->post()) && $mensualidad->save()) {
            $mensualidad->save(false);
            $mensualidad_meses->mdd_id = $mensualidad->id;
        if ($mensualidad_meses->load(Yii::$app->request->post()) && $mensualidad_meses->save())
            $mensualidad_meses->save(false);
             
        return $this->redirect(['view', 'id' => $mensualidad->id]);
            
        }else {
            return $this->render('create', [
                'mensualidad'       =>$mensualidad,
                'mensualidad_meses' =>$mensualidad_meses,
            ]);
        }
    }

    /**
     * Updates an existing Mensualidad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $mensualidad = Mensualidad::findOne($id);
        $mensualidad_meses = MensualidadMeses::findOne(['mdd_id' => $id]);
       // var_dump($mensualidad_meses);
         if (!$mensualidad) {
            throw new NotFoundHttpException("La mensualidad no fue encontrada.");
        }
        
        if (!$mensualidad_meses) {
            throw new NotFoundHttpException("El pago de la mensualidad no fue encontrado.");
        }
        if ($mensualidad->load(Yii::$app->request->post()) && $mensualidad_meses->load(Yii::$app->request->post())){
            $isValid = $mensualidad->validate() && $mensualidad_meses->validate();
            if($isValid){
                $mensualidad->save(false);
                $mensualidad_meses->save(false);
                return $this->redirect(['view', 'id' => $mensualidad->id]);
            } 
        } 
        return $this->render('update', [
            'mensualidad'       => $mensualidad,
            'mensualidad_meses' => $mensualidad_meses,
        ]);
    }

    /**
     * Deletes an existing Mensualidad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModelMensualidadMeses($id)->delete();
        $this->findModelMensualidad($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Mensualidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mensualidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelMensualidad($id)
    {
        if (($model = Mensualidad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelMensualidadMeses($id)
    {
        if (($model = MensualidadMeses::findOne(['mdd_id' => $id]) !== null)) {
            $model = MensualidadMeses::findOne(['mdd_id' => $id]);
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
