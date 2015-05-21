<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\controllers\DisciplineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discipline-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'discipline_distribution_id') ?>

    <?= $form->field($model, 'id_discipline') ?>

    <?= $form->field($model, 'id_edbo') ?>

    <?= $form->field($model, 'id_deanery') ?>

    <?= $form->field($model, 'id_cathedra') ?>

    <?php // echo $form->field($model, 'id_lessons_type') ?>

    <?php // echo $form->field($model, 'id_group') ?>

    <?php // echo $form->field($model, 'course') ?>

    <?php // echo $form->field($model, 'hours') ?>

    <?php // echo $form->field($model, 'semestr_hours') ?>

    <?php // echo $form->field($model, 'id_classroom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
