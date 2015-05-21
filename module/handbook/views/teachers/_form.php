<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Cathedra;
use app\module\handbook\models\TeachersPosition;
use app\module\handbook\models\TeachersAcademicStatus;
use app\module\handbook\models\Faculty;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Teachers */
/* @var $form yii\widgets\ActiveForm */

$all_faculty = Faculty::find()->orderBy('faculty_name ASC')->all();

foreach($all_faculty as $af){
    $tmp_cathedra = Cathedra::find()->where(['id_faculty' => $af['faculty_id']])->orderBy('cathedra_name ASC')->all();
    foreach($tmp_cathedra as $tc){
        $all_cathedra[$tc['cathedra_id']] = $tc['cathedra_name']." / ".$af['faculty_name'];
    }
    
    
}

?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_name')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'id_position')->DropDownList(ArrayHelper::map(TeachersPosition::find()->all(), 'position_id', 'position_name')) ?>

    <?= $form->field($model, 'id_academic_status')->DropDownList(ArrayHelper::map(TeachersAcademicStatus::find()->all(), 'academic_status_id', 'academic_status_name')) ?>

    <?php
        echo Html::label("Кафедра");
        echo Select2::widget([
            'model' => $model,
            'attribute' => 'id_cathedra',
            'language' => 'ru',
            'data' => $all_cathedra,//ArrayHelper::map(Cathedra::find()->all(),'cathedra_id','cathedra_name'),
        ]);        
    ?>    

    <?=
        $form->field($model, 'teacher_other_cathedra')->widget(Select2::classname(), [
            'data' => $all_cathedra,//ArrayHelper::map(Cathedra::find()->all(), 'cathedra_id','cathedra_name'),
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => ['multiple' => true]
        ])->label('Додаткові кафедри');
    ?>
    <br/>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
