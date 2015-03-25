<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Cathedra;
use app\module\handbook\models\Faculty;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Speciality */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="speciality-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'speciality_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'id_edebo')->textInput() ?>

    <?= $form->field($model, 'id_cathedra')->dropDownList(ArrayHelper::map(Cathedra::find()->all(), 'cathedra_id', 'cathedra_name')) ?>

    <?= $form->field($model, 'id_faculty')->dropDownList(ArrayHelper::map(Faculty::find()->all(), 'faculty_id', 'faculty_name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
