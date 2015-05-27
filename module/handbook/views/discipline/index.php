<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\module\handbook\models\DisciplineGroups;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Groups;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\controllers\DisciplineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дисципліни';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discipline-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати дисципліну', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'discipline_distribution_id',            
            [
              'attribute' => 'id_discipline',
              'value' => 'disciplineName.discipline_name'
            ],
            //'id_edbo',
            //'id_deanery',
            [
              'attribute' => 'id_cathedra',
              'value' => 'cathedra.cathedra_name'
            ],
            [
              'attribute' => 'id_lessons_type',
              'value' => 'lessonsType.lesson_type_name'
            ],
            [
              'header' => 'Групи',
              'format' => 'raw',
              'value' => function($data){
                /* @var $data app\module\handbook\models\ClassRoomsSearch */
                $discgr = $data->getDisciplineGroups()->all();
                $result = "<ul>";
                foreach ($discgr as $dg){
                    /* @var $classType app\module\handbook\models\ClassType */
                  $groups = $dg->getGroup()->all();
                  foreach ($groups as $group){
                    /* @var $specClass app\module\handbook\models\SpecClasses */
                    $result .= "<li>".$group->main_group_name.'</li>';
                  }
                }
                $result .= "</ul>";
                return $result;
              }
            ],
            'course',
            'hours',
            'semestr_hours',
            //'id_classroom',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
