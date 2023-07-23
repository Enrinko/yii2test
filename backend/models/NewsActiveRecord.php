<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "News".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $createdAt
 * @property string $updatedAt
 */
class NewsActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'News';
    }

    /**
     * @return array primary key of the table
     **/
    public static function primaryKey()
    {
        return array('id');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body', 'createdAt', 'updatedAt'], 'required'],
            [['body'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }
}
