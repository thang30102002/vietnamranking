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
			if(Input::post('action') == 'detail')
			{
				$id=Input::post('id');
				return Response::redirect("player/detail_tournament/$id");
			}
		}
		public static function action_register()
		{
			$name = Input::post('name');
			$ranking = Input::post('ranking');
			$phone = Input::post('phone');
			$password = Input::post('password');
			if(self::check_phone_db($phone))
			{
				$addPlayer = Model_Player::add_player($name,0,$phone,$ranking,$password);
				if($addPlayer)
				{
					Session::set_flash('success', 'Đăng ký tài khoản thành công!');
					return Response::redirect('player');	
				}
				else
				{
					Session::set_flash('error', 'Đăng ký tài khoản không thành công!');
					return Response::redirect('player');	
				}
			}
			else
			{
				Session::set_flash('error', 'Số điện thoại đã được sử dụng. Vui lòng lấy lại mật khẩu hoặc sử dụng số điện thoại khác');
				return Response::redirect('player');	
			}
			
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
		public static function check_notification()
        {
            if (Session::get_flash('success'))
            {
                echo  "<div id='notification' class='alert alert-success'>
                        ".Session::get_flash('success')."
                    </div>";
            }   
            if (Session::get_flash('error'))
            {
                echo  "<div id='notification' class='alert alert-danger'>
                        ".Session::get_flash('error')."
                    </div>";
            }
        }
        public function before()
        {
            $check_notification = self::check_notification();
        }
        
    }