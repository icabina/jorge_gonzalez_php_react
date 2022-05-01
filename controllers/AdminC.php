<?php
class AdminC{
	
	#-----------------------------------------------------------------------------
	# VALIDACION
	#-----------------------------------------------------------------------------

	#------------Carga Login
	public static function LoadC(){
		include('views/panel/acceso.php');
		die();
	}


	#------------Login
	public static function LoginC(){
		#------Sanitizo variables
		$usuario = sanitize_xss($_POST['usuario']);
		//$contrasena = $_POST['contrasena'];
		$contrasena = sanitize_xss_url(crypt_pass($_POST['contrasena']));
		//$contrasena = crypt_pass($_POST['contrasena']);
	/* 	echo $usuario;
		echo $contrasena;
		die(); */
		#------Consulto en BD
		$login = RegistrosBdM::LoginM($usuario, $contrasena);
		$ID_admin = $login['ID_admin'];
		#------No existe
		if($ID_admin == '' || $ID_admin == NULL ){
			$redirige = '../panel/login/error';	
		}
		#------Sí existe
		if($ID_admin != '' && $ID_admin != NULL ){
			#------Inicio sesion
			session_start();
			$_SESSION['logueado'] = 'SI';
			$redirige = '../panel/dashboard';	
		}
		#------Redirige
		header('Location:'.$redirige);
		die();
	}


	#------------Seguridad: Redireccion para accesos a paginas sin haberse logueado
	public static function IsNotLoguedC(){
		session_start();
		if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] != 'SI') {
			header('Location:../acceso');
			die();
		}
	}


	#------------Hace Logout
	public static function LogoutC(){
		session_start();
		session_unset();
		session_destroy();
		#------Redirige
		header('Location:../acceso');
		die();
	}


	#------------Carga Dashboard
	public static function DashboardC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------Carga View
		include('views/panel/dashboard.php');
		die();
	}


	#------------Usuario Administrador (Detalle)
	public static function AdministradorC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------Carga Usuario
		$txt_titulo = 'Editar Usuario Administrador';
		$txt_btn_form = 'EDITAR';
		$accionSubmit = 'update';
		#
		$ID_admin='1';
		$Registro = RegistrosBdM::GetAdministradorM($ID_admin);
		$usuario = $Registro['usuario'];
		#------------Carga View
		include('views/panel/adminuser.php');
		die();
	}

	
	#------------Administrador Query (Update)
	public static function AdministradorQueryC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#
		#------------Defino accion, tabla y primary key
		$action = $_GET['action']; //update
		$table ='00_admin';
		$primarykey = 'ID_admin';
		$primaryvalue = $_POST['ID_admin'];
		#
		#------------if UPDATE
		if($action == 'update'){
			#
			#------------Valido campos requeridos
			if(
				$_POST['usuario'] == '' ||
				$_POST['contrasena'] != $_POST['contrasena2']
			){
				$msg_error = 'No se llenaron todos los campos requeridos o las contraseñas ingresadas no coinciden.<br><br>Por favor revise e inténtelo de nuevo.';
				include('views/panel/error404.php');
				die();	
			}
			else {
				#------------Array de variables POST
				$parameters = array(
					'usuario' => sanitize_xss_url($_POST['usuario'])
				);
				if($_POST['contrasena'] != ''){
					$parameters['contrasena'] = crypt_pass($_POST['contrasena']);
				}
				#------------UPDATE
				if($action == 'update'){
					$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
				}
			}
		}
		#------------Redirige
		$redirige = '../administrador/ok/'.$action;
		header('Location:'.$redirige);
		die();
	}






	#-----------------------------------------------------------------------------
	# PROYECTOS
	#-----------------------------------------------------------------------------

	#------------Carga Proyectos (Lista)
	public static function ProyectosC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------Carga Registros
		$Registros = RegistrosBdM::GetAllProyectosM();
		#------------Carga View
		include('views/panel/proyectos.php');
		die();
	}


	#------------proyecto (Detalle)
	public static function ProyectoC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------ Variables
		$ID_proyecto = '0';
		if(isset($_GET['ID_proyecto'])){	
			$ID_proyecto = $_GET['ID_proyecto'];
		}
			
		$nombre = "";
		$ciudad = "";
		$direccion = "";
		$descripcion = "";
		$categoria = "";
		$area = "";
		$obra_inicio = "";
		$obra_fin = "";
		$contratante ="";
		$web ="";
		$foto_banner ="";
		$grande = "";
		$mini = "";
		$destacado = '0';


		#------------Defino cual es la tarea del formulario
		$task = $_GET['task'];
		#
		if($task == 'new'){
			$txt_titulo = 'Nuevo Proyecto';
			$txt_btn_form = 'GUARDAR PROYECTO';
			$accionSubmit = 'new/insert';	
		}
		if($task == 'edit'){
			$txt_titulo = 'Editar Proyecto';
			$txt_btn_form = 'GUARDAR PROYECTO';
			$accionSubmit = 'edit/update';	
		}
		if($task == 'remove'){
			$txt_titulo = '<strong>¿Con seguridad quieres eliminar este Proyecto?</strong><br>No se puede deshacer.';
			$txt_btn_form = 'SÍ. ELIMINAR';
			$accionSubmit = 'remove/delete';	
		}
		#------------Cargo info de BD si es EDIT o REMOVE
			

			
		if(
			$task == 'edit' || $task == 'remove'
		){
	#------------Carga Proyecto
		$proyecto = RegistrosBdM::GetProyectoM($ID_proyecto);
		$proyectoFotos = RegistrosBdM::GetProyectoFotosM($ID_proyecto);
		// $proyectoVideos = RegistrosBdM::GetProyectoVideosM($ID_proyecto);
		// $proyectoPlantas = RegistrosBdM::GetProyectoPlantasM($ID_proyecto);
		// $proyectoRecorridos = RegistrosBdM::GetProyectoRecorridosM($ID_proyecto);
		// $proyectoAvances = RegistrosBdM::GetProyectoAvancesM($ID_proyecto);


		$nombre = $proyecto['nombre'];
		$ciudad = $proyecto['ciudad'];
		$direccion = $proyecto['direccion'];
		$descripcion = $proyecto['descripcion'];
		$categoria = $proyecto['categoria'];
		$area = $proyecto['area'];
		$destacado = $proyecto['destacado'];
		$obra_inicio = $proyecto['obra_inicio'];
		$obra_fin = $proyecto['obra_fin'];
		$contratante = $proyecto['contratante'];
		$web = $proyecto['web'];
		$foto_banner = $proyecto['foto_banner'];
		$grande = $proyecto['grande'];
		$mini = $proyecto['mini'];
 

		}
		#------------Carga View
		include('views/panel/proyecto.php');
		die();
	}


	#------------Post Queries (Insert - Update - Delete)
	public static function Proyecto_QueryC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#
		
		#------------Defino accion, tabla y primary key
		$ID_proyecto = $_POST['ID_proyecto'];
		$action = $_GET['action']; //insert, update, delete
		$table ='01_proyectos';
		$primarykey = 'ID_proyecto';
		$primaryvalue = $_POST['ID_proyecto'];
		#
		#------------if INSERT o UPDATE
		if($action == 'insert' || $action == 'update'){

		#-----Validacion imagenes obligatorias y peso maximo
		if($action == 'insert'){
			if(($_FILES['grande']['size'] == 0 || $_FILES['grande']['size'] > PESO_MAXIMO)  ||
				$_POST['nombre'] == '' || 
				$_POST['ciudad'] == ''  ){
				$msg_error = 'Los campos requeridos son:<br><br>
				- Nombre<br>

				- Ciudad<br>
				- Foto.
				<br><br>Por favor inténtelo de nuevo.';
				include('views/panel/error404.php');
				die();
				}
		}
		#-----Validacion imagenes obligatorias y peso maximo
		if($action == 'update'){
			if(
				$_POST['nombre'] == '' || 
				$_POST['ciudad'] == ''  ){
				$msg_error = 'Los campos requeridos son:<br><br>
				- Nombre<br>
				- Ciudad<br>
				<br><br>Por favor inténtelo de nuevo.';
				include('views/panel/error404.php');
				die();
			}
		}
		
		

									
			#FOTO
			//--------------------------
			$grande_anterior = "";
			$mini_anterior = "";
		
			if(isset($_POST['grande_anterior'])){	
				$grande_anterior = $_POST['grande_anterior'];
			}
			if(isset($_POST['mini_anterior'])){	
				$mini_anterior = $_POST['mini_anterior'];
			}
			
			$grande = $grande_anterior;
			$mini = $mini_anterior;
			$file = $_FILES['grande'];
			if($_FILES['grande']['size'] > 0){
				$imageType = $file['type'];
				$imageSize = $file['size'];
				$imageTmpName = $file['tmp_name'];
				$imageName = $file['name'];
				#------------Valido peso y formato imagen
				$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
				if($invalido_txt != ''){
					$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
					include('views/panel/error404.php');
					die();
				}	
				#------------Upload y Resize Imagen
				$procesos = array(
					'grande_generar' => '1',
					'grande_escalado' => '2',
					'grande_width' => '1600',
					'grande_height' => '',
					'mini_generar' => '1',
					'mini_escalado' => '4',
					'mini_width' => '400',
					'mini_height' => '400'
				);
				$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
				$grande = $uploads[0];
				$mini = $uploads[1];
				@unlink(RUTA_UPLOADS.$grande_anterior);
				@unlink(RUTA_UPLOADS.$mini_anterior);
			}	


			#Foto presentación
			//--------------------------
			$foto_banner_anterior = "";
			if($action == 'update'){
				if(isset($_POST['foto_banner_anterior'])){	
					$foto_banner_anterior = $_POST['foto_banner'];
				}	
			}
			$foto_banner = $foto_banner_anterior;
			$file = $_FILES['foto_banner'];
			if($_FILES['foto_banner']['size'] > 0){
				$imageType = $file['type'];
				$imageSize = $file['size'];
				$imageTmpName = $file['tmp_name'];
				$imageName = $file['name'];
				#------------Valido peso y formato imagen
				$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
				if($invalido_txt != ''){
					$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
					include('views/panel/error404.php');
					die();
				}	
				#------------Upload y Resize Imagen
				$procesos = array(
					'grande_generar' => '1',
					'grande_escalado' => '2',
					'grande_width' => '1600',
					'grande_height' => '',
					'mini_generar' => '0',
					'mini_escalado' => '0',
					'mini_width' => '0',
					'mini_height' => '0'
				);
				$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
				$foto_banner=$uploads[0];
				@unlink(RUTA_UPLOADS.$foto_banner_anterior);
			}	




		
			#------------Array de variables POST
			$parameters = array(
				'nombre' => sanitize_xss($_POST['nombre']),
				'direccion' => sanitize_xss($_POST['direccion']),
				'categoria' => sanitize_xss($_POST['categoria']),
				'ciudad' => sanitize_xss($_POST['ciudad']),
				'area' => sanitize_xss($_POST['area']),
				'obra_inicio' => sanitize_xss($_POST['obra_inicio']),
				'obra_fin' => $_POST['obra_fin'],
				'contratante' => $_POST['contratante'],
				'web' => $_POST['web'],
				'destacado' => '0',
				'foto_banner' => $foto_banner,
				'grande' => $grande,
				'mini' => $mini,
			);
			if(isset($_POST['destacado'])){
				$parameters['destacado'] = '1';
			}
			#
	


	
			#------------if INSERT
			if($action == 'insert'){
				$query = PreparedStatementsM::InsertM($parameters, $table);
			}
			#------------if UPDATE
			if($action == 'update'){
				$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
			}
		}

		#------------if DELETE
		if($action == 'delete'){
			#----Borra Imagenes, Documento presentacion y Proyecto
			$selecciona = RegistrosBdM::GetProyectoM($ID_proyecto);
			@unlink(RUTA_UPLOADS.$selecciona['grande']);
			@unlink(RUTA_UPLOADS.$selecciona['mini']);
			@unlink(RUTA_UPLOADS.$selecciona['foto_banner']);
	
			PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);


		/* 	#----Borra Recorridos
			$table = "05_proyecto_recorridos";
			PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);

			#----Borra videos
			$table = "03_proyecto_videos";
			PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue); */
			
			#----Borra fotos
			$seleccionaFotos = RegistrosBdM::GetProyectoFotosM($ID_proyecto);
			foreach($seleccionaFotos as $photo){
				@unlink(RUTA_UPLOADS.$photo['foto_grande']);
				@unlink(RUTA_UPLOADS.$photo['foto_mini']);
			}
		 	$table = "02_proyecto_galeria";
			PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);
			/*
			#----Borra plantas
			$seleccionaPlantas = RegistrosBdM::GetProyectoPlantasM($ID_proyecto);
			foreach($seleccionaPlantas as $par){
				@unlink(RUTA_UPLOADS.$par['grande_planta']);
				@unlink(RUTA_UPLOADS.$par['mini_planta']);
			} */
			// $table = "04_proyecto_planos";
			// PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);

			#----Borra documentos
			// $seleccionaDocumentos = RegistrosBdM::GetProyectoDocumentosM($ID_proyecto);
			// foreach($seleccionaDocumentos as $something){
			// 	@unlink(RUTA_UPLOADS.$something['documento_archivo']);
			// }
			// $table = "07_proyecto_documentos";
			// PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);

			#----Borra Avances fotos
			// $seleccionaAvances = RegistrosBdM::GetProyectoAvancesM($ID_proyecto);
			// foreach($seleccionaAvances as $par){
			// 	@unlink(RUTA_UPLOADS.$par['grande']);
			// 	@unlink(RUTA_UPLOADS.$par['mini']);
			// }
			// $table = "06_proyecto_avances";
			// PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);
		}
		#
		#------------Redirige
		$redirige = '../../../panel/proyectos/ok/'.$action;
		
		header('Location:'.$redirige);
	
		die();
	}

