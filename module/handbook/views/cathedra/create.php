<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Cathedra */

$this->title = 'Додати кафедру';
$this->params['breadcrumbs'][] = ['label' => 'Кафедри', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cathedra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
