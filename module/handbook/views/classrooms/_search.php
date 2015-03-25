<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassRoomsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="class-rooms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'classrooms_id') ?>

    <?= $form->field($model, 'classrooms_number') ?>

    <?= $form->field($model, 'id_housing') ?>

    <?= $form->field($model, 'seats') ?>

    <?= $form->field($model, 'comp_number') ?>

    <?php // echo $form->field($model, 'options') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
