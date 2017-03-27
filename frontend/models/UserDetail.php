<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_detail".
 *
 * @property integer $id
 * @property string $name
 * @property string $birthday
 * @property string $sex
 * @property string $home_phone
 * @property string $skype
 * @property string $website
 * @property string $home_address
 * @property string $mobile_phone
 * @property string $home_email
 * @property string $create_date
 * @property string $update_date
 * @property integer $flag_delete
 * @property integer $u_id
 */
class UserDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'create_date', 'update_date', 'u_id'], 'required'],
            [['id', 'flag_delete', 'u_id'], 'integer'],
            [['birthday', 'create_date', 'update_date'], 'safe'],
            [['name', 'website', 'home_address'], 'string', 'max' => 255],
            [['sex'], 'string', 'max' => 5],
            [['home_phone', 'mobile_phone'], 'string', 'max' => 20],
            [['skype'], 'string', 'max' => 100],
            [['home_email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'name' => Yii::t('frontend', 'Name'),
            'birthday' => Yii::t('frontend', 'Birthday'),
            'sex' => Yii::t('frontend', 'Sex'),
            'home_phone' => Yii::t('frontend', 'Home Phone'),
            'skype' => Yii::t('frontend', 'Skype'),
            'website' => Yii::t('frontend', 'Website'),
            'home_address' => Yii::t('frontend', 'Home Address'),
            'mobile_phone' => Yii::t('frontend', 'Mobile Phone'),
            'home_email' => Yii::t('frontend', 'Home Email'),
            'create_date' => Yii::t('frontend', 'Create Date'),
            'update_date' => Yii::t('frontend', 'Update Date'),
            'flag_delete' => Yii::t('frontend', 'Flag Delete'),
            'u_id' => Yii::t('frontend', 'U ID'),
        ];
    }
}
