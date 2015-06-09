<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Cathedra */

$this->title = $model->cathedra_name;
$this->params['breadcrumbs'][] = ['label' => 'Кафедри', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cathedra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Змінити', ['update', 'id' => $model->cathedra_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->cathedra_id], [
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
            //'cathedra_id',
            'cathedra_name',
            'id_edbo',
            'id_deanery',
            'faculty.faculty_name',
        ],
    ]) ?>

</div>
