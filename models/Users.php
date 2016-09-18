<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $currier_id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $token
 *
 * @property Buses[] $buses
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currier_id', 'username', 'password', 'auth_key', 'token'], 'required'],
            [['currier_id', 'username', 'password', 'auth_key', 'token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currier_id' => 'Currier ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'token' => 'Token',
        ];
    }

    public function isBelongToCarrier($carrier){
        return $carrier->user_id == $this->id;
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByToken($id, $token)
    {
        $user = findIdentity($id);
        return $user->$token == $token;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function validateToken($token)
    {
        return $this->getToken() === $token;
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getBuses()
    {
        return $this->hasMany(Buses::className(), ['user_id' => 'id']);
    }

}
