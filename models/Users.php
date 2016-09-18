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
class Users extends \yii\db\ActiveRecord
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuses()
    {
        return $this->hasMany(Buses::className(), ['user_id' => 'id']);
    }
}
