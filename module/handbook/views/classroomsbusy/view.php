<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\Housing;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassroomsBusy */

$this->title = 'Аудиторія: '.classHous($model->id_classroom);
$this->params['breadcrumbs'][] = ['label' => 'Забронювати аудиторію', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

function classHous($val){
    $classes = ClassRooms::findOne(['classrooms_id' => $val]);
    $housing = Housing::findOne(['housing_id' => $classes['id_housing']]);
    
    return $classes['classrooms_number'].' - '.$housing['name'];
}

?>
<div class="classrooms-busy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->cb_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->cb_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cb_id',
            [
              'label' => 'Аудиторія',
              'attribute' => 'id_classroom',
              'value' => classHous($model->id_classroom)
            ],
            'day',
            'lesson0.lesson_time_name'
        ],
    ]) ?>

</div>
