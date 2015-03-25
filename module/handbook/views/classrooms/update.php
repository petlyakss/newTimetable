<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassRooms */

$this->title = 'Оновити інформацію про аудиторію №: ' . ' ' . $model->classrooms_number;
$this->params['breadcrumbs'][] = ['label' => 'Аудиторії', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Аудиторія №'.$model->classrooms_number, 'url' => ['view', 'id' => $model->classrooms_id]];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div class="class-rooms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
