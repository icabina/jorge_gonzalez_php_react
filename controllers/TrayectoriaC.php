<?php
class TrayectoriaC{
	#------------Carga Home
	public static function LoadC(){
        if(isset($_GET['categoria'])){	
            $categoria = $_GET['categoria'];
		}
        if($categoria === 'vivienda'){
            $my_categoria = "Vivienda";
        }
        if($categoria === 'educativo'){
            $my_categoria = "Sector Educativo";
        }
        if($categoria === 'comercial'){
            $my_categoria = "Comercial e Industrial";
        }
        #Carga view
        $trayectorias = RegistrosBdM::GetAllTrayectoriaM($categoria);
		include('views/trayectoria.php');
		die();
	}

}
?>