<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Groups */
if(isset($_GET['parent_id'])){
    $title_str = "Додати підгрупу";
    $is_subgroup = true;
}else{
    $title_str = "Додати групу";
    $is_subgroup = false;
}
$this->title = $title_str;
$this->params['breadcrumbs'][] = ['label' => 'Групи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
