<?php
    class Controller_Player extends Controller
    {
        public static function action_index()
        {
					echo View::forge('player/header');
					$data['players'] = Model_Player::get_top_player(5);	
					$data['players_2'] = Model_Player::get_top_player_from_to(5,10); 
					return Response::forge(View::forge('player/index',$data));
        }
		public static function action_detail()
		{
			$id = Uri::segment(3);
			if($id){
				$data['player'] = Model_Player::get_detail_player($id);
				if($data['player'])
				{
					return Response::forge(View::forge('player/detail',$data));
				}
				else
				{
					return Response::redirect('player');	
				}
			}
			else
			{
				return Response::redirect('player');
			}
			
		}
		public static function action_login()
		{
			return Response::forge(View::forge('player/login'));
		}
		public static function action_detail_tournament()
		{
			$id = Uri::segment(3);
			if($id){
				$data['tournament'] = Model_Tournament::get_detail_tournaments($id);
				if($data['tournament'])
				{
					return Response::forge(View::forge('player/detail_tournament',$data));
				}
				else
				{
					return Response::redirect('player/tournament');	
				}
			}
			else
			{
				return Response::redirect('player/tournament');
			}
			
		}
		public static function post_index()
		{
			if(Input::post('action') == 'detail')
			{
				$id=Input::post('id');
				return Response::redirect("player/detail/$id");
			}
		}
		public static function action_tournament()
		{
			$data['tournaments'] = Model_Tournament::get_all_tournaments();
			return Response::forge(View::forge('player/tournament', $data));
		}
		public static function post_tournament()
		{
			if(Input::post('action') == 'detail-tournament')
			{
				$id=Input::post('id');
				return Response::redirect("player/detail_tournament/$id");
			}
		}
        
    }