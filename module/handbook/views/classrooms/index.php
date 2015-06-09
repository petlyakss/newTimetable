<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\ClassRoomsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Аудиторії';
$this->params['breadcrumbs'][] = $this->title;




?>
<div class="classrooms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати аудиторію', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'classrooms_id',
            'classrooms_number',            
            [
              'attribute' => 'id_housing',
              'value' => 'housing.name'
            ],
            [
              'attribute' => 'options',                
              'filter' => '<input type="text" class="form-control" '
                .' name="ClassRoomsSearch[class_type_name]" '
                .' value="'.$searchModel->class_type_name.'" />',
              'format' => 'raw',
              'value' => function($data){
        
                $classTypes = $data->getClassTypes()->all();
                $result = "<ul>";
                foreach ($classTypes as $classType){
                    
                  $specClasses = $classType->getSpecClass()->all();
                  foreach ($specClasses as $specClass){
                    
                    $result .= "<li>".$specClass->spec_class_name.'</li>';
                  }
                }
                $result .= "</ul>";
                return $result;
              }
            ],
            'seats',
            'comp_number',/*
            [
              'header' => 'Інші дисципліни',
              'format' => 'raw',
              'value' => function($data){                
                if($data->is_public == 0){
                                return "Ні";
                            }else{
                                return "Так";
                            }
              }
            ],*/
            // 'options',
            // 'is_public',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
