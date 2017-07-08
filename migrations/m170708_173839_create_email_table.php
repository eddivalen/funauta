<?php

use yii\db\Migration;

/**
 * Handles the creation of table `email`.
 */
class m170708_173839_create_email_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('emails', [
            'id' => $this->primaryKey(),
            'receiver_name' =>$this->string(200),
            'receiver_email'=>$this->string(200)->notNull(),
            'subject'=>$this->string(200),            
            'content'=>$this->text(),
            'attachment'=>$this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('email');
    }
}
