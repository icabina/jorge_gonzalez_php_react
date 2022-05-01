<?php
class Trayectoria_detalleC{
	#------------Carga Home
	public static function LoadC(){
		#Carga view
        if(isset($_GET['ID_trayectoria'])){	
			$ID_trayectoria = $_GET['ID_trayectoria'];
		}
		
		$trayectoria = RegistrosBdM::GetTrayectoriaM($ID_trayectoria);
		$trayectoriaFotos = RegistrosBdM::GetTrayectoriaFotosM($ID_trayectoria);
		include('views/trayectoria_detalle.php');
		die();
	} 

}
?>