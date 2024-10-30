<?php

namespace Fuel\Migrations;

use Fuel\Core\DBUtil;

class Player
{
    function up()
    {
        DBUtil::create_table('players', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'name' => array('type' => 'varchar', 'constraint' => 20, 'not null'),
            'phone' => array('type' => 'varchar', 'constraint' => 10, 'not null'),
            'ranking' => array('type' => 'varchar', 'constraint' => 2, 'not null'),
            'password' => array('type' => 'varchar', 'constraint' => 50, 'not null'),
            'email' => array('type' => 'varchar', 'constraint' => 50, 'not null'),
            'otp' => array('type' => 'varchar', 'constraint' => 5),
            'is_verified' => array('type' => 'int', 'constraint' => 1, 'not null'),

        ), array('id'));
    }
    function down()
    {
        DBUtil::drop_table('players');
    }
}
