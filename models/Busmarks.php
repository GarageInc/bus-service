<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "busmarks".
 *
 * @property integer $id
 * @property string $markname
 *
 * @property Buses[] $buses
 */
class Busmarks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'busmarks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['markname'], 'required'],
            [['markname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'markname' => 'Markname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuses()
    {
        return $this->hasMany(Buses::className(), ['busmark_id' => 'id']);
    }
}
