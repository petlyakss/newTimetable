<?php

namespace app\module\timetable\controllers;

use Yii;
use yii\helpers\Url;
use app\module\timetable\models\Lessons;
use app\module\timetable\models\LessonsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\module\handbook\models\Faculty;
use app\module\handbook\models\Speciality;
use app\module\handbook\models\Groups;
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\Housing;

/**
 * LessonsController implements the CRUD actions for Lessons model.
 */
class LessonsController extends Controller
{
    public function behaviors()
    {
        
        return [            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Lessons models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LessonsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lessons model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lessons model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lessons();
        $m = new Lessons;
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if($model->all_group == 1){
                $groups_arr = Groups::findAll(['parent_group' => $model->parent]);
                
                foreach($groups_arr as $ga){
                    
                    if($ga['group_id'] == $model->id_group){
                        continue;
                    }else{
                        var_dump($ga);
                        exit();
                        $m = new Lessons;
                        $m->is_holiday = $model->is_holiday;
                        $m->all_group = $model->all_group;
                        $m->id_discipline = $model->id_discipline;
                        $m->id_teacher = $model->id_teacher;
                        $m->id_classroom = $model->id_classroom;
                        $m->id_group = $model->$ga['group_id'];
                        $m->id_faculty = $model->id_faculty;
                        $m->id_speciality = $model->id_speciality;
                        $m->course = $model->course;
                        $m->semester = $model->semester;
                        $m->id_okr = $model->id_okr;
                        $m->is_numerator = $model->is_numerator;
                        $m->day = $model->day;
                        $m->lesson_number = $model->lesson_number;
                        $m->lesson_id = ++$model->lesson_id;
                        $m->insert();
                        
                    }
                } 
            }
            if($model->num_dem == 1){//Записываем если выбрана галочка Числитель/Знаменатель для 1 группы
                if($model->is_numerator == 1){                    
                    $m->is_holiday = $model->is_holiday;
                    $m->all_group = $model->all_group;
                    $m->id_discipline = $model->id_discipline;
                    $m->id_teacher = $model->id_teacher;
                    $m->id_classroom = $model->id_classroom;
                    $m->id_group = $model->id_group;
                    $m->id_faculty = $model->id_faculty;
                    $m->id_speciality = $model->id_speciality;
                    $m->course = $model->course;
                    $m->semester = $model->semester;
                    $m->id_okr = $model->id_okr;
                    $m->is_numerator = 0;
                    $m->day = $model->day;
                    $m->lesson_number = $model->lesson_number;
                    $m->lesson_id = ++$model->lesson_id;
                    $m->insert();
                }else{
                    $m->is_holiday = $model->is_holiday;
                    $m->all_group = $model->all_group;
                    $m->id_discipline = $model->id_discipline;
                    $m->id_teacher = $model->id_teacher;
                    $m->id_classroom = $model->id_classroom;
                    $m->id_group = $model->id_group;
                    $m->id_faculty = $model->id_faculty;
                    $m->id_speciality = $model->id_speciality;
                    $m->course = $model->course;
                    $m->semester = $model->semester;
                    $m->id_okr = $model->id_okr;
                    $m->is_numerator = 1;
                    $m->day = $model->day;
                    $m->lesson_number = $model->lesson_number;
                    $m->lesson_id = ++$model->lesson_id;
                    $m->insert();                            
                }
            }              
            
            /*if($model->all_group == 1){
                $groups_arr = Groups::findAll(['main_group_name' => $model->id_group]);
                var_dump($groups_arr);
            }*/
            
           /*if($model->all_speciality == 1){ 
               $groups_arr = Groups::findAll(['id_speciality' => $model->id_speciality]);
               foreach ($groups_arr as $gr){
                   if($model->id_group == $gr['group_id']){
                       echo 1;
                       continue;
                   }else{
                   if($model->num_dem == 1){
                       if($model->is_numerator == 1){
                            $model->is_numerator = 0;
                            $model->id_group = $gr['group_id'];
                            $model->id_okr = $gr['id_okr'];
                            $model->insert();
                       }else{
                            $model->is_numerator = 1;
                            $model->id_group = $gr['group_id'];
                            $model->id_okr = $gr['id_okr'];
                            $model->insert();
                       }
                   }else{
                        $model->id_group = $gr['group_id'];
                        $model->id_okr = $gr['id_okr'];
                        $model->insert();
                   }    
                   }
                   var_dump($model);
               }
           }else{
               
           } */
            
            if($model->subgroup == 1){
                $url = Url::to('index.php?r=timetable/lessons/editor&id'.$model->lesson_id.'&semestr='.$model->semester.'&course_get='.$model->course.'&faculty_id='.$model->id_faculty.'&speciality_id='.$model->id_speciality.'&group_id='.$model->parent.'#lesson_id'.$model->lesson_id);    
            }else{
                $url = Url::to('index.php?r=timetable/lessons/editor&id'.$model->lesson_id.'&semestr='.$model->semester.'&course_get='.$model->course.'&faculty_id='.$model->id_faculty.'&speciality_id='.$model->id_speciality.'&group_id='.$model->id_group.'#lesson_id'.$model->lesson_id);    
            
            }
            return $this->redirect($url);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreator_index()
    {
        $model = new Lessons();

        if ($model->load(Yii::$app->request->post())) {//$faculty->load(Yii::$app->request->post()) && $speciality->load(Yii::$app->request->post()) && 
           //var_dump($model);
            //exit();
            return $this->redirect(['editor', 'semestr' => $model->semestr, 'course_get' => $model->course_get, 'faculty_id' => $model->id_faculty, 'speciality_id' => $model->id_speciality, 'group_id' => $model->id_group]);
        } else {
            return $this->render('creator_index', [
                'model' => $model
            ]);
        }
    }
    
    public function actionEditor()
    {
        $model = new Lessons();
        
        $model->load(Yii::$app->request->get());
        return $this->render('editor', [
                'model' => $model,
                'semestr' => $model['semestr']
            ]);
    }    
    
    public function actionClass_list($id,$seats)
    {
        if($id == true){
            $posts = ClassRooms::find()
                ->orderBy('classrooms_number ASC')
                ->all();
            foreach ($posts as $cl){ 
                $housing = Housing::findOne(['housing_id' => $cl['id_housing']]);
                echo "<option value='".$cl['classrooms_id']."'>".$cl['classrooms_number'].' - '.$housing['name']."</option>";
            }
        }else{
            $classes = ClassRooms::find()->Where('seats>'.$seats)->orderBy('classrooms_number ASC')->all();
            foreach ($classes as $cl){ 
                $housing = Housing::findOne(['housing_id' => $cl['id_housing']]);
                echo "<option value='".$cl['classrooms_id']."'>".$cl['classrooms_number'].' - '.$housing['name']."</option>";
            }
        }
        
 
    
            /*foreach($posts as $post){
                echo "<option value='".$post->classrooms_id."'>".$post->classrooms_number."</option>";
            }*/
        
 
    }
    
    public function actionSpeciality_list($id)
    {
        $countPosts = Speciality::find()
                ->where(['id_faculty' => $id])
                ->count();
 
        $posts = Speciality::find()
                ->where(['id_faculty' => $id])
                ->orderBy('id_faculty DESC')
                ->all();
 
        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->speciality_id."'>".$post->speciality_name."</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }
 
    }
    
    public function actionGroups_list($id,$course)
    {       
        $infl = date('Y') - $course;
        $countPosts = Groups::find()
                ->where(['id_speciality' =>  $id])
                ->count();
 
        $posts = Groups::find()
                ->where(['id_speciality' => $id, 'inflow_year' => $infl])
                ->orderBy('id_speciality DESC')
                ->all();
 
        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->group_id."'>".$post->main_group_name."</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }
 
    }
    /**
     * Updates an existing Lessons model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        /*if($model->is_numerator == 1){
            $num = 0;
        }else{
            $num = 1;
        }*/
        
        if($model->is_holiday == 1){
                $model->lesson_id = 0;
                $model->id_discipline = 0;
                $model->id_teacher = 0;
                $model->id_classroom = 0;
                $model->is_holiday = 1;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['editor', 'id' => $model->lesson_id, 'semestr' => $model->semester, 'course_get' => $model->course, 'faculty_id' => $model->id_faculty, 'speciality_id' => $model->id_speciality].'#lesson_id'.$model->lesson_id);
            //Записываем если выбрана галочка Числитель/Знаменатель для 1 группы
            /*if($model->num_dem == 1){
                if($model->is_numerator == 1){  
                    $m = new Lessons;
                    $m->is_holiday = $model->is_holiday;
                    $m->all_group = $model->all_group;
                    $m->id_discipline = $model->id_discipline;
                    $m->id_teacher = $model->id_teacher;
                    $m->id_classroom = $model->id_classroom;
                    $m->id_group = $model->id_group;
                    $m->id_faculty = $model->id_faculty;
                    $m->id_speciality = $model->id_speciality;
                    $m->course = $model->course;
                    $m->semester = $model->semester;
                    $m->id_okr = $model->id_okr;
                    $m->is_numerator = 0;
                    $m->day = $model->day;
                    $m->lesson_number = $model->lesson_number;
                    $m->lesson_id = ++$model->lesson_id;
                    $m->update();
                }else{
                    $m = new Lessons;
                    $m->is_holiday = $model->is_holiday;
                    $m->all_group = $model->all_group;
                    $m->id_discipline = $model->id_discipline;
                    $m->id_teacher = $model->id_teacher;
                    $m->id_classroom = $model->id_classroom;
                    $m->id_group = $model->id_group;
                    $m->id_faculty = $model->id_faculty;
                    $m->id_speciality = $model->id_speciality;
                    $m->course = $model->course;
                    $m->semester = $model->semester;
                    $m->id_okr = $model->id_okr;
                    $m->is_numerator = 1;
                    $m->day = $model->day;
                    $m->lesson_number = $model->lesson_number;
                    $m->lesson_id = ++$model->lesson_id;
                    $m->update();                            
                }
            } */
            
            $url = Url::to('index.php?r=timetable/lessons/editor&id'.$model->lesson_id.'&semestr='.$model->semester.'&course_get='.$model->course.'&faculty_id='.$model->id_faculty.'&speciality_id='.$model->id_speciality.'&group_id='.$model->id_group.'#lesson_id'.$model->lesson_id);    
            return $this->redirect($url);
                
                
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Lessons model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        $this->findModel($id)->delete();
        
        $url = Url::to('index.php?r=timetable/lessons/editor&id'.$model->lesson_id.'&semestr='.$model->semester.'&course_get='.$model->course.'&faculty_id='.$model->id_faculty.'&speciality_id='.$model->id_speciality.'&group_id='.$model->id_group.'#day_lesson'.$model->day.'_'.$model->lesson_number);    
        return $this->redirect($url);
    }

    /**
     * Finds the Lessons model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lessons the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lessons::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
