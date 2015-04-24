<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Faculty;
use app\module\handbook\models\Speciality;

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
    
    <?= $form->field($model, 'id_speciality')->dropDownList(ArrayHelper::map(Speciality::find()->all(), 'speciality_id','speciality_name'),
        ['prompt'=>'Оберіть спеціальність']
        )->label("Спеціальність")?>    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Обрати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
