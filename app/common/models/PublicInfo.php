<?php

namespace common\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "user_auth".
 *
 * @property int $userid
 * @property string $username
 * @property string $email
 * @property int $phone_number
 * @property string $full_name
 * @property string $about
 * @property string|null $image
 * @property int $height
 * @property int $age
 * @property int $distance_day
 * @property int $distance_week
 * @property int $distance_all
 * @property int $desired_distance
 * @property int $recommended_distance
 */
class PublicInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'public_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'phone_number', 'full_name', 'about', 'height', 'age', 'distance_day', 'distance_week', 'distance_all', 'desired_distance', 'recommended_distance'], 'required'],
            [['phone_number', 'height', 'age', 'distance_day', 'distance_week', 'distance_all', 'desired_distance', 'recommended_distance'], 'integer'],
            [['username', 'email', 'full_name', 'about', 'image'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'username' => 'Username',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'full_name' => 'Full Name',
            'about' => 'About',
            'image' => 'Image',
            'height' => 'Height',
            'age' => 'Age',
            'distance_day' => 'Distance Day',
            'distance_week' => 'Distance Week',
            'distance_all' => 'Distance All',
            'desired_distance' => 'Desired Distance',
            'recommended_distance' => 'Recommended Distance',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userid']);
    }
}
