<?php


    class Model_Tournament extends Orm\Model
    {
        public static function get_all_tournaments()
        {
            $current_time = date('Y-m-d H:i:s');

            $tournaments = self::query()
                ->where('start_date', '>', $current_time)
                ->get();
                return $tournaments;
        }
        public static function get_detail_tournaments($id)
        {
            $tournament = self::find($id);
            return $tournament;
        }

        
        // protected static $_has_many = array(
        //     'tournamentRankings' => array(
        //         'key_from' => 'id',
        //         'model_to' => 'Model_RankingTournament',
        //         'key_to' => 'id_tournament',
        //     ),
        // );

    }