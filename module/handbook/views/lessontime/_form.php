<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\LessonTime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lesson-time-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lesson_time_name')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'begin_time')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'end_time')->textInput(['maxlength' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
