<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\ClassroomsBusySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Забронювати аудиторію';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classrooms-busy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Забронювати', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cb_id',
            'id_classroom',
            'day',
            'lesson',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
