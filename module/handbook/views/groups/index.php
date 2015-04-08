<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
            'main_group_name',
            //'is_subgroup',
            [
              'header' => 'факультет/спеціальність',
              'filter' => '<input type="text" class="form-control" '
                .' name="GroupsSearch[spec_full_name]" '
                .' value="'.$searchModel->spec_full_name.'" />',
              'format' => 'raw',
              'value' => function($data){
                /* @var $data app\module\handbook\models\GroupsSearch */
                $Faculty = null;
                $spec_name = "";
                $faculty_name = "";
                foreach ($data->getSpeciality()->all() as $Spec){
                    /* @var $Spec app\module\handbook\models\SpecialitySearch */
                    $Faculty = $Spec->getFaculty();
                    $spec_name = $Spec->speciality_name;
                }
                if ($Faculty){
                    foreach ($Faculty->all() as $F){
                        /* @var $F app\module\handbook\models\FacultySearch */
                        $faculty_name = $F->faculty_name;
                    }
                }
                $result = $faculty_name
                  . ' / ' . $spec_name;
                return $result;
              }
            ],
            'inflow_year',
            'number_of_students',
            'okr.okr_name',
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
