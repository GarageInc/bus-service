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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuses()
    {
        return $this->hasMany(Buses::className(), ['carrier_id' => 'id']);
    }
}
