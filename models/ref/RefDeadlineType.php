<?php

namespace app\models\ref;

use Yii;

/**
 * This is the model class for table "ref_deadline_type".
 *
 * @property int $id
 * @property string $name
 * @property int $creator
 * @property int $created_at
 * @property int $modifier
 * @property int $modified_at
 */
class RefDeadlineType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_deadline_type';
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
}
