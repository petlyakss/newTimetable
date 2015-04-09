<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lessons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_group')->textInput() ?>

    <?= $form->field($model, 'id_faculty')->textInput() ?>

    <?= $form->field($model, 'id_speciality')->textInput() ?>

    <?= $form->field($model, 'course')->textInput() ?>

    <?= $form->field($model, 'semester')->textInput() ?>

    <?= $form->field($model, 'id_okr')->textInput() ?>

    <?= $form->field($model, 'is_numerator')->textInput() ?>

    <?= $form->field($model, 'id_discipline')->textInput() ?>

    <?= $form->field($model, 'id_teacher')->textInput() ?>

    <?= $form->field($model, 'id_classroom')->textInput() ?>

    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'is_holiday')->textInput() ?>

    <?= $form->field($model, 'all_group')->textInput() ?>

    <?= $form->field($model, 'all_speciality')->textInput() ?>

    <?= $form->field($model, 'lesson_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
