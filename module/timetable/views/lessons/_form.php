<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\module\handbook\models\DisciplineList;
use app\module\handbook\models\Discipline;
use app\module\handbook\models\LessonsType;
use kartik\switchinput\SwitchInput;
use app\module\handbook\models\Teachers;
use app\module\handbook\models\Classrooms;
use app\module\handbook\models\Housing;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */
/* @var $form yii\widgets\ActiveForm */
$classes = Classrooms::find()->all();
    foreach ($classes as $cl){ 
        $housing = Housing::findOne(['housing_id' => $cl['id_housing']]);
        $classroomsArray[$cl['classrooms_id']] = $cl['classrooms_number'].' - '.$housing['name'];
    }
    
$lesson_number = $_GET['lesson_number'];
$day = $_GET['day'];
$id_faculty = $_GET['id_faculty'];
$id_speciality = $_GET['id_speciality'];
$course = $_GET['course'];
$semester = $_GET['semester'];
$is_numerator = $_GET['is_numerator'];
$id_group = $_GET['id_group'];
$id_okr = $_GET['id_okr'];

$disciplines = Discipline::find()->all();
foreach ($disciplines as $disc){
    $disc_name = DisciplineList::findOne(['discipline_id' => $disc['id_discipline']]);
    $disc_type = LessonsType::findOne(['id' => $disc['id_lessons_type']]);
    $discipline_array[$disc['discipline_distribution_id']] = $disc_name['discipline_name']." - ".$disc_type['lesson_type_name'];
}
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
            'data' => $discipline_array, //ArrayHelper::map(DisciplineList::find()->all(), 'discipline_id','discipline_name'),
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
    <?=
        $form->field($model, 'id_classroom')->widget(Select2::classname(), [
            'data' => $classroomsArray,
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Аудиторія і корпус');
    ?> 
    
    <?php
        echo $form->field($model, 'all_group')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX
    ])->label('Для всієї групи');
    ?>
    
    <?php
        echo $form->field($model, 'all_speciality')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX
    ])->label('Для всієї спеціальності');
    ?>
    
    <?= $form->field($model, 'id_group')->hiddenInput(['value' => $id_group])->label(false) ?>

    <?= $form->field($model, 'id_faculty')->hiddenInput(['value' => $id_faculty])->label(false) ?>

    <?= $form->field($model, 'id_speciality')->hiddenInput(['value' => $id_speciality])->label(false) ?>

    <?= $form->field($model, 'course')->hiddenInput(['value' => $course])->label(false) ?>

    <?= $form->field($model, 'semester')->hiddenInput(['value' => $semester])->label(false) ?>

    <?= $form->field($model, 'id_okr')->hiddenInput(['value' => $id_okr])->label(false) ?>

    <?= $form->field($model, 'is_numerator')->hiddenInput(['value' => $is_numerator])->label(false) ?>

    <?= $form->field($model, 'day')->hiddenInput(['value' => $day])->label(false) ?>
    
    <?= $form->field($model, 'lesson_number')->hiddenInput(['value' => $lesson_number])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
