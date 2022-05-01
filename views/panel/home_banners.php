<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
</head>

<body class="panel">
    <?php include('views/panel/includes/admin-header.php'); ?>


    <?php //-------------Titulo Seccion?>
    <div class="fila">
        <div class="cols">
            <div class="col col_1 mediamargen">
                <div class="titulo_seccion">
                    <h1>Home banners</h1>
                </div>
            </div>
        </div>
    </div>

    <?php //-------------Acciones?>
    <div class="fila acciones">
        <div class="cols">
            <div class="col col_1">
                <a href="panel/home_banner/new" class="btn_admin_anadir" title="Añadir">Añadir</a>
            </div>
        </div>
    </div>


    <?php //-------------Tabla Listado?>
    <div class="container">
        <div class="content">


            <?php if($Registros != NULL) { ?>
            <table id="listado_tabla" class="tabla_filtrable maxima">
                <thead>
                    <tr class="encabezado">
                        <th></th>
                        <th>Banner</th>
                        <th>Orden</th>
                        <th>Activo</th>
                        <th><?php /*?>Acciones<?php */?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php } ?>

                    <?php 
				foreach($Registros as $registro) {				
				?>
                    <tr>
                        <td><img src="datas/<?php echo $registro['banner'];?>" alt="<?php echo $registro['banner'];?>"
                                <?php if($registro['activo'] == '0'){echo 'class="inactivo"';} ?> /></td>
                        <td><span>Banner:</span><?php echo $registro['banner'];?></td>
                        <td><span>Orden:</span><?php echo $registro['orden'];?></td>
                        <td><span>Activo:</span><?php if($registro['activo'] == '1'){ 
					echo 'Activo' ;
					}?></td>
                        <td>
                            <a href="panel/home_banner/remove/<?php echo $registro['ID_banner'];?>"
                                class="btn_tabla_eliminar" title="Eliminar">Eliminar</a>
                            <a href="panel/home_banner/edit/<?php echo $registro['ID_banner'];?>"
                                class="btn_admin_editar" title="Editar">Editar</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>



    <?php #--------------- Footer ?>
    <?php include('views/panel/includes/admin-footer.php'); ?>




    <?php #--------------- jQuery plugin: Fancy Table ?>
    <?php include('views/panel/includes/fancyTable-config.php'); ?>





    <?php #--------------- Mensajes SweetAlert de Confirmación ?>
    <?php
if(isset($_GET['msg'])){
	#---------------Hecho con exito
	$msg_titulo = 'Hecho!';
	$msg_type = 'success';
	#
	if($_GET['msg'] == 'insert'){
		$msg_texto = 'El nuevo banner fue CREADO.';
	}
	if($_GET['msg'] == 'update'){
		$msg_texto = 'El banner fue EDITADO.';
	}
	if($_GET['msg'] == 'delete'){
		$msg_texto = 'El banner fue ELIMINADO.';
	}
	#--------------- Dispara alerta
	include('views/panel/includes/admin-alertas-swal.php');	
}
?>





</body>

</html>