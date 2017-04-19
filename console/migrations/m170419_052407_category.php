<?php

use yii\db\Migration;

class m170419_052407_category extends Migration
{
    public function up()
    {
        $this->createTable('category',[
            'id'=>$this->primaryKey(),
            'name'=>$this->text()
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
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
