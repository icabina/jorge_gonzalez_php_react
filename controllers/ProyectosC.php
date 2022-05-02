<?php
class ProyectosC{
	#------------Carga Home
	public static function LoadC(){



		if(isset($_GET['categoria'])){	
            $categoria = $_GET['categoria'];
		}
	
		$category = '';
        $class = '';
        if($categoria === 'ejecutados'){
            $category = "en Ejecución";
            $clase = "ejecutados"; 
        }
        if($categoria === 'curso'){
            $category = "en Curso";
            $clase = "curso"; 
        }
        if($categoria === 'preventa'){
            $category = "en Preventa";
            $clase = "preventa"; 
        }
        #Carga view
        $proyectos = RegistrosBdM::GetProyectosM($categoria);


	
		include('views/proyectos.php');
		die();
	}

}
?>