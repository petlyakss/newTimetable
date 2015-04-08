<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\module\handbook\models\Groups;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Groups */

if($model->is_subgroup != 0){
    $is_subgroup = true;
}else{
    $is_subgroup = false;
}
if($_GET['parent_id'] > 0){
    $title_str = "Підгрупа ";
}else{
    $title_str = "Група ";
}
if($is_subgroup == true){
    $parent_gr_arr = Groups::findOne(['group_id' => $model->parent_group]); 
    $parent_gr = $parent_gr_arr['main_group_name'];
}else{
    $parent_gr = "";
}
$this->title = $title_str. $model->main_group_name;
$this->params['breadcrumbs'][] = ['label' => 'Групи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'parent_id'=>$model->parent_group, 'id' => $model->group_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->group_id], [
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
            'group_id',
            'main_group_name',
            //'is_subgroup',
            'speciality.speciality_name',
            'id_edebo',
            'inflow_year',
            'number_of_students',
            'okr.okr_name',
            [
                'label' => 'Група',
                'value' => $parent_gr
            ]
        ],
    ]) ?>

</div>
