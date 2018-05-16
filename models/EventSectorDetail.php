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
 * @property int $sector_number
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
            [['event_id', 'sector_number', 'mahalla_number', 'sum', 'sum_unit_id', 'repaired_object', 'repaired_road', 'road_unit_id', 'employed', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['road_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefUnitMeasure::className(), 'targetAttribute' => ['road_unit_id' => 'id']],
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
            'sector_number' => Yii::t('yii', 'Sector ID'),
            'mahalla_number' => Yii::t('yii', '«Йўл харитаси»га киритилган маҳаллалар сони'),
            'sum' => Yii::t('yii', '«Йўл харитаси»да белгиланган чора-тадбирларни амалга ошириш учун белгиланган молиявий маблағларнинг тахминий ҳажми'),
            'sum_unit_id' => Yii::t('yii', 'бирлиги'),
            'repaired_object' => Yii::t('yii', '«Йўл харитаси» доирасида капитал таъмирланадиган объектлар сони'),
            'repaired_road' => Yii::t('yii', '«Йўл харитаси» доирасида таъмирланадиган ички йўллар'),
            'road_unit_id' => Yii::t('yii', 'бирлиги'),
            'employed' => Yii::t('yii', '«Йўл харитаси» доирасида бандлиги таъминланадиган фуқаролар'),
            'creator' => Yii::t('yii', 'Creator'),
            'created_at' => Yii::t('yii', 'Created At'),
            'modifier' => Yii::t('yii', 'Modifier'),
            'modified_at' => Yii::t('yii', 'Modified At'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'modified_at',
                'value' => function () {
                    return time();
                },
            ],
        ];
    }


    public function beforeSave($insert)
    {

        if ($this->isNewRecord) {
            $this->creator = Yii::$app->user->id;
        }
        $this->modifier = Yii::$app->user->id;

        return parent::beforeSave($insert);
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
    public function getSumUnit()
    {
        return $this->hasOne(RefUnitMeasure::className(), ['id' => 'sum_unit_id']);
    }
}
