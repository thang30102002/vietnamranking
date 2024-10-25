<?php
    namespace Fuel\Migrations;

    class Tournament
    {
        function up()
        {
            \DBUtil::create_table('tournaments', array(
                'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
                'name' => array('type' => 'varchar', 'constraint' => 20),
                'number_players' => array('type' => 'int', 'constraint' =>5),
                'start_date' => array('type' => 'DateTime'),
                'end_date' => array('type' => 'DateTime'),
                'address' => array('type' => 'varchar', 'constraint' =>50),
                'money_top_1' => array('type' => 'int', 'constraint' =>11),
                'money_top_2' => array('type' => 'int', 'constraint' =>11),
                'money_top_3' => array('type' => 'int', 'constraint' =>11),
            ), array('id'));
        }
        function down()
        {
            \DBUtil::drop_table('tournaments');
        }
    }