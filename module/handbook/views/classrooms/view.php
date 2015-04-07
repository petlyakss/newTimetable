<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\module\handbook\models\ClassType;
use app\module\handbook\models\SpecClasses;

/* @var $this yii\web\View */
/* @var $model app\module\handbook\models\Classrooms */

$this->title = 'Аудиторія №'.$model->classrooms_number;
$this->params['breadcrumbs'][] = ['label' => 'Аудиторії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

        $optionsId = ClassType::findAll(['classroom_id'  => $model->classrooms_id]); 
        
        for($i = 0; $i < count($optionsId); $i++){
            $optionName[] = SpecClasses::findAll(['spec_class_id' => $optionsId[$i]['spec_class_id']]); 
            $optionsArray[] = $optionName[$i][0]['spec_class_name']." ";
        }
        
        $optionsString = implode($optionsArray);
        
        
        
        function translater($val){         
            if($val == 0){
                    return  "Ні";
                }else{
                    return "Так";
            }
        }        
?>
<div class="classrooms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->classrooms_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->classrooms_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'classrooms_id',
            'classrooms_number',
            'housing.name',
            'seats',
            'comp_number',
            [
                'label' => 'Тип аудиторії',
                'value' => $optionsString
            ],
            [
              'label' => 'Інші дисципліни',
              'value' => translater($model->is_public)
            ],
        ],
    ]) ?>

</div>
