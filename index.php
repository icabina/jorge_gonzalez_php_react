<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php date_default_timezone_set('America/Bogota'); ?>
<?php
#-----Helpers
require_once('configs/config-variables.php');
require_once('configs/functions.php');
#
#-----Controladores
require_once('controllers/RouterC.php');
require_once('controllers/Error404C.php');
require_once('controllers/InicioC.php');
require_once('controllers/NosotrosC.php');
require_once('controllers/ProyectosC.php');
require_once('controllers/ProyectoC.php');
require_once('controllers/AliadosC.php');
require_once('controllers/ContactoC.php');
require_once('controllers/MailerC.php');
require_once('controllers/EnviadoC.php');


#
#-----Controladores ADMIN
require_once('controllers/AdminC.php');
require_once('controllers/UploadsC.php');
#
#-----Modelos
require_once('models/ConexionM.php');
require_once('models/RegistrosBdM.php');
require_once('models/PreparedStatementsM.php');
?>
<?php
RouterC::ControllerLoadC();
?>