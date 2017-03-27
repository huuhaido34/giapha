<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'User Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('frontend', 'Create User Detail'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'birthday',
            'sex',
            'home_phone',
            // 'skype',
            // 'website',
            // 'home_address',
            // 'mobile_phone',
            // 'home_email:email',
            // 'create_date',
            // 'update_date',
            // 'flag_delete',
            // 'u_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
