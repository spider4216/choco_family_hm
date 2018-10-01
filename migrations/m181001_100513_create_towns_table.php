<?php

use yii\db\Migration;

/**
 * @author farza
 * 
 * Handles the creation of table `towns`.
 * Create towns table
 */
class m181001_100513_create_towns_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('towns', [
            'id' => $this->primaryKey(),
            'name' => $this->char(255)->notNull(),
            'translit_name' => $this->char(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('towns');
    }
}
