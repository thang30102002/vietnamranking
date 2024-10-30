<?php

use Fuel\Core\Validation;
use Orm\Model;

class Model_Player extends Model
{
    public static function validation($player)
    {
        $val = Validation::forge($player);
        $val->add_field('name', 'Name', 'required');
        $val->add_field('phone', 'Phone', 'required|min_length[10]|max_length[10]|is_numeric|unique_phone');
        $val->add_field('email', 'Email', 'required|valid_email|unique_email');
        $val->add_field('password', 'Password', 'required|min_length[6]|max_length[50]');
        $val->set_message('required', ':label không được để trống.');
        $val->set_message('min_length', ':label phải có ít nhất :param:1 ký tự.');
        $val->set_message('unique_phone', 'Số điện thoại đã được sử dụng. Vui lòng lấy lại mật khẩu hoặc sử dụng số điện thoại mới.');
        $val->set_message('unique_email', 'Email đã được sử dụng. Vui lòng lấy lại mật khẩu hoặc sử dụng Email mới.');
        return $val;
    }
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

    // public static function get_top_player($i)
    // {
    //     $players = Model_Player::query()->where('is_verified', '=', 1)->order_by('money', 'desc')->limit($i)->get();
    //     return $players;
    // }
    // public static function get_top_player_from_to($from, $to)
    // {
    //     $players = Model_Player::query()->where('is_verified', '=', 1)->order_by('money', 'desc')->offset($from)->limit($to - $from + 1)->get();
    //     return $players;
    // }
    public static function get_detail_player($i)
    {
        $player = self::find($i);
        return $player;
    }
    public static function add_player($name, $phone, $ranking, $password, $email, $is_verified, $otp)
    {
        $player = new Model_Player;
        $player->name = $name;
        $player->phone = $phone;
        $player->ranking = $ranking;
        $player->password = $password;
        $player->email = $email;
        $player->is_verified = $is_verified;
        $player->otp = $otp;
        $player->save();
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

    // public static function get_money_player($id)
    // {
    //     $money_top_1 = Model_Tournament::get_top_1_player($id)['money_top_1'];
    //     $money_top_2 = Model_Tournament::get_top_2_player($id)['money_top_2'];
    //     $money_top_3 = Model_Tournament::get_top_3_player($id)['money_top_3'];
    //     $money_top_3_2 = Model_Tournament::get_top_3_player_2($id)['money_top_3'];
    //     return $money_top_1 + $money_top_2 + $money_top_3 + $money_top_3_2;
    // }
}
