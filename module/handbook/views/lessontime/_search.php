<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\LessonTimeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lesson-time-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lesson_time_id') ?>

    <?= $form->field($model, 'lesson_time_name') ?>

    <?= $form->field($model, 'begin_time') ?>

    <?= $form->field($model, 'end_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
