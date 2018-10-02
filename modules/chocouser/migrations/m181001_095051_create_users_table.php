<?php

use yii\db\Migration;
use app\modules\chocouser\enums\UserStatusEnum;

/**
 * @author farza
 * 
 * Handles the creation of table `users`.
 * Create User table
 */
class m181001_095051_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->text()->notNull()->unique(),
            'phone' => $this->text()->notNull()->unique(),
            'status' => $this->integer()
                ->notNull()
                ->defaultValue(UserStatusEnum::ACTIVE),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
