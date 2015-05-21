<?php

namespace app\module\handbook\controllers;

use Yii;
use app\module\handbook\models\Discipline;
use app\module\handbook\controllers\DisciplineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\module\handbook\models\DisciplineGroups;

/**
 * DisciplineController implements the CRUD actions for Discipline model.
 */
class DisciplineController extends Controller
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
     * Lists all Discipline models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DisciplineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Discipline model.
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
     * Creates a new Discipline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Discipline();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            foreach($model->mgroups as $group){
                
                $dg = new DisciplineGroups;
                $dg->id_discipline = $model->discipline_distribution_id;
                $dg->id_group = $group;                
                $dg->insert();
            }
            
            //return $this->redirect(['view', 'id' => $model->discipline_distribution_id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Discipline model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            DisciplineGroups::deleteAll('id_discipline = '.$id);
            
            foreach($model->mgroups as $group){
                
                $dg = new DisciplineGroups;
                $dg->id_discipline = $model->discipline_distribution_id;
                $dg->id_group = $group;                
                $dg->insert();
            }
            
            return $this->redirect(['view', 'id' => $model->discipline_distribution_id]);
        } else {
            
            $opt = DisciplineGroups::findAll(['id_discipline'=>$_GET['id']]);
              
            foreach ($opt as $key){
                $optArr[] = $key['id_group'];
            }
            
            $model->mgroups = $optArr;
                return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Discipline model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        DisciplineGroups::deleteAll('id_discipline = '.$id);
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Discipline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Discipline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Discipline::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
