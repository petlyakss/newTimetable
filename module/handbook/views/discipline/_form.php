<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\module\handbook\models\DisciplineList;
use app\module\handbook\models\Cathedra;
use app\module\handbook\models\LessonsType;
use app\module\handbook\models\Groups;
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\Housing;
use app\module\handbook\models\Faculty;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Discipline */
/* @var $form yii\widgets\ActiveForm */



    $classes = ClassRooms::find()->all();
    foreach ($classes as $cl){ 
        $housing = Housing::findOne(['housing_id' => $cl['id_housing']]);
        $classroomsArray[$cl['classrooms_id']] = $cl['classrooms_number'].' - '.$housing['name'];
    }
    
    $all_faculty = Faculty::find()->orderBy('faculty_name ASC')->all();

foreach($all_faculty as $af){
    $tmp_cathedra = Cathedra::find()->where(['id_faculty' => $af['faculty_id']])->orderBy('cathedra_name ASC')->all();
    foreach($tmp_cathedra as $tc){
        $all_cathedra[$tc['cathedra_id']] = $tc['cathedra_name']." / ".$af['faculty_name'];
    }
    
    
}
?>

<div class="discipline-form">

    <?php $form = ActiveForm::begin(); ?>   
    
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
        $form->field($model, 'id_cathedra')->widget(Select2::classname(), [
            'data' => $all_cathedra,//ArrayHelper::map(Cathedra::find()->all(), 'cathedra_id','cathedra_name'),
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Кафедра');
    ?>
    
    <?=
        $form->field($model, 'id_lessons_type')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(LessonsType::find()->all(), 'id','lesson_type_name'),
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Тип заняття');
    ?>
    
    <?=
        $form->field($model, 'id_group')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Groups::find()->all(), 'group_id','main_group_name'),
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Група');
    ?>    
    
    <?=
        $form->field($model, 'id_classroom')->widget(Select2::classname(), [
            'data' => $classroomsArray,
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Аудиторія');
    ?> 
    
    <?= $form->field($model, 'course')->textInput() ?>

    <?= $form->field($model, 'hours')->textInput() ?>

    <?= $form->field($model, 'semestr_hours')->textInput() ?>    
     
    <?= $form->field($model, 'id_edbo')->textInput() ?>

    <?= $form->field($model, 'id_deanery')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
