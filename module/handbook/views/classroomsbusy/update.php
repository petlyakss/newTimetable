<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassroomsBusy */

$this->title = 'Update Classrooms Busy: ' . ' ' . $model->cb_id;
$this->params['breadcrumbs'][] = ['label' => 'Classrooms Busies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cb_id, 'url' => ['view', 'id' => $model->cb_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classrooms-busy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
