<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
    <script src="views/scripts/ckeditor/ckeditor.js"></script>
</head>

<body class="panel">
    <?php include('views/panel/includes/admin-header.php'); ?>


    <?php //-------------Titulo Seccion?>
    <div class="fila titulo_seccion">
        <div class="cols">
            <div class="col">
                <h1><?php echo $txt_titulo; ?></h1>
            </div>
        </div>
    </div>


    <?php //-------------Atrás?>
    <div class="fila">
        <div class="cols acciones">
            <a href="panel/proyecto/edit/<?php echo $ID_proyecto; ?>#block-plantas" class="btn_admin_atras"
                title="Atrás">Atrás</a>
        </div>
    </div>


    <?php //-------------Formulario?>


    <div class="fila formulario">
        <form class="fila" action="panel/proyecto_planta/<?php echo $accionSubmit; ?>" method="post" target="_self"
            enctype="multipart/form-data">
            <div class="cols margen">
                <input name="ID_planta" type="hidden" value="<?php echo $ID_planta; ?>">
                <input name="ID_proyecto" type="hidden" value="<?php echo $ID_proyecto; ?>">


                <div class="col col_2">
                    <fieldset>
                        <label>Nombre</label>
                        <input name="nombre" value="<?php echo $nombre; ?>">
                    </fieldset>
                    <fieldset>
                        <label>Precio</label>
                        <input name="precio" value="<?php echo $precio; ?>">
                    </fieldset>
                    <fieldset>
                        <label>Area</label>
                        <input name="area" value="<?php echo $area; ?>">
                    </fieldset>
                    <fieldset>
                        <label>Balcón</label>
                        <input name="balcon" value="<?php echo $balcon; ?>">
                    </fieldset>
                    <fieldset>
                        <label>Privada</label>
                        <input name="privada" value="<?php echo $privada; ?>">
                    </fieldset>
                    <fieldset>
                        <label>Alcobas</label>
                        <input name="alcobas" value="<?php echo $alcobas; ?>">
                    </fieldset>
                    <fieldset>
                        <label>Duchas</label>
                        <input name="duchas" value="<?php echo $duchas; ?>">
                    </fieldset>
                    <fieldset>
                        <label>Baños</label>
                        <input name="banos" value="<?php echo $banos; ?>">
                    </fieldset>
                </div>
                <div class="col col_2">
                    <fieldset>
                        <label>Imagen (*) (Peso Max. <?php echo PESO_MAXIMO_TEXT ?>)</label>
                        <?php if ($ID_planta != '0') { ?>
                        <img src="datas/<?php echo $grande_planta; ?>">
                        <?php } ?>
                        <input name="grande_planta" type="file">
                        <input name="grande_planta_anterior" type="hidden" value="<?php echo $grande_planta; ?>">
                        <input name="mini_planta_anterior" type="hidden" value="<?php echo $mini_planta; ?>">
                    </fieldset>
                </div>


            </div>
            <div class="fila boton">
                <input type="submit" value="<?php echo $txt_btn_form; ?>" class="boton_formulario">
            </div>
        </form>
    </div>



    <?php #--------------- Footer ?>
    <?php include('views/panel/includes/admin-footer.php'); ?>


    <?php #--------------- Resaltar campos requeridos en formulario NEW y EDIT ?>
    <?php if ($task == 'new' || $task == 'edit') { ?>
    <script>
    $(document).ready(function() {
        var resaltar = [
            'input[name="planta_nombre"]',
            'input[name="foto"]'
        ].join(',');
        $(resaltar).addClass('requerido');
    });
    </script>
    <?php } ?>



</body>

</html>