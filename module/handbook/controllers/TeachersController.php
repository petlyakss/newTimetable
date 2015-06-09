<?php

namespace app\module\handbook\controllers;

use Yii;
use app\module\handbook\models\Teachers;
use app\module\handbook\models\TeachersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\module\handbook\models\TeachersOtherCathedra;

/**
 * TeachersController implements the CRUD actions for Teachers model.
 */
class TeachersController extends Controller
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
     * Lists all Teachers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeachersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teachers model.
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
     * Creates a new Teachers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Teachers();        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            foreach($model->teacher_other_cathedra as $cath){
                $toc = new TeachersOtherCathedra;
                $toc->id_teacher = $model->teacher_id;
                $toc->id_cathedra = $cath;
                $toc->insert();
            }
            
            return $this->redirect(['view', 'id' => $model->teacher_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Teachers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
        TeachersOtherCathedra::deleteAll('id_teacher = '.$id);
            
            foreach($model->teacher_other_cathedra as $cath){
                $toc = new TeachersOtherCathedra;
                $toc->id_teacher = $model->teacher_id;
                $toc->id_cathedra = $cath;
                $toc->insert();
            }
            return $this->redirect(['view', 'id' => $model->teacher_id]);
        } else {
            $opt = TeachersOtherCathedra::findAll(['id_teacher'=>$_GET['id']]);
            
            foreach ($opt as $key){
                $optArr[] = $key['id_cathedra'];
            }
                $model->teacher_other_cathedra = $optArr;
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Teachers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        TeachersOtherCathedra::deleteAll('id_teacher = '.$id);
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teachers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Teachers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teachers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
