<?php

namespace app\models;

use app\models\ref\RefSector;
use app\models\ref\RefUnitMeasure;
use Yii;

/**
 * This is the model class for table "event_sector_detail".
 *
 * @property int $id
 * @property int $event_id
 * @property int $sector_id
 * @property int $mahalla_number
 * @property int $sum
 * @property int $sum_unit_id
 * @property int $repaired_object
 * @property int $repaired_road
 * @property int $road_unit_id
 * @property int $employed
 * @property int $creator
 * @property int $created_at
 * @property int $modifier
 * @property int $modified_at
 *
 * @property Event $event
 * @property RefUnitMeasure $roadUnit
 * @property RefSector $sector
 * @property RefUnitMeasure $sumUnit
 */
class EventSectorDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_sector_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'sector_id', 'mahalla_number', 'sum', 'sum_unit_id', 'repaired_object', 'repaired_road', 'road_unit_id', 'employed', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['creator', 'created_at', 'modifier', 'modified_at'], 'required'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['road_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefUnitMeasure::className(), 'targetAttribute' => ['road_unit_id' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefSector::className(), 'targetAttribute' => ['sector_id' => 'id']],
            [['sum_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefUnitMeasure::className(), 'targetAttribute' => ['sum_unit_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'event_id' => Yii::t('yii', 'Event ID'),
            'sector_id' => Yii::t('yii', 'Sector ID'),
            'mahalla_number' => Yii::t('yii', 'Mahalla Number'),
            'sum' => Yii::t('yii', 'Sum'),
            'sum_unit_id' => Yii::t('yii', 'Sum Unit ID'),
            'repaired_object' => Yii::t('yii', 'Repaired Object'),
            'repaired_road' => Yii::t('yii', 'Repaired Road'),
            'road_unit_id' => Yii::t('yii', 'Road Unit ID'),
            'employed' => Yii::t('yii', 'Employed'),
            'creator' => Yii::t('yii', 'Creator'),
            'created_at' => Yii::t('yii', 'Created At'),
            'modifier' => Yii::t('yii', 'Modifier'),
            'modified_at' => Yii::t('yii', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadUnit()
    {
        return $this->hasOne(RefUnitMeasure::className(), ['id' => 'road_unit_id']);
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
    public function getSumUnit()
    {
        return $this->hasOne(RefUnitMeasure::className(), ['id' => 'sum_unit_id']);
    }
}
