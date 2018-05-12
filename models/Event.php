<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $title
 * @property string $realiz_mechanism
 * @property string $result
 * @property resource $basis_file
 * @property string $deadline
 * @property int $event_type_id
 * @property string $event_number
 * @property int $region_id
 * @property int $district_id
 * @property string $responsible
 * @property int $creator
 * @property int $created_at
 * @property int $modifier
 * @property int $modified_at
 *
 * @property EventType $eventType
 * @property EventSectorDetail[] $eventSectorDetails
 * @property EventTask[] $eventTasks
 * @property TaskFinance[] $taskFinances
 * @property TaskPerformer[] $taskPerformers
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'event_type_id', 'creator', 'modifier'], 'required'],
            [['realiz_mechanism', 'result', 'basis_file'], 'string'],
            [['deadline'], 'safe'],
            [['event_type_id', 'region_id', 'district_id', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['title'], 'string', 'max' => 1000],
            [['event_number', 'responsible'], 'string', 'max' => 255],
            [['event_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventType::className(), 'targetAttribute' => ['event_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'title' => Yii::t('yii', 'Title'),
            'realiz_mechanism' => Yii::t('yii', 'Realiz Mechanism'),
            'result' => Yii::t('yii', 'Result'),
            'basis_file' => Yii::t('yii', 'Basis File'),
            'deadline' => Yii::t('yii', 'Deadline'),
            'event_type_id' => Yii::t('yii', 'Event Type ID'),
            'event_number' => Yii::t('yii', 'Event Number'),
            'region_id' => Yii::t('yii', 'Region ID'),
            'district_id' => Yii::t('yii', 'District ID'),
            'responsible' => Yii::t('yii', 'Responsible'),
            'creator' => Yii::t('yii', 'Creator'),
            'created_at' => Yii::t('yii', 'Created At'),
            'modifier' => Yii::t('yii', 'Modifier'),
            'modified_at' => Yii::t('yii', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventSectorDetails()
    {
        return $this->hasMany(EventSectorDetail::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTasks()
    {
        return $this->hasMany(EventTask::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskFinances()
    {
        return $this->hasMany(TaskFinance::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskPerformers()
    {
        return $this->hasMany(TaskPerformer::className(), ['event_id' => 'id']);
    }
}
