<?php

use yii\helpers\Html;
use app\module\handbook\models\Speciality;
use app\module\handbook\models\Faculty;
use app\module\handbook\models\Groups;
use app\module\handbook\models\LessonTime;
use app\module\timetable\models\Lessons;
use app\module\handbook\models\DisciplineList;
use app\module\handbook\models\Teachers;
use app\module\handbook\models\Discipline;
use app\module\handbook\models\LessonsType;
use app\module\handbook\models\Housing;
use app\module\handbook\models\ClassRooms;
use yii\bootstrap\Modal;

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */

$semestr = $_GET['semestr'];
$course_get = $_GET['course_get'];
$faculty = $_GET['faculty_id'];
$speciality = $_GET['speciality_id'];
$inflow_year = date('Y') - $course_get;
$spec_name = Speciality::findOne(["speciality_id" => $speciality]);
$faculty_name = Faculty::findOne(["faculty_id" => $faculty]);
$week = ["","Понеділок","Вівторок","Середа","Четвер","П'ятниця","Субота"];

$groups_list = Groups::findAll(["id_speciality" => $speciality, "inflow_year" => $inflow_year]);
$less_time = LessonTime::find()->all();

if(count($groups_list) > 1){//Определяем есть ли у группы подгруппы
    $group_has_subgroup = true;
}else{
    $group_has_subgroup = false;
}



$this->title = 'Редагувати розклад:';
$this->params['breadcrumbs'][] = ['label' => 'Редактор розкладу', 'url' => ['index']];
$this->params['breadcrumbs'][] = $semestr.' семестр';
$this->params['breadcrumbs'][] = $course_get. ' курс';
$this->params['breadcrumbs'][] = $faculty_name['faculty_name'];
$this->params['breadcrumbs'][] = $spec_name['speciality_name'];

