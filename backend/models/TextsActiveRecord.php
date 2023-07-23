<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "texts".
 *
 * @property int $id
 * @property int $profile_id
 * @property string $title
 * @property string $body
 * @property int $lang
 *
 * @property Langua $lang0
 * @property Profile $profile
 */
class TextsActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'texts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profile_id', 'lang'], 'required'],
            [['profile_id', 'lang'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 150],
            [['lang'], 'exist', 'skipOnError' => true, 'targetClass' => LanguageActiveRecord::class, 'targetAttribute' => ['lang' => 'id']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProfileActiveRecord::class, 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profile_id' => 'Profile ID',
            'title' => 'Title',
            'body' => 'Body',
            'lang' => 'Lang',
        ];
    }

    /**
     * Gets query for [[Lang0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang0()
    {
        return $this->hasOne(Language::class, ['id' => 'lang']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['id' => 'profile_id']);
    }
}
