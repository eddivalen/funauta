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

    public function actionTerapiaspaciente(){
    	$historia = new Historia();
    	$searchModel = new HistoriaSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
     // $dataProvider->sort = ['defaultOrder' => ['tta_eta_cedula'=>SORT_ASC]];
      
      if (Yii::$app->request->post()){
        $get = json_decode(Yii::$app->request->post('get'), true);
        //var_dump($get);
      //$tta_eta_cedula = $get['HistoriaSearch'];
       //var_dump($tta_eta_cedula);
        $array = $searchModel->searchArray($get);
        //var_dump($array);
        /*$mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('template-pagos',['model'=>$array]));
        $mpdf->Output('MyPDF.pdf', 'I');*/

      }
    	return $this->render('terapiaspaciente', [
				'historia'     =>$historia,
				'dataProvider' =>$dataProvider,
				'searchModel'  =>$searchModel,
            ]);

    }

}

