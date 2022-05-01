<?php
class RouterC{
	
	#------------Carga Controlador según URL
	public static function ControllerLoadC(){
		#-----------Defino variable Controlador
		$controller = 'InicioC';
		if(isset($_GET['controller']) && $_GET['controller'] !=''){
			$controller = ucfirst($_GET['controller']).'C';	
		}
		#-----------Defino variable Método
		$method = 'LoadC';
		if(isset($_GET['method']) && $_GET['method'] !=''){
			$method = ucfirst($_GET['method']).'C';
		}
		#-----------Instancia
		$ControllerIncludeC = new $controller;
		$ControllerIncludeC->$method();
	}

}
?>