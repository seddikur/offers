<?php

namespace common\models;

use borales\extensions\phoneInput\PhoneInputValidator;
use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $id
 * @property string $name Название оффера
 * @property string $email Email представителя
 * @property string|null $phone Телефон представителя
 * @property string $create_at Дата добавления
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'create_at'], 'required'],
            [['create_at'], 'safe'],
            [['name', 'email', 'phone'], 'trim'],
            [['phone'], PhoneInputValidator::class],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['email'], 'unique'],
            ['email', 'email'],
            [['name'], 'match', 'pattern' => '/^([^0-9._=+-,<>@]*)$/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название оффера',
            'email' => 'Email представителя',
            'phone' => 'Телефон представителя',
            'create_at' => 'Дата добавления',
        ];
    }

}
