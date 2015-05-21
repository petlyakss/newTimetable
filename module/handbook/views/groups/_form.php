<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Groups;
use app\module\handbook\models\Speciality;
use app\module\handbook\models\Okr;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Groups */
/* @var $form yii\widgets\ActiveForm */

if(intval($_GET['parent_id']) > 0){ 
    $is_group = false;
}else{
    $is_group = true;
}
?>


<div class="groups-form">
    <?php
    if($is_group){
    
        $form = ActiveForm::begin(); 
    
    ?>

    <?= $form->field($model, 'main_group_name')->textInput(['maxlength' => 50]) ?>   
    
    <?=
        $form->field($model, 'id_speciality')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Speciality::find()->orderBy('speciality_name ASC')->all(),'speciality_id','speciality_name'),
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);       
    ?>   
    
    <?= $form->field($model, 'inflow_year')->textInput() ?>
    
    <?= $form->field($model, 'number_of_students')->textInput() ?>
    
    <?= $form->field($model, 'id_edebo')->textInput() ?>
    
    <?= $form->field($model, 'id_okr')->dropDownList(ArrayHelper::map(Okr::find()->all(), 'okr_id', 'okr_name')) ?>
    
    <?= $form->field($model, 'parent_group')->hiddenInput(['value'=>0])->label(false) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
    <?php
        }else{
            $form = ActiveForm::begin();         
    ?>
    
    <?= $form->field($model, 'main_group_name')->textInput(['maxlength' => 50]) ?>
    
    <?=
        $form->field($model, 'id_speciality')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Speciality::find()->all(),'speciality_id','speciality_name'),
            'language' => 'uk',
            'disabled' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);       
    ?> 
    
    <?= $form->field($model, 'inflow_year')->textInput(['disabled'=> true]) ?>
    
    <?= $form->field($model, 'number_of_students')->textInput() ?>
    
    <?= $form->field($model, 'id_edebo')->textInput() ?>
    
    <?php
    $okr = Okr::findOne($_GET['okr_id']);
        
    
    ?>
    <?= $form->field($model, 'id_okr')->hiddenInput(['value' => $_GET['okr_id']])->label(false) ?>
    
    <?= $form->field($model, 'tmp_okr')->textInput(['value' => $okr["okr_name"],'disabled'=> true])->label('ОКР') ?>
    
    <?= $form->field($model, 'parent_group')->dropDownList(ArrayHelper::map(Groups::find()->where(['is_subgroup' => 0])->all(), 'group_id', 'main_group_name'),['disabled'=> true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
    <?php
        }
    ?>
    
    

 

   

</div>