#-----------------------------------------------------------------------------
# DELETES
#-----------------------------------------------------------------------------

	#------------Proyecto BORRAR IMAGENES EXTRA
	public static function Proyecto_item_updateC(){
		$ID_proyecto = $_GET['ID_proyecto'];



		#foto_presentacion 
		if(isset($_GET['foto_banner'])){	
			$table ='01_proyectos';
			$primarykey = 'ID_proyecto';
			$primaryvalue = $_GET['ID_proyecto'];
			$redirect = '#block-inicio';
			$query1 = RegistrosBdM::GetProyectoM($ID_proyecto);	
			$borrar_foto_banner = $query1['foto_banner'];
			@unlink(RUTA_UPLOADS.$borrar_foto_banner);
			$parameters=array(
				'foto_banner' => ''
			);
		}

	

			
			#Brochure
			// if(isset($_GET['brochure'])){	
			
			// 	$table ='01_proyectos';
			// 	$primarykey = 'ID_proyecto';
			// 	$primaryvalue = $_GET['ID_proyecto'];
			// 	$redirect = '#block-presentacion';
			// 	$query1 = RegistrosBdM::GetProyectoM($ID_proyecto);	
			// 	$borrar_file = $query1['brochure'];
			// 	@unlink(RUTA_UPLOADS.$borrar_file);
			// 	$parameters=array(
			// 		'brochure' => ''
			// 	);
			// }


		#Actualiza BD
		$sql=' UPDATE '.$table.' SET ';
		foreach($parameters as $clave=>$valor){
			$sql.= $clave.' =:'.$clave.', ';	
		}
		$sql=substr($sql,0,-2);
		$sql.=' WHERE '.$primarykey.' LIKE '.$primaryvalue;
		ConexionM::UpdateM($sql, $parameters);
		#Redirige
		$redirige = '../../proyecto/edit/'.$ID_proyecto.$redirect.'';
		header('Location:'.$redirige);
		die();
	}






	#------------Elimina complementos de proyecto
	public static function Proyecto_item_removeC(){
		$ID_proyecto = $_GET['ID_proyecto'];
		#-----foto
		if(isset($_GET['ID_foto'])){
			$ID_foto = $_GET['ID_foto'];	
			$table ='02_proyecto_galeria';
			$primarykey = 'ID_foto';
			$primaryvalue = $_GET['ID_foto'];
			$redirect = '#block-fotos';
			$query1 = RegistrosBdM::GetProyectoFotoM($ID_foto);	
			$foto_grande = $query1['foto_grande'];
			$foto_mini = $query1['foto_mini'];
			@unlink(RUTA_UPLOADS.$foto_grande);
			@unlink(RUTA_UPLOADS.$foto_mini);
			#Parametros fijos
			$parameters=array(
				'ID_foto' => $ID_foto
			);
		}	
		#-----Video
		if(isset($_GET['ID_video'])){
			$ID_video = $_GET['ID_video'];	
			$table ='03_proyecto_videos';
			$primarykey = 'ID_video';
			$primaryvalue = $_GET['ID_video'];
			$redirect = '#block-videos';
			$query1 = RegistrosBdM::GetProyectoVideoM($ID_video);	
			#Parametros fijos
			$parameters=array(
				'ID_video' => $ID_video
			);
		}
		#-----Planta
		if(isset($_GET['ID_planta'])){
			$ID_planta = $_GET['ID_planta'];	
			$table ='04_proyecto_planos';
			$primarykey = 'ID_planta';
			$primaryvalue = $_GET['ID_planta'];
			$redirect = '#block-plantas';
			$query1 = RegistrosBdM::GetProyectoPlantaM($ID_planta);	
			$planta_foto = $query1['grande_planta'];
			$planta_foto_mini = $query1['mini_planta'];
			@unlink(RUTA_UPLOADS.$planta_foto);
			@unlink(RUTA_UPLOADS.$planta_foto_mini);
			#Parametros fijos
			$parameters=array(
				'ID_planta' => $ID_planta
			);
		}
		#-----Avance Foto
		if(isset($_GET['ID_avance'])){
			$ID_avance = $_GET['ID_avance'];	
			$table ='06_proyecto_avances';
			$primarykey = 'ID_avance';
			$primaryvalue = $_GET['ID_avance'];
			$redirect = '#block-avances';
			$query1 = RegistrosBdM::GetProyectoAvanceM($ID_avance);	
			$avance_foto = $query1['grande'];
			$avance_foto_mini = $query1['mini'];
			@unlink(RUTA_UPLOADS.$avance_foto);
			@unlink(RUTA_UPLOADS.$avance_foto_mini);
			#Parametros fijos
			$parameters=array(
				'ID_avance' => $ID_avance
			);
		}


		#-----Recorrido
		if(isset($_GET['ID_recorrido'])){	
			$ID_recorrido = $_GET['ID_recorrido'];
			$table ='05_proyecto_recorridos';
			$primarykey = 'ID_recorrido';
			$primaryvalue = $_GET['ID_recorrido'];
			$redirect = '#block-recorridos';
			#Parametros fijos
			$parameters=array(
				'ID_recorrido' => $ID_recorrido
			);
		}
		#-----Empresa Grupo Profesional
		if(isset($_GET['ID_grupo'])){	
			$ID_grupo = $_GET['ID_grupo'];
			$table ='10_proyecto_grupo';
			$primarykey = 'ID_grupo';
			$primaryvalue = $_GET['ID_grupo'];
			$redirect = '#block-grupo';
			#Parametros fijos
			$parameters=array(
				'ID_grupo' => $ID_grupo
			);
		}
		#Sentencia SQL dinamica
		$sql = ' DELETE ';
		$sql .= ' FROM '.$table.' ';
		$sql .= ' WHERE '.$primarykey.' LIKE :'.$primarykey.' ';
		ConexionM::DeleteM($sql, $parameters);
		#Redirige
		$redirige = '../../proyecto/edit/'.$ID_proyecto.$redirect.'';
		header('Location:'.$redirige);
		die();
	}



