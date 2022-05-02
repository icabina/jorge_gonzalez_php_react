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
		$fecha = "";
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
		$fecha = $proyecto['fecha'];

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
					$foto_banner_anterior = $_POST['foto_banner_anterior'];
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
				'descripcion' => $_POST['descripcion'],
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
				'fecha' => $_POST['fecha'],
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


			#----Borra fotos
			$seleccionaFotos = RegistrosBdM::GetProyectoFotosM($ID_proyecto);
			foreach($seleccionaFotos as $photo){
				@unlink(RUTA_UPLOADS.$photo['foto_grande']);
				@unlink(RUTA_UPLOADS.$photo['foto_mini']);
			}
		 	$table = "02_proyecto_galeria";
			PreparedStatementsM::DeleteM($table, $primarykey, $primaryvalue);
		

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