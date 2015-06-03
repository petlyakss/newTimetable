<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassroomsBusySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classrooms-busy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cb_id') ?>

    <?= $form->field($model, 'id_classroom') ?>

    <?= $form->field($model, 'day') ?>

    <?= $form->field($model, 'lesson') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
