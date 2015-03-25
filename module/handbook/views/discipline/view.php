<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\DisciplineList;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Discipline */
$dn = ArrayHelper::map(DisciplineList::find()->all(),'discipline_id','discipline_name');
$discipline_name = $dn[1];
$this->title = $discipline_name;
$this->params['breadcrumbs'][] = ['label' => 'Disciplines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discipline-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->discipline_distribution_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->discipline_distribution_id], [
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
        ],
    ]) ?>

</div>
