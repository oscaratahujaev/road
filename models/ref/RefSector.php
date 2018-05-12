<?php

namespace app\models\ref;

use Yii;

/**
 * This is the model class for table "ref_sector".
 *
 * @property int $id
 * @property int $district_id Region
 * @property string $name Name
 * @property int $sector_number Sector number
 * @property string $ceo_full_name CEO Full name
 * @property string $ceo_position CEO Position
 * @property string $phone_number Phone number
 * @property string $work_number Work number
 * @property string $address Address
 *
 * @property Book[] $books
 * @property EventSectorDetail[] $eventSectorDetails
 * @property RefMahalla[] $refMahallas
 * @property RefDistrict $district
 */
class RefSector extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_sector';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_id', 'phone_number', 'work_number'], 'required'],
            [['district_id', 'sector_number'], 'integer'],
            [['name', 'address'], 'string'],
            [['ceo_full_name', 'ceo_position'], 'string', 'max' => 255],
            [['phone_number', 'work_number'], 'string', 'max' => 55],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefDistrict::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'district_id' => Yii::t('yii', 'District ID'),
            'name' => Yii::t('yii', 'Name'),
            'sector_number' => Yii::t('yii', 'Sector Number'),
            'ceo_full_name' => Yii::t('yii', 'Ceo Full Name'),
            'ceo_position' => Yii::t('yii', 'Ceo Position'),
            'phone_number' => Yii::t('yii', 'Phone Number'),
            'work_number' => Yii::t('yii', 'Work Number'),
            'address' => Yii::t('yii', 'Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['sector_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventSectorDetails()
    {
        return $this->hasMany(EventSectorDetail::className(), ['sector_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefMahallas()
    {
        return $this->hasMany(RefMahalla::className(), ['sector_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(RefDistrict::className(), ['id' => 'district_id']);
    }
}
