<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $title
 * @property string $realiz_mechanism
 * @property string $result
 * @property resource $basis_file
 * @property string $basis_filename
 * @property string $basis_filetype
 * @property string $deadline
 * @property int $event_type_id
 * @property int $deadline_type
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
            [['title', 'event_type_id'], 'required'],
            [['realiz_mechanism', 'result', 'basis_filename', 'basis_filetype'], 'string'],

            ['basis_file', 'file', 'extensions' => 'doc, docx, pdf'],

            [['deadline', 'deadline_type'], 'safe'],
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
            'title' => Yii::t('yii', 'Тадбир номи'),
            'realiz_mechanism' => Yii::t('yii', 'Амалга ошириш механизми'),
            'result' => Yii::t('yii', 'Натижа'),
            'deadline_type' => Yii::t('yii', 'Амалга ошириш муддатлари'),
            'basis_file' => Yii::t('yii', 'Амалга ошириш учун асос'),
            'basis_filename' => Yii::t('yii', 'Амалга ошириш учун асос'),
            'event_type_id' => Yii::t('yii', 'Тадбир тури'),
            'event_number' => Yii::t('yii', 'Event Number'),
            'region_id' => Yii::t('yii', 'Region ID'),
            'district_id' => Yii::t('yii', 'District ID'),
            'responsible' => Yii::t('yii', 'Туман (шахар) хокими'),
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
            $user = Yii::$app->user->identity->detail;
            $this->creator = Yii::$app->user->id;
            $this->region_id = $user ? $user->region_id : "";
            $this->district_id = $user ? $user->district_id : "";
        }
        $this->modifier = Yii::$app->user->id;

        if ($file = UploadedFile::getInstance($this, 'basis_file')) {
            $this->basis_filename = $file->name;
            $this->basis_filetype = $file->type;
            $this->basis_file = file_get_contents($file->tempName);
        }

        return parent::beforeSave($insert);
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