function getDisciplineName($id_discipline){
    $disc_info = Discipline::findOne(['discipline_distribution_id' => $id_discipline]);
    $discipline_name = DisciplineList::findOne(['discipline_id' => $disc_info['id_discipline']]);
    return  $discipline_name['discipline_name'];
}
function getTeacherName($id_teacher){
    $teacher = Teachers::findOne(['teacher_id' => $id_teacher]);
    return $teacher['teacher_name'];
}
function getDisciplineType($id_discipline){
    $disc_info = Discipline::findOne(['discipline_distribution_id' => $id_discipline]);
    $discipline_type = LessonsType::findOne(['id' => $disc_info['id_lessons_type']]);
    return $discipline_type['lesson_type_name'];
}
function getHousingName($id_classroom){
    $classroom_array = ClassRooms::findOne(['classrooms_id' => $id_classroom]);
    $housing_name = Housing::findOne(['housing_id' => $classroom_array['id_housing']]);
    return $housing_name['name'];
}
function getClassromNumber($id_classroom){
    $classroom_array = ClassRooms::findOne(['classrooms_id' => $id_classroom]);
    return 'Аудиторія № '.$classroom_array['classrooms_number'];
}
function day_print($day, $lesson_number, $id_group, $is_numerator, $id_okr){
    unset($one_lesson);
                        
    $one_lesson = Lessons::findOne([
        'semester' => $_GET['semestr'], 
        'course' => $_GET['course_get'], 
        'id_speciality' => $_GET['speciality_id'],
        'id_faculty' => $_GET['faculty_id'],
        'day' => $day,
        'lesson_number' => $lesson_number,
        'is_numerator' => $is_numerator,
        'id_group' => $id_group
        ]);      
        
    $lesson_id = $one_lesson['lesson_id']; 
    if(empty($one_lesson)){//По заданным параметрам ничего нет 
        if($is_numerator == 1){
            echo '<div class="info_in_editor bottom_ccc_border">';
            echo '<div id="lesson_id'.$lesson_id.'"></div>';
             echo '<div id="day_lesson'; echo $day.'_'.$lesson_number; echo '"></div>';
            ?>
            <?=Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/create&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$_GET['faculty_id'].'&id_speciality='.$_GET['speciality_id'].'&course='.$_GET['course_get'].'&semester='.$_GET['semestr'].'&is_numerator=1&day='.$day.'&lesson_number='.$lesson_number), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
            <?php
            echo '<p class="none_information_in_editor">Інформація відсутня</p>';
            echo '</div>';
        }else{
            echo '<div class="info_in_editor">';
            echo '<div id="lesson_id'.$lesson_id.'"></div>';
            echo '<div id="day_lesson'; echo $day.'_'.$lesson_number; echo '"></div>';
            ?>
            <?=Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/create&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$_GET['faculty_id'].'&id_speciality='.$_GET['speciality_id'].'&course='.$_GET['course_get'].'&semester='.$_GET['semestr'].'&is_numerator=0&day='.$day.'&lesson_number='.$lesson_number), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
            <?php   
             echo '<p class="none_information_in_editor">Інформація відсутня</p>';
            echo '</div>';
        }
    }else{//По заданным параметрам найдены данные 
        if($one_lesson['is_holiday'] == 1){//Если ДСР
            if($is_numerator == 1){
                echo '<div class="info_in_editor">';
                echo '<div id="lesson_id'.$lesson_id.'"></div>';
                echo '<div id="day_lesson'; echo $day.'_'.$lesson_number; echo '"></div>';
                ?>
                <?=Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/update&id='.$lesson_id.'&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$_GET['faculty_id'].'&id_speciality='.$_GET['speciality_id'].'&course='.$_GET['course_get'].'&semester='.$_GET['semestr'].'&is_numerator=1&day='.$day.'&lesson_number='.$lesson_number), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
                <a href="<?= Url::toRoute(['delete', 'id' => $lesson_id]); ?>" data-pjax="0" data-method="post" data-confirm="Ви впевнені, що хочете видалити цей запис?" class="editor_delete_button"><i class="fa fa-trash"></i></a>
                <?php
                echo '<p class="dsr_in_editor">ДСР</p>';
                echo '</div>';
            }else{
                echo '<div class="info_in_editor">';
                echo '<div id="lesson_id'.$lesson_id.'"></div>';
                echo '<div id="day_lesson'; echo $day.'_'.$lesson_number; echo '"></div>';
                ?>
                <?=    Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/update&id='.$lesson_id.'&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$_GET['faculty_id'].'&id_speciality='.$_GET['speciality_id'].'&course='.$_GET['course_get'].'&semester='.$_GET['semestr'].'&is_numerator=1&day='.$day.'&lesson_number='.$lesson_number), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
                <a href="<?= Url::toRoute(['delete', 'id' => $lesson_id]); ?>" data-pjax="0" data-method="post" data-confirm="Ви впевнені, що хочете видалити цей запис?" class="editor_delete_button"><i class="fa fa-trash"></i></a>
                <?php                   
                echo '</div>';
            }
        }else{//Обычный день
            if($is_numerator == 1){
                echo '<div class="info_in_editor bottom_ccc_border">';
                echo '<div id="lesson_id'.$lesson_id.'"></div>';
                echo '<div id="day_lesson'; echo $day.'_'.$lesson_number; echo '"></div>';
                ?>
                <?= Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/update&id='.$lesson_id.'&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$_GET['faculty_id'].'&id_speciality='.$_GET['speciality_id'].'&course='.$_GET['course_get'].'&semester='.$_GET['semestr'].'&is_numerator=1&day='.$day.'&lesson_number='.$lesson_number), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
                <a href="<?= Url::toRoute(['delete', 'id' => $lesson_id]); ?>" data-pjax="0" data-method="post" data-confirm="Ви впевнені, що хочете видалити цей запис?" class="editor_delete_button"><i class="fa fa-trash"></i></a>
                <?php 
            }else{
                echo '<div class="info_in_editor">';
                echo '<div id="lesson_id'.$lesson_id.'"></div>';
                echo '<div id="day_lesson'; echo $day.'_'.$lesson_number; echo '"></div>';
                ?>
                <?= Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/update&id='.$lesson_id.'&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$_GET['faculty_id'].'&id_speciality='.$_GET['speciality_id'].'&course='.$_GET['course_get'].'&semester='.$_GET['semestr'].'&is_numerator=0&day='.$day.'&lesson_number='.$lesson_number), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
                <a href="<?= Url::toRoute(['delete', 'id' => $lesson_id]); ?>" data-pjax="0" data-method="post" data-confirm="Ви впевнені, що хочете видалити цей запис?" class="editor_delete_button"><i class="fa fa-trash"></i></a>
                <?php  
            }
            ?>
            
                <p class="editor_p">
                    <h4>
                        <?php echo getDisciplineName($one_lesson['id_discipline']); ?>
                    </h4>
                </p>
                
                <p class="editor_p">
                    <h5 class="teacher_name">
                        <?php echo getTeacherName($one_lesson['id_teacher']); ?>
                    </h5>
                </p>
                
                <p class="editor_p">
                    <h5 class="editor_h5">
                        <?php echo getDisciplineType($one_lesson['id_discipline']); ?>
                    </h5>
                </p>
                
                <p class="editor_p">
                    <?php echo getHousingName($one_lesson['id_classroom']); ?>    
                </p>
                
                <p class="editor_p">
                    <?php echo getClassromNumber($one_lesson['id_classroom']); ?>
                </p>
                <?php
            echo '</div>';
        }
    }
    echo '</div>';
}
?>
                
