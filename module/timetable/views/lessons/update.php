<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */

$this->title = 'Update Lessons: ' . ' ' . $model->lesson_id;
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lesson_id, 'url' => ['view', 'id' => $model->lesson_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lessons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
