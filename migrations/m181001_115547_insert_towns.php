<?php

use yii\db\Migration;

/**
 * Class m181001_115547_insert_towns
 */
class m181001_115547_insert_towns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('towns', [
            'name' => 'Караганда',
            'translit_name' => 'Karagandy',
        ]);
        
        $this->insert('towns', [
            'name' => 'Астана',
            'translit_name' => 'Astana',
        ]);
        
        $this->insert('towns', [
            'name' => 'Алмата',
            'translit_name' => 'Almaty',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181001_115547_insert_towns cannot be reverted.\n";

        return false;
    }
}
