<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */

$this->title = 'Оберіть наступні параметри:';
$this->params['breadcrumbs'][] = ['label' => 'Редактор розкладу', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_beginForm', [
        'model' => $model
    ]) ?>

</div>
