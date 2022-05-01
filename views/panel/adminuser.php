<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
</head>

<body class="panel parent">
    <?php include('views/panel/includes/admin-header.php'); ?>


    <?php //-------------Titulo Seccion?>
    <div class="fila halfmargen">
        <div class="cols">
            <div class="col col_1 titulo_seccion">
                <h1><?php echo $txt_titulo;?></h1>
            </div>
        </div>
    </div>




    <?php //-------------Formulario?>
    <div class="fila adminpage altura_minima_2">
        <div class="cols">
            <div class="col col_1">
                <form action="panel/administrador/<?php echo $accionSubmit; ?>" method="post" target="_self">

                    <input name="ID_admin" type="hidden" value="<?php echo $ID_admin; ?>">


                    <div class="cols goodmargen">
                        <div class="col col_3">
                            <label>Usuario</label>
                            <input name="usuario" type="text" value="<?php echo $usuario; ?>">
                        </div>
                        <div class="col col_3">
                            <label>Nueva Contraseña</label>
                            <input name="contrasena" type="password" value="">
                        </div>
                        <div class="col col_3">
                            <label>Repetir Nueva Contraseña</label>
                            <input name="contrasena2" type="password" value="">
                        </div>
                    </div>



                    <hr>
                    <div class="fila">
                        <div class="cols">
                            <div class="col col_1">
                                <input type="submit" value="<?php echo $txt_btn_form;?>" class="boton_formulario">
                            </div>
                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>



    <?php #--------------- Footer ?>
    <?php include('views/panel/includes/admin-footer.php'); ?>





    <?php #--------------- Resaltar campos requeridos ?>
    <script>
    $(document).ready(function() {
        var resaltar = [
            'input[name="usuario"]'
        ].join(',');
        $(resaltar).addClass('requerido');
    });
    </script>





    <?php #--------------- Mensajes SweetAlert de Confirmación ?>
    <?php
if(isset($_GET['msg'])){
	#---------------Hecho con exito
	$msg_titulo = 'Hecho!';
	$msg_type = 'success';
	#
	if($_GET['msg'] == 'update'){
		$msg_texto = 'El usuario administrador fue EDITADO.';
	}
	#--------------- Dispara alerta
	include('views/panel/includes/admin-alertas-swal.php');	
}
?>






</body>

</html>