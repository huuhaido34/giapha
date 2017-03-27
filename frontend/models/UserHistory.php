<?php

namespace frontend\models;

use Yii;

use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "user_history".
 *
 * @property integer $id
 * @property string $type
 * @property string $date_history
 * @property string $title
 * @property string $content
 * @property string $link
 * @property string $create_date
 * @property string $update_date
 * @property integer $flag_delete
 * @property integer $user_id
 */
class UserHistory extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'update_date', 'user_id'], 'required'],
            [['date_history', 'create_date', 'update_date'], 'safe'],
            [['title', 'content', 'link'], 'string'],
            [['flag_delete', 'user_id'], 'integer'],
            [['type'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'type' => Yii::t('frontend', 'Type'),
            'date_history' => Yii::t('frontend', 'Date History'),
            'title' => Yii::t('frontend', 'Title'),
            'content' => Yii::t('frontend', 'Content'),
            'link' => Yii::t('frontend', 'Link'),
            'create_date' => Yii::t('frontend', 'Create Date'),
            'update_date' => Yii::t('frontend', 'Update Date'),
            'flag_delete' => Yii::t('frontend', 'Flag Delete'),
            'user_id' => Yii::t('frontend', 'User ID'),
        ];
    }
}
