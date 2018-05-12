<?php

namespace app\models\ref;

use Yii;

/**
 * This is the model class for table "ref_category".
 *
 * @property int $id
 * @property string $name
 * @property int $creator
 * @property string $created_at
 * @property int $modifier
 * @property string $modified_at
 *
 * @property EventTask[] $eventTasks
 */
class RefCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTasks()
    {
        return $this->hasMany(EventTask::className(), ['category_id' => 'id']);
    }
}
