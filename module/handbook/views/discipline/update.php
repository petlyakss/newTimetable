<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\module\handbook\models\DisciplineList;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Discipline */

$dn = ArrayHelper::map(DisciplineList::find()->all(),'discipline_id','discipline_name');
$discipline_name = $dn[1];
$this->title = 'Update Discipline: ' . ' ' . $discipline_name;
$this->params['breadcrumbs'][] = ['label' => 'Disciplines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $discipline_name, 'url' => ['view', 'id' => $model->discipline_distribution_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="discipline-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
