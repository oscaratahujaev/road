<?php

namespace app\models\ref;

use app\models\TaskPerformer;
use Yii;

/**
 * This is the model class for table "ref_place_type".
 *
 * @property int $id
 * @property string $name
 * @property int $creator
 * @property string $created_at
 * @property int $modifier
 * @property string $modified_at
 *
 * @property TaskPerformer[] $taskPerformers
 */
class RefPlaceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_place_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['creator', 'modifier'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
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
    public function getTaskPerformers()
    {
        return $this->hasMany(TaskPerformer::className(), ['place_type' => 'id']);
    }
}
