<?php
    namespace Fuel\Migrations;

    class RankingTournament
    {
        function up()
        {
            \DBUtil::create_table('rankingTournaments', array(
                'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
                'id_tournament' => array('type' => 'int', 'constraint' => 11),
                'ranking' => array('type' => 'varchar', 'constraint' => 2),
            ), array('id'));

            // Thêm khóa ngoại bằng lệnh SQL trực tiếp
            \DB::query("ALTER TABLE rankingTournaments
                ADD CONSTRAINT fk_rankingTournaments_tournament
                FOREIGN KEY (id_tournament)
                REFERENCES tournaments(id)
                ON UPDATE CASCADE
                ON DELETE RESTRICT")->execute();
        }
        function down()
        {
            \DBUtil::drop_table('rankingTournaments');
        }
    }