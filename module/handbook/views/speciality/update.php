<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Speciality */

$this->title = 'Оновити інформацію про: ' . ' ' . $model->speciality_name;
$this->params['breadcrumbs'][] = ['label' => 'Спеціальності', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->speciality_name, 'url' => ['view', 'id' => $model->speciality_id]];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div class="speciality-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
