<?php

namespace app\models\ref;

use app\models\EventSectorDetail;
use app\models\TaskFinance;
use Yii;

/**
 * This is the model class for table "ref_unit_measure".
 *
 * @property int $id
 * @property string $name
 * @property int $creator
 * @property int $created_at
 * @property int $modifier
 * @property int $modified_at
 *
 * @property EventSectorDetail[] $eventSectorDetails
 * @property EventSectorDetail[] $eventSectorDetails0
 * @property TaskFinance[] $taskFinances
 */
class RefUnitMeasure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_unit_measure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['creator', 'created_at', 'modifier', 'modified_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
    public function getEventSectorDetails()
    {
        return $this->hasMany(EventSectorDetail::className(), ['road_unit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventSectorDetails0()
    {
        return $this->hasMany(EventSectorDetail::className(), ['sum_unit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskFinances()
    {
        return $this->hasMany(TaskFinance::className(), ['sum_unit_id' => 'id']);
    }
}
