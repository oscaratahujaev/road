<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_detail".
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property string $tin
 * @property string $pin
 * @property string $phone_number
 * @property string $fullname
 * @property string $birthdate
 * @property string $lastname
 * @property string $firstname
 * @property int $region_id
 * @property int $district_id
 * @property int $sector_id
 *
 * @property User $user
 */
class UserDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'region_id', 'district_id', 'sector_id'], 'integer'],
            [['address', 'tin', 'pin', 'phone_number', 'fullname', 'birthdate', 'lastname', 'firstname'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'address' => 'Address',
            'tin' => 'Tin',
            'pin' => 'Pin',
            'phone_number' => 'Phone Number',
            'fullname' => 'Fullname',
            'birthdate' => 'Birthdate',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'region_id' => 'Region ID',
            'district_id' => 'District ID',
            'sector_id' => 'Sector ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
