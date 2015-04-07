<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Classrooms */

$this->title = 'Додати аудиторію';
$this->params['breadcrumbs'][] = ['label' => 'Аудиторії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classrooms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
