<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Faculty;
use app\module\handbook\models\Speciality;
use app\module\handbook\models\Groups;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */
/* @var $form yii\widgets\ActiveForm */
$semestr = ['Оберіть семестр',1,2];
$course = ['Оберіть курс',1,2,3,4];
?>

<div class="lessons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'semestr')->dropDownList($semestr)->label("Семестр"); ?>
    
    <?= $form->field($model, 'course_get')->dropDownList($course)->label("Курс"); ?>
    
    <?= $form->field($model, 'id_faculty')->dropDownList(ArrayHelper::map(Faculty::find()->all(), 'faculty_id','faculty_name'),
        ['prompt'=>'Оберіть факультет',
              'onchange'=>'
                $.post("index.php?r=timetable/lessons/speciality_list&id='.'"+$(this).val(), function( data ) {
                  $( "select#lessons-id_speciality" ).html( data );
                });
            ']
        )->label("Факультет")?>
    
    <?= 
        $form->field($model, 'id_speciality')->dropDownList(ArrayHelper::map(Speciality::find()->all(), 'speciality_id','speciality_name'),
        ['prompt'=>'Оберіть спеціальність',
              'onchange'=>'
                $.post("index.php?r=timetable/lessons/groups_list&id='.'"+$(this).val()+"&course='.'"+$("#lessons-course_get").val(), function( data ) {
                  $( "select#lessons-id_group" ).html( data );
                });
            ']
        )->label("Спеціальність")
    ?>    
    <?= 
        $form->field($model, 'id_group')->dropDownList(ArrayHelper::map(Groups::findAll(['is_subgroup' => 0]), 'group_id','main_group_name'),
        ['prompt'=>'Оберіть групу']
        )->label("Група")
    ?>  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Обрати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
