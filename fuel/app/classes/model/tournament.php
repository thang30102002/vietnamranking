<?php
    class Model_Tournament extends Orm\Model
    {
        protected static $_properties = array(
            'id',
            'name',
            'number_players',
            'address',
            'start_date',
            'end_date',
            'money_top_1',
            'money_top_2',
            'money_top_3',
        );
        public static function get_all_tournaments()
        {
            $tournaments = self::find('all');
            return $tournaments;
        }
        public static function get_detail_tournaments($id)
        {
            $tournament = self::find($id);
            return $tournament;
        }
    }