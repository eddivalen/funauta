<?php
namespace app\controllers;
use Yii;
use app\models\Mensualidad;
use app\models\MensualidadSearch;
use app\models\MensualidadMeses;
use app\models\TerapiaEspecialista;
use app\models\TerapiaEspecialistaSerch;
use app\models\Tratamiento;
use app\models\TratamientoSearch;
use app\models\Pagosperiodo;
use app\models\Representante;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use app\models\Historia;
use app\models\HistoriaSearch;
use mPDF;
use kartik\mpdf\Pdf;

class ReporteController extends \yii\web\Controller
{

        
	public function behaviors()
    {
        return [
             'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view','pagosperiodo','terapiaspaciente','exportpagos','content'],
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
    public function actionPagosperiodo()
    {
      $mensualidad = new Mensualidad();
      $searchModel = new MensualidadSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      if (Yii::$app->request->post()){
        $get = json_decode(Yii::$app->request->post('get'), true);
        $value = ArrayHelper::getValue($get, 'MensualidadSearch');
        if($value){
            $id_pago = $get['MensualidadSearch']['id_pago'];
            $rango_fecha = $get['MensualidadSearch']['rango_fecha'];
            $banco = $get['MensualidadSearch']['banco'];
            $rte_cedula = $get['MensualidadSearch']['rte_cedula'];
            $monto = $get['MensualidadSearch']['monto'];
            $array = $searchModel->searchArray($id_pago,$rango_fecha,$banco,$rte_cedula,$monto);
        }else{
            $array = $searchModel->searchArray(null,null,null,null,null);
        }
        $mpdf=new mPDF('utf-8','A4','','',15,15,35,20,5,5); 
        $mpdf->SetHTMLHeader('<div style="background: url(/imagen/funauta3.jpg) center no-repeat; width: 100%; height: 90px;">
            </div>');
        $mpdf->WriteHTML($this->renderPartial('template-pagos',['model'=>$array]));
        $mpdf->Output('MyPDF.pdf', 'I');
      }
    	return $this->render('pagosperiodo', [
    			'mensualidad' 		=>$mensualidad,
				'dataProvider'      =>$dataProvider,
				'searchModel'       =>$searchModel,
            ]);
    }
    /**
     * Displays a single Mensualidad model.
     * @param array $content
     * @return mixed
     */

    public function actionPacienteespecialista(){
    	$historia = new Historia();
    	$searchModel = new HistoriaSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = ['defaultOrder' => ['tta_eta_cedula'=>SORT_ASC]];
      
      if (Yii::$app->request->post()){
        $get = json_decode(Yii::$app->request->post('get'), true);
        $value = ArrayHelper::getValue($get, 'HistoriaSearch');
        if($value){
            $tta_eta_cedula = $get['HistoriaSearch']['tta_eta_cedula'];
            $array = $searchModel->searchArray($tta_eta_cedula);
        }else{
            $array = $searchModel->searchArray(null);
        }
        $mpdf=new mPDF('utf-8','A4','','',15,15,35,20,5,5); 
        $mpdf->SetHTMLHeader('<div style="background: url(/imagen/funauta3.jpg) center no-repeat; width: 100%; height: 90px;">
            </div>');
        $mpdf->WriteHTML($this->renderPartial('template-pacienteespecialista',['model'=>$array]));
        $mpdf->Output('MyPDF.pdf', 'I');
      }
    	return $this->render('pacienteespecialista', [
				'historia'     =>$historia,
				'dataProvider' =>$dataProvider,
				'searchModel'  =>$searchModel,
            ]);
    }
    public function actionTerapiapaciente(){
        $terapiapaciente = new TerapiaEspecialista();
        $searchModel = new TerapiaEspecialistaSerch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = ['defaultOrder' => ['pte_cedula'=>SORT_ASC]];
      
      if (Yii::$app->request->post()){
        $get = json_decode(Yii::$app->request->post('get'), true);
        $value = ArrayHelper::getValue($get, 'TerapiaEspecialistaSerch');
        if($value){
           $tpa_id = $get['TerapiaEspecialistaSerch']['tpa_id'];
           $pte_cedula = $get['TerapiaEspecialistaSerch']['pte_cedula'];
           $array = $searchModel->searchArray($tpa_id,$pte_cedula); 
        }else{
            $array = $searchModel->searchArray(null,null); 
        }
        $mpdf=new mPDF('utf-8','A4','','',15,15,35,20,5,5); 
        $mpdf->SetHTMLHeader('<div style="background: url(/imagen/funauta3.jpg) center no-repeat; width: 100%; height: 90px;">
            </div>');
        $mpdf->WriteHTML($this->renderPartial('template-terapiapaciente',['model'=>$array]));
        $mpdf->Output('MyPDF.pdf', 'I');
      }
        return $this->render('terapiapaciente', [
                'terapiapaciente' =>$terapiapaciente,
                'dataProvider'    =>$dataProvider,
                'searchModel'     =>$searchModel,
            ]);
    }
    public function actionTratamientopaciente(){
        $tratamiento = new Tratamiento();
        $searchModel = new TratamientoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = ['defaultOrder' => ['pte_cedula'=>SORT_ASC]];
      
      if (Yii::$app->request->post()){
        $get = json_decode(Yii::$app->request->post('get'), true);
        $value = ArrayHelper::getValue($get, 'TratamientoSearch');
        if($value){
            $nombre_tratamiento = $get['TratamientoSearch']['nombre_tratamiento'];
            $pte_cedula = $get['TratamientoSearch']['pte_cedula'];
            $array = $searchModel->searchArray($nombre_tratamiento,$pte_cedula,null);
        }else{
            $array = $searchModel->searchArray(null,null,null);
        }
        $mpdf=new mPDF('utf-8','A4','','',15,15,35,20,5,5); 
        $mpdf->SetHTMLHeader('<div style="background: url(/imagen/funauta3.jpg) center no-repeat; width: 100%; height: 90px;">
            </div>');
        $mpdf->WriteHTML($this->renderPartial('template-tratamientopaciente',['model'=>$array]));
        $mpdf->Output('MyPDF.pdf', 'I');
      }
        return $this->render('tratamientopaciente', [
                'tratamiento'  =>$tratamiento,
                'dataProvider' =>$dataProvider,
                'searchModel'  =>$searchModel,
            ]);
    }
    public function actionMedicamentopaciente(){
        $tratamiento = new Tratamiento();
        $searchModel = new TratamientoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = ['defaultOrder' => ['pte_cedula'=>SORT_ASC]];
      
      if (Yii::$app->request->post()){
        $get = json_decode(Yii::$app->request->post('get'), true);
        $value = ArrayHelper::getValue($get, 'TratamientoSearch');
        if($value){
            $mto_id = $get['TratamientoSearch']['mto_id'];
            $pte_cedula = $get['TratamientoSearch']['pte_cedula'];
            $array = $searchModel->searchArray(null,$pte_cedula,$mto_id);
        }else{
          $array = $searchModel->searchArray(null,null,null);  
        }
        $mpdf=new mPDF('utf-8','A4','','',15,15,35,20,5,5); 
        $mpdf->SetHTMLHeader('<div style="background: url(/imagen/funauta3.jpg) center no-repeat; width: 100%; height: 90px;">
            </div>');
        $mpdf->WriteHTML($this->renderPartial('template-medicamentopaciente',['model'=>$array]));
        $mpdf->Output('MyPDF.pdf', 'I');
      }
        return $this->render('medicamentopaciente', [
                'tratamiento'  =>$tratamiento,
                'dataProvider' =>$dataProvider,
                'searchModel'  =>$searchModel,
            ]);
    }
    public function actionRepresentantesmorosos()
    {
      $mensualidad = new Mensualidad();
      $searchModel = new MensualidadSearch();
     // $query = Mensualidad::find();
       $now = new \DateTime('now'); // get current day
       $date = $now->format('Y-m-d'); //format
       $first_day_month = date('Y-m-01', strtotime($date));//get first day of month
       $end_day_month = date('Y-m-t', strtotime($date));// get end day of month
     //  $query->where(['between','fecha',$first_day_month,$end_day_month])->all();

      $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT * FROM representante
                WHERE cedula NOT IN 
                    (SELECT mensualidad.rte_cedula 
                    FROM mensualidad 
                    WHERE fecha between :first_day_month and :end_day_month)',
        'params' => [':first_day_month' => $first_day_month,':end_day_month'=>$end_day_month],
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);
      $models = $dataProvider->getModels();
       
      if (Yii::$app->request->post()){
        $mpdf=new mPDF('utf-8','A4','','',15,15,35,20,5,5); 
        $mpdf->SetHTMLHeader('<div style="background: url(/imagen/funauta3.jpg) center no-repeat; width: 100%; height: 90px;">
            </div>');
        $mpdf->WriteHTML($this->renderPartial('template-representantesmorosos',['model'=>$models]));
        $mpdf->Output('MyPDF.pdf', 'I');
      }
        return $this->render('representantesmorosos', [
                'mensualidad'       =>$mensualidad,
                'dataProvider'      =>$dataProvider,
                'searchModel'       =>$searchModel,
            ]);
    }

}