#-----------------------------------------------------------------------------
# PROYECTO FOTOS
#-----------------------------------------------------------------------------
	#------------Proyecto: Carga Foto
	public static function Proyecto_fotoC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------ Variables
		$ID_foto = '0';
		$foto_grande = '';
		$foto_mini = '';
		$caption = '';
		$orden = '';
		$ID_proyecto = $_GET['ID_proyecto'];
		#------------Defino cual es la tarea del formulario
		$task = $_GET['task'];
		#
		if($task == 'new'){
			$txt_titulo = 'Nueva foto';
			$txt_btn_form = 'AÑADIR';
			$accionSubmit = 'new/insert';	
		}
		if($task == 'edit'){
			$txt_titulo = 'Editar foto';
			$txt_btn_form = 'GUARDAR';
			$accionSubmit = 'edit/update';	
		}
		#------------Cargo info de BD si es EDIT o REMOVE
		if(
			$task == 'edit' //|| $task == 'remove'
		){
			if(isset($_GET['ID_foto'])){	
					$ID_foto = $_GET['ID_foto'];
			}
			$Registro = RegistrosBdM::GetProyectoFotoM($ID_foto);
			#
			$ID_proyecto = $Registro['ID_proyecto'];
			$foto_grande = $Registro['foto_grande'];
			$foto_mini = $Registro['foto_mini'];
			$caption = $Registro['caption'];
			$orden = $Registro['orden'];
		}
		#------------Carga View
		include('views/panel/proyecto_foto.php');
		die();
	}



	#------------Proyecto: CRUD Foto (Insert - Update)
	public static function Proyecto_fotoQueryC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#
		#------------Defino variables, accion, tabla y primary key
		$ID_proyecto = $_POST['ID_proyecto'];
		$ID_foto = $_POST['ID_foto'];
		$foto_grande = '';
		$foto_mini = '';
		//$caption = '';
		$action = $_GET['action']; //insert, update, remove
		$table ='02_proyecto_galeria';
		$primarykey = 'ID_foto';
		$primaryvalue = $_POST['ID_foto'];
		#
		#------------if INSERT o UPDATE
		if($action == 'insert' || $action == 'update'){
			#------------if UPDATE
			if($action == 'update'){
				$foto_grande_anterior = $_POST['foto_grande_anterior'];
				$foto_mini_anterior = $_POST['foto_mini_anterior'];
				$foto_grande = $foto_grande_anterior;
				$foto_mini = $foto_mini_anterior;
				if($_FILES['foto_grande']['size'] > 0){
					$file = $_FILES['foto_grande'];
					$imageType = $file['type'];
					$imageSize = $file['size'];
					$imageTmpName = $file['tmp_name'];
					$imageName = $file['name'];
					#------------Valido peso y formato imagen
					$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
					if($invalido_txt != ''){
						$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}	
					#------------Upload y Resize Imagen
					$procesos = array(
						'grande_generar' => '1',
						'grande_escalado' => '2',
						'grande_width' => '1200',
						'grande_height' => '',
						'mini_generar' => '1',
						'mini_escalado' => '4',
						'mini_width' => '400',
						'mini_height' => '400'
					);
					$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
					$foto_grande=$uploads[0];
					$foto_mini=$uploads[1];
					#------------Elimina anteriores
					if($action == 'update'){
						@unlink(RUTA_UPLOADS.$foto_grande_anterior);
						@unlink(RUTA_UPLOADS.$foto_mini_anterior);
					}		
				}
				#------------Array de variables POST
				$parameters = array(
					'ID_proyecto' => $ID_proyecto,
					'foto_grande' => $foto_grande,
					'foto_mini' => $foto_mini,
					'caption' => sanitize_xss($_POST['caption']),
					'orden' => sanitize_xss($_POST['orden'])
				);
				$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
			}
			#------------if INSERT
			if($action == 'insert'){
				//$file_multiples='1';
				$tot = count($_FILES['foto_grande']['name']);
				for ($i = 0; $i < $tot; $i++){
					if(
						$_FILES['foto_grande']['size'][$i] == 0
						|| $_FILES['foto_grande']['size'][$i] > PESO_MAXIMO
					){
						$msg_error = 'No se ingresó ninguna foto o se ingresó con un peso superior al permitido.<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}
					$file = $_FILES['foto_grande'];
					$imageTmpName = $file['tmp_name'][$i];
					$imageType = $file['type'][$i];
					$imageSize = $file['size'][$i];
					$imageName = sanitize_xss(seo_url($file['name'][$i]));
					#------------Valido peso y formato imagen
					$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
					if($invalido_txt != ''){
						$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}	
					#------------Upload y Resize Imagen
					$procesos = array(
						'grande_generar' => '1',
						'grande_escalado' => '2',
						'grande_width' => '1200',
						'grande_height' => '',
						'mini_generar' => '1',
						'mini_escalado' => '4',
						'mini_width' => '400',
						'mini_height' => '400'
					);
					$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
					$foto_grande=$uploads[0];
					$foto_mini=$uploads[1];		
					#------------Array de variables POST
					$parameters = array(
						'ID_proyecto' => $ID_proyecto,
						'foto_grande' => $foto_grande,
						'foto_mini' => $foto_mini,
						'caption' => sanitize_xss($_POST['caption'][$i])
					);	
					$query = PreparedStatementsM::InsertM($parameters, $table);
				}		
			}
		} 
		#------------Redirige
		$redirige = '../../proyecto/edit/'.$ID_proyecto.'#block-fotos';
		header('Location:'.$redirige);
		die();
	}



	
