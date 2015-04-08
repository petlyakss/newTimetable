<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\CathedraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кафедри';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cathedra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати кафедру', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cathedra_id',
            'cathedra_name',
            //'id_edbo',
            //'id_deanery',
            'faculty.faculty_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>