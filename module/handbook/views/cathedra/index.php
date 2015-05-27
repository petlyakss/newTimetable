<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

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
            [
                'attribute' => 'id_faculty',
                'value' => 'faculty.faculty_name',
                //'filter' => ArrayHelper::map(\app\module\handbook\models\Faculty::find()->all(),  'faculty_name', 'faculty_id'),
                //'enableSorting' => false,
                'format' => 'text'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>