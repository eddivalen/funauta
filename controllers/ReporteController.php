<?php
namespace app\controllers;
use Yii;
use app\models\Mensualidad;
use app\models\MensualidadSearch;
use app\models\MensualidadMeses;
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
use app\models\HistoriaSerch;
use mPDF;
use kartik\mpdf\Pdf;

class ReporteController extends \yii\web\Controller
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
        return $this->render('index');
    }
    public function actionPagosperiodo()
    {
    	$mensualidad = new Mensualidad();
        $searchModel = new MensualidadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	return $this->render('pagosperiodo', [
    			'mensualidad' 		=>$mensualidad,
				'dataProvider'      =>$dataProvider,
				'searchModel'       =>$searchModel,
            ]);
    }
    public function actionExportpagos(){
      $this->layout='report';
      $mensualidad = new Mensualidad();
      $searchModel = new MensualidadSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $array = $searchModel->searchArray(Yii::$app->request->queryParams);
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('template-pagos',['model'=>$array]));
      //$mpdf->Output();
      $mpdf->Output('MyPDF.pdf', 'I');
      exit;
    }
    public function actionExportterapiaspaciente(){
      $this->layout='report';
      $historia = new Historia();
      $searchModel = new HistoriaSerch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $array = $searchModel->searchArray(Yii::$app->request->queryParams);
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('template-terapiaspaciente',['model'=>$array]));
      //$mpdf->Output();
      $mpdf->Output('MyPDF.pdf', 'I');
      exit;
    }

    public function actionTerapiaspaciente(){
    	$historia = new Historia();
    	$searchModel = new HistoriaSerch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = ['defaultOrder' => ['tta_eta_cedula'=>SORT_ASC]];
    	/*$dataProvider = new ActiveDataProvider([
		    'query' => Historia::find(),
		    'sort'=> ['defaultOrder' => ['tta_eta_cedula'=>SORT_ASC]],
		    'pagination' => [
		        'pageSize' => 20,
		    ],
		]);*/
    	return $this->render('terapiaspaciente', [
				'historia'     =>$historia,
				'dataProvider' =>$dataProvider,
				'searchModel'  =>$searchModel,
            ]);

    }

}

