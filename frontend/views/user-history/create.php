<?php

use yii\helpers\Html;
use dosamigos\fileupload\FileUploadUI;
use dosamigos\fileupload\FileUpload;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserHistory */

$this->title = Yii::t('frontend', 'Kỷ niệm thời gian');

?>
<div class="content-wrap" style="padding: 80px 0">

    <div class="container clearfix">

        <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 800px;">

            <h3><?=Yii::t('frontend', 'Dòng kỷ niệm theo thời gian');?></h3>

            <p><?=Yii::t('frontend', 'Bạn hãy ghi lại dòng lịch sử bản thân');?></p>

            <form id="register-form" name="register-form" class="nobottommargin" action="#" method="post" style="padding-top: 15px;">

                <div class="col_half">
                    <label for="register-form-name"><?=Yii::t('frontend', 'Title');?>:</label>
                    <input type="text" id="register-form-name" name="register-form-name" value="" class="form-control" />
                </div>

                <div class="col_half col_last">
                    <label for="register-form-email"><?=Yii::t('frontend', 'hình hay video');?>:</label>
                    <select class="form-control" id="type">
                        <option value="1"><?=Yii::t('frontend', 'Images');?></option>
                        <option value="2"><?=Yii::t('frontend', 'Videos');?></option>
                    </select>
                </div>





                <?= FileUploadUI::widget([
                    'model' => $model,
                    'attribute' => 'image',
                    'url' => ['media/upload', 'id' => $model->id],
                    'gallery' => false,
                    'fieldOptions' => [
                        'accept' => 'image/*'
                    ],
                    'clientOptions' => [
                        'maxFileSize' => 2000000
                    ],
                    // ...
                    'clientEvents' => [
                        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                    ],
                ]); ?>





                <div class="clear"></div>

                <div class="col_half">
                    <label for="register-form-username"><?=Yii::t('frontend', 'Title');?>:</label>
                    <input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
                </div>

                <div class="col_half col_last">
                    <label for="register-form-phone"><?=Yii::t('frontend', 'Title');?>:</label>
                    <input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
                </div>

                <div class="clear"></div>

                <div class="col_half">
                    <label for="register-form-password"><?=Yii::t('frontend', 'Title');?>:</label>
                    <input type="text" id="register-form-password" name="register-form-password" value="" class="form-control" />
                </div>

                <div class="col_half col_last">
                    <label for="register-form-repassword"><?=Yii::t('frontend', 'Title');?>:</label>
                    <input type="text" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
                </div>

                <div class="clear"></div>

                <div class="col_full nobottommargin">
                    <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="save">Save</button>
                </div>

            </form>

        </div>

    </div>

</div>