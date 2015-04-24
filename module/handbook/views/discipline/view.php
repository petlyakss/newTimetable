<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\Housing;
use app\module\handbook\models\DisciplineList;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Discipline */
$d_name = DisciplineList::findOne([$model->discipline_distribution_id]);
$this->title = $d_name['discipline_name'];
$this->params['breadcrumbs'][] = ['label' => 'Дисципліни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

function auditory($val){
    $classes = ClassRooms::findOne(['classrooms_id' => $val]);
    $housing = Housing::findOne(['housing_id' => $classes['id_housing']]);
    return $classes['classrooms_number'].' - '.$housing['name'];
}
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
            'group.main_group_name',
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
