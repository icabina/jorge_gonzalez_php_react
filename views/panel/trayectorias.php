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
                    <h1>Trayectorias</h1>
                </div>
            </div>
        </div>
    </div>


    <?php //-------------Acciones?>
    <div class="fila acciones">
        <div class="cols">
            <div class="col col_1">
                <a href="panel/trayectoria/new" class="btn_admin_anadir" title="Añadir">Añadir</a>
            </div>
        </div>
    </div>


    <?php //-------------Tabla Listado?>
    <div class="fila altura_minima">
        <div class="cols">
            <div class="col col_1">

                <?php if($Registros != NULL) { ?>
                <table id="listado_tabla" class="tabla_filtrable imagen">
                    <thead>
                        <tr class="encabezado">
                            <th></th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Categoría</th>
                            <th>Año</th>
                            <th><?php /*?>Acciones<?php */?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php } ?>
                        <?php 
                foreach($Registros as $registro) {
				
				?>
                        <tr>
                            <td class="pic"><img src="datas/<?php echo $registro['mini'];?>"></td>
                            <td class="large"><span>Nombre:</span><?php echo $registro['nombre'];?></td>
                            <td><span>Ciudad:</span><?php echo $registro['ciudad'];?></td>
                            <td><span>Categoría:</span><?php echo $registro['categoria'];?></td>
                            <td><span>Año:</span><?php echo $registro['fecha'];?></td>
                            <td>
                                <a href="panel/trayectoria/remove/<?php echo $registro['ID_trayectoria'];?>"
                                    class="btn_tabla_eliminar" title="Eliminar">Eliminar</a>
                                <a href="panel/trayectoria/edit/<?php echo $registro['ID_trayectoria'];?>"
                                    class="btn_admin_editar" title="Editar">Editar</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

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
		$msg_texto = 'El nuevo proyecto fue CREADO.';
	}
	if($_GET['msg'] == 'update'){
		$msg_texto = 'El proyecto fue EDITADO.';
	}
	if($_GET['msg'] == 'delete'){
		$msg_texto = 'El proyecto fue ELIMINADO.';
	}
	#--------------- Dispara alerta
	include('views/panel/includes/admin-alertas-swal.php');	
}
?>





</body>

</html>