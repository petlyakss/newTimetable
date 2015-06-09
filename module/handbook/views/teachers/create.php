<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Teachers */

$this->title = 'Додати викладача';
$this->params['breadcrumbs'][] = ['label' => 'Викладачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
