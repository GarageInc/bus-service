<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carriers".
 *
 * @property integer $id
 * @property string $carriername
 * @property string $password
 * @property string $auth_key
 * @property string $token
 *
 * @property Buses[] $buses
 */
class Carriers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carriers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carriername', 'password', 'auth_key', 'token'], 'required'],
            [['carriername', 'password', 'auth_key', 'token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carriername' => 'Carriername',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'token' => 'Token',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }
    public static function findByUsername($username)
    {
        return static::findOne(['carriername' => $username]);
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
        return $this->hasMany(Buses::className(), ['carrier_id' => 'id']);
    }
}
