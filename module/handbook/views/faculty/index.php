<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\FacultySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Факультети';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?//= Html::a('Create Faculty', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'faculty_id',
            'faculty_name',
            'id_edbo',
            'id_deanery',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
