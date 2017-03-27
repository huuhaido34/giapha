<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('frontend', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            // 'email:email',
            // 'ancestor_id',
            // 'parent_id',
            // 'left_id',
            // 'right_id',
            // 'is_admin',
            // 'fullname',
            // 'gender',
            // 'spouse',
            // 'birthYear',
            // 'deathYear',
            // 'description:ntext',
            // 'worshipPlace',
            // 'image',
            // 'created_at',
            // 'updated_at',
            // 'status',
            // 'images',
            // 'videos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
