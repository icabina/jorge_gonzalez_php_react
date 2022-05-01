<?php
$local = '1';
#--------------------------------------------------[Version CSS]
$v_css = '4';
#--------------------------------------------------[PHP.INI]
ini_set('memory_limit','100M');
ini_set('post_max_size','100M');
ini_set('upload_max_filesize','100M');
ini_set('max_execution_time','1000');
ini_set('max_input_time','1000');
#--------------------------------------------------[BASE URL]
$base_url = getenv('SERVER_URL');
if(empty($base_url)) {
	$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].'/';
}
if($local == '0'){
	$base_url = $base_url.'clientes/jorge_gonzalez/';
}
if($local == '1'){
	$base_url = $base_url.'jorge_gonzalez/';
}
#--------------------------------------------------[CREDENCIALES BD MYSQL]
if($local == '0'){
	$db_host = 'localhost';
	$db_user = 'u827133377_iv3';
	$db_pass = 'Emotica2022';
	$db_name = 'u827133377_iv3';
}
if($local == '1'){
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'jorge_gonzalez_db';
}
#--------------------------------------------------[SEO]
#Canonical Link
$canonical = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$canonical = explode('?', $canonical);
$canonical = $canonical[0];
#Page Name
$page_name = 'IV3 Arquitectura';
#General Meta-title
$page_metatitle = 'Jorge Gonzalez Ingeniería | Medellín, Colombia';
#--------------------------------------------------[ATTACHMENTS y UPLOADS]
#Peso maximo attachments forms
$attachment_max_txt = '5 megas';
$attachment_max_size = (1024*1024)*5;
#Uploads Admin
$ruta_uploads = 'datas/';
$peso_maximo = (1024*1024)*5;
$peso_maximo_text = '<b>5 megas</b>';
#--------------------------------------------------[CREDENCIALES SMTP]
#--------------------------------------------------[OTROS]
?>
<?php
#--------------------------------------------------[CONSTANTES]
#Version CSS
define('V_CSS', $v_css);
#URL Base
define('URL_BASE', $base_url);
#Conexion y Head
define('DB_HOST', $db_host);
define('DB_USER', $db_user);
define('DB_PASS', $db_pass);
define('DB_NAME', $db_name);
#SEO
define('CANONICAL', $canonical);
define('PAGE_NAME', $page_name);
define('PAGE_META_TITLE', $page_metatitle);
#Attachments forms
define('ATTACHMENT_MAX_TEXT', $attachment_max_txt);
define('ATTACHMENT_MAX_SIZE', $attachment_max_size);
#Uploads Admin
define('RUTA_UPLOADS', $ruta_uploads);
define('PESO_MAXIMO', $peso_maximo);	
define('PESO_MAXIMO_TEXT', $peso_maximo_text);	

?>