<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\module\handbook\models\DisciplineList;
use kartik\switchinput\SwitchInput;
use app\module\handbook\models\Teachers;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lessons-form">

    <?php $form = ActiveForm::begin(); ?>
     
    <?php
    echo Html::label('ДСР');
        echo $form->field($model, 'is_holiday')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX
    ])->label(false);
    ?>
    
    <?=
        $form->field($model, 'id_discipline')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(DisciplineList::find()->all(), 'discipline_id','discipline_name'),
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Дисципліна');
    ?>
    
    <?=
        $form->field($model, 'id_teacher')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Teachers::find()->all(), 'teacher_id','teacher_name'),
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Викладач');
    ?>
    <?= $form->field($model, 'id_group')->textInput() ?>

    <?= $form->field($model, 'id_faculty')->textInput() ?>

    <?= $form->field($model, 'id_speciality')->textInput() ?>

    <?= $form->field($model, 'course')->textInput() ?>

    <?= $form->field($model, 'semester')->textInput() ?>

    <?= $form->field($model, 'id_okr')->textInput() ?>

    <?= $form->field($model, 'is_numerator')->textInput() ?>

    <?= $form->field($model, 'id_classroom')->textInput() ?>

    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'all_group')->textInput() ?>

    <?= $form->field($model, 'all_speciality')->textInput() ?>

    <?= $form->field($model, 'lesson_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
