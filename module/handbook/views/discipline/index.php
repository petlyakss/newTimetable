<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\module\handbook\models\Housing;
use app\module\handbook\models\ClassRooms;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\DisciplineSearch */
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
            'disciplineName.discipline_name',
            //'id_edbo',
            //'id_deanery',
            'cathedra.cathedra_name',
            'lessonsType.lesson_type_name',
            'group.main_group_name',
            'course',
            'hours',
            'semestr_hours',
            [
              'header' => 'Аудиторія',
              'value' => function($data){
                  $classes = ClassRooms::findOne(['classrooms_id' => $data->id_classroom]);
                  $housing = Housing::findOne(['housing_id' => $classes['id_housing']]);
                  return $classes['classrooms_number'].' - '.$housing['name'];
              }
            ],
            //'classroom.classrooms_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
