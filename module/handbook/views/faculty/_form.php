<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Faculty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faculty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'faculty_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'id_edbo')->textInput() ?>

    <?= $form->field($model, 'id_deanery')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
