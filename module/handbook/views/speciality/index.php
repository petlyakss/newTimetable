<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\SpecialitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Напрям підготовки/спеціальність';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speciality-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати спеціальність', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'speciality_id',
            [
                'attribute' => 'speciality_name',
                'value' => 'speciality_name'
            ],
            //'id_edebo',            
            [
                'attribute' => 'id_cathedra',
                'value' => 'cathedra.cathedra_name'
            ],
            [
                'attribute' => 'id_faculty',
                'value' => 'faculty.faculty_name',
                //'filter' => ArrayHelper::map(\app\module\handbook\models\Faculty::find()->all(),  'faculty_name', 'faculty_id'),
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
