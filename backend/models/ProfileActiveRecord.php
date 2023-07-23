<?php

namespace backend\models;

use common\models\User;

/**
 * This is the model class for table "Profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $createdAt
 * @property string|null $img
 * @property int $isActive
 */
class ProfileActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'createdAt', 'isActive'], 'required'],
            [['user_id'], 'integer'],
            [['createdAt'], 'safe'],
            [['img'], 'string'],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'createdAt' => 'Created At',
            'img' => 'Img',
            'isActive' => 'Is Active',
        ];
    }
}
