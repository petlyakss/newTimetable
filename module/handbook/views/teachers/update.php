<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Teachers */

$this->title = 'Оновити інформацію про : ' . ' ' . $model->teacher_name;
$this->params['breadcrumbs'][] = ['label' => 'Викладачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->teacher_name, 'url' => ['view', 'id' => $model->teacher_id]];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div class="teachers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
