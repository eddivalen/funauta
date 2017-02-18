<?php

namespace app\controllers;

use Yii;
use app\models\Paciente;
use app\models\Inscripcion;
use app\models\PacienteSerch;
use app\models\Institucion;
use app\models\InstitucionSerch;
use app\models\NucleoFamiliar;
use app\models\NucleoFamiliarSerch;
use app\models\HisTerapiasPaciente;
use app\models\HisTerapiasPacienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;
use yii\base\Model;
use yii\filters\AccessControl;

class InscripcionController extends \yii\web\Controller
{
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
   public function actionIndex()
    {
        $searchModel   = new PacienteSerch();
        $dataProvider  = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel2  = new NucleoFamiliarSerch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'   => $searchModel,
            'dataProvider'  => $dataProvider,
            'searchModel2'  =>$searchModel2,
            'dataProvider2' =>$dataProvider2,
        ]);
    }

	public function actionView($id)
    {  
     $paciente = new Paciente();
     $nucleo_fam = new NucleoFamiliar();
     $hisTerapias = new HisTerapiasPaciente();
     $searchModel = new HisTerapiasPacienteSearch();
     $dataProvider = $searchModel->searchFilter($id);
        return $this->render('view', [
            'paciente'     => $this->findModelPaciente($id),
            'hisTerapias'  => $this->findHisTerapiasPaciente($id),
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            //'nucleo_fam'=>$this->findModelInstitucion($idNucleo),
        ]);
    }

    public function actionCreate()
    {
        $paciente = new Paciente();
        $institucion = new Institucion();
        $nucleo_fam = new NucleoFamiliar();
        $hisTerapias = new HisTerapiasPaciente();
        if ( $nucleo_fam->load(Yii::$app->request->post()) && $nucleo_fam->save()){
            $nucleo_fam->save(false);
            $paciente->nca_id = $nucleo_fam->id;
            if ($paciente->load(Yii::$app->request->post()) && $paciente->save()) {
                 $paciente->save(false);
                 $hisTerapias->pte_cedula = $paciente->id;
                 if($hisTerapias->load(Yii::$app->request->post()) && $hisTerapias->save())
                    $hisTerapias->save(false);
                
            }
            return $this->redirect(['view', 'id' => $paciente->cedula]);
           // return $this->redirect(array('view', 'paciente' => $paciente->cedula, 'nucleo_fam' => $nucleo_fam->id));
        } else {
            return $this->render('create', [
                'paciente'    => $paciente,
                'institucion' => $institucion,
                'nucleo_fam'  => $nucleo_fam,
                'hisTerapias' => $hisTerapias,
            ]);
        }
    }

       public function actionUpdate($id){
        $paciente = Paciente::findOne($id);
        $nucleo_fam = NucleoFamiliar::findOne($paciente->nca_id);
        $hisTerapias = new HisTerapiasPaciente();
       // $hisTerapias = HisTerapiasPaciente::findOne($paciente->)
        if (!$paciente) {
            throw new NotFoundHttpException("The paciente was not found.");
        }
        
        if (!$nucleo_fam) {
            throw new NotFoundHttpException("The paciente has no nucleo_fam.");
        }
        
        if ($paciente->load(Yii::$app->request->post()) && $nucleo_fam->load(Yii::$app->request->post()) 
            && $hisTerapias->load(Yii::$app->request->post())) {
            $isValid = $paciente->validate();
            $isValid = $nucleo_fam->validate() && $isValid;
            $isValid = $hisTerapias->validate() && $isValid;
            if ($isValid) {
                $paciente->save(false);
                $nucleo_fam->save(false);
                $hisTerapias->save(false);
                return $this->redirect(['inscripcion/view', 'id' => $id]);
            }
        }
        
        return $this->render('update', [
            'paciente'    => $paciente,
            'nucleo_fam'  => $nucleo_fam,
            'hisTerapias' => $hisTerapias,
        ]);
    }
    protected function findModelPaciente($id)
    {
       
        if (($model = Paciente::findOne($id)) !== null) {
            return $model;
        }

        throw new HttpException(404, 'The requested page does not exist.');
         echo $id;
    }
     protected function findHisTerapiasPaciente($id)
    {
       //$customer = Customer::find()->where(['id' => 10])->one();
        //$customer = Customer::findOne(['age' => 30, 'status' => 1]);
        if (($model = HisTerapiasPaciente::findOne(['pte_cedula' => $id]) !== null)) {
            $id_enc = $model;
            $model = HisTerapiasPaciente::findOne($id_enc);
            //echo  print_r($model);
            return $model;
        }

        throw new HttpException(404, 'The requested page does not exist.');
         echo $id;
    }
    protected function findModelInstitucion($id)
    {
       
        if (($model = Institucion::findOne($id)) !== null) {
            return $model;
        }
        throw new HttpException(404, 'The requested page does not exist.');
         echo $id;
    }
}
