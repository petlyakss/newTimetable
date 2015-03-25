<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\SpecClasses;
use app\module\handbook\models\Housing;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassRooms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="class-rooms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'classrooms_number')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'id_housing')->dropDownList(ArrayHelper::map(Housing::find()->all(),'housing_id','name')) ?>

    <?= $form->field($model, 'seats')->textInput() ?>

    <?= $form->field($model, 'comp_number')->textInput() ?>
    
    <?php
        echo Html::label("Тип аудиторії");
        echo Select2::widget([
            'model' => $model,
            'attribute' => 'options',
            'language' => 'ru',
            'data' => ArrayHelper::map(SpecClasses::find()->all(),'spec_class_id','spec_class_name'),
            'options' => ['multiple' => true]
        ]);        
    ?>
    
    
    <br/>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
