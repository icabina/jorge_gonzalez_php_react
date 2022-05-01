<?php
class UploadsC{
	
	
	#------------Valida Imagen
	public static function ValidaImagenC($imageType = NULL, $imageSize = NULL){
		#---- Set mensaje
		$invalido_txt = '';
		#---- valido peso
		if($imageSize > PESO_MAXIMO){
			$invalido_txt .= sprintf(
				'La imagen supera el peso máximo permitido (%s). ',
				PESO_MAXIMO_TEXT
			);	
		}
		#---- valido tipo de archivo
		if(
			$imageType != 'image/gif' &&
			$imageType != 'image/jpeg' &&
			$imageType != 'image/pjpeg' &&
			$imageType != 'image/png' &&
			$imageType != 'image/x-png'	
		){
			$invalido_txt .='Los formatos soportados para las imágenes son GIF, JPG o PNG. ';
		}
		#---- Retorno mensaje
		return $invalido_txt;
		die();
	}
	
	
	
	#------------Upload & Resize Imagen
	public static function UploadImagenC($imageTmpName = NULL, $imageName = NULL, $procesos = NULL){
		$grande_valor_db = '';
		$mini_valor_db = '';	
		#-----------------Mover imagen al servidor
		$NombreImagen = seo_url($imageName);
		$filePathFull = RUTA_UPLOADS.'/'.$NombreImagen;
		move_uploaded_file($imageTmpName, $filePathFull);
		#-----------------Array Procesos a Variables
		$grande_generar = $procesos['grande_generar'];
		$grande_escalado = $procesos['grande_escalado'];
		$grande_width = $procesos['grande_width'];
		$grande_height = $procesos['grande_height'];
		$mini_generar = $procesos['mini_generar'];
		$mini_escalado = $procesos['mini_escalado'];
		$mini_width = $procesos['mini_width'];
		$mini_height = $procesos['mini_height'];
		#-----------------Crea imagen temporal en folder, segun tipo de imagen
		list($srcWidth, $srcHeight, $type) = getimagesize($filePathFull);
		$origRatio = $srcWidth/$srcHeight;
		switch($type) {
			case IMAGETYPE_JPEG:
			$startImage = imagecreatefromjpeg($filePathFull); break;
			case IMAGETYPE_PNG:
			$startImage = imagecreatefrompng($filePathFull); break;
			case IMAGETYPE_GIF:
			$startImage = imagecreatefromgif($filePathFull); break;
			default:
			return false;
		}
		#-----------------Genera version GRANDE
		if($grande_generar=='1'){
			#Nombre y ubicacion grande
			$grande_valor_db = time().'_'.$NombreImagen;
			$filePathFoto = RUTA_UPLOADS.'/'.$grande_valor_db;
			#Escalado 1: Restringir alto y ancho
			if($grande_escalado=='1'){
				if($srcWidth > $grande_width or $srcHeight > $grande_height){
					$width = $grande_width;
					$height = $grande_height;
				} else {
					$width = $srcWidth;
					$height = $srcHeight;	
				}
				if($width/$height > $origRatio) {
					$width = $height*$origRatio;
				} else {
					$height = $width/$origRatio;
				}
			}
			#Escalado 2: Restringir Ancho (alto automatico)
			if($grande_escalado=='2'){
				if($srcWidth > $grande_width){
					$width = $grande_width;
					$height=($srcHeight/$srcWidth)*$grande_width;
				}
				else {
					$width=$srcWidth;
					$height=$srcHeight;  
				}
			}
			#Escalado 3: Restringir Alto (ancho automatico)
			if($grande_escalado=='3'){
				if($srcHeight > $grande_height){
					$height = $grande_height;
					$width=($srcWidth*$grande_height)/$srcHeight;
				}
				else {
					$height=$srcHeight;
					$width=$srcWidth;  
				}
			}
			#Escalado 4: (Cover) Lado mas corto con un minimo; el otro automatico
			if($grande_escalado=='4'){
				if($srcHeight >= $srcWidth){
					$width = $grande_width;
					$height=($srcHeight/$srcWidth)*$grande_width;
				}
				if($srcHeight < $srcWidth){
					$height = $grande_height;
					$width=($srcWidth*$grande_height)/$srcHeight;
				}
			}
			#Escalado 5: Ancho y alto exactos
			if($grande_escalado=='5'){
				$width = $grande_width;
				$height = $grande_height;
			}
			#Genera archivo Grande
			$thumbImage = imagecreatetruecolor($width, $height);
			imagecopyresampled($thumbImage, $startImage, 0,0,0,0, $width, $height, $srcWidth, $srcHeight);
			imagejpeg($thumbImage, $filePathFoto, 95);
			chmod($filePathFoto,0777);
		}
		#-----------------Genera version MINI
		if($mini_generar=='1'){
			#Nombre y ubicacion mini
			$mini_valor_db = time().'_mini_'.$NombreImagen;
			$filePathMini = RUTA_UPLOADS.'/'.$mini_valor_db;
			#Escalado 1: Restringir alto y ancho
			if($mini_escalado=='1'){
				if($srcWidth > $mini_width or $srcHeight > $mini_height){
					$width = $mini_width;
					$height = $mini_height;
				} else {
					$width = $srcWidth;
					$height = $srcHeight;	
				}
				if($width/$height > $origRatio) {
					$width = $height*$origRatio;
				} else {
					$height = $width/$origRatio;
				}
			}
			#Escalado 2: Restringir Ancho (alto automatico)
			if($mini_escalado=='2'){
				if($srcWidth > $mini_width){
					$width = $mini_width;
					$height=($srcHeight/$srcWidth)*$mini_width;
				}
				else {
					$width=$srcWidth;
					$height=$srcHeight;  
				}
			}
			#Escalado 3: Restringir Alto (ancho automatico)
			if($mini_escalado=='3'){
				if($srcHeight > $mini_height){
					$height = $mini_height;
					$width=($srcWidth*$mini_height)/$srcHeight;
				}
				else {
					$height=$srcHeight;
					$width=$srcWidth;  
				}
			}
			#Escalado 4: (Cover) Lado mas corto con un minimo; el otro automatico
			if($mini_escalado=='4'){
				if($srcHeight >= $srcWidth){
					$width = $mini_width;
					$height=($srcHeight/$srcWidth)*$mini_width;
				}
				if($srcHeight < $srcWidth){
					$height = $mini_height;
					$width=($srcWidth*$mini_height)/$srcHeight;
				}
			}
			#Escalado 5: Ancho y alto exactos
			if($mini_escalado=='5'){
				$width = $mini_width;
				$height = $mini_height;
			}
			#Genera archivo Mini
			$thumbImage = imagecreatetruecolor($width, $height);
			imagecopyresampled($thumbImage, $startImage, 0,0,0,0, $width, $height, $srcWidth, $srcHeight);
			imagejpeg($thumbImage, $filePathMini, 95);
			chmod($filePathMini,0777);	
		}
		#-----------------Elimina imagen temporal del servidor
		unlink($filePathFull);
		#-----------------Retorna nombres imagenes para BD
		$uploads = array(
			$grande_valor_db,
			$mini_valor_db	
		);
		return $uploads;
		die();
	}
	
	
		
