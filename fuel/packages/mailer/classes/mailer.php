<?php

    namespace Mailer;
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

    class Mailer
    {
        public static function send($to,$otp)
        {
            $mail = new PHPMailer(true); // Khởi tạo PHPMailer

            try {
                // Cấu hình máy chủ
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Địa chỉ máy chủ SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'thangnguyen30102002@gmail.com'; // Địa chỉ email người gửi
                $mail->Password = 'jzly vplf ktpq jjrk'; // Mật khẩu email
                $mail->SMTPSecure = 'tls'; // Cấu hình bảo mật
                $mail->Port = 587; // Cổng máy chủ SMTP

                // Người gửi và người nhận
                $mail->setFrom('thangnguyen30102002@gmail.com', 'nguyen thang');
                $mail->addAddress($to, 'Tên người nhận'); // Người nhận

                // Nội dung email
                $mail->isHTML(true); // Gửi dưới dạng HTML
                $mail->Subject = 'Mã xác nhận';
                $mail->Body    = 'Mã OTP của bạn là:  <b>'.$otp.'</b> .';
                $mail->AltBody = 'Nội dung email nếu không hỗ trợ HTML.';

                $mail->send();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }    
    }
