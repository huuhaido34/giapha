<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Chart;
use frontend\models\User;
use frontend\models\ChartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ChartController implements the CRUD actions for Chart model.
 */
class ChartController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Chart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'layoutChart';
        $searchModel = new ChartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $path_to = \Yii::$app->request->BaseUrl;
        return $this->render('index', [
            'image_path' => $path_to,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Chart model.
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
     * Load members  cua dong ho
     */
    public function actionAjaxloadmembers(){
        $md_User = new User();
        $name = trim(Yii::$app->request->post('member_name'));
        $id =1;
        $arrayMembers = array();
        if ($name)
            $id = $md_User->getIdbyName($name);

        $depth = Yii::$app->request->post('depth');
        if ($id&&$depth)
            $arrayMembers = $md_User->getMembers($id,$depth);
        $data_members = array();
        //all members
        $dataMembers = array();
        if(!empty($arrayMembers))
        {
            foreach($arrayMembers as $key => $member) {
                if ($key ==0){
                    $data_members['key'] = $member->id;
                    $data_members['name'] = $member->fullname;
                    $data_members['gender'] = ($member->gender==1)?'M':'F';
                    $data_members['birthYear'] = $member->birthYear;
                    $data_members['deathYear'] = $member->deathYear;
                    $data_members['spouse'] = $member->spouse;
                    $dataMembers[] = $data_members;
                }else{
                    $data_members['key'] = $member->id;
                    $data_members['parent'] = $member->parent_id;
                    $data_members['name'] = $member->fullname;
                    $data_members['gender'] = ($member->gender==1)?'M':'F';
                    $data_members['birthYear'] = $member->birthYear;
                    $data_members['deathYear'] = $member->deathYear;
                    $data_members['spouse'] = $member->spouse;
                    $dataMembers[] = $data_members;
                }
            }
        }
        echo json_encode($dataMembers);
        Yii::$app->end();
    }

    /**
     * Load to tien
     */
    public function actionAjaxloadtotien(){
        $md_User = new User;
        $name = trim(Yii::$app->request->post('member_name'));
        $id =0;
        if ($name)
            $id = $md_User->getIdbyName($name);
        if ($id)
            $arrayMembers = $md_User->getTotien($id);
        $data_members = array();
        //all members
        $dataMembers = array();
        if(!empty($arrayMembers))
        {
            foreach($arrayMembers as $key => $member) {
                if ($key ==0){
                    $data_members['key'] = $member->id;
                    $data_members['name'] = $member->fullname;
                    $data_members['gender'] = ($member->gender==1)?'M':'F';
                    $data_members['birthYear'] = $member->birthYear;
                    $data_members['deathYear'] = $member->deathYear;
                    $data_members['spouse'] = $member->spouse;
                    $dataMembers[] = $data_members;
                }else{
                    $data_members['key'] = $member->id;
                    $data_members['parent'] = $member->parent_id;
                    $data_members['name'] = $member->fullname;
                    $data_members['gender'] = ($member->gender==1)?'M':'F';
                    $data_members['birthYear'] = $member->birthYear;
                    $data_members['deathYear'] = $member->deathYear;
                    $data_members['spouse'] = $member->spouse;
                    $dataMembers[] = $data_members;
                }
            }
        }
        echo json_encode($dataMembers);
        Yii::$app->end();
    }

    /**
     * Load to tien
     */
    public function actionAjaxloadquanhe(){
        $md_User = new User();
        $arrayMembers1 = array();
        $arrayMembers2 = array();
        $name2 = trim(Yii::$app->request->post('member_name2'));
        if ($name2)
            $id2 = $md_User->getIdbyName($name2);
        if ($id2)
            $arrayMembers2 = $md_User->getTotien($id2);

        //$out2 = array_values($arrayMembers2);

        //file_put_contents('saokochay2.txt', json_encode($out2, JSON_PRETTY_PRINT));

        $name1 = trim(Yii::$app->request->post('member_name1'));
        if (!empty($name1))
            $id1 = $md_User->getIdbyName($name1);
        if ($id1)
            $arrayMembers1 = $md_User->getTotien($id1);

        //Tron 2 day lai
        $out1 = array_values($arrayMembers1);

        file_put_contents('saokochay1.txt', json_encode($out1, JSON_PRETTY_PRINT));
        if ($arrayMembers1 && $arrayMembers2)
            $arrayMembers = array_merge($arrayMembers1,$arrayMembers2);
        else
            $arrayMembers = array();
            $arrayMembers = array_unique($arrayMembers, SORT_REGULAR);

        $data_members = array();
        //all members
        $dataMembers = array();
        if(!empty($arrayMembers))
        {
            foreach($arrayMembers as $key => $member) {
                if ($key ==0){
                    $data_members['key'] = $member->id;
                    $data_members['name'] = $member->fullname;
                    $data_members['gender'] = ($member->gender==1)?'M':'F';
                    $data_members['birthYear'] = $member->birthYear;
                    $data_members['deathYear'] = $member->deathYear;
                    $data_members['spouse'] = $member->spouse;
                    $dataMembers[] = $data_members;
                }else{
                    $data_members['key'] = $member->id;
                    $data_members['parent'] = $member->parent_id;
                    $data_members['name'] = $member->fullname;
                    $data_members['gender'] = ($member->gender==1)?'M':'F';
                    $data_members['birthYear'] = $member->birthYear;
                    $data_members['deathYear'] = $member->deathYear;
                    $data_members['spouse'] = $member->spouse;
                    $dataMembers[] = $data_members;
                }
            }
        }
        //$out = array_values($arrayMembers);

        //file_put_contents('saokochay.txt', json_encode($out, JSON_PRETTY_PRINT));
        echo json_encode($dataMembers);
        Yii::$app->end();
    }

    /**
     * Creates a new Chart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Chart();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Chart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Chart model.
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
     * Finds the Chart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Chart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Chart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
