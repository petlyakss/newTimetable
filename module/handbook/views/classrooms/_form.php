<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\switchinput\SwitchInput;
use kartik\select2\Select2;
use app\module\handbook\models\Housing;
use app\module\handbook\models\SpecClasses;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassRooms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classrooms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'classrooms_number')->textInput(['maxlength' => 4]) ?>

    <?=
        $form->field($model, 'id_housing')->dropDownList(ArrayHelper::map(Housing::find()->all(),'housing_id','name'));    
    ?>

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
    <?php
    echo Html::label('Інші дисципліни');
        echo $form->field($model, 'is_public')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX
    ])->label(false);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
