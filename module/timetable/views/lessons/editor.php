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
use app\module\handbook\models\Classrooms;
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

//$discipline_list = DisciplineList::findAll();


$this->title = 'Редагувати розклад:';
$this->params['breadcrumbs'][] = ['label' => 'Редактор розкладу', 'url' => ['index']];
$this->params['breadcrumbs'][] = $semestr.' семестр';
$this->params['breadcrumbs'][] = $course_get. ' курс';
$this->params['breadcrumbs'][] = $faculty_name['faculty_name'];
$this->params['breadcrumbs'][] = $spec_name['speciality_name'];
?>
<div class="lessons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    
    Modal::begin([
      'header' => '<h4>Редагування інформації про пару</h4>',
      'id' => 'modal',
      'size' => 'modal-lg',
    ]);
    
    echo "<div id='modalContent'></div>";
    
    Modal::end();
    
    /*
     echo "Семестр ".$semestr."<br/>";
     echo "Курс ".$course_get."<br/>";
     echo "Рік вступу ".$inflow_year."<br/>";
     echo "Спеціальність ".$speciality." ".$spec_name['speciality_name']."<br/>";
     echo "Факультет ".$faculty." ".$faculty_name['faculty_name']."<br/>";
     */
     
     
    foreach($groups_list as $gr){
         echo $gr['group_id']." - ".$gr['main_group_name']." - ".$gr['is_subgroup']."<br/>"; 
        $id_group = $gr['group_id'];
        $id_okr = $gr['id_okr'];
    
          
    for($i = 1; $i < 7; $i++) {     
         ?>
    <table class="table-striped table-bordered">
          <tr>
              <td rowspan="9" class="day_name_col">
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
            <?php                 
                unset($one_lesson);
                        $one_lesson = Lessons::findOne([
                                        'semester' => $semestr, 
                                        'course' => $course_get, 
                                        'id_speciality' => $speciality,
                                        'id_faculty' => $faculty,
                                        'day' => $i,
                                        'lesson_number' => $lt['lesson_time_id'],
                                        'is_numerator' => 1,
                                        'id_group' => $id_group
                            ]);      
                        $lesson_id = $one_lesson['lesson_id'];
                if(!(empty($one_lesson)) && $one_lesson['is_holiday'] == 1){
                    echo '<div class="info_in_editor">';
                }else{
                    echo '<div class="info_in_editor bottom_ccc_border">';
                }
            ?>        
                  <div id="lesson_id<?php echo $lesson_id;?>"></div>
                <?php
                if(empty($one_lesson)){
                ?>
                
                    <?= Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/create&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$faculty.'&id_speciality='.$speciality.'&course='.$course_get.'&semester='.$semestr.'&is_numerator=1&day='.$i.'&lesson_number='.$lt['lesson_time_id']), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
                <?php
                    echo 'Інформація відсутня';                
                }else{
                ?>
                  <?= Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/update&id='.$lesson_id.'&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$faculty.'&id_speciality='.$speciality.'&course='.$course_get.'&semester='.$semestr.'&is_numerator=1&day='.$i.'&lesson_number='.$lt['lesson_time_id']), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
   
                  <p class="editor_p">
                    <h4>
                      <?php 
                        $disc_info = Discipline::findOne(['discipline_distribution_id' => $one_lesson['id_discipline']]);
                        $discipline_name = DisciplineList::findOne(['discipline_id' => $disc_info['id_discipline']]);
                        echo $discipline_name['discipline_name'];
                      ?>
                    </h4>
                  </p>
                  <p class="editor_p">
                    <h5 class="teacher_name">
                        <?php 
                            $teacher = Teachers::findOne(['teacher_id' => $one_lesson['id_teacher']]);
                            echo $teacher['teacher_name'];
                        ?>
                    </h5>
                  </p>
                  <p class="editor_p">
                    <h5 class="editor_h5">
                        <?php 
                            $disc_info = Discipline::findOne(['discipline_distribution_id' => $one_lesson['id_discipline']]);
                            $discipline_type = LessonsType::findOne(['id' => $disc_info['id_lessons_type']]);
                            echo $discipline_type['lesson_type_name'];
                        ?>                        
                    </h5>
                  </p>
                  <p class="editor_p">
                      <?php 
                            $classroom_array = Classrooms::findOne(['classrooms_id' => $one_lesson['id_classroom']]);
                            $housing_name = Housing::findOne(['housing_id' => $classroom_array['id_housing']]);
                            echo $housing_name['name'];
                      ?>  
                  </p>
                  <p class="editor_p">
                      <?php 
                            echo 'Аудиторія № '.$classroom_array['classrooms_number'];
                      ?>  
                  </p> 
                  <?php
                    }
                ?>
              </div>
                
              <div class="info_in_editor">
                <?php
                                unset($one_lesson);
                    $one_lesson = Lessons::findOne([
                                    'semester' => $semestr, 
                                    'course' => $course_get, 
                                    'id_speciality' => $speciality,
                                    'id_faculty' => $faculty,
                                    'day' => $i,
                                    'lesson_number' => $lt['lesson_time_id'],
                                    'is_numerator' => 0,
                                    'id_group' => $id_group
                        ]);        
                        $lesson_id = $one_lesson['lesson_id'];
                ?>
                  <div id="lesson_id<?php echo $lesson_id;?>"></div>
                <?php
                if(!(empty($one_lesson))){                    
                ?>
                
                    <?= Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/update&id='.$lesson_id.'id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$faculty.'&id_speciality='.$speciality.'&course='.$course_get.'&semester='.$semestr.'&is_numerator=0&day='.$i.'&lesson_number='.$lt['lesson_time_id']), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
                
                    <p class="editor_p">
                    <h4>
                      <?php 
                        $disc_info = Discipline::findOne(['discipline_distribution_id' => $one_lesson['id_discipline']]);
                        $discipline_name = DisciplineList::findOne(['discipline_id' => $disc_info['id_discipline']]);
                        echo $discipline_name['discipline_name'];
                      ?>
                    </h4>
                  </p>
                  <p class="editor_p">
                    <h5 class="teacher_name">
                        <?php 
                            $teacher = Teachers::findOne(['teacher_id' => $one_lesson['id_teacher']]);
                            echo $teacher['teacher_name'];
                        ?>
                    </h5>
                  </p>
                  <p class="editor_p">
                    <h5 class="editor_h5">
                        <?php 
                            $disc_info = Discipline::findOne(['discipline_distribution_id' => $one_lesson['id_discipline']]);
                            $discipline_type = LessonsType::findOne(['id' => $disc_info['id_lessons_type']]);
                            echo $discipline_type['lesson_type_name'];
                        ?>                        
                    </h5>
                  </p>
                  <p class="editor_p">
                      <?php 
                            $classroom_array = Classrooms::findOne(['classrooms_id' => $one_lesson['id_classroom']]);
                            $housing_name = Housing::findOne(['housing_id' => $classroom_array['id_housing']]);
                            echo $housing_name['name'];
                      ?>  
                  </p>
                  <p class="editor_p">
                      <?php 
                            echo 'Аудиторія № '.$classroom_array['classrooms_number'];
                      ?>  
                  </p>     
                        
                    <?php
                }else{
                ?>
                   <?= Html::button('', ['value'=>Url::to('index.php?r=timetable/lessons/create&id_okr='.$id_okr.'&id_group='.$id_group.'&id_faculty='.$faculty.'&id_speciality='.$speciality.'&course='.$course_get.'&semester='.$semestr.'&is_numerator=0&day='.$i.'&lesson_number='.$lt['lesson_time_id']), 'class' => 'editor_edit_button fa fa-pencil-square-o', 'id' => 'modalButton', 'title' => 'Редагувати']); ?>
                <?php
                    echo 'Інформація відсутня';
                }
                ?>
              </div>
            </td>               
          </tr>
          <?php
          }
    }
          ?>          
        </table>
         <?php
     }
    ?>

</div>
