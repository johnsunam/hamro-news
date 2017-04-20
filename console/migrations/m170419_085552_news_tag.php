<?php

use yii\db\Migration;

class m170419_085552_news_tag extends Migration
{
    public function up()
    {
        $this->createTable('news_tag',[
            'id'=>$this->integer(),
            'new_id'=>$this->integer(),
            'tag_id'=>$this->integer()
        ]);
    }

    public function down()
    {
        $this->drop('news_tag');
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
