<?php

use yii\db\Migration;

class m170419_052426_news extends Migration
{
    public function up()
    {
        $this->createTable('news',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(),
            'content'=>$this->text(),
            'image'=>$this->string(),
            'category_id'=>$this->integer(),
            'user_id'=>$this->integer(),
            'createdAt'=>$this->integer(11)
        ]);
    }

    public function down()
    {
       $this->dropTable('news');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
