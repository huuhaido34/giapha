<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $ancestor_id
 * @property integer $parent_id
 * @property integer $left_id
 * @property integer $right_id
 * @property integer $is_admin
 * @property string $fullname
 * @property integer $gender
 * @property string $spouse
 * @property integer $birthYear
 * @property integer $deathYear
 * @property string $description
 * @property string $worshipPlace
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 * @property string $images
 * @property string $videos
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'images', 'videos'], 'required'],
            [['ancestor_id', 'parent_id', 'left_id', 'right_id', 'is_admin', 'gender', 'birthYear', 'deathYear', 'status'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'fullname', 'worshipPlace', 'image', 'images', 'videos'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['spouse'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'username' => Yii::t('frontend', 'Username'),
            'auth_key' => Yii::t('frontend', 'Auth Key'),
            'password_hash' => Yii::t('frontend', 'Password Hash'),
            'password_reset_token' => Yii::t('frontend', 'Password Reset Token'),
            'email' => Yii::t('frontend', 'Email'),
            'ancestor_id' => Yii::t('frontend', 'Ancestor ID'),
            'parent_id' => Yii::t('frontend', 'Parent ID'),
            'left_id' => Yii::t('frontend', 'Left ID'),
            'right_id' => Yii::t('frontend', 'Right ID'),
            'is_admin' => Yii::t('frontend', 'Is Admin'),
            'fullname' => Yii::t('frontend', 'Fullname'),
            'gender' => Yii::t('frontend', 'Gender'),
            'spouse' => Yii::t('frontend', 'Spouse'),
            'birthYear' => Yii::t('frontend', 'Birth Year'),
            'deathYear' => Yii::t('frontend', 'Death Year'),
            'description' => Yii::t('frontend', 'Description'),
            'worshipPlace' => Yii::t('frontend', 'Worship Place'),
            'image' => Yii::t('frontend', 'Image'),
            'created_at' => Yii::t('frontend', 'Created At'),
            'updated_at' => Yii::t('frontend', 'Updated At'),
            'status' => Yii::t('frontend', 'Status'),
            'images' => Yii::t('frontend', 'Images'),
            'videos' => Yii::t('frontend', 'Videos'),
        ];
    }
    /**
     * @param $id
     * @param $depth
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getMembers($id,$depth){
        $sql = "call user_get_branch(".$id.",".$depth.",'--');";
        $members = User::findBySql($sql, [])->all();
        return $members;
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getTotien($id){
        $sql = "call user_get_parents(".$id.",null);";
        file_put_contents('loadtotien.txt',$sql);

        $members = User::findBySql($sql, [])->all();

        file_put_contents('debug.txt', print_r($members, true));
        return $members;
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getParent($id){
        $sql = "SELECT id
                 , fullname
                 , gender
                 , description
                 , ancestor_id
            FROM user
            WHERE id = $id";
        $members = User::findBySql($sql, [])->all();
        return $members;
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getDetails($id){
        $sql = "SELECT id
                 , email
                 , fullname
                 , gender
                 , description
                 , ancestor_id
                 , spouse
                 , birthYear
                 , deathYear
                 , worshipPlace
                 , image
                 , images
                 , videos
            FROM user
            WHERE id = $id";
        $members = User::findBySql($sql, [])->all();
        return $members;
    }

    /**
     * @param $name
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getIdbyName($name){
        $sql = "SELECT id
            FROM user
            WHERE LOWER(fullname) LIKE BINARY LOWER('%$name') ORDER BY id DESC LIMIT 1";
        file_put_contents('sql_id.txt',$sql);
        $members = User::findBySql($sql, [])->all();
        $return_value = 0;
        if ($members)
            $return_value = $members[0]->id;
        return $return_value;
    }
}
