<?php

use Fuel\Core\Controller;
use Fuel\Core\View;
use Fuel\Core\Response;
use Fuel\Core\Uri;
use Fuel\Core\Session;
use Fuel\Core\Input;

class Controller_Player extends Controller
{
	public static function action_index()
	{
		echo View::forge('player/header');
		$data['players'] 	= Model_Player::get_top_player(5);
		$data['players_2']  = Model_Player::get_top_player_from_to(5, 10);
		return Response::forge(View::forge('player/index', $data));
	}

	public static function action_detail()
	{
		$id = Uri::segment(3);
		if ($id) {
			$data['player'] = Model_Player::get_detail_player($id);
			if ($data['player']) {
				return Response::forge(View::forge('player/detail', $data));
			} else {
				return Response::redirect('player');
			}
		} else {
			return Response::redirect('player');
		}
	}

	public static function action_info()
	{
		if (Session::get('logged_in') === true) {
			$data['player'] = Model_Player::get_detail_player(Session::get('id'));
			return Response::forge(View::forge('player/edit_detail_player', $data));
		} else {
			return Response::redirect('player');
		}
	}

	public static function action_tournament()
	{

		$data['tournaments'] = Model_Tournament::get_all_tournaments();
		return Response::forge(View::forge('player/tournament', $data));
	}

	public static function post_index()
	{
		if (Input::post('action') == 'detail') {
			$id = Input::post('id');
			return Response::redirect("player/detail/$id");
		}
	}

	public static function post_tournament()
	{
		if (Input::post('action') == 'detail') {
			$id = Input::post('id');
			return Response::redirect("player/detail_tournament/$id");
		}
	}

	public static function _validation_unique_phone($phone)
	{
		$existing_user = Model_Player::query()->where('phone', $phone)->get_one();
		return !$existing_user;
	}

	public static function _validation_unique_email($email)
	{
		$existing_user = Model_Player::query()->where('email', $email)->get_one();
		return !$existing_user;
	}

	public static function check_notification()
	{
		if (Session::get_flash('success')) {
			echo  "<div id='notification' class='alert alert-success'>
                        " . Session::get_flash('success') . "
                    </div>";
		}
		if (Session::get_flash('error')) {
			echo  "<div id='notification' class='alert alert-danger'>
                        " . Session::get_flash('error') . "
                    </div>";
		}
	}

	public function before()
	{
		self::check_notification();
	}
}
