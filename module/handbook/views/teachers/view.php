<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\module\handbook\models\TeachersOtherCathedra;
use app\module\handbook\models\Cathedra;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Teachers */

$this->title = $model->teacher_name;
$this->params['breadcrumbs'][] = ['label' => 'Викладачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$optionsId = TeachersOtherCathedra::findAll(['id_teacher'  => $model->teacher_id]); 
    for($i = 0; $i < count($optionsId); $i++){
            $optionName[] = Cathedra::findAll(['cathedra_id' => $optionsId[$i]['id_cathedra']]); 
            $optionsArray[] = $optionName[$i][0]['cathedra_name']." ";
        }
        
        $optionsString = implode($optionsArray);
?>
<div class="teachers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->teacher_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->teacher_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'teacher_id',
            'teacher_name',
            'position.position_name',
            'academicStatus.academic_status_name',
            'cathedra.cathedra_name',
            [
                'label' => 'Додаткові кафедри',
                'value' => $optionsString
            ]
        ],
    ]) ?>

</div>
