<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\module\handbook\models\Housing;
use app\module\handbook\models\ClassRooms;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\ClassroomsBusySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Забронювати аудиторію';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classrooms-busy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Забронювати аудиторію', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cb_id',
            [
              'label' => 'Аудиторія',
              'attribute' => 'id_classroom',
              'value' => function($data){
                    $classes = ClassRooms::findOne(['classrooms_id' => $data->id_classroom]);
                    $housing = Housing::findOne(['housing_id' => $classes['id_housing']]);
                    return $classes['classrooms_number'].' - '.$housing['name'];
                }
            ],
            'day',
            [
                'attribute' => 'lesson',
                'value' => 'lesson0.lesson_time_name'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
