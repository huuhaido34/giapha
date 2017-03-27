<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_history_news".
 *
 * @property integer $id
 * @property string $images
 * @property string $date_history
 * @property string $notes
 * @property string $videos
 * @property string $diary
 * @property string $create_date
 * @property string $update_date
 * @property integer $flag_delete
 * @property integer $user_id
 * @property integer $user_history_id
 */
class UserHistoryNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_history_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'images', 'create_date', 'update_date', 'user_id', 'user_history_id'], 'required'],
            [['id', 'flag_delete', 'user_id', 'user_history_id'], 'integer'],
            [['date_history', 'create_date', 'update_date'], 'safe'],
            [['notes'], 'string'],
            [['images'], 'string', 'max' => 255],
            [['videos'], 'string', 'max' => 20],
            [['diary'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'images' => Yii::t('frontend', 'Images'),
            'date_history' => Yii::t('frontend', 'Date History'),
            'notes' => Yii::t('frontend', 'Notes'),
            'videos' => Yii::t('frontend', 'Videos'),
            'diary' => Yii::t('frontend', 'Diary'),
            'create_date' => Yii::t('frontend', 'Create Date'),
            'update_date' => Yii::t('frontend', 'Update Date'),
            'flag_delete' => Yii::t('frontend', 'Flag Delete'),
            'user_id' => Yii::t('frontend', 'User ID'),
            'user_history_id' => Yii::t('frontend', 'User History ID'),
        ];
    }
}
