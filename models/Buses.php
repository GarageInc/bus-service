<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buses".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $carrier_id
 * @property integer $busmark_id
 * @property string $bus_number
 * @property string $year_of_issue
 * @property string $goverment_number
 * @property string $registration_certificate
 * @property boolean $has_folding_chairs
 * @property boolean $has_air_conditioning
 * @property boolean $has_internet
 * @property boolean $has_tv
 * @property boolean $has_restroom
 * @property integer $number_of_storeys
 *
 * @property Busmarks $busmark
 * @property Carriers $carrier
 * @property Users $user
 */
class Buses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'carrier_id', 'busmark_id', 'bus_number', 'year_of_issue', 'goverment_number', 'registration_certificate', 'has_folding_chairs', 'has_air_conditioning', 'has_internet', 'has_tv', 'has_restroom', 'number_of_storeys'], 'required'],
            [['user_id', 'carrier_id', 'busmark_id', 'number_of_storeys'], 'integer'],
            [['year_of_issue'], 'safe'],
            [['has_folding_chairs', 'has_air_conditioning', 'has_internet', 'has_tv', 'has_restroom'], 'boolean'],
            [['bus_number', 'goverment_number', 'registration_certificate'], 'string', 'max' => 255],
            [['busmark_id'], 'exist', 'skipOnError' => true, 'targetClass' => Busmarks::className(), 'targetAttribute' => ['busmark_id' => 'id']],
            [['carrier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carriers::className(), 'targetAttribute' => ['carrier_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'carrier_id' => 'Carrier ID',
            'busmark_id' => 'Busmark ID',
            'bus_number' => 'Bus Number',
            'year_of_issue' => 'Year Of Issue',
            'goverment_number' => 'Goverment Number',
            'registration_certificate' => 'Registration Certificate',
            'has_folding_chairs' => 'Has Folding Chairs',
            'has_air_conditioning' => 'Has Air Conditioning',
            'has_internet' => 'Has Internet',
            'has_tv' => 'Has Tv',
            'has_restroom' => 'Has Restroom',
            'number_of_storeys' => 'Number Of Storeys',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusmark()
    {
        return $this->hasOne(Busmarks::className(), ['id' => 'busmark_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrier()
    {
        return $this->hasOne(Carriers::className(), ['id' => 'carrier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
