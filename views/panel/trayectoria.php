<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
</head>

<body class="panel parent">
    <?php include('views/panel/includes/admin-header.php'); ?>


    <?php //-------------Titulo Seccion
	?>
    <div class="fila halfmargen">
        <div class="cols">
            <div class="col col_1 titulo_seccion">
                <h1><?php echo $txt_titulo; ?></h1>
            </div>
        </div>
    </div>


    <?php //-------------Atrás
	?>
    <div class="fila acciones">
        <div class="cols ">
            <div class="col col_1">
                <a href="panel/trayectoria" class="btn_admin_atras" title="Atrás">Atrás</a>
            </div>
        </div>
    </div>












    <?php //-------------Formulario ?>
    <div class="fila adminpage" id="block-inicio">


        <form class="fila" action="panel/trayectoria/<?php echo $accionSubmit; ?>" method="post" target="_self"
            enctype="multipart/form-data">


            <input name="ID_trayectoria" type="hidden" value="<?php echo $ID_trayectoria; ?>">



            <?php #-----Info general y fotos Slider ?>
            <div class="cols supermargen">
                <?php #-----Info general ?>
                <div class="col col_1_3 smallmargen">



                    <div class="fila">
                        <label>Nombre (*)</label>
                        <input name="nombre" type="text" value="<?php echo $nombre; ?>">
                    </div>



                    <div class="fila">
                        <label>Categoría (*)</label>
                        <select name="categoria">
                            <option value="vivienda" <?php if($categoria == 'vivienda'){echo('selected="selected"');}?>>
                                Vivienda</option>
                            <option value="educativo"
                                <?php if($categoria == 'educativo'){echo('selected="selected"');}?>>
                                Sector educativo</option>
                            <option value="comercial"
                                <?php if($categoria == 'comercial'){echo('selected="selected"');}?>>
                                Comercial e Industrial</option>
                        </select>
                    </div>

                    <div class="fila">
                        <label>Ciudad (*)</label>
                        <input name="ciudad" type="text" value="<?php echo $ciudad; ?>">
                    </div>



                    <div class="fila">
                        <label>Año (*)</label>
                        <input name="fecha" type="number" value="<?php echo $fecha; ?>">
                    </div>

                    <div class="fila">
                        <label>Area</label>
                        <input name="area" type="text" value="<?php echo $area; ?>">
                    </div>
                </div>




                <div class="col col_2_3">
                    <div class="fila">
                        <label>Descripción</label>
                        <textarea name="descripcion"><?php echo $descripcion; ?></textarea>
                    </div>

                    <label>Foto (Peso Max. <?php echo PESO_MAXIMO_TEXT ?>)</label>
                    <?php if ($grande != '') { ?>
                    <img src="datas/<?php echo $grande; ?>">
                    <?php } ?>
                    <input name="fotoTrayectoria" type="file">
                    <input name="fotoTrayectoria_anterior" type="hidden" value="<?php echo $grande; ?>">
                    <input name="miniTrayectoria_anterior" type="hidden" value="<?php echo $mini; ?>">


                </div>



            </div>



























            <?php #-----Información complementaria (al Editar) ?>
            <?php if ($task == 'edit') { ?>



            <?php //-------------FOTOS ?>
            <a id="block-fotos" class="admin_ancla"></a>
            <div class="fila galeria halfmargen">
                <div class="cols">
                    <hr />
                    <div class="col col_1">
                        <div class="titulo_seccion">
                            <h1>Fotos</h1>
                        </div>
                    </div>
                    <div class="fila">
                        <div class="fila acciones">
                            <a href="panel/trayectoria_foto/new/<?php echo $ID_trayectoria; ?>" class="btn_admin_anadir"
                                title="Añadir">Añadir</a>
                        </div>
                    </div>
                    <ul>
                        <?php foreach ($trayectoriaFotos as $key => $value) { ?>
                        <li style="background-image:url(datas/<?php echo $value['mini'] ?>)">
                            <div class="item_actions">
                                <?php if ($value['caption'] != '') { ?>
                                <p><?php echo $value['caption'] ?></p>
                                <?php } ?>
                                <a href="panel/trayectoria_foto/edit/<?php echo $value['ID_trayectoria']; ?>/<?php echo $value['ID_foto']; ?>"
                                    class="btn_admin_editar" title="Editar">Cambiar texto</a>
                                <a href="panel/trayectoria_foto_remove/<?php echo $value['ID_trayectoria']; ?>/<?php echo $value['ID_foto']; ?>"
                                    class="btn_admin_eliminar item_remove"
                                    data-alerta="Si confirma esta foto se eliminará." title="Eliminar">Eliminar</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>




            <?php } ?>








            <?php #---------------Boton ?>

            <div class="fila">
                <input type="submit" value="<?php echo $txt_btn_form; ?>" class="boton_formulario">
            </div>


    </div>

    </form>
    </div>




</body>






























<?php #--------------- Footer ?>
<?php include('views/panel/includes/admin-footer.php'); ?>





<?php #--------------- Resaltar campos requeridos en formulario NEW y EDIT  ?>
<?php if ($task == 'new' || $task == 'edit') { ?>
<script>
$(document).ready(function() {
    var resaltar = [
        'input[name="nombre"]',
        'input[name="fecha"]',
        'select[name="categoria"]',
        'input[name="ciudad"]',
        // 'input[name="codigoVideoPrincipalObra"]',
        'input[name="fotoTrayectoria"]'

    ].join(',');
    $(resaltar).addClass('requerido');
});
</script>
<?php } ?>





</body>

</html>