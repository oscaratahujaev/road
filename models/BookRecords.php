<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "book_records".
 *
 * @property int $id
 * @property int $book_id
 * @property string $date
 * @property string $visit_start
 * @property string $visit_end
 * @property string $visit_place_owner
 * @property string $place_address
 * @property string $stated_problems
 * @property string $identified_problems
 * @property string $solution_deadline_start
 * @property string $solution_deadline_end
 * @property bool $accomplishment
 * @property string $reason
 * @property bool $owner_acquainted
 * @property bool $problem_resolved
 * @property int $creator
 * @property int $created_at
 * @property int $modifier
 * @property int $modified_at
 *
 * @property Book $book
 */
class BookRecords extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_records';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['date', 'visit_start', 'visit_end', 'solution_deadline_start', 'solution_deadline_end'], 'safe'],
            [['place_address', 'stated_problems', 'identified_problems'], 'string'],
            [['accomplishment', 'owner_acquainted', 'problem_resolved'], 'boolean'],
            [['visit_place_owner', 'reason'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'book_id' => Yii::t('yii', 'Book ID'),
            'date' => Yii::t('yii', 'Date'),
            'visit_start' => Yii::t('yii', 'Visit Start'),
            'visit_end' => Yii::t('yii', 'Visit End'),
            'visit_place_owner' => Yii::t('yii', 'Visit Place Owner'),
            'place_address' => Yii::t('yii', 'Place Address'),
            'stated_problems' => Yii::t('yii', 'Stated Problems'),
            'identified_problems' => Yii::t('yii', 'Identified Problems'),
            'solution_deadline_start' => Yii::t('yii', 'Solution Deadline Start'),
            'solution_deadline_end' => Yii::t('yii', 'Solution Deadline End'),
            'accomplishment' => Yii::t('yii', 'Accomplishment'),
            'reason' => Yii::t('yii', 'Reason'),
            'owner_acquainted' => Yii::t('yii', 'Owner Acquainted'),
            'problem_resolved' => Yii::t('yii', 'Problem Resolved'),
            'creator' => Yii::t('yii', 'Creator'),
            'created_at' => Yii::t('yii', 'Created At'),
            'modifier' => Yii::t('yii', 'Modifier'),
            'modified_at' => Yii::t('yii', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }
}
