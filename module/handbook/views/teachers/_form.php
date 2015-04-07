<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Cathedra;
use app\module\handbook\models\TeachersPosition;
use app\module\handbook\models\TeachersAcademicStatus;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Teachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_name')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'id_position')->DropDownList(ArrayHelper::map(TeachersPosition::find()->all(), 'position_id', 'position_name')) ?>

    <?= $form->field($model, 'id_academic_status')->DropDownList(ArrayHelper::map(TeachersAcademicStatus::find()->all(), 'academic_status_id', 'academic_status_name')) ?>

    <?= $form->field($model, 'id_cathedra')->DropDownList(ArrayHelper::map(Cathedra::find()->all(), 'cathedra_id', 'cathedra_name')) ?>
    
    <?php
        echo Html::label("Додаткові кафедри");
        echo Select2::widget([
            'model' => $model,
            'attribute' => 'teacher_other_cathedra',
            'language' => 'ru',
            'data' => ArrayHelper::map(Cathedra::find()->all(),'cathedra_id','cathedra_name'),
            'options' => ['multiple' => true]
        ]);        
    ?>
    <br/>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
