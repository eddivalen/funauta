<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                       <div class="col-lg-2">
                             <h4>Usuario</h4>
                        </div>
                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => '¿Está seguro de eliminar este elemento?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                </div>
                <div class="panel-body">
                    <div class="users-view">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'username',
                                'email:email',
                                [
                                'attribute'=>'role',
                                'value'=>function($model){
                                    if($model->role == 1){
                                        return 'Usuario'; 
                                    }else{
                                        return 'Administrador';
                                    }   
                                    },
                                'label'=>'Rol',
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
