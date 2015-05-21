<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\Cathedra;
use app\module\handbook\models\Faculty;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Speciality */
/* @var $form yii\widgets\ActiveForm */
$all_faculty = Faculty::find()->orderBy('faculty_name ASC')->all();

foreach($all_faculty as $af){
    $tmp_cathedra = Cathedra::find()->where(['id_faculty' => $af['faculty_id']])->orderBy('cathedra_name ASC')->all();
    foreach($tmp_cathedra as $tc){
        $all_cathedra[$tc['cathedra_id']] = $tc['cathedra_name']." / ".$af['faculty_name'];
    }  
}
?>

<div class="speciality-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'speciality_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'id_edebo')->textInput() ?>

    <?=
        $form->field($model, 'id_cathedra')->widget(Select2::classname(), [
            'data' => $all_cathedra,//ArrayHelper::map(Cathedra::find()->all(), 'cathedra_id','cathedra_name'),
            'language' => 'uk',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Кафедра');
    ?>
   
   <?= $form->field($model, 'id_faculty')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy('faculty_name ASC')->all(), 'faculty_id', 'faculty_name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
