<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\DisciplineList;
use app\module\handbook\models\Cathedra;
use app\module\handbook\models\LessonsType;
use app\module\handbook\models\Groups;
/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Discipline */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discipline-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_discipline')->dropDownList(ArrayHelper::map(DisciplineList::find()->all(),'discipline_id','discipline_name')) ?>

    <?= $form->field($model, 'id_edbo')->textInput() ?>

    <?= $form->field($model, 'id_deanery')->textInput() ?>

    <?= $form->field($model, 'id_cathedra')->dropDownList(ArrayHelper::map(Cathedra::find()->all(),'cathedra_id','cathedra_name')) ?>

    <?= $form->field($model, 'id_lessons_type')->dropDownList(ArrayHelper::map(LessonsType::find()->all(),'id','lesson_type_name')) ?>

    <?= $form->field($model, 'id_group')->dropDownList(ArrayHelper::map(Groups::find()->all(),'group_id','main_group_name')) ?>

    <?= $form->field($model, 'course')->textInput() ?>

    <?= $form->field($model, 'hours')->textInput() ?>

    <?= $form->field($model, 'semestr_hours')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