<div class="lessons-create col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>

<?php    
    Modal::begin([
      'header' => '<h4>Редагування інформації про пару</h4>',
      'id' => 'modal',
      'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalContent'></div>";
    
    Modal::end();
?>
    
<!--Начало таблицы редактора-->   
<table class="table-striped table-bordered">
    <tr>
        <td class="day_name_title">
                День
        </td>    
        <td class="day_name_title">
                Пара
        </td>
        <?php
        foreach($groups_list as $gr){ //Перебираем все подгруппы                    
        if($group_has_subgroup){ //Проверяем есть ли подгруппы
            if($gr['is_subgroup'] == 0){
                continue;
            }else{
                echo '
                    <td class="day_name_title">'.$gr['main_group_name'].'</td>';
                    }
        }else{
            echo '
                <td class="day_name_title">'.$gr['main_group_name'].'</td>';                 
            }        
    }
    ?>
    </tr>
<?php
    for($day_counter = 1; $day_counter < 7; $day_counter++) { 
        echo '
            <tr>
                <td rowspan="9" class="day_name_col">
                    <p class="day_name">
                        '.$week[$day_counter].'
                    </p>
                </td>
            </tr>
            ';
    
    foreach ($less_time as $lt){ //Перебираем поле таблицы с номером пары
        echo '
            <tr>
                <td class="lesson_time">'
                    .$lt['lesson_time_name']
                    .'<br/>'
                    .$lt['begin_time']
                    .'<br/> - <br/>'
                    .$lt['end_time'].'
                </td>';
    foreach($groups_list as $gr){ //Перебираем все подгруппы                    
        if($group_has_subgroup){ //Проверяем есть ли подгруппы
            if($gr['is_subgroup'] == 0){
                continue;
            }else{
                echo '
                    <td class="lesson_div">';
                    $id_group = $gr['group_id'];
                    day_print($day_counter, $lt['lesson_time_id'], $id_group,1,$gr['id_okr']);
                    day_print($day_counter, $lt['lesson_time_id'], $id_group,0,$gr['id_okr']);
                echo 
                    '</td>';
                    }
        }else{
            echo '
                <td>';
                $id_group = $gr['group_id'];
                day_print($day_counter, $lt['lesson_time_id'], $id_group,1,$gr['id_okr']);
                day_print($day_counter, $lt['lesson_time_id'], $id_group,0,$gr['id_okr']);
            echo
            '</td>';                        
            }        
    }
            echo '</tr>';
        } 
}       
?>
</table>
<!--Конец таблицы редактора-->    
</div>
