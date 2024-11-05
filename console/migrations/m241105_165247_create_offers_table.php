<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%offers}}`.
 */
class m241105_165247_create_offers_table extends Migration
{
    /**
     * Наименование таблицы, которая создается
     */
    const TABLE_NAME = 'offers';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        //Телефон представителя
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'name' => $this->string(255)->notNull()->comment('Название оффера'),
            'email' => $this->string()->notNull()->unique()->comment('Email представителя'),
            'phone' => $this->string()->comment('Телефон представителя'),
            'create_at' => $this->date()->notNull()->comment('Дата добавления'),
        ], $tableOptions);

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $this->insert(
                self::TABLE_NAME,
                [
                    'name' => $faker->firstName,
                    'email' => $faker->email,
                    'phone' => $faker->numerify("+79#########"),
                    'create_at' => $faker->date('Y-m-d','now'),
                ]
            );
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
