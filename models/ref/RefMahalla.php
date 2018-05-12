<?php

namespace app\models\ref;

use Yii;

/**
 * This is the model class for table "ref_mahalla".
 *
 * @property int $id
 * @property string $name Name
 * @property string $ceo_full_name CEO Full name
 * @property string $phone_number Phone number
 * @property string $work_number Work number
 * @property int $sector_id Sector
 *
 * @property RefSector $sector
 */
class RefMahalla extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_mahalla';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['phone_number', 'work_number', 'sector_id'], 'required'],
            [['sector_id'], 'integer'],
            [['ceo_full_name'], 'string', 'max' => 255],
            [['phone_number', 'work_number'], 'string', 'max' => 55],
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
            'name' => Yii::t('yii', 'Name'),
            'ceo_full_name' => Yii::t('yii', 'Ceo Full Name'),
            'phone_number' => Yii::t('yii', 'Phone Number'),
            'work_number' => Yii::t('yii', 'Work Number'),
            'sector_id' => Yii::t('yii', 'Sector ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(RefSector::className(), ['id' => 'sector_id']);
    }
}
