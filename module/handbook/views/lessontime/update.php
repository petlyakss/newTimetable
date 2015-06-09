<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\LessonTime */

$this->title = 'Update Lesson Time: ' . ' ' . $model->lesson_time_id;
$this->params['breadcrumbs'][] = ['label' => 'Lesson Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lesson_time_id, 'url' => ['view', 'id' => $model->lesson_time_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lesson-time-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
