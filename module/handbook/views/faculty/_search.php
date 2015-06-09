<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\FacultySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faculty-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'faculty_id') ?>

    <?= $form->field($model, 'faculty_name') ?>

    <?= $form->field($model, 'id_edbo') ?>

    <?= $form->field($model, 'id_deanery') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
