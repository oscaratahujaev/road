<?php

namespace app\models;

use app\models\ref\RefCategory;
use Yii;

/**
 * This is the model class for table "event_task".
 *
 * @property int $id
 * @property int $event_id
 * @property string $mahalla
 * @property int $category_id
 * @property string $title
 * @property int $deadline_type
 * @property string $deadline_date
 * @property string $deadline_text
 * @property string $realiz_mechanism
 * @property int $creator
 * @property int $created_at
 * @property int $modifier
 * @property int $modified_at
 *
 * @property RefCategory $category
 * @property Event $event
 * @property TaskFinance[] $taskFinances
 * @property TaskPerformer[] $taskPerformers
 */
class EventTask extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'category_id', 'deadline_type', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['mahalla', 'title', 'deadline_text', 'realiz_mechanism'], 'string'],
            [['title', 'deadline_type'], 'required'],
            [['deadline_date'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
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
            'mahalla' => Yii::t('yii', 'Mahalla'),
            'category_id' => Yii::t('yii', 'Category ID'),
            'title' => Yii::t('yii', 'Title'),
            'deadline_type' => Yii::t('yii', 'Deadline Type'),
            'deadline_date' => Yii::t('yii', 'Deadline Date'),
            'deadline_text' => Yii::t('yii', 'Deadline Text'),
            'realiz_mechanism' => Yii::t('yii', 'Realiz Mechanism'),
            'creator' => Yii::t('yii', 'Creator'),
            'created_at' => Yii::t('yii', 'Created At'),
            'modifier' => Yii::t('yii', 'Modifier'),
            'modified_at' => Yii::t('yii', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(RefCategory::className(), ['id' => 'category_id']);
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
    public function getTaskFinances()
    {
        return $this->hasMany(TaskFinance::className(), ['event_task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskPerformers()
    {
        return $this->hasMany(TaskPerformer::className(), ['event_task_id' => 'id']);
    }
}