#-----------------------------------------------------------------------------
# PROYECTO: VIDEOS
#-----------------------------------------------------------------------------
	#------------Proyecto: Carga Video
	public static function Proyecto_videoC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------Variables
		$ID_video = '0';
		$video = "";
		$ID_proyecto = $_GET['ID_proyecto'];	
		#------------Defino cual es la tarea del formulario
		$task = $_GET['task'];
		#
		if($task == 'new'){
			$txt_titulo = 'Nuevo Video';
			$txt_btn_form = 'AÑADIR';
			$accionSubmit = 'new/insert';	
		}
		if($task == 'edit'){
			$txt_titulo = 'Editar Video';
			$txt_btn_form = 'GUARDAR';
			$accionSubmit = 'edit/update';	
		}
		#------------Cargo info de BD si es EDIT o REMOVE
		if(
			$task == 'edit' || $task == 'remove'
		){
			if(isset($_GET['ID_video'])){	
				$ID_video = $_GET['ID_video'];
			}
			$Registro = RegistrosBdM::GetProyectoVideoM($ID_video);
			#
			$video = $Registro['video'];
			$ID_proyecto = $Registro['ID_proyecto'];
		}
		#------------Carga View
		include('views/panel/proyecto_video.php');
		die();
	}



	#------------Proyecto: CRUD Video (Insert - Update)
	public static function Proyecto_videoQueryC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------Variables
		$ID_video = $_POST['ID_video'];
		$video = $_POST['video'];
		#------------Defino accion, tabla y primary key
		$ID_proyecto = $_POST['ID_proyecto'];
		$action = $_GET['action']; //insert, update, delete
		$table ='03_proyecto_videos';
		$primarykey = 'ID_video';
		$primaryvalue = $_POST['ID_video'];
		#------------if INSERT o UPDATE
		if($action == 'insert' || $action == 'update'){
			#------------Valido campos requeridos
			if($action == 'insert'){
				if(($_POST['video']) == ''){
					$msg_error = 'No se escribió ningún código de youtube.<br><br>Por favor inténtelo de nuevo.';
					include('views/panel/error404.php');
					die();
				}
			}
			#------------Array de variables POST
			$parameters = array(
				'ID_proyecto' => $ID_proyecto,
				'video' => sanitize_xss($_POST['video'])
			);
			#------------if INSERT
			if($action == 'insert'){
				$query = PreparedStatementsM::InsertM($parameters, $table);
			}
			#------------if UPDATE
			if($action == 'update'){
				$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
			}
		}
		#------------Redirige
		$redirige = '../../proyecto/edit/'.$ID_proyecto.'#block-videos';
		header('Location:'.$redirige);
		die();
	}
	










