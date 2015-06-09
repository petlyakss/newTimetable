<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */

$this->title = 'Create Lessons';
$this->params['breadcrumbs'][] = ['label' => 'Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessons-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