	#------------Valida Tipo de Archivo
	public static function ValidaFileTypeC($fileType = NULL){
		#---- Set mensaje
		$invalido_txt = '';
		#---- valido tipo de archivo
		if(
			$fileType != 'application/msword' &&
			$fileType != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' &&
			$fileType != 'application/vnd.ms-excel' &&
			$fileType != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' &&
			$fileType != 'application/vnd.ms-powerpoint' &&
			$fileType != 'application/vnd.openxmlformats-officedocument.presentationml.presentation' &&
			$fileType != 'application/pdf' &&
			$fileType != 'application/zip' &&
			$fileType != 'image/gif' &&
			$fileType != 'image/jpeg' &&
			$fileType != 'image/pjpeg' &&
			$fileType != 'image/png' &&
			$fileType != 'image/x-png'	
		){
			$invalido_txt .='Sólo se permiten archivos WORD (.doc o .docx), EXCEL (.xls o .xls), POWERPOINT (.ppt o .pptx), PDF, ZIP, GIF, JPG y PNG.';
		}
		#---- Retorno mensaje
		return $invalido_txt;
		die();
	}
	
	
	
	#------------Valida Tamaño de Attachment (Correos)
	public static function ValidaAttachmentSizeC($fileSize = NULL){
		#---- Set mensaje
		$invalido_txt = '';
		#---- valido tipo de archivo
		if($fileSize > ATTACHMENT_MAX_SIZE){
			$invalido_txt .= sprintf(
				'El archivo supera el peso máximo permitido (%s). ',
				ATTACHMENT_MAX_TEXT
			);	
		}
		#---- Retorno mensaje
		return $invalido_txt;
		die();
	}
	
	
	
	
	
	#------------Upload Archivo
	public static function UploadArchivoC($fileTmpName = NULL, $fileName = NULL){
		$archivoNombre = time().'_'.seo_url($fileName);
		$archivoSubido = RUTA_UPLOADS.'/'.$archivoNombre;
		$subida = copy($fileTmpName, $archivoSubido);
		chmod($archivoSubido, 0644);
		#-----------------Retorna nombre para BD
		return $archivoNombre;
		die();
	}
	

	
	
}
?>