#-----------------------------------------------------------------------------
# PROYECTO RECORRIDOS
#-----------------------------------------------------------------------------

		#------------Proyecto: Carga Recorrido
		public static function Proyecto_recorridoC(){
			#------------Seguridad: ¿Está logueado?
			$IsNotLoguedC = AdminC::IsNotLoguedC();		
			#------------Variables
			$ID_recorrido = '0';
			$recorrido_nombre = "";
			$recorrido_link = "";
			$ID_proyecto = $_GET['ID_proyecto'];	
			#------------Defino cual es la tarea del formulario
			$task = $_GET['task'];
			#
			if($task == 'new'){
				$txt_titulo = 'Nuevo Recorrido';
				$txt_btn_form = 'AÑADIR';
				$accionSubmit = 'new/insert';	
			}
			if($task == 'edit'){
				$txt_titulo = 'Editar Recorrido';
				$txt_btn_form = 'GUARDAR';
				$accionSubmit = 'edit/update';	
			}
			#------------Cargo info de BD si es EDIT o REMOVE		
			if(
				$task == 'edit' || $task == 'remove'
			){
				if(isset($_GET['ID_recorrido'])){	
						$ID_recorrido = $_GET['ID_recorrido'];
				}
				$Registro = RegistrosBdM::GetProyectoRecorridoM($ID_recorrido);
				#
				$recorrido_nombre = $Registro['recorrido_nombre'];
				$recorrido_link = $Registro['recorrido_link'];
				$ID_proyecto = $Registro['ID_proyecto'];
			}
			#------------Carga View
			include('views/panel/proyecto_recorrido.php');
			die();
		}
	
	
	
		#------------Proyecto: CRUD Recorrido (Insert - Update)
		public static function Proyecto_recorridoQueryC(){
			#------------Seguridad: ¿Está logueado?
			$IsNotLoguedC = AdminC::IsNotLoguedC();
			#
			#------------Variables
			$ID_recorrido = $_POST['ID_recorrido'];
			$recorrido_nombre = $_POST['recorrido_nombre'];
			$recorrido_link = $_POST['recorrido_link'];
			#------------Defino accion, tabla y primary key
			$ID_proyecto = $_POST['ID_proyecto'];
			$action = $_GET['action']; //insert, update, delete
			$table ='05_proyecto_recorridos';
			$primarykey = 'ID_recorrido';
			$primaryvalue = $_POST['ID_recorrido'];
			#
			#------------if INSERT o UPDATE
			if($action == 'insert' || $action == 'update'){
				#------------Valido campos requeridos
				if($action == 'insert'){
					if($recorrido_nombre == '' || $recorrido_link == ''){
						$msg_error = 'No se escribió origen del recorrido, o falta el nombre.<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}
				}
				#------------Array de variables POST
				$parameters = array(
					'ID_proyecto' => $ID_proyecto,
					'recorrido_nombre' => sanitize_xss($_POST['recorrido_nombre']),
					'recorrido_link' => sanitize_xss($_POST['recorrido_link'])
				);
				#------------if INSERT
				if($action == 'insert'){
					$query = PreparedStatementsM::InsertM($parameters, $table);
				}
				#------------if UPDATE
				if($action == 'update'){
					$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
				}
			}
			#------------Redirige
			$redirige = '../../proyecto/edit/'.$ID_proyecto.'#block-recorridos';
			header('Location:'.$redirige);
			die();
		}

		

#-----------------------------------------------------------------------------
# PROYECTO: PLANTAS
#-----------------------------------------------------------------------------


	#------------Proyecto: Carga planta
	public static function Proyecto_plantaC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------ Helpers
		#------------ Variables
		$ID_planta = '0';
		$grande_planta = '';
		$mini_planta = '';
		$nombre = '';
		$precio = '';
		$area = '';
		$alcobas = '';
		$balcon = '';
		$privada = '';
		$banos = '';
		$duchas = '';
		$ID_proyecto = $_GET['ID_proyecto'];
		#------------Defino cual es la tarea del formulario
		$task = $_GET['task'];
		#
		if($task == 'new'){
			$txt_titulo = 'Nueva planta';
			$txt_btn_form = 'AÑADIR';
			$accionSubmit = 'new/insert';	
		}
		if($task == 'edit'){
			$txt_titulo = 'Editar planta';
			$txt_btn_form = 'GUARDAR';
			$accionSubmit = 'edit/update';	
		}	
		#------------Cargo info de BD si es EDIT o REMOVE
		if(
			$task == 'edit' //|| $task == 'remove'
		){
			if(isset($_GET['ID_planta'])){	
					$ID_planta = $_GET['ID_planta'];
			}
			$Registro = RegistrosBdM::GetProyectoPlantaM($ID_planta);
			#
		

			$grande_planta = $Registro['grande_planta'];
			$mini_planta = $Registro['mini_planta'];
			$nombre = $Registro['nombre'];
			$precio = $Registro['precio'];
			$area = $Registro['area'];
			$balcon = $Registro['balcon'];
			$privada = $Registro['privada'];
			$alcobas = $Registro['alcobas'];
			$banos = $Registro['banos'];
			$duchas = $Registro['duchas'];
		}
		#------------Carga View
		include('views/panel/proyecto_planta.php');
		die();
	}




	#------------Proyecto: CRUD Planta (Insert - Update)
	public static function Proyecto_plantaQueryC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------Defino variables, accion, tabla y primary key
		$ID_proyecto = $_POST['ID_proyecto'];
		$action = $_GET['action']; //insert, update, remove
		$table ='04_proyecto_planos';
		$primarykey = 'ID_planta';
		$primaryvalue = $_POST['ID_planta'];
		#------------if INSERT o UPDATE
		if($action == 'insert' || $action == 'update'){
			#------------if UPDATE
			if($action == 'update'){
				$grande_planta_anterior = $_POST['grande_planta_anterior'];
				$mini_planta_anterior = $_POST['mini_planta_anterior'];
			}
			#------------if INSERT
			if($action == 'insert'){
				if(
					$_FILES['grande_planta']['size'] == 0
					|| $_FILES['grande_planta']['size'] > PESO_MAXIMO
					|| $_POST['nombre'] == ''
				){
					$msg_error = 'El nombre y la imagen de la planta son obligatorios.<br><br>Por favor inténtelo de nuevo.';
					include('views/panel/error404.php');
					die();
				}
			}		
			#FOTO
			//--------------------------Reemplaza
			if($action == 'update'){
				$grande_planta_anterior = "";
			    $mini_planta_anterior = "";
				if(isset($_POST['grande_planta_anterior'])){	
					$grande_planta_anterior = $_POST['grande_planta_anterior'];
				}
				if(isset($_POST['mini_planta_anterior'])){	
					$mini_planta_anterior = $_POST['mini_planta_anterior'];
				}	
				$grande_planta = $grande_planta_anterior;
				$mini_planta = $mini_planta_anterior;	
			}
			$file = $_FILES['grande_planta'];
			if($_FILES['grande_planta']['size'] > 0){
				$imageType = $file['type'];
				$imageSize = $file['size'];
				$imageTmpName = $file['tmp_name'];
				$imageName = $file['name'];				
				#------------Valido peso y formato imagen
				$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
				if($invalido_txt != ''){
					$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
					include('views/panel/error404.php');
					die();
				}	
				#------------Upload y Resize Imagen
				$procesos = array(
					'grande_generar' => '1',
					'grande_escalado' => '2',
					'grande_width' => '1600',
					'grande_height' => '',
					'mini_generar' => '1',
					'mini_escalado' => '4',
					'mini_width' => '550',
					'mini_height' => '550'
				);
				$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
				$grande_planta =$uploads[0];
				$mini_planta =$uploads[1];
				if($action == 'update'){
					@unlink(RUTA_UPLOADS.$grande_planta_anterior);
					@unlink(RUTA_UPLOADS.$mini_planta_anterior);
				}
			}			


			$parameters = array(
				'ID_proyecto' => $ID_proyecto,
				'grande_planta' => $grande_planta,
				'mini_planta' => $mini_planta,
				'nombre' => sanitize_xss($_POST['nombre']),
				'area' => sanitize_xss($_POST['area']),
				'privada' => sanitize_xss($_POST['privada']),
				'balcon' => sanitize_xss($_POST['balcon']),
				'banos' => sanitize_xss($_POST['banos']),
				'duchas' => sanitize_xss($_POST['duchas']),
				'alcobas' => sanitize_xss($_POST['alcobas']),
				'precio' => sanitize_xss($_POST['precio']),
			);

			
			if($action == 'update'){
				#------------Array de variables POST
				$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
			}
			if($action == 'insert'){
				#------------Array de variables POST
				$query = PreparedStatementsM::InsertM($parameters, $table);
			}
		}			
		#------------Redirige
		$redirige = '../../proyecto/edit/'.$ID_proyecto.'#block-plantas';
		//print_r ($ID_proyecto);
		header('Location:'.$redirige);
		die();
	}






