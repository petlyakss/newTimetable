<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Groups;
use app\module\handbook\models\Speciality;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Groups */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'main_group_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'id_speciality')->dropDownList(ArrayHelper::map(Speciality::find()->all(),'speciality_id','speciality_name')) ?>
    
    <?= $form->field($model, 'inflow_year')->textInput() ?>

    <?php
    if(intval($_GET['parent_id']) > 0){
    ?>
        <?= $form->field($model, 'parent_group')->dropDownList(ArrayHelper::map(Groups::find()->where(['is_subgroup' => 0])->all(), 'group_id', 'main_group_name')) ?>
    <?php
    }else{
    ?>    
        <?= $form->field($model, 'parent_group')->hiddenInput(['value'=>0])->label(false) ?>
    <?php
    }
    ?> 
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
