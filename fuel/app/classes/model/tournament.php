<?php

use Orm\Model;

class Model_Tournament extends Model
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

    // public static function get_top_1_player($id)
    // {
    //     $tournament = self::query()->where('id_top_1', '=', $id)->get();
    //     if ($tournament) {
    //         return $tournament;
    //     } else {
    //         return null;
    //     }
    // }

    // public static function get_top_2_player($id)
    // {
    //     $tournament = self::query()->where('id_top_2', '=', $id)->get();
    //     return $tournament;
    // }

    // public static function get_top_3_player($id)
    // {
    //     $tournament = self::query()->where('id_top_3', '=', $id)->get();
    //     return $tournament;
    // }

    // public static function get_top_3_2_player($id)
    // {
    //     $tournament = self::query()->where('id_top_3_2', '=', $id)->get();
    //     return $tournament;
    // }

    // protected static $_has_many = array(
    //     'tournamentRankings' => array(
    //         'key_from' => 'id',
    //         'model_to' => 'Model_RankingTournament',
    //         'key_to' => 'id_tournament',
    //     ),
    // );

}