#-----------------------------------------------------------------------------
# PROYECTO AVANCES
#-----------------------------------------------------------------------------
	#------------Proyecto: Carga Foto
	public static function Proyecto_avanceC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------ Variables
		$ID_avance = '0';
		$foto_grande = '';
		$foto_mini = '';
		$caption = '';
		$ID_proyecto = $_GET['ID_proyecto'];
		#------------Defino cual es la tarea del formulario
		$task = $_GET['task'];
		#
		if($task == 'new'){
			$txt_titulo = 'Nuevo Avance';
			$txt_btn_form = 'AÑADIR';
			$accionSubmit = 'new/insert';	
		}
		if($task == 'edit'){
			$txt_titulo = 'Editar Avance';
			$txt_btn_form = 'GUARDAR';
			$accionSubmit = 'edit/update';	
		}
		#------------Cargo info de BD si es EDIT o REMOVE
		if(
			$task == 'edit' //|| $task == 'remove'
		){
			if(isset($_GET['ID_avance'])){	
					$ID_avance = $_GET['ID_avance'];
			}
			$Registro = RegistrosBdM::GetProyectoAvanceM($ID_avance);
			#
			$ID_proyecto = $Registro['ID_proyecto'];
			$foto_grande = $Registro['grande'];
			$foto_mini = $Registro['mini'];
			$caption = $Registro['caption'];
		}
		#------------Carga View
		include('views/panel/proyecto_avance.php');
		die();
	}



	#------------Proyecto: CRUD Foto (Insert - Update)
	public static function Proyecto_avanceQueryC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#
		#------------Defino variables, accion, tabla y primary key
		$ID_proyecto = $_POST['ID_proyecto'];
		$ID_avance = $_POST['ID_avance'];
		$foto_grande = '';
		$foto_mini = '';
		$caption = '';
		//$caption = '';
		$action = $_GET['action']; //insert, update, remove
		$table ='06_proyecto_avances';
		$primarykey = 'ID_avance';
		$primaryvalue = $_POST['ID_avance'];
		#
		#------------if INSERT o UPDATE
		if($action == 'insert' || $action == 'update'){
		
			#------------if UPDATE
			if($action == 'update'){
				$foto_grande_anterior = $_POST['foto_grande_anterior'];
				$foto_mini_anterior = $_POST['foto_mini_anterior'];
				$foto_grande = $foto_grande_anterior;
				$foto_mini = $foto_mini_anterior;
				if($_FILES['foto_grande']['size'] > 0){
					$file = $_FILES['foto_grande'];
					$imageType = $file['type'];
					$imageSize = $file['size'];
					$imageTmpName = $file['tmp_name'];
					$imageName = $file['name'];
					#------------Valido peso y formato imagen
					$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
					if($invalido_txt != ''){
						$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}	
					#------------Upload y Resize Imagen
					$procesos = array(
						'grande_generar' => '1',
						'grande_escalado' => '2',
						'grande_width' => '1200',
						'grande_height' => '',
						'mini_generar' => '1',
						'mini_escalado' => '4',
						'mini_width' => '400',
						'mini_height' => '400'
					);
					$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
					$foto_grande=$uploads[0];
					$foto_mini=$uploads[1];
					#------------Elimina anteriores
					if($action == 'update'){
						@unlink(RUTA_UPLOADS.$foto_grande_anterior);
						@unlink(RUTA_UPLOADS.$foto_mini_anterior);
					}		
				}
				#------------Array de variables POST
				$parameters = array(
					'ID_proyecto' => $ID_proyecto,
					'grande' => $foto_grande,
					'mini' => $foto_mini,
					'caption' => sanitize_xss($_POST['caption'])
				);
				$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
			}
			#------------if INSERT
			if($action == 'insert'){
				//$file_multiples='1';
				$tot = count($_FILES['foto_grande']['name']);
				for ($i = 0; $i < $tot; $i++){
					if(
						$_FILES['foto_grande']['size'][$i] == 0
						|| $_FILES['foto_grande']['size'][$i] > PESO_MAXIMO
					){
						$msg_error = 'No se ingresó ninguna foto o se ingresó con un peso superior al permitido.<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}
					$file = $_FILES['foto_grande'];
					$imageTmpName = $file['tmp_name'][$i];
					$imageType = $file['type'][$i];
					$imageSize = $file['size'][$i];
					$imageName = sanitize_xss(seo_url($file['name'][$i]));
					#------------Valido peso y formato imagen
					$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
					if($invalido_txt != ''){
						$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}	
					#------------Upload y Resize Imagen
					$procesos = array(
						'grande_generar' => '1',
						'grande_escalado' => '2',
						'grande_width' => '1200',
						'grande_height' => '',
						'mini_generar' => '1',
						'mini_escalado' => '4',
						'mini_width' => '400',
						'mini_height' => '400'
					);
					$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
					$foto_grande=$uploads[0];
					$foto_mini=$uploads[1];		
					#------------Array de variables POST
					$parameters = array(
						'ID_proyecto' => $ID_proyecto,
						'grande' => $foto_grande,
						'mini' => $foto_mini,
						'caption' => sanitize_xss($_POST['caption'][$i])
					);	
					$query = PreparedStatementsM::InsertM($parameters, $table);
				}		
			}
		} 
		#------------Redirige
		$redirige = '../../proyecto/edit/'.$ID_proyecto.'#block-avances';
		header('Location:'.$redirige);
		die();
	}






#-----------------------------------------------------------------------------
# TRAYECTORIA
#-----------------------------------------------------------------------------

	#------------Carga trayectoria (Lista)
	public static function TrayectoriaC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------Carga Registros
		$Registros = RegistrosBdM::GetAllTrayectoriasM();
		#------------Carga View
		include('views/panel/trayectorias.php');
		die();
	}


	#------------proyecto_trayectoria(Detalle)
	public static function Proyecto_trayectoriaC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------ Variables
		$ID_trayectoria = '0';
		if(isset($_GET['ID_trayectoria'])){	
			$ID_trayectoria = $_GET['ID_trayectoria'];
		}
		#------------Variables por defecto (Formulario NEW)
		$nombre = '';
		$categoria = '';
		$ciudad = '';
		$fecha = '';
		$area = '';
		$descripcion = '';
		$grande = '';
		$mini = '';
	
		#------------Defino cual es la tarea del formulario
		$task = $_GET['task'];
		#
		if($task == 'new'){
			$txt_titulo = 'Nueva Trayectoria';
			$txt_btn_form = 'GUARDAR TRAYECTORIA';
			$accionSubmit = 'new/insert';	
		}
		if($task == 'edit'){
			$txt_titulo = 'Editar Trayectoria';
			$txt_btn_form = 'GUARDAR TRAYECTORIA';
			$accionSubmit = 'edit/update';	
		}
		if($task == 'remove'){
			$txt_titulo = '<strong>¿Con seguridad quieres eliminar esta Trayectoria?</strong><br>No se puede deshacer.';
			$txt_btn_form = 'SÍ. ELIMINAR';
			$accionSubmit = 'remove/delete';	
		}
		#------------Cargo info de BD si es EDIT o REMOVE
			

			
		if(
			$task == 'edit' || $task == 'remove'
		){

			$Registro = RegistrosBdM::GetTrayectoriaM($ID_trayectoria);
			$trayectoriaFotos = RegistrosBdM::GetTrayectoriaFotosM($ID_trayectoria);


			$nombre = $Registro['nombre'];
			$categoria = $Registro['categoria'];
			$ciudad = $Registro['ciudad'];
			$area = $Registro['area'];
			$fecha = $Registro['fecha'];
			$descripcion = $Registro['descripcion'];
			$grande = $Registro['grande'];
			$mini = $Registro['mini'];
		}
		#------------Carga View
		include('views/panel/trayectoria.php');
		die();
	}


	#------------Post Queries (Insert - Update - Delete)
	public static function Proyecto_trayectoriaQueryC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#
		
		#------------Defino accion, tabla y primary key
		$ID_trayectoria = $_POST['ID_trayectoria'];
		$action = $_GET['action']; //insert, update, delete
		$table ='07_trayectoria';
		$primarykey = 'ID_trayectoria';
		$primaryvalue = $_POST['ID_trayectoria'];
		#
		#------------if INSERT o UPDATE
		if($action == 'insert' || $action == 'update'){

			#-----Validacion imagenes obligatorias y peso maximo
			if($action == 'insert'){
				if(
					$_POST['nombre'] == '' || $_POST['ciudad'] == '' || $_POST['fecha'] == '' || $_POST['categoria'] == '' || 
					($_FILES['fotoTrayectoria']['size'] == 0 || $_FILES['fotoTrayectoria']['size'] > PESO_MAXIMO) 
				){
				$msg_error = 'Los campos requeridos son:<br><br>
				- Nombre<br>
				- Categoría<br>
				- Ciudad<br>
				- Fecha<br>
				- Foto
				.<br><br>Por favor inténtelo de nuevo.';
				include('views/panel/error404.php');
				die();
				}
			}

									
			#FOTO
			//--------------------------
			$fotoTrayectoria_anterior = "";
			$miniTrayectoria_anterior = "";
			if($action == 'update'){
				if(isset($_POST['fotoTrayectoria_anterior'])){	
					$fotoTrayectoria_anterior = $_POST['fotoTrayectoria_anterior'];
				}
				if(isset($_POST['miniTrayectoria_anterior'])){	
					$miniTrayectoria_anterior = $_POST['miniTrayectoria_anterior'];
				}	
			}
		
			$fotoTrayectoria = $fotoTrayectoria_anterior;
			$miniTrayectoria = $miniTrayectoria_anterior;
			$file = $_FILES['fotoTrayectoria'];
			if($_FILES['fotoTrayectoria']['size'] > 0){
				$imageType = $file['type'];
				$imageSize = $file['size'];
				$imageTmpName = $file['tmp_name'];
				$imageName = $file['name'];
				#------------Valido peso y formato imagen
				$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
				if($invalido_txt != ''){
					$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
					include('views/panel/error404.php');
					die();
				}	
				#------------Upload y Resize Imagen
				$procesos = array(
					'grande_generar' => '1',
					'grande_escalado' => '2',
					'grande_width' => '1600',
					'grande_height' => '',
					'mini_generar' => '1',
					'mini_escalado' => '4',
					'mini_width' => '400',
					'mini_height' => '400'
				);
				$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
				$fotoTrayectoria = $uploads[0];
				$miniTrayectoria =$uploads[1];
				@unlink(RUTA_UPLOADS.$fotoTrayectoria_anterior);
				@unlink(RUTA_UPLOADS.$miniTrayectoria_anterior);
			}	


		

		
		
		
			#------------Array de variables POST
			$parameters = array(
				'nombre' => sanitize_xss($_POST['nombre']),
				'fecha' => sanitize_xss($_POST['fecha']),
				'categoria' => $_POST['categoria'],
				'ciudad' => sanitize_xss($_POST['ciudad']),
				'descripcion' => sanitize_xss($_POST['descripcion']),
				'area' => sanitize_xss($_POST['area']),
	
	
				'grande' => $fotoTrayectoria,
				'mini' => $miniTrayectoria,
	
				
			);
			/*if(isset($_POST['destacado'])){
				$parameters['destacado'] = '1';
			}*/
			#
	


	
			#------------if INSERT
			if($action == 'insert'){
				$query = PreparedStatementsM::InsertM($parameters, $table);
			}
			#------------if UPDATE
			if($action == 'update'){
				$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
			}
		}

		#------------if DELETE
		if($action == 'delete'){
			#----Borra Imagenes, Documento presentacion y Proyecto
			$selecciona = RegistrosBdM::GetTrayectoriaM($ID_trayectoria);
			@unlink(RUTA_UPLOADS.$selecciona['grande']);
			@unlink(RUTA_UPLOADS.$selecciona['mini']);
			PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);
		

				#----Borra fotos
				$seleccionaFotos = RegistrosBdM::GetTrayectoriaFotosM($ID_trayectoria);
				foreach($seleccionaFotos as $photo){
					@unlink(RUTA_UPLOADS.$photo['grande']);
					@unlink(RUTA_UPLOADS.$photo['mini']);
				}
				$table = "08_trayectoria_fotos";
				PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);
		}
		#
		#------------Redirige
		$redirige = '../../trayectoria/ok/'.$action;
		header('Location:'.$redirige);
		die();
	}




