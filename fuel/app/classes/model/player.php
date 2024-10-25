<?php
    class Model_Player extends Orm\Model
    {
     
        // Cấu hình để ánh xạ cột username và password với tên khác
    protected static $_observers = [
        'Orm\Observer_CreatedAt' => [
            'events' => ['before_insert'],
        ],
        'Orm\Observer_UpdatedAt' => [
            'events' => ['before_save'],
        ],
    ];
        public function _get_username()
        {
            return $this->email;
        }

        public function _get_password()
        {
            return $this->password;
        }

        public static function get_top_player($i)
        {
            $players = Model_Player::query() -> where('is_verified', '=', 1)-> order_by('money','desc') -> limit($i) -> get();
            return $players;
        }
        public static function get_top_player_from_to($from,$to)
        {
            $players = Model_Player::query()-> where('is_verified', '=', 1) -> order_by('money','desc') -> offset($from) -> limit($to-$from+1) -> get();
            return $players;
        }
        public static function get_detail_player($i)
        {
            $player = self::find($i);
            return $player;
        }
        public static function add_player($name, $money, $phone, $ranking, $password,$email,$is_verified,$otp)
        {
            $player = new Model_Player;
            $player -> name = $name;
            $player -> money = $money;
            $player -> phone = $phone;
            $player -> ranking = $ranking;
            $player -> password = $password;
            $player -> email = $email;
            $player -> is_verified = $is_verified;
            $player -> otp = $otp;
            $player -> save();
            return $player;
        }
        public static function check_phone_db($phone)
		{
			$player = Model_Player::query()->where('phone', $phone)->get();

			if (!empty($player)) {
				return false;
			} else {
				return true;
			}

		}
        public static function check_email_db($email)
		{
			$player = Model_Player::query()->where('email', $email)->get();

			if (!empty($player)) {
				return false;
			} else {
				return true;
			}

		}
        public static function get_player_for_phone($phone)
		{
			$player = Model_Player::query()->where('phone', '=', $phone)->get_one();
            return $player;
		}

        public static function get_player_for_email($email)
		{
			$player = Model_Player::query()->where('email', '=', $email)->get_one();
            return $player;
		}
   
    }