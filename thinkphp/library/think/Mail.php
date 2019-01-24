<?php

namespace think;
	class Mail {
		public function sendmail($tomail,$title,$content){
			Vendor('PHPMailer.PHPMailerAutoload');
// require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		
		$mail->Encoding = "base64";
		$mail->CharSet = 'UTF-8'; 
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.qq.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = '993973664@qq.com';                 // SMTP username
		$mail->Password = 'xfosxlnzdaxgbeda';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to
		
		
		$mail->setFrom('993973664@qq.com', 'hello');
		$mail->addAddress($tomail);     // Add a recipient
		// $mail->addAddress('924074771@qq.com');               // Name is optional
		$mail->addReplyTo($tomail, 'Information');//$mail->addReplyTo('contact@pure-seven.com', 'Information');
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $title;
		$mail->Body    = $content;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		if(!$mail->send()) {
		    echo '';
			} else {
			    echo ' ';
			}
		
		}
	}
?>