<?php

use yii\helpers\Html;
use app\module\handbook\models\Speciality;
use app\module\handbook\models\Faculty;
use app\module\handbook\models\Groups;
use app\module\handbook\models\LessonTime;

/* @var $this yii\web\View */
/* @var $model app\module\timetable\models\Lessons */

$semestr = $_GET['semestr'];
$course = $_GET['course'];
$faculty = $_GET['faculty_id'];
$speciality = $_GET['speciality_id'];
$inflow_year = date('Y') - $course;
$spec_name = Speciality::findOne(["speciality_id" => $speciality]);
$faculty_name = Faculty::findOne(["faculty_id" => $faculty]);
$week = ["Понеділок","Вівторок","Середа","Четвер","П'ятниця","Субота"];

$groups_list = Groups::findAll(["id_speciality" => $speciality, "inflow_year" => $inflow_year, ]);


$this->title = 'Оберіть наступні параметри:';
$this->params['breadcrumbs'][] = ['label' => 'Редактор розкладу', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lessons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?php
     echo "Семестр ".$semestr."<br/>";
     echo "Курс ".$course."<br/>";
     echo "Рік вступу ".$inflow_year."<br/>";
     echo "Спеціальність ".$speciality." ".$spec_name['speciality_name']."<br/>";
     echo "Факультет ".$faculty." ".$faculty_name['faculty_name']."<br/>";
     
     
     
    foreach($groups_list as $gr){
         //echo $gr['main_group_name']." - ".$gr['is_subgroup']."<br/>";
    }
     
     
     
          
          
          
    for($i = 0; $i < 6; $i++) {     
         ?>
    <table class="table-striped table-bordered">
          <tr>
            <td rowspan="9">
              <p class="day_name"><?php echo $week[$i]; ?></p>
            </td>
          </tr>
          <?php
          $less_time = LessonTime::find()->all();
          foreach ($less_time as $lt){             
          ?>
          <tr>
            <td class="lesson_time">
              <?php echo $lt['lesson_time_name'];?> <br/> <?php echo $lt['begin_time'];?> <br/> - <br/> <?php echo $lt['end_time'];?> 
            </td>
            <td class="day_info_in_editor">
              <div class="info_in_editor bottom_ccc_border">
                <a href="#" class="editor_edit_button"><i class="fa fa-pencil" title="Редагувати"></i></a>
                Інформація відсутня
              </div>
              <div class="info_in_editor">
                <a href="#" class="editor_edit_button"><i class="fa fa-pencil" title="Редагувати"></i></a>
                Інформація відсутня
              </div>
            </td>
          </tr>
          <?php
          }
          ?>
          
          
          
          <!--
          <tr>
            <td class="lesson_time">
              2 пара <br/> 08:00 <br/> - <br/> 09:20
            </td>
            <td class="day_info_in_editor">
              <div class="info_in_editor bottom_ccc_border">
                <a href="#" class="editor_edit_button"><i class="fa fa-pencil" title="Редагувати"></i></a>
                Інформація відсутня
              </div>
              <div class="info_in_editor">
                <a href="#" class="editor_edit_button"><i class="fa fa-pencil" title="Редагувати"></i></a>
                Інформація відсутня
              </div>
            </td>
          </tr>
          <tr>
            <td class="lesson_time">
              3 пара <br/> 08:00 <br/> - <br/> 09:20
            </td>
            <td class="day_info_in_editor">
              <div class="info_in_editor bottom_ccc_border">
                <a href="#" class="editor_edit_button"><i class="fa fa-pencil" title="Редагувати"></i></a>
                  <p class="editor_p"><h4>Програмування комп`ютерних підсистем</h4></p>
                  <p class="editor_p"><h5 class="teacher_name">Чопоров Сергій Вікторович</h5></p>
                  <p class="editor_p"><h5 class="editor_h5">Практика</h5></p>
                  <p class="editor_p">VI корпус</p>
                  <p class="editor_p">Аудиторія №410</p> 
              </div>
              <div class="info_in_editor">
                <a href="#" class="editor_edit_button"><i class="fa fa-pencil" title="Редагувати"></i></a>
                  <p class="editor_p"><h4>Програмування комп`ютерних підсистем</h4></p>
                  <p class="editor_p"><h5 class="teacher_name">Чопоров Сергій Вікторович</h5></p>
                  <p class="editor_p"><h5 class="editor_h5">Практика</h5></p>
                  <p class="editor_p">VI корпус</p>
                  <p class="editor_p">Аудиторія №410</p> 
              </div>
            </td>
          </tr>-->
        </table>
         <?php
     }
    ?>

</div>
