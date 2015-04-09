<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */

$this->title = $model->lesson_id;
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessons-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->lesson_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lesson_id], [
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
        ],
    ]) ?>

</div>
