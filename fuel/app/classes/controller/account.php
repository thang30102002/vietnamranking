<?php
    class Controller_Account extends Controller
    {
        public static function action_index()
        {
            if (Input::post('action') == 'login')
			{
				$email = Input::post('email');
				$password = Input::post('password');
				$check_email = Model_Player::check_email_db($email);
				if($check_email)
				{
					Session::set_flash('error', 'Email chưa được đăng ký!');
					return Response::redirect('player');	
				}
				else
				{
					$player = Model_Player::get_player_for_email($email);
					
					if	($player)
					{
						if ($password === $player['password'])
						{
							if	($player['is_verified'] == 1)
							{
								Session::set('logged_in',true);
								Session::set('id',$player['id']);
								return Response::redirect(Session::get('url'));	
							}
							else
							{
								$random_number = rand(0, 99999);
								$token = str_pad($random_number, 5, '0', STR_PAD_LEFT);
								$player -> otp = $token;
								$player -> save();
								Session::set_flash('modalOtp',true);
								Session::set('emailRegister',$player -> email);
								Mailer::send($player -> email,$token);
								echo View::forge('player/header');
								$data['players'] = Model_Player::get_top_player(5);	
								$data['players_2'] = Model_Player::get_top_player_from_to(5,10); 
								return Response::forge(View::forge('player/index',$data));
							}
							
						}
						else
						{
							Session::set_flash('error', 'Mật khẩu không đúng. Vui lòng đăng nhập lại!');
							return Response::redirect('player');	
						}
					}
					else
					{
						Session::set_flash('error', 'Đăng nhập thất bại. Vui lòng đăng nhập lại!');
						return Response::redirect('player');	
					}
				}
			}
			else
			{
				return Response::redirect('player');	
			}
        }
        public static function action_logout()
        {
            $url = Session::get('url');
			Session::destroy();
			return Response::redirect($url);
        }
        public function action_register()
		{
			if (Input::post('action') == 'register')
			{
				$val = Validation::forge('player');
				$val -> add_field('name', 'Name', 'required');
				$val -> add_field('phone', 'Phone', 'required|min_length[10]|max_length[10]|is_numeric|unique_phone');
				$val -> add_field('email', 'Email', 'required|valid_email|unique_email');
				$val -> add_field('password', 'Password', 'required|min_length[6]|max_length[50]');
				$val->add_callable($this);
				$val->set_message('required', ':label không được để trống.');
				$val->set_message('min_length', ':label phải có ít nhất :param:1 ký tự.');
				$val->set_message('unique_phone', 'Số điện thoại đã được sử dụng. Vui lòng lấy lại mật khẩu hoặc sử dụng số điện thoại mới.');
				$val->set_message('unique_email', 'Email đã được sử dụng. Vui lòng lấy lại mật khẩu hoặc sử dụng Email mới.');

				if ($val -> run())
				{
					$validation_data = $val ->validated();
					$random_number = rand(0, 99999);
					$token = str_pad($random_number, 5, '0', STR_PAD_LEFT);
					$addPlayer = Model_Player::add_player($validation_data['name'],0,$validation_data['phone'],Input::post('ranking'),$validation_data['password'],$validation_data['email'],0,$token);
					if($addPlayer)
					{
						Session::set_flash('modalOtp',true);
						Session::set('emailRegister',$validation_data['email']);
						Mailer::send($validation_data['email'],$token);
					}
					else
					{
						Session::set_flash('error', 'Đăng ký tài khoản không thành công!');
						return Response::redirect('player');	
					}

				}
				else
				{
					$errors = $val -> error();
					foreach ($errors as $field => $error)
					{
						Session::set_flash('error', $error -> get_message());
						return Response::redirect('player');
					}
				}
			}
			else
			{
				return Response::redirect('player');	
			}
			echo View::forge('player/header');
			$data['players'] = Model_Player::get_top_player(5);	
			$data['players_2'] = Model_Player::get_top_player_from_to(5,10); 
			return Response::forge(View::forge('player/index',$data));
			
		}
		public static function action_getPass()
		{
			if	(Input::post('action') == 'getPass')
			{
				$check_player = Model_Player::check_email_db(Input::post('email_get_pass'));				
				if	($check_player)
				{
					Session::set_flash('error', 'Email chưa được đăng ký.');
					return Response::redirect('player');	
				}
				else
				{
					$player = Model_Player::get_player_for_email(Input::post('email_get_pass'));				
					$random_number = rand(0, 99999);
					$token = str_pad($random_number, 5, '0', STR_PAD_LEFT);
					$player -> otp = $token;
					$player -> save();
					Session::set_flash('modalOtpGetPass',true);
					Session::set('emailGetPass',$player -> email);
					Session::set('passGetPass',Input::post('password_get_pass'));
					Mailer::send($player -> email,$token);

					echo View::forge('player/header');
					$data['players'] = Model_Player::get_top_player(5);	
					$data['players_2'] = Model_Player::get_top_player_from_to(5,10); 
					return Response::forge(View::forge('player/index',$data));
				}
			}
			else
			{
				return Response::redirect('player');	
			}
		}
		public static function action_checkTkonGetPass()
		{
			if(Input::post('action') == 'authentic')
			{
				$playerGetPass = Model_Player::get_player_for_email(Session::get('emailGetPass'));
				$token = $playerGetPass -> otp;
				$token_input = Input::post('input_otp_1').Input::post('input_otp_2').Input::post('input_otp_3').Input::post('input_otp_4').Input::post('input_otp_5');
				if($token == $token_input)
				{
					$playerGetPass -> otp = null;
					$playerGetPass -> password = Session::get('passGetPass');
					$playerGetPass -> save();
					Session::set_flash('success','Thay đổi mật khẩu thành công.');
				}
				else
				{
					Session::set_flash('modalOtpGetPass',true);
					Session::set_flash('error','Thay đổi mật khẩu không thành công.');
				}
			}
			return Response::redirect('player');	
		}
		public static function action_checkTkon()
		{
			if(Input::post('action') == 'authentic')
			{
				$playerRegister = Model_Player::get_player_for_email(Session::get('emailRegister'));
				$token = $playerRegister -> otp;
				$token_input = Input::post('input_otp_1').Input::post('input_otp_2').Input::post('input_otp_3').Input::post('input_otp_4').Input::post('input_otp_5');
				if($token == $token_input)
				{
					$playerRegister -> otp = null;
					$playerRegister -> is_verified = 1;
					$playerRegister -> save();
					Session::set('logged_in',true);
					Session::set('id',$playerRegister['id']);
					Session::set_flash('success', 'Đăng nhập thành công!');
				}
				else
				{
					Session::set_flash('modalOtp',true);
					Session::set_flash('error','Xác thực tài khoản không thành công.');
				}
			}
			return Response::redirect('player');	
		}
    }