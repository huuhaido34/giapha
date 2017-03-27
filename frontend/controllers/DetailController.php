<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Chart;
use frontend\models\ChartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\User;
use frontend\models\UserHistory;

/**
 * DetailController implements the CRUD actions for Chart model.
 */
class DetailController extends Controller
{
    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if (in_array($action->id, ['index'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

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
        $arrayResult = array();
        if (\Yii::$app->request->post()) {
            $member_id = \Yii::$app->request->post('member_id');
            $md_User = new User();

            $userParentHistory = UserHistory::find()
                ->select(['DATE_FORMAT(date_history, "%M %Y") AS history_date,
                    DATE_FORMAT(date_history, "%Y-%m") AS history_date2'])
                ->where("user_id = $member_id AND delete_flag=0")
                ->groupBy(['DATE_FORMAT(date_history, "%Y-%m")'])
                ->orderBy('date_history desc')
                ->asArray()
                //var_dump($userParentHistory->createCommand()->getRawSql());exit();
                ->all();

            $userChildrenHistory = UserHistory::find()
                ->select(['id, type, DATE_FORMAT(date_history,"%Y-%m") AS history_date, title, content, link_url, link_content'])
                ->where("user_id = $member_id AND delete_flag=0")
            //var_dump($userChildrenHistory->createCommand()->getRawSql());exit();
                ->asArray()
                ->all();

            //proccess parent - children
            if (!empty($userParentHistory)){
                foreach ($userParentHistory as $val) {
                    $arrayResult[] = array(
                        'date'=>$val['history_date'],
                        'children'=>self::fillterArray($userChildrenHistory, 'history_date', $val['history_date2'])
                    );
                }
                //var_dump($arrayResult);exit();
                if (is_numeric($member_id)){
                    $path_to = \Yii::$app->request->BaseUrl;
                    return $this->render('index', [
                        'css_path' => $path_to,
                        'userHistory' => $arrayResult,
                    ]);
                }
            } else{
                if (is_numeric($member_id)){
                    $path_to = \Yii::$app->request->BaseUrl;
                    return $this->render('index', [
                        'css_path' => $path_to,
                    ]);
                }
            }
        }
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

    /**
     * @param $inputArray
     * @param $column
     * @param $fillterValue
     * @return array
     */
    static function fillterArray($inputArray, $column, $fillterValue)
    {
        $arrayResult = array();
        foreach ($inputArray as $val) {
            if ($val[$column] == $fillterValue) {
                $arrayResult[] = $val;
            }
        }
        return $arrayResult;
    }
}
