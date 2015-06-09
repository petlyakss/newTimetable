<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\CathedraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cathedra-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cathedra_id') ?>

    <?= $form->field($model, 'cathedra_name') ?>

    <?= $form->field($model, 'id_edbo') ?>

    <?= $form->field($model, 'id_deanery') ?>

    <?= $form->field($model, 'id_faculty') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
