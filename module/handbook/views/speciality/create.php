<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Speciality */

$this->title = 'Додати спеціальність';
$this->params['breadcrumbs'][] = ['label' => 'Спеціальності', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speciality-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
