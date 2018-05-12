<?php

namespace app\models\ref;

use Yii;

/**
 * This is the model class for table "ref_region".
 *
 * @property int $id
 * @property string $name Name
 * @property string $founded_year Founded year
 * @property string $ceo_full_name CEO Full name
 * @property string $work_number Contact
 * @property string $address Address
 * @property string $folder
 *
 * @property Book[] $books
 * @property RefDistrict[] $refDistricts
 */
class RefRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['founded_year'], 'safe'],
            [['address'], 'string'],
            [['name', 'ceo_full_name', 'folder'], 'string', 'max' => 255],
            [['work_number'], 'string', 'max' => 55],
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
        return $this->hasMany(Book::className(), ['region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefDistricts()
    {
        return $this->hasMany(RefDistrict::className(), ['region_id' => 'id']);
    }
}
