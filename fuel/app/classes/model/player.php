<?php
    class Model_Player extends Orm\Model
    {
        protected static $_properties = array(
            'id',
            'name',
            'money',
            'phone',
            'ranking',
        );
        public static function get_top_player($i)
        {
            $players = Model_Player::query() -> order_by('money','desc') -> limit($i) -> get();
            return $players;
        }
        public static function get_top_player_from_to($from,$to)
        {
            $players = Model_Player::query() -> order_by('money','desc') -> offset($from) -> limit($to-$from+1) -> get();
            return $players;
        }
        public static function get_detail_player($i)
        {
            $player = self::find($i);
            return $player;
        }
        public static function add_player($name, $money, $phone, $ranking, $password)
        {
            $player = new Model_Player;
            $player -> name = $name;
            $player -> money = $money;
            $player -> phone = $phone;
            $player -> ranking = $ranking;
            $player -> password = $password;
            $player -> save();
            return $player;
        }
    }