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
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
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
                        'only' => ['index','create','update','view','pagosperiodo','terapiaspaciente','exportpagos','exportterapiaspaciente','content'],
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
        var_dump($get['MensualidadSearch']['id_pago']);
        $id_pago = $get['MensualidadSearch']['id_pago'];
        $rango_fecha = $get['MensualidadSearch']['rango_fecha'];
        $banco = $get['MensualidadSearch']['banco'];
        $rte_cedula = $get['MensualidadSearch']['rte_cedula'];
        $array = $searchModel->searchArray($id_pago,$rango_fecha,$banco,$rte_cedula);

        $mpdf=new mPDF();
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
        $tta_eta_cedula = $get['HistoriaSearch']['tta_eta_cedula'];
        $array = $searchModel->searchArray($tta_eta_cedula);
        $mpdf=new mPDF();
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
        $tpa_id = $get['TerapiaEspecialistaSerch']['tpa_id'];
        $pte_cedula = $get['TerapiaEspecialistaSerch']['pte_cedula'];
        $array = $searchModel->searchArray($tpa_id,$pte_cedula);
        $mpdf=new mPDF();
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
        $nombre_tratamiento = $get['TratamientoSearch']['nombre_tratamiento'];
        $pte_cedula = $get['TratamientoSearch']['pte_cedula'];
        $array = $searchModel->searchArray($nombre_tratamiento,$pte_cedula);
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('template-tratamientopaciente',['model'=>$array]));
        $mpdf->Output('MyPDF.pdf', 'I');
      }
        return $this->render('tratamientopaciente', [
                'tratamiento'  =>$tratamiento,
                'dataProvider' =>$dataProvider,
                'searchModel'  =>$searchModel,
            ]);
    }

}

