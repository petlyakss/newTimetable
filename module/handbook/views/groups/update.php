<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Groups */

if(isset($_GET['parent_id'])){
    $title_str = "Оновити підгрупу";
    $is_subgroup = true;
}else{
    $title_str = "Оновити групу";
    $is_subgroup = false;
}

$this->title = $title_str . ' ' . $model->main_group_name;
$this->params['breadcrumbs'][] = ['label' => 'Групи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->main_group_name, 'url' => ['view', 'id' => $model->group_id]];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div class="groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
