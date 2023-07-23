<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $full_size_name
 * @property string $short_size_name
 *
 * @property TextsActiveRecord[] $texts
 */
class LanguageActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_size_name', 'short_size_name'], 'required'],
            [['full_size_name'], 'string', 'max' => 100],
            [['short_size_name'], 'string', 'max' => 10],
            [['full_size_name'], 'unique'],
            [['short_size_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_size_name' => 'Full Size Name',
            'short_size_name' => 'Short Size Name',
        ];
    }

    /**
     * Gets query for [[Texts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTexts()
    {
        return $this->hasMany(Texts::class, ['lang' => 'id']);
    }
}
