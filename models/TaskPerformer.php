<?php

namespace app\models;

use app\models\ref\RefOrganization;
use app\models\ref\RefPlaceType;
use Yii;

/**
 * This is the model class for table "task_performer".
 *
 * @property int $id
 * @property int $event_id
 * @property int $event_task_id
 * @property int $place_type
 * @property int $organization_id
 * @property string $fullname
 * @property int $sortorder
 * @property int $creator
 * @property string $created_at
 * @property int $modifier
 * @property string $modified_at
 *
 * @property Event $event
 * @property EventTask $eventTask
 * @property RefOrganization $organization
 * @property RefPlaceType $placeType
 */
class TaskPerformer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_performer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'event_task_id', 'place_type', 'organization_id', 'sortorder', 'creator', 'modifier'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['fullname'], 'string', 'max' => 255],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['event_task_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventTask::className(), 'targetAttribute' => ['event_task_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefOrganization::className(), 'targetAttribute' => ['organization_id' => 'id']],
            [['place_type'], 'exist', 'skipOnError' => true, 'targetClass' => RefPlaceType::className(), 'targetAttribute' => ['place_type' => 'id']],
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
            'place_type' => Yii::t('yii', 'Place Type'),
            'organization_id' => Yii::t('yii', 'Organization ID'),
            'fullname' => Yii::t('yii', 'Fullname'),
            'sortorder' => Yii::t('yii', 'Sortorder'),
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
    public function getOrganization()
    {
        return $this->hasOne(RefOrganization::className(), ['id' => 'organization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaceType()
    {
        return $this->hasOne(RefPlaceType::className(), ['id' => 'place_type']);
    }
}
