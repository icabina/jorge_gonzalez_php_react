<?php


class ProyectoC{

	#------------Carga Home
	public static function LoadC(){

			#------------Carga Inmueble Especifico


			if(isset($_GET['ID_proyecto'])){	
				$ID_proyecto = $_GET['ID_proyecto'];
			}
			$proyecto = RegistrosBdM::GetProyectoM($ID_proyecto);
			$proyectoFotos = RegistrosBdM::GetProyectoFotosM($ID_proyecto);
			$proyectoVideos = RegistrosBdM::GetProyectoVideosM($ID_proyecto);
			$proyectoPlanos = RegistrosBdM::GetProyectoPlantasM($ID_proyecto);
			$proyectoRecorridos = RegistrosBdM::GetProyectoRecorridosM($ID_proyecto);
			$proyectoAvances = RegistrosBdM::GetProyectoAvancesM($ID_proyecto);
			#
		
	

			
			#Carga Vista
			include('views/proyecto.php');
	
		
			
			

		#Registro Inmueble
		
		

		#Codigo inexistente o despublicado = 404
		/*if($inmueble == NULL){
			include('views/error404.php');
			die();
		}*/
		
		
		

	}





	
}
?>