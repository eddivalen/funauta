<?php

namespace app\controllers;

use Yii;
use mPDF;
use kartik\mpdf\Pdf;
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

        $session = Yii::$app->session;
        // check if a session is already open
        if (!$session->isActive){
            $session->open();// open a session
        } 
        // save query here
    $session['repquery'] = Yii::$app->request->queryParams;
        return $this->render('index', [
            'searchModel'   => $searchModel,
            'dataProvider'  => $dataProvider,
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
        if ($nucleo_fam->load(Yii::$app->request->post()) && $nucleo_fam->save()){
            $nucleo_fam->save(false);
            $paciente->nca_id = $nucleo_fam->id;
            if ($paciente->load(Yii::$app->request->post()) && $paciente->save()) {
                 $paciente->save(false);
                 $hisTerapias->pte_cedula = $paciente->cedula;
                 if($hisTerapias->load(Yii::$app->request->post()) && $hisTerapias->save())
                    $hisTerapias->save(false);    
            }
            return $this->redirect(['view', 'id' => $paciente->cedula]);
           // return $this->redirect(array('view', 'paciente' => $paciente->cedula, 'nucleo_fam' => $nucleo_fam->id));
        }else{
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
        $hisTerapias = HisTerapiasPaciente::findOne(['pte_cedula' => $id]);
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
    public function actionDelete($id)
    {
        $this->findHisTerapiasPaciente($id)->delete();
        $this->findModelPaciente($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionReport() {
        $searchModel = new PacienteSerch();
        // restore query using session
        $dataProvider = $searchModel->search(Yii::$app->session->get('repquery'));
        // get your HTML raw content without any layouts or scripts
        $content = $this->render('report', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content, 
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Reporte'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
 
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        // return the pdf output as per the destination setting
        return $pdf->render();
    }
    public function actionExport(){
      $this->layout='report';
      $model = Paciente::find()->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('template',['model'=>$model]));
      //$mpdf->Output();
      $mpdf->Output('MyPDF.pdf', 'I');
      exit;
    }
    public function actionExportview($id){
      $this->layout='report';
      $model =  Paciente::find()->where(['cedula' => $id])->all();//Paciente::find()->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('template_view',['model'=>$model]));
      //$mpdf->Output();
      $mpdf->Output('MyPDF.pdf', 'I');
      exit;
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
        if (($model = HisTerapiasPaciente::findOne(['pte_cedula' => $id]) !== null)){
           // $id_enc = $model->pte_cedula;
            $model = HisTerapiasPaciente::findOne(['pte_cedula' => $id]);
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
