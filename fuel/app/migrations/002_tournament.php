<?php

namespace Fuel\Migrations;

use Fuel\Core\DBUtil;

class Tournament
{
    function up()
    {
        DBUtil::create_table('tournaments', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'name' => array('type' => 'varchar', 'constraint' => 20, 'not null'),
            'number_players' => array('type' => 'int', 'constraint' => 5, 'not null'),
            'start_date' => array('type' => 'DateTime', 'not null'),
            'end_date' => array('type' => 'DateTime'),
            'address' => array('type' => 'varchar', 'constraint' => 50, 'not null'),
            'money_top_1' => array('type' => 'int', 'constraint' => 11, 'not null'),
            'money_top_2' => array('type' => 'int', 'constraint' => 11, 'not null'),
            'money_top_3' => array('type' => 'int', 'constraint' => 11, 'not null'),
            'player_registed' => array('type' => 'int', 'constraint' => 11, 'not null'),
            'fees' => array('type' => 'int', 'constraint' => 11, 'not null'),
            'id_top_1' => array('type' => 'int', 'constraint' => 11),
            'id_top_2' => array('type' => 'int', 'constraint' => 11),
            'id_top_3' => array('type' => 'int', 'constraint' => 11),
            'id_top_3_2' => array('type' => 'int', 'constraint' => 11),
        ), array('id'));
    }
    function down()
    {
        DBUtil::drop_table('tournaments');
    }
}
