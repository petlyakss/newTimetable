<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Faculty;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Cathedra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cathedra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cathedra_name')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'id_edbo')->textInput() ?>

    <?= $form->field($model, 'id_deanery')->textInput() ?>

    <?= $form->field($model, 'id_faculty')->dropDownList(ArrayHelper::map(Faculty::find()->all(), 'faculty_id', 'faculty_name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
