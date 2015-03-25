<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Cathedra */

$this->title = 'Оновити інформацію про кафедру: ' . ' ' . $model->cathedra_name;
$this->params['breadcrumbs'][] = ['label' => 'Кафедри', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cathedra_name, 'url' => ['view', 'id' => $model->cathedra_id]];
$this->params['breadcrumbs'][] = 'Змінити';
?>
<div class="cathedra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
