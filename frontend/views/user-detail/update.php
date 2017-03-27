<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserDetail */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'User Detail',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'User Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="user-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
