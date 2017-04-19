<?php

use yii\db\Migration;

class m170419_052445_tags extends Migration
{
    public function up()
    {
        $this->createTable('tags',[
            'id'=>$this->integer(),
            'tag'=>$this->string()
        ]);
    }

    public function down()
    {
        $this->dropTable('tags');
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
