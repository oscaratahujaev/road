<?php

namespace app\models\ref;

use Yii;

/**
 * This is the model class for table "ref_district".
 *
 * @property int $id
 * @property string $name Name
 * @property int $region_id Province
 * @property string $founded_year Founded year
 * @property string $ceo_full_name CEO Full name
 * @property string $work_number Contact
 * @property string $address Address
 * @property string $folder
 *
 * @property Book[] $books
 * @property RefRegion $region
 * @property RefSector[] $refSectors
 */
class RefDistrict extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'string'],
            [['region_id'], 'integer'],
            [['founded_year'], 'safe'],
            [['ceo_full_name', 'folder'], 'string', 'max' => 255],
            [['work_number'], 'string', 'max' => 55],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefRegion::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'name' => Yii::t('yii', 'Name'),
            'region_id' => Yii::t('yii', 'Region ID'),
            'founded_year' => Yii::t('yii', 'Founded Year'),
            'ceo_full_name' => Yii::t('yii', 'Ceo Full Name'),
            'work_number' => Yii::t('yii', 'Work Number'),
            'address' => Yii::t('yii', 'Address'),
            'folder' => Yii::t('yii', 'Folder'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['district_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(RefRegion::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefSectors()
    {
        return $this->hasMany(RefSector::className(), ['district_id' => 'id']);
    }
}
