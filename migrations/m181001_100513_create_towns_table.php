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
            'name' => $this->text()->notNull(),
            'translit_name' => $this->text()->notNull(),
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
