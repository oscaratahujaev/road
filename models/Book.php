<?php

namespace app\models;

use app\models\ref\RefDistrict;
use app\models\ref\RefRegion;
use app\models\ref\RefSector;
use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property int $region_id
 * @property int $district_id
 * @property int $sector_id
 * @property string $sector_head
 * @property string $head_position
 * @property string $head_workplace
 * @property string $head_address
 * @property int $decision_number
 * @property string $decision_date
 * @property string $governor_head
 * @property string $prosecutor_head
 * @property string $affair_head
 * @property string $tax_head
 * @property int $creator
 * @property int $created_at
 * @property int $modifier
 * @property int $modified_at
 *
 * @property RefDistrict $district
 * @property RefRegion $region
 * @property RefSector $sector
 * @property BookRecords[] $bookRecords
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'district_id', 'sector_id', 'decision_number', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['sector_head', 'head_position', 'head_workplace', 'head_address', 'decision_date', 'governor_head', 'prosecutor_head', 'affair_head', 'tax_head'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefDistrict::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefRegion::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefSector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'region_id' => Yii::t('yii', 'Region ID'),
            'district_id' => Yii::t('yii', 'District ID'),
            'sector_id' => Yii::t('yii', 'Sector ID'),
            'sector_head' => Yii::t('yii', 'Sector Head'),
            'head_position' => Yii::t('yii', 'Head Position'),
            'head_workplace' => Yii::t('yii', 'Head Workplace'),
            'head_address' => Yii::t('yii', 'Head Address'),
            'decision_number' => Yii::t('yii', 'Decision Number'),
            'decision_date' => Yii::t('yii', 'Decision Date'),
            'governor_head' => Yii::t('yii', 'Governor Head'),
            'prosecutor_head' => Yii::t('yii', 'Prosecutor Head'),
            'affair_head' => Yii::t('yii', 'Affair Head'),
            'tax_head' => Yii::t('yii', 'Tax Head'),
            'creator' => Yii::t('yii', 'Creator'),
            'created_at' => Yii::t('yii', 'Created At'),
            'modifier' => Yii::t('yii', 'Modifier'),
            'modified_at' => Yii::t('yii', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(RefDistrict::className(), ['id' => 'district_id']);
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
    public function getSector()
    {
        return $this->hasOne(RefSector::className(), ['id' => 'sector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookRecords()
    {
        return $this->hasMany(BookRecords::className(), ['book_id' => 'id']);
    }
}
