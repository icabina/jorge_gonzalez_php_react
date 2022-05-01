<?php


class InicioC{

	#------------Carga Home
	public static function LoadC(){



		/*$Registros = RegistrosBdM::GetHomeVideosM();
		$videos = $Registros[0];
		
		$video_1_es = $videos['video_1_es'];
		$video_2_es = $videos['video_2_es'];
		$video_3_es = $videos['video_3_es'];
		$video_1_en = $videos['video_1_en'];
		$video_2_en = $videos['video_2_en'];
		$video_3_en = $videos['video_3_en'];*/


		#Banner
		$banners = RegistrosBdM::GetHomeBannersM();

	
		#Carag view
		include('views/index.php');
		die();
	}
	
}
?>