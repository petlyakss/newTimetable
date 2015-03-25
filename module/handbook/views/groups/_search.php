<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\GroupsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'main_group_name') ?>

    <?= $form->field($model, 'is_subgroup') ?>

    <?= $form->field($model, 'id_speciality') ?>

    <?= $form->field($model, 'inflow_year') ?>

    <?php // echo $form->field($model, 'parent_group') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
