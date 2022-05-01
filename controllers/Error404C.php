<?php
class Error404C{
	
	#------------Carga Error
	public static function LoadC(){

	

		#Carga Vista
		include('views/error404.php');
		die();
	}

}
?>