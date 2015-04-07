<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\module\handbook\models\TeachersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Викладачі';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати викладача', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'teacher_id',
            'teacher_name',
            'position.position_name',
            'academicStatus.academic_status_name',
            'cathedra.cathedra_name',
            [
              'header' => 'Додаткові кафедри',              
              'format' => 'raw',
              'value' => function($data){
                $otherCath = $data->getOtherCathedra()->all();
                $result = "<ul>";
                foreach ($otherCath as $other){
                  $cath = $other->getCathedra()->all();
                  foreach ($cath as $c){
                    $result .= "<li>".$c->cathedra_name.'</li>';
                  }
                }
                $result .= "</ul>";
                return $result;
              }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
