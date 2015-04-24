<?php

namespace app\module\handbook\controllers;

use Yii;
use app\module\handbook\models\ClassRooms;
use app\module\handbook\models\ClassRoomsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\module\handbook\models\ClassType;

/**
 * ClassRoomsController implements the CRUD actions for ClassRooms model.
 */
class ClassRoomsController extends Controller
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
     * Lists all ClassRooms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClassRoomsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClassRooms model.
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
     * Creates a new ClassRooms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClassRooms();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $spec_classes_array = $model->options;  
            
            foreach($spec_classes_array as $key){
                $ctype = new ClassType;
                $ctype->classroom_id = $model->classrooms_id;
                $ctype->spec_class_id = $key;
                $ctype->insert();
            }
            
            return $this->redirect(['view', 'id' => $model->classrooms_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ClassRooms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            ClassType::deleteAll('classroom_id = '.$model->classrooms_id);
            
            $spec_classes_array = $model->options;  
            
            foreach($spec_classes_array as $key){
                $ctype = new ClassType;
                $ctype->classroom_id = $model->classrooms_id;
                $ctype->spec_class_id = $key;
                $ctype->insert();
            }
            
            return $this->redirect(['view', 'id' => $model->classrooms_id]);
        } else {
            $opt = ClassType::findAll(['classroom_id'=>$_GET['id']]);
            foreach ($opt as $key){
                $optArr[] = $key['spec_class_id'];
            }
                $model->options = $optArr;
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ClassRooms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        ClassType::deleteAll('classroom_id = '.$id);
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClassRooms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClassRooms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClassRooms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
