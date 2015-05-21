<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\Housing;
use app\module\handbook\models\DisciplineList;
use app\module\handbook\models\DisciplineGroups;
use app\module\handbook\models\Groups;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Discipline */

$d_name = DisciplineList::findOne([$model->id_discipline]);
$this->title = $d_name['discipline_name'];
$this->params['breadcrumbs'][] = ['label' => 'Дисципліни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
function auditory($val){
    $classes = ClassRooms::findOne(['classrooms_id' => $val]);
    $housing = Housing::findOne(['housing_id' => $classes['id_housing']]);
    return $classes['classrooms_number'].' - '.$housing['name'];
}

$optionsId = DisciplineGroups::findAll(['id_discipline'  => $model->discipline_distribution_id]); 
        for($i = 0; $i < count($optionsId); $i++){
            $optionName[] = Groups::findAll(['group_id' => $optionsId[$i]['id_group']]); 
            $optionsArray[] = $optionName[$i][0]['main_group_name']." ";
        }
        
        $optionsString = implode(' | ', $optionsArray);
?>
<div class="discipline-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->discipline_distribution_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->discipline_distribution_id], [
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
            'discipline_distribution_id',
            'disciplineName.discipline_name',
            'id_edbo',
            'id_deanery',
            'cathedra.cathedra_name',
            'lessonsType.lesson_type_name',
            [
                'label' => 'Групи',
                'value' => $optionsString
            ],
            'course',
            'hours',
            'semestr_hours',
            [
              'label' => 'Аудиторія',
              'value' => auditory($model->id_classroom)
            ],
        ],
    ]) ?>

</div>
