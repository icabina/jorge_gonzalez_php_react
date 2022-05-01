<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
    <script src="views/scripts/ckeditor/ckeditor.js"></script>
</head>

<body class="panel">
    <?php include('views/panel/includes/admin-header.php'); ?>
    <?php //-------------Titulo Seccion
	?>
    <div class="fila">
        <div class="cols">
            <div class="col col_1 titulo_seccion">
                <h1><?php echo $txt_titulo; ?></h1>
            </div>
        </div>
    </div>
    <?php //-------------Atrás
	?>
    <div class="fila">
        <div class="cols acciones">
            <div class="col col_1">
                <a href="panel/proyecto/edit/<?php echo $ID_proyecto; ?>#block-recorridos" class="btn_admin_atras"
                    title="Atrás">Atrás</a>
            </div>
        </div>
    </div>
    <?php //-------------Formulario
	?>
    <div class="fila">
        <div class="cols">
            <div class="col col_2">
                <form action="panel/proyecto_recorrido/<?php echo $accionSubmit; ?>" method="post" target="_self">
                    <input name="ID_recorrido" type="hidden" value="<?php echo $ID_recorrido; ?>">
                    <input name="ID_proyecto" type="hidden" value="<?php echo $ID_proyecto; ?>">

                    <div class="fila mediamargen">
                        <label>Nombre del recorrido</label>
                        <input name="recorrido_nombre" type="text" value="<?php echo $recorrido_nombre; ?>">
                        <label>Vínculo al recorrido</label>
                        <input name="recorrido_link" type="text" value="<?php echo $recorrido_link; ?>">
                    </div>



                    <div class="fila boton">
                        <input type="submit" value="<?php echo $txt_btn_form; ?>" class="boton_formulario">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php #--------------- Footer 
	?>
    <?php include('views/panel/includes/admin-footer.php'); ?>
    <?php #--------------- Resaltar campos requeridos en formulario NEW y EDIT 
	?>
    <?php if ($task == 'new' || $task == 'edit') { ?>
    <script>
    $(document).ready(function() {
        var resaltar = [
            'input[name="recorrido_nombre"]',
            'input[name="recorrido_link"]',
        ].join(',');
        $(resaltar).addClass('requerido');
    });
    </script>
    <?php } ?>
</body>

</html>