#-----------------------------------------------------------------------------
# TRAYECTORIA FOTOS
#-----------------------------------------------------------------------------
	#------------Proyecto: Carga Foto
	public static function Trayectoria_fotoC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------ Variables
		$ID_foto = '0';
		$foto_grande = '';
		$foto_mini = '';
		$caption = '';
		$ID_trayectoria = $_GET['ID_trayectoria'];
		#------------Defino cual es la tarea del formulario
		$task = $_GET['task'];
		#
		if($task == 'new'){
			$txt_titulo = 'Nueva foto';
			$txt_btn_form = 'AÑADIR';
			$accionSubmit = 'new/insert';	
		}
		if($task == 'edit'){
			$txt_titulo = 'Editar foto';
			$txt_btn_form = 'GUARDAR';
			$accionSubmit = 'edit/update';	
		}
		#------------Cargo info de BD si es EDIT o REMOVE
		if(
			$task == 'edit' //|| $task == 'remove'
		){
			if(isset($_GET['ID_foto'])){	
					$ID_foto = $_GET['ID_foto'];
			}
			$Registro = RegistrosBdM::GetTrayectoriaFotoM($ID_foto);
			#
			$ID_trayectoria = $Registro['ID_trayectoria'];
			$grande = $Registro['grande'];
			$mini = $Registro['mini'];
			$caption = $Registro['caption'];
		}
		#------------Carga View
		include('views/panel/trayectoria_foto.php');
		die();
	}



	#------------Proyecto: CRUD Foto (Insert - Update)
	public static function Trayectoria_fotoQueryC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#
		#------------Defino variables, accion, tabla y primary key
		$ID_trayectoria = $_POST['ID_trayectoria'];
		$ID_foto = $_POST['ID_foto'];
		$foto_grande = '';
		$foto_mini = '';
		//$caption = '';
		$action = $_GET['action']; //insert, update, remove
		$table ='08_trayectoria_fotos';
		$primarykey = 'ID_foto';
		$primaryvalue = $_POST['ID_foto'];
		#
		#------------if INSERT o UPDATE
		if($action == 'insert' || $action == 'update'){
			#------------if UPDATE
			if($action == 'update'){
				$foto_grande_anterior = $_POST['foto_grande_anterior'];
				$foto_mini_anterior = $_POST['foto_mini_anterior'];
				$foto_grande = $foto_grande_anterior;
				$foto_mini = $foto_mini_anterior;
				if($_FILES['foto_grande']['size'] > 0){
					$file = $_FILES['foto_grande'];
					$imageType = $file['type'];
					$imageSize = $file['size'];
					$imageTmpName = $file['tmp_name'];
					$imageName = $file['name'];
					#------------Valido peso y formato imagen
					$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
					if($invalido_txt != ''){
						$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}	
					#------------Upload y Resize Imagen
					$procesos = array(
						'grande_generar' => '1',
						'grande_escalado' => '2',
						'grande_width' => '1200',
						'grande_height' => '',
						'mini_generar' => '1',
						'mini_escalado' => '4',
						'mini_width' => '400',
						'mini_height' => '400'
					);
					$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
					$foto_grande=$uploads[0];
					$foto_mini=$uploads[1];
					#------------Elimina anteriores
					if($action == 'update'){
						@unlink(RUTA_UPLOADS.$foto_grande_anterior);
						@unlink(RUTA_UPLOADS.$foto_mini_anterior);
					}		
				}
				#------------Array de variables POST
				$parameters = array(
					'ID_trayectoria' => $ID_trayectoria,
					'grande' => $foto_grande,
					'mini' => $foto_mini,
					'caption' => sanitize_xss($_POST['caption'])
				);
				$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
			}
			#------------if INSERT
			if($action == 'insert'){
				//$file_multiples='1';
				$tot = count($_FILES['foto_grande']['name']);
				for ($i = 0; $i < $tot; $i++){
					if(
						$_FILES['foto_grande']['size'][$i] == 0
						|| $_FILES['foto_grande']['size'][$i] > PESO_MAXIMO
					){
						$msg_error = 'No se ingresó ninguna foto o se ingresó con un peso superior al permitido.<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}
					$file = $_FILES['foto_grande'];
					$imageTmpName = $file['tmp_name'][$i];
					$imageType = $file['type'][$i];
					$imageSize = $file['size'][$i];
					$imageName = sanitize_xss(seo_url($file['name'][$i]));
					#------------Valido peso y formato imagen
					$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
					if($invalido_txt != ''){
						$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
						include('views/panel/error404.php');
						die();
					}	
					#------------Upload y Resize Imagen
					$procesos = array(
						'grande_generar' => '1',
						'grande_escalado' => '2',
						'grande_width' => '1200',
						'grande_height' => '',
						'mini_generar' => '1',
						'mini_escalado' => '4',
						'mini_width' => '400',
						'mini_height' => '400'
					);
					$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
					$foto_grande=$uploads[0];
					$foto_mini=$uploads[1];		
					#------------Array de variables POST
					$parameters = array(
						'ID_trayectoria' => $ID_trayectoria,
						'grande' => $foto_grande,
						'mini' => $foto_mini,
						'caption' => sanitize_xss($_POST['caption'][$i])
					);	
					$query = PreparedStatementsM::InsertM($parameters, $table);
				}		
			}
		} 
		#------------Redirige
		$redirige = '../../trayectoria/edit/'.$ID_trayectoria.'#block-fotos';
		header('Location:'.$redirige);
		die();
	}



