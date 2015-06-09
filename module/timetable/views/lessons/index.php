<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\timetable\models\LessonsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lessons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessons-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lessons', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lesson_id',
            'id_group',
            'id_faculty',
            'id_speciality',
            'course',
            'semester',
            'id_okr',
            'is_numerator',
            'id_discipline',
            'id_teacher',
            'id_classroom',
            'day',
            'is_holiday',
            'all_group',
            'all_speciality',
            'lesson_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
