<?php
class ProyectosC{
	#------------Carga Home
	public static function LoadC(){
		$proyectos = RegistrosBdM::GetAllProyectosM();
		#Carga view
		include('views/proyectos.php');
		die();
	}

}
?>