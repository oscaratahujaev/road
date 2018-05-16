<?php

namespace app\models;

use app\models\ref\RefCategory;
use Yii;

/**
 * This is the model class for table "event_task".
 *
 * @property int $id
 * @property int $event_id
 * @property int $sector
 * @property string $mahalla
 * @property int $category_id
 * @property array $title
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
            [['event_id', 'category_id', 'deadline_type', 'creator', 'created_at', 'modifier', 'modified_at', 'sector'], 'integer'],
            [['deadline_text', 'realiz_mechanism'], 'string'],
            [['title', 'deadline_type', 'mahalla','sector'], 'required'],
            [['deadline_date', 'title'], 'safe'],
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
            'mahalla' => Yii::t('yii', 'Махаллалар'),
            'category_id' => Yii::t('yii', 'Категория'),
            'title' => Yii::t('yii', 'Чора-тадбир номи'),
            'deadline_type' => Yii::t('yii', 'Амалга ошириш муддати'),
            'deadline_date' => Yii::t('yii', 'Сана'),
            'deadline_text' => Yii::t('yii', ''),
            'realiz_mechanism' => Yii::t('yii', 'Амалга ошириш механизми'),
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

        $this->mahalla = json_encode($this->mahalla);

        return parent::beforeSave($insert);
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
