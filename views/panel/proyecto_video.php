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
    <div class="fila titulo_seccion">
        <div class="cols">
            <div class="col col_1">
                <h1><?php echo $txt_titulo; ?></h1>
            </div>
        </div>
    </div>
    <?php //-------------Atrás
	?>
    <div class="fila">
        <div class="cols acciones">
            <div class="col col_1">
                <a href="panel/proyecto/edit/<?php echo $ID_proyecto; ?>#block-videos" class="btn_admin_atras"
                    title="Atrás">Atrás</a>
            </div>
        </div>
    </div>
    <?php //-------------Formulario
	?>
    <div class="fila">
        <div class="cols">
            <div class="col col_2">
                <form action="panel/proyecto_video/<?php echo $accionSubmit; ?>" method="post" target="_self">
                    <input name="ID_video" type="hidden" value="<?php echo $ID_video; ?>">
                    <input name="ID_proyecto" type="hidden" value="<?php echo $ID_proyecto; ?>">


                    <label>Código de YouTube:</label>
                    <?php if ($ID_video != '0') { ?>
                    <div class="contiene_video">
                        <p>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video ?>"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </p>
                    </div>
                    <?php } ?>
                    <input name="video" type="text" value="<?php echo $video; ?>">


                    <hr />
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
            'input[name="video"]'
        ].join(',');
        $(resaltar).addClass('requerido');
    });
    </script>
    <?php } ?>
</body>

</html>