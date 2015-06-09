<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Okr;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\GroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Групи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати групу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'group_id',
            [
                'attribute' => 'main_group_name',
                'value' => 'main_group_name'
            ],
            [
                'attribute' => 'id_speciality',
                'value' => 'speciality.speciality_name'
            ],
            //'is_subgroup',
            /*[
              'header' => 'факультет/спеціальність',
              'attribute' => 'id_speciality',
              'filter' => '<input type="text" class="form-control" '
                .' name="GroupsSearch[id_speciality]" '
                .' value="'.$searchModel->id_speciality.'" />',*/
              //'format' => 'raw',
              /*'value' => 'id_speciality'function($data){
                
                $Faculty = null;
                $spec_name = "";
                $faculty_name = "";
                foreach ($data->getSpeciality()->all() as $Spec){
                    
                    $Faculty = $Spec->getFaculty();
                    $spec_name = $Spec->speciality_name;
                }
                if ($Faculty){
                    foreach ($Faculty->all() as $F){
                        
                        $faculty_name = $F->faculty_name;
                    }
                }
                $result = $faculty_name
                  . ' / ' . $spec_name;
                return $result;
              }*/
            //],
            'inflow_year',  
            [
                'attribute' => 'number_of_students',
                'value' => 'number_of_students',
                'filter' => '<input type="text" class="form-control" '
                .' name="GroupsSearch[numb]" '
                .' value="'.$searchModel->numb.'" />',
            ],
            [
                'attribute' => 'id_okr',
                'value' => 'okr.okr_name',
                'filter' => '<input type="text" class="form-control" '
                .' name="GroupsSearch[okr_name]" '
                .' value="'.$searchModel->okr_name.'" />',
            ],
            // 'parent_group',
            [
              'header' => 'Підгрупи',
              'filter' => '<input type="text" class="form-control" '
                .' name="GroupsSearch[sub_group]" '
                .' value="'.$searchModel->sub_group.'" />',
              'format' => 'raw',
              'value' => function($data){
                /* @var $data app\module\handbook\models\GroupsSearch */
                $subGroups = $data->getSubGroups();
                $result = '
                    <a class="btn btn-success btn-xs 2" 
                    href="'.Url::toRoute(['create', 'okr_id' => $data->id_okr, 'parent_id'=>$data->group_id]).'">
                      <i class="fa fa-plus"></i> Додати підгрупу
                    </a>
                    <table class="table table-hover table-bordered" style="margin-top: 10px;">
                      <thead>
                        <tr><th>Назва</th>
                            <th>Дії</th>
                        </tr>
                      </thead>
                      <tbody>';
                foreach ($subGroups as $subGroup){
                    /* @var $subGroup app\module\handbook\models\Groups */
                    $result .= '<tr><td>'.$subGroup->main_group_name.'</td>
                        <td>
                            <a href="'.Url::toRoute(['view', 'id' => $subGroup->group_id, 'parent_id'=>$data->group_id]).'">
                              <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="'.Url::toRoute(['update', 'id' => $subGroup->group_id,'parent_id'=>$data->group_id]).'">
                              <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a href="'.Url::toRoute(['delete', 'id' => $subGroup->group_id]).'" title="Видалити підгрупу" 
                                data-confirm="Видалити підгрупу?" 
                                data-method="post" data-pjax="1">
                              <i class="glyphicon glyphicon-trash"></i>
                            </a>                            
                        </td>
                    </tr>';
                }           
                $result .= '</tbody></table>';
                return $result;
              }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
