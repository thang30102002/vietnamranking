<?php
    class Model_RankingTournament extends Orm\Model
    {
        protected static $_properties = array(
        'id',
        'id_tournament',
        'ranking',
        );
        protected static $_table_name = 'rankingTournaments';  // Tên bảng
        
        // protected static $_belongs_to = array(
        //     'tournament' => array(
        //         'key_from' => 'id_tournament',
        //         'model_to' => 'Model_Tournament',
        //         'key_to' => 'id',
        //     ),
        // );
        public static function get_rankings_tournament($id)
        {
            $rankings = self::query()
                ->where('id_tournament', '=', $id) // Điều kiện truy vấn
                ->get(); // Lấy kết quả
            return $rankings;
        }
        public static function get_rankings()
        {
            $rankings = self::find('all');
            return $rankings;
        }
    }