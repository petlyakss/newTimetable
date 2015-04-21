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
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if($model->is_holiday == 1){
                $model->lesson_id = 0;
                $model->id_discipline = 0;
                $model->id_teacher = 0;
                $model->id_classroom = 0;
                $model->is_holiday = 1;
        }
            
            var_dump($model);
            $url = Url::to('index.php?r=timetable/lessons/editor&id'.$model->lesson_id.'&semestr='.$model->semester.'&course_get='.$model->course.'&faculty_id='.$model->id_faculty.'&speciality_id='.$model->id_speciality.'#lesson_id'.$model->lesson_id);    
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
//            var_dump($model);
//            exit();
            return $this->redirect(['editor', 'semestr' => $model->semestr, 'course_get' => $model->course_get, 'faculty_id' => $model->id_faculty, 'speciality_id' => $model->id_speciality]);
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
    /**
     * Updates an existing Lessons model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model->is_holiday == 1){
                $model->lesson_id = 0;
                $model->id_discipline = 0;
                $model->id_teacher = 0;
                $model->id_classroom = 0;
                $model->is_holiday = 1;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['editor', 'id' => $model->lesson_id, 'semestr' => $model->semester, 'course_get' => $model->course, 'faculty_id' => $model->id_faculty, 'speciality_id' => $model->id_speciality].'#lesson_id'.$model->lesson_id);
            $url = Url::to('index.php?r=timetable/lessons/editor&id'.$model->lesson_id.'&semestr='.$model->semester.'&course_get='.$model->course.'&faculty_id='.$model->id_faculty.'&speciality_id='.$model->id_speciality.'#lesson_id'.$model->lesson_id);    
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
