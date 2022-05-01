<?php
#------Seo URL
function seo_url($cadena){
	$cadena= utf8_decode($cadena);
    $cadena = str_replace(' ', '-', $cadena);
	$cadena = str_replace('?', '', $cadena);
	$cadena = str_replace('+', '', $cadena);
	$cadena = str_replace('(', '-', $cadena);
	$cadena = str_replace(')', '-', $cadena);
	$cadena = str_replace(':', '', $cadena);
	$cadena = str_replace('??', '', $cadena);
	$cadena = str_replace('`', '', $cadena);
	$cadena = str_replace('!', '', $cadena);
	$cadena = str_replace('¿', '', $cadena);
	$cadena = str_replace(',', '-', $cadena);
	$originales = 	'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿ#¿?&®/\"';
    $modificadas = 	'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyyby-------';
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	$cadena = strtolower($cadena);
   	return $cadena;
}

#------Sanitizar URLS
function sanitize_xss_url($value) {
	return strip_tags($value);
}

#------Sanitizar variables GET y POST
function sanitize_xss($value) {
	return htmlspecialchars(strip_tags($value));
}

#------Encriptar Contraseñas
function crypt_pass($value) {
	return crypt($value, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
}


#------Limpia telefonos
function tel_a_url($value) {
	$value = strtolower($value);
	$sin_extension = explode('e', $value);
	$value = $sin_extension[0];
	$value = str_replace('(', '', $value);
	$value = str_replace(')', '', $value);
	$value = str_replace('+', '', $value);
	$value = str_replace('-', '', $value);
	$value = str_replace(' ', '', $value);
	return $value;
}

#------Limpia y añade indicativo a telefono
function cel_a_wapp($value) {
	$value = str_replace('(', '', $value);
	$value = str_replace(')', '', $value);
	$value = str_replace('+', '', $value);
	$value = str_replace('-', '', $value);
	$value = str_replace('.', '', $value);
	$value = str_replace(',', '', $value);
	$value = str_replace(' ', '', $value);
	$value = '+57'.$value;
	return $value;
}

#------Limpia coordenadas
function limpia_coordenadas($value) {
	$value = str_replace(',', '.', $value);
	return $value;
}

#------Array equivalencia de meses
function mesNumero_a_mesTexto($value) {
	$mes_texto = array(
		'1' => 'Enero',
		'2' => 'Febrero',
		'3' => 'Marzo',
		'4' => 'Abril',
		'5' => 'Mayo',
		'6' => 'Junio',
		'7' => 'Julio',
		'8' => 'Agosto',
		'9' => 'Septiembre',
		'10' => 'Octubre',
		'11' => 'Noviembre',
		'12' => 'Diciembre'
	);
	$value = $mes_texto[$value];
	return $value;
}

#------Adiciono S de plural si es necesario
function pluralizo($value){
	$ultima_letra = substr($value, -1);
	if($ultima_letra == 's'){
		$value = substr($value, 0, -1);	
	}
	$value = $value.'s';	
	return $value;
}

#------Fecha corta (sin T00:00:00)
function fecha_limpia($value){
	$value= substr($value,0,10);
	return $value;
}


#------Limpia y convierte en array la galería de fotos inmuebles
function convierte_galeria($value){
	$value = str_replace('"','', $value);
	$value = str_replace('\\','', $value);
	$value = explode(',', $value);
	return $value;
}


?>