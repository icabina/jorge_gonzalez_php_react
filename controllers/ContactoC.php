<?php
class ContactoC{
	
	
	#------------Carga Contacto
	public static function LoadC(){
		include('views/contacto.php');
		die();
	}	
	
	










	#------------Envia formulario Contacto (correo Gmail)
	public static function EnviaContactoGeneralC(){

		#---Validacion
		if(
			$_POST['fant']!==''
			|| $_POST['fant2']!==''
			|| !isset($_POST['nombre']) || $_POST['nombre']==''
			|| !isset($_POST['apellido']) || $_POST['apellido']==''
			|| !isset($_POST['email']) || $_POST['email']==''
			|| !isset($_POST['celular']) || $_POST['celular']==''
			|| !isset($_POST['asunto']) || $_POST['asunto']==''
		){
			$redirige = 'error404';
			header('Location:'.$redirige);
			die();
		}



	#---Variables
	$nombre = sanitize_xss($_POST['nombre']);
	$apellido = sanitize_xss($_POST['apellido']);
	$email = sanitize_xss($_POST['email']);
	$celular = sanitize_xss($_POST['celular']);
	$asunto = sanitize_xss($_POST['asunto']);
	$comentarios = sanitize_xss($_POST['comentarios']);

	#---Armo body del mensaje
	$body = '';
	$body .= '<p style="font-family:Arial, Helvetica, sans-serif; line-height:1.3em;">';
	$body .= sprintf(
		'

		<br><br>--------------------------------------------------<br><br>
		<b>CONTACTO:</b><br>
		<br><b>Nombre</b> %s
		<br><b>Apellidos:</b> %s
		<br><b>E-mail:</b> %s
		<br><b>Celular:</b> %s
		<br><b>Asunto:</b> %s
		<br><b>Comentarios:</b> %s
		',
		$nombre,
		$apellido,
		$email,
		$celular,
		$asunto,
		$comentarios
	);
	$body .= '</p>';

	#---Envío correo
	$AsuntoMail = 'CONTACTO WEB: ';
	$ResponderA = $email;
	$EnviarA = 'info@emoticaweb.com';
	$CuerpoMail = $body;
	$MailerFrom = 'icabina@gmail.com';
	//$MailerUser = 'icabina@gmail.com';
	//$MailerPass = MAILER_PASS_GNRAL;
	$Mailer = MailerC::EnviaMailC($AsuntoMail, $ResponderA, $EnviarA, $CuerpoMail, $MailerFrom);

	#---Carga vista
	$redirige = 'enviado';
	header('Location:'.$redirige);
	die();
	
	}






	#------------Valida y crea array de $_FILES para Attachments de correos
	public static function ValidaArrayAttachments($attachments = NULL){
		$Adjuntos = array();
		foreach($attachments as $file){
			$fileType = $file['type'];
			$fileSize = $file['size'];
			$fileTmpName = $file['tmp_name'];
			$fileName = $file['name'];
			if($fileSize > 0){
				$invalido_txt = UploadsC::ValidaFileTypeC($fileType);
				if($invalido_txt != ''){
					$redirige = 'trabaja-con-nosotros/error';
					header('Location:'.$redirige);
					die;
				}
				$invalido_txt = UploadsC::ValidaAttachmentSizeC($fileSize);
				if($invalido_txt != ''){
					$redirige = 'trabaja-con-nosotros/error';
					header('Location:'.$redirige);
					die;
				}
				$Adjuntos[] = $file;		
			}
		}
		return $Adjuntos;	
	}
	


	
}
?>