#------------Elimina complementos de proyecto
public static function Trayectoria_item_removeC(){
	$ID_trayectoria = $_GET['ID_trayectoria'];
	#-----foto
	if(isset($_GET['ID_foto'])){
		$ID_foto = $_GET['ID_foto'];	
		$table ='08_trayectoria_fotos';
		$primarykey = 'ID_foto';
		$primaryvalue = $_GET['ID_foto'];
		$redirect = '#block-fotos';
		$query1 = RegistrosBdM::GetTrayectoriaFotoM($ID_foto);	
		$foto_grande = $query1['grande'];
		$foto_mini = $query1['mini'];
		@unlink(RUTA_UPLOADS.$foto_grande);
		@unlink(RUTA_UPLOADS.$foto_mini);
		#Parametros fijos
		$parameters=array(
			'ID_foto' => $ID_foto
		);
	}	
	#Sentencia SQL dinamica
	$sql = ' DELETE ';
	$sql .= ' FROM '.$table.' ';
	$sql .= ' WHERE '.$primarykey.' LIKE :'.$primarykey.' ';
	ConexionM::DeleteM($sql, $parameters);
	#Redirige
	$redirige = '../../trayectoria/edit/'.$ID_trayectoria.$redirect.'';
	header('Location:'.$redirige);
	die();
}
































	#-----------------------------------------------------------------------------
	# HOME BANNER
	#-----------------------------------------------------------------------------


	#------------Carga Home Banner (Lista)
	public static function Home_bannersC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------Carga Registros
		$Registros = RegistrosBdM::GetAllHomeBannersM();
		#------------Carga View
		include('views/panel/home_banners.php');
		die();
	}	


	#------------Home Banner vista
	public static function Home_bannerC(){
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#------------ Variables
		$ID_banner = '0';
		if(isset($_GET['ID_banner'])){	
			$ID_banner = $_GET['ID_banner'];
		}
		#------------Carga Proyecto
		$banner = RegistrosBdM::GetHomeBannerM($ID_banner);
		#------------Variables por defecto (Formulario NEW)
		$banner = '';
		$nombre = '';
		$descripcion = '';
		$link = '';
		$orden = '';
		$activo = '0';
		$target = '_self';
		$banner_anterior = '';
		#------------Defino cual es la tarea del formulario
		$task = $_GET['task'];
		#
		if($task == 'new'){
			$txt_titulo = 'Nuevo Banner';
			$txt_btn_form = 'GUARDAR';
			$accionSubmit = 'new/insert';	
		}
		if($task == 'edit'){
			$txt_titulo = 'Editar Banner';
			$txt_btn_form = 'GUARDAR';
			$accionSubmit = 'edit/update';	
		}
		if($task == 'remove'){
			$txt_titulo = '<strong>¿Con seguridad quieres eliminar este banner?</strong><br>No se puede deshacer.';
			$txt_btn_form = 'SÍ. ELIMINAR';
			$accionSubmit = 'remove/delete';	
		}
		#------------Cargo info de BD si es EDIT o REMOVE
		if(
			$task == 'edit' || $task == 'remove'
		){
			$Registro = RegistrosBdM::GetHomeBannerM($ID_banner);
			#
			$banner = $Registro['banner'];
			$nombre = $Registro['nombre'];
			$descripcion = $Registro['descripcion'];
			$link = $Registro['link'];
			$orden = $Registro['orden'];
			$activo = $Registro['activo'];
			$target = $Registro['target'];
		}
		#------------Carga View
		include('views/panel/home_banner.php');
		die();
	}


	#------------Home banner Queries (Insert - Update - Delete)
	public static function Home_bannerQueryC(){

		
	
		#------------Seguridad: ¿Está logueado?
		$IsNotLoguedC = AdminC::IsNotLoguedC();
		#
		#------------Defino accion, tabla y primary key
		$ID_banner = $_POST['ID_banner'];
		$action = $_GET['action']; //insert, update, delete
		$table ='09_banners';
		$primarykey = 'ID_banner';
		$primaryvalue = $_POST['ID_banner'];
		#
		#------------if INSERT o UPDATE
		if($action == 'insert' || $action == 'update'){
			
			//$mini_anterior = "";
			//if($action == 'update'){
				$banner_anterior = "";
				$banner= '';

				if(isset($_POST['banner_anterior'])){	
					$banner_anterior = $_POST['banner_anterior'];
						
				}
				//die();
				$banner = $banner_anterior;
			
				/*echo ("hey". $_POST['banner_anterior_es']);
				echo ("hey". $banner_anterior_es);
				echo ("hey". $banner_es);
				die();*/
				
			//}

			

		


			if( $_FILES['foto']['size'] > PESO_MAXIMO){
				$msg_error = 'La imagen no debe exceder el peso permitido';
				include('views/panel/error404.php');
				die();
			}
			if( 
				$_FILES['foto']['size'] == '' && $banner_anterior == ''
				|| $_POST['nombre'] == ''
			){
				$msg_error = 'Debes subir la imagen para banner y un nombre descriptivo.';
				include('views/panel/error404.php');
				die();
			}






			//--------------------------Reemplaza Banner es
			$file = $_FILES['foto'];
			if($_FILES['foto']['size'] > 0){
				#
				@unlink(RUTA_UPLOADS.$banner_anterior);
				#
				$imageType = $file['type'];
				$imageSize = $file['size'];
				$imageTmpName = $file['tmp_name'];
				$imageName = $file['name'];			
				#------------Valido peso y formato imagen
				$invalido_txt = UploadsC::ValidaImagenC($imageType, $imageSize);
				if($invalido_txt != ''){
					$msg_error = $invalido_txt.'<br><br>Por favor inténtelo de nuevo.';
					include('views/panel/error404.php');
					die();
				}	
				#------------Upload y Resize Imagen
				$procesos = array(
					//'grande_generar' => '1',
					//'grande_escalado' => '5',
					//'grande_width' => '1500',
					//'grande_height' => '550',
					'grande_generar' => '1',
					'grande_escalado' => '2',
					'grande_width' => '1600',
					'grande_height' => '',
					'mini_generar' => '0',
					'mini_escalado' => '',
					'mini_width' => '',
					'mini_height' => ''
				);
				$uploads = UploadsC::UploadImagenC($imageTmpName, $imageName, $procesos);
				$banner =$uploads[0];
			}	
			
			#------------Parameters
			$parameters = array(
				'banner' => $banner,
				'nombre' => sanitize_xss($_POST['nombre']),
				'descripcion' => sanitize_xss($_POST['descripcion']),
				'link' => sanitize_xss($_POST['link']),
				'orden' => sanitize_xss($_POST['orden']),
				'target' => $_POST['target'],
				'activo' => '0'
			);
			if($_POST['orden'] == ''){
				$parameters['orden'] = '0';
			}
			/*if($_POST['target'] == '0'){
				$parameters['target'] = '_self';
			}*/
			if(isset($_POST['activo'])){
				$parameters['activo'] = '1';
			}
			#
			#------------if INSERT
			if($action == 'insert'){
				$query = PreparedStatementsM::InsertM($parameters, $table);
			}
			#------------if UPDATE
			if($action == 'update'){
				$query = PreparedStatementsM::UpdateM($parameters, $table, $primarykey, $primaryvalue);
			}
		}

		#------------if DELETE
		if($action == 'delete'){
			$selecciona = RegistrosBdM::GetHomeBannerM($ID_banner);
			$banner = $selecciona['banner'];
			@unlink(RUTA_UPLOADS.$banner);
			PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);
		}

		#------------Redirige
		$redirige = '../../banners/ok/'.$action;
		header('Location:'.$redirige);
		die();
	}







}