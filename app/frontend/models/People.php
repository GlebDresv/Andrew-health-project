<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property string $name
 * @property string $city
 * @property int $mass
 * @property int $id
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city', 'mass'], 'required'],
            [['mass'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['city'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'city' => 'City',
            'mass' => 'Mass',
            'id' => 'ID',
        ];
    }
}
