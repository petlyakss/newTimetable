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
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\Housing;
use app\module\handbook\models\Groups;
use app\module\handbook\models\DisciplineGroups;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */
/* @var $form yii\widgets\ActiveForm */

    
$lesson_number = $_GET['lesson_number'];
$day = $_GET['day'];
$id_faculty = $_GET['id_faculty'];
$id_speciality = $_GET['id_speciality'];
$course = $_GET['course'];
$semester = $_GET['semester'];
$is_numerator = $_GET['is_numerator'];
$id_group = $_GET['id_group'];
$id_okr = $_GET['id_okr'];

$students_in_group = Groups::find()->where(['group_id' => $id_group ])->all();
$sig = $students_in_group[0]['number_of_students']+5;
$classes = ClassRooms::find()->Where('seats>'.$sig)->orderBy('classrooms_number ASC')->all();
    foreach ($classes as $cl){ 
        $housing = Housing::findOne(['housing_id' => $cl['id_housing']]);
        $classroomsArray[$cl['classrooms_id']] = $cl['classrooms_number'].' - '.$housing['name'];
    }


    $d = DisciplineGroups::findAll(['id_group' => $id_group]);    
    
    if(empty($d)){
        $d = DisciplineGroups::findAll(['id_group' => $students_in_group[0]['parent_group']]);
    }
    
foreach ($d as $dd){
    //$disciplines = Discipline::findAll(['discipline_distribution_id' => $dd['id_discipline']]);
    $disciplines = Discipline::findAll(['discipline_distribution_id' => $dd['id_discipline']]);
   foreach ($disciplines as $disc){    
        $disc_name = DisciplineList::findOne(['discipline_id' => $disc['id_discipline']]);
        $disc_type = LessonsType::findOne(['id' => $disc['id_lessons_type']]);
        $da[$disc['discipline_distribution_id']] = $disc_name['discipline_name']." - ".$disc_type['lesson_type_name'];
    }    
}

asort($da);

foreach($da as $x=>$x_value){
    $discipline_array[$x] = $x_value;
}

?>

<div class="lessons-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-md-2 editor_checkbox">
       
     <?= $form->field($model, 'is_holiday')->checkbox() ?>
   
    </div> 
    <div class="col-md-4 editor_checkbox">
         
        <?= $form->field($model, 'num_dem')->checkbox() ?>
    </div>
        <div class="col-md-3 editor_checkbox">
            <?= $form->field($model, 'all_group')->hiddenInput(['value' => 0])->label(false) ?>
            
        </div>
        <!--<div class="col-md-3 editor_checkbox">
           
            <?php// $form->field($model, 'all_speciality')->hiddenInput() ?>
        </div>-->
    </div>
    <?=
        $form->field($model, 'id_discipline')->widget(Select2::classname(), [
            'data' => $discipline_array, //ArrayHelper::map(DisciplineList::find()->all(), 'discipline_id','discipline_name'),
            'language' => 'uk',
            //'options' => ['placeholder' => 'Оберіть дисципліну ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Дисципліна');
    ?>
    
    <?=
        $form->field($model, 'id_teacher')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Teachers::find()->all(), 'teacher_id','teacher_name'),
            'language' => 'uk',
            //'options' => ['placeholder' => 'Оберіть викладача ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Викладач');
    ?>
    
    <?= 
        $form->field($model, 'no_check')->checkbox([
              'onchange'=>'
                $.post("index.php?r=timetable/lessons/class_list&id='.'"+$(this).prop("checked")+"&seats='.'"+'.$sig.', function( data ) {
                  $( "select#lessons-id_classroom" ).html( data );
                });
        '])->label(false); ?>
    
    <?=
        $form->field($model, 'id_classroom')->widget(Select2::classname(), [
            'data' => $classroomsArray,
            'language' => 'uk',
            //'options' => ['placeholder' => 'Оберіть аудиторію ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Аудиторія і корпус');
    ?> 
    
    <?= $form->field($model, 'id_group')->hiddenInput(['value' => $id_group])->label(false) ?>
    
    <?= $form->field($model, 'subgroup')->hiddenInput(['value' => $students_in_group[0]['is_subgroup']])->label(false) ?>

    <?= $form->field($model, 'parent')->hiddenInput(['value' => $students_in_group[0]['parent_group']])->label(false) ?>
    
    <?= $form->field($model, 'id_faculty')->hiddenInput(['value' => $id_faculty])->label(false) ?>

    <?= $form->field($model, 'id_speciality')->hiddenInput(['value' => $id_speciality])->label(false) ?>

    <?= $form->field($model, 'course')->hiddenInput(['value' => $course])->label(false) ?>

    <?= $form->field($model, 'semester')->hiddenInput(['value' => $semester])->label(false) ?>

    <?= $form->field($model, 'id_okr')->hiddenInput(['value' => $id_okr])->label(false) ?>

    <?= $form->field($model, 'is_numerator')->hiddenInput(['value' => $is_numerator])->label(false) ?>

    <?= $form->field($model, 'day')->hiddenInput(['value' => $day])->label(false) ?>
    
    <?= $form->field($model, 'lesson_number')->hiddenInput(['value' => $lesson_number])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Зберегти' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
