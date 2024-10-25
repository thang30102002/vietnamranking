<?php
    namespace Fuel\Migrations;

    class Player
    {
        function up()
        {
            \DBUtil::create_table('players', array(
                'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
                'name' => array('type' => 'varchar', 'constraint' => 20),
                'money' => array('type' => 'int', 'constraint' => 11),
                'phone' => array('type' => 'varchar', 'constraint' => 10),
                'ranking' => array('type' => 'varchar', 'constraint' => 2),
                'password' => array('type' => 'varchar', 'constraint' => 50), 
            ), array('id'));
        }
        function down()
        {
            \DBUtil::drop_table('players');
        }
    }