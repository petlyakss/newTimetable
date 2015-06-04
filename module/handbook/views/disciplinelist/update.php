<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\DisciplineList */

$this->title = 'Оновити інформацію про: ' . ' ' . $model->discipline_name;
$this->params['breadcrumbs'][] = ['label' => 'Перелік дисциплін', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->discipline_name, 'url' => ['view', 'id' => $model->discipline_id]];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div class="discipline-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
