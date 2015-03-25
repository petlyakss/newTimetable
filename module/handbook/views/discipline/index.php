<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\DisciplineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disciplines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discipline-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Discipline', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'discipline_distribution_id',
            'disciplineName.discipline_name',
            'id_edbo',
            'id_deanery',
            'cathedra.cathedra_name',
            'lessonsType.lesson_type_name',
            'group.main_group_name',
            'course',
            'hours',
            'semestr_hours',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
