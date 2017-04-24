<?php

use yii\db\Migration;

class m170424_042335_ui_table extends Migration
{
    public function up()
    {
        $this->createTable('ui_table',[
            'id'=>$this->primaryKey(),
            'div'=>$this->string(),
            'parent'=>$this->integer(),
            'position'=>$this->integer(),
            'width'=>$this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('ui_table');
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
