<?php

namespace app\models;

use app\models\ref\RefUnitMeasure;
use Yii;

/**
 * This is the model class for table "task_finance".
 *
 * @property int $id
 * @property int $event_id
 * @property int $event_task_id
 * @property int $sum
 * @property int $sum_unit_id
 * @property string $source
 * @property int $creator
 * @property int $created_at
 * @property int $modifier
 * @property int $modified_at
 *
 * @property Event $event
 * @property EventTask $eventTask
 * @property RefUnitMeasure $sumUnit
 */
class TaskFinance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_finance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'event_task_id', 'sum', 'sum_unit_id', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            ['source', 'string'],
            ['source', 'required'],

            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['event_task_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventTask::className(), 'targetAttribute' => ['event_task_id' => 'id']],
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
            'event_task_id' => Yii::t('yii', 'Event Task ID'),
            'sum' => Yii::t('yii', 'Sum'),
            'sum_unit_id' => Yii::t('yii', 'Sum Unit ID'),
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
    public function getEventTask()
    {
        return $this->hasOne(EventTask::className(), ['id' => 'event_task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSumUnit()
    {
        return $this->hasOne(RefUnitMeasure::className(), ['id' => 'sum_unit_id']);
    }
}
