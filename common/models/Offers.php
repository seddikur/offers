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
            [['phone'], PhoneInputValidator::class],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['email'], 'unique'],
            ['email', 'email'],
            [['name'], 'match', 'pattern' => '/^([^0-9._=+-,<>@]*)$/'],
            ['email', 'filter', 'filter'=>'strtolower'],
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

    /**
     * {@inheritdoc}
     */
    public function beforeValidate()
    {
//        if ($this->isNewRecord) {
//            $this->create_at = date('Y-m-d');
//        }

        return parent::beforeValidate();
    }
}
