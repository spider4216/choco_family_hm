<?php

use yii\db\Migration;

/**
 * @author farza
 * 
 * Handles the creation of table `user_data`.
 * Create user data table like a profile
 */
class m181001_100701_create_user_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_data', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->text()->notNull(),
            'surname' => $this->text()->notNull(),
            'gender' => $this->integer()->notNull(),
            'town_id' => $this->integer()->notNull(),
        ]);
        
        $this->addForeignKey(
            'fk-user_data-user_id',
            'user_data',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
        
        $this->addForeignKey(
            'fk-user_data-town_id',
            'user_data',
            'town_id',
            'towns',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_data');
    }
}
