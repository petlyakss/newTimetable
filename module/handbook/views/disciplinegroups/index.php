<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\controllers\DisciplineGroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discipline Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discipline-groups-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Discipline Groups', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_discipline',
            'id_group',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
