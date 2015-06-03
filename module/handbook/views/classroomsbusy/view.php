<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassroomsBusy */

$this->title = $model->cb_id;
$this->params['breadcrumbs'][] = ['label' => 'Classrooms Busies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classrooms-busy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cb_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cb_id], [
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
            'cb_id',
            'id_classroom',
            'day',
            'lesson',
        ],
    ]) ?>

</div>
