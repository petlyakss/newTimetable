<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\ClassroomsBusy */

$this->title = 'Забронювати аудиторію';
$this->params['breadcrumbs'][] = ['label' => 'Перелік заброньованих аудиторій', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classrooms-busy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
