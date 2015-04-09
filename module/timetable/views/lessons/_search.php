<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\LessonsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lessons-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lesson_id') ?>

    <?= $form->field($model, 'id_group') ?>

    <?= $form->field($model, 'id_faculty') ?>

    <?= $form->field($model, 'id_speciality') ?>

    <?= $form->field($model, 'course') ?>

    <?php // echo $form->field($model, 'semester') ?>

    <?php // echo $form->field($model, 'id_okr') ?>

    <?php // echo $form->field($model, 'is_numerator') ?>

    <?php // echo $form->field($model, 'id_discipline') ?>

    <?php // echo $form->field($model, 'id_teacher') ?>

    <?php // echo $form->field($model, 'id_classroom') ?>

    <?php // echo $form->field($model, 'day') ?>

    <?php // echo $form->field($model, 'is_holiday') ?>

    <?php // echo $form->field($model, 'all_group') ?>

    <?php // echo $form->field($model, 'all_speciality') ?>

    <?php // echo $form->field($model, 'lesson_number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
