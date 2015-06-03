<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\Housing;
use kartik\select2\Select2;
use app\module\handbook\models\LessonTime;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassroomsBusy */
/* @var $form yii\widgets\ActiveForm */
    $classes = ClassRooms::find()->orderBy('classrooms_number ASC')->all();
    foreach ($classes as $cl){ 
        $housing = Housing::findOne(['housing_id' => $cl['id_housing']]);
        $classroomsArray[$cl['classrooms_id']] = $cl['classrooms_number'].' - '.$housing['name'];
    }
?>

<div class="classrooms-busy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
        $form->field($model, 'id_classroom')->widget(Select2::classname(), [
            'data' => $classroomsArray,            
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => ['placeholder' => ' '],
        ])->label('Аудиторія');
    ?> 

    <?= $form->field($model, 'day')->textInput() ?>
    
    <?php
        echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'day',
        //'language' => 'ru',
        //'dateFormat' => 'yyyy-MM-dd',
    ]);
    ?>
    
    <?=
        $form->field($model, 'lesson')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(LessonTime::find()->all(), 'lesson_time_id', 'lesson_time_name'),   
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
            'options' => ['placeholder' => ' '],
        ])->label('Номер пари');
    ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
