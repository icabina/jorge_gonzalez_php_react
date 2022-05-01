<?php
class MailerC{
	
	#------------Carga PHP Mailer
	public static function EnviaMailC(
		$AsuntoMail = NULL, 
		$ResponderA = NULL, 
		$EnviarA = NULL, 
		$CuerpoMail = NULL,
		$MailerFrom = NULL){
		

		// echo $AsuntoMail;
		// echo $ResponderA;
		// echo $EnviarA;
		// echo $CuerpoMail;
		// echo $MailerFrom;
		// die();
		#Libreria PHPMailer
		require_once 'libs/phpmailer6/PHPMailer.php';
		require_once 'libs/phpmailer6/SMTP.php';
		require_once 'libs/phpmailer6/Exception.php';
		$mail = new PHPMailer\PHPMailer\PHPMailer(true);
		
		#Variables Header Email
		$mail->Mailer = 'localhost';
		$mail->FromName = "WEB IV3 Arquitectura";
		$mail->Subject = $AsuntoMail;
		$mail->AddReplyTo($ResponderA);
		$mail->From = $MailerFrom;

		#Variables envio con SMTP
		/*if(MAILER_SMTP == '1'){
			$mail->Mailer = 'smtp';
			$mail->SMTPAuth = true;
			$mail->Host = MAILER_HOST;
			$mail->Username = $MailerUser;
			$mail->Password = $MailerPass;
			$mail->Port= MAILER_PORT;
			if(MAILER_SECU != ''){
				$mail->SMTPSecure = MAILER_SECU;
			}
			$mail->Timeout=30;
			//$mail->SMTPDebug = 2; 
		}*/
		
		#Convertir $EnviarA en array con Explode(), por si trae varios emails
		$EnviarA = str_replace(' ','', $EnviarA);
		$EnviarA = str_replace(',',';', $EnviarA);	
		$emails_array = explode(';', $EnviarA);
		$mail->AddAddress($emails_array[0]);
		//echo $emails_array[0];
		//die();
		#Copias
		if(count($emails_array) > 1){
			foreach(array_slice($emails_array,1) as $email_item){
				$mail->AddCC($email_item);	
			}
		}
		
		#Adjuntos
		/*if($Adjuntos != NULL){
			foreach($Adjuntos as $adjunto){
				$mail->AddAttachment($adjunto['tmp_name'], $adjunto['name']);
			}
		}*/

		#Envia
		$mail->CharSet = 'UTF-8';
		$mail->IsHTML(true);
		$mail->Body = $CuerpoMail;
		
		$mail->Send();
		
	}

}
?>