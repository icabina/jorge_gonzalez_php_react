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
                <a href="panel/proyectos" class="btn_admin_atras" title="Atrás">Atrás</a>
            </div>
        </div>
    </div>












    <?php //-------------Formulario ?>
    <div class="fila adminpage" id="block-inicio">


        <form class="fila" action="panel/proyecto/<?php echo $accionSubmit; ?>" method="post" target="_self"
            enctype="multipart/form-data">


            <input name="ID_proyecto" type="hidden" value="<?php echo $ID_proyecto; ?>">



            <?php #-----Info general y fotos Slider ?>
            <div class="cols">
                <?php #-----Info general ?>
                <div class="col col_1_3 mediamargen">

                    <!--  <div class="fila tinymargen">
                        <label>Logo (Peso Max. <?php //echo PESO_MAXIMO_TEXT ?>)</label>
                        <?php //if ($logo != '') { ?>
                        <img src="datas/<?php //echo $logo; ?>">
                        <?php //} ?>
                        <input name="logo" type="file">
                        <input name="logo_anterior" type="hidden" value="<?php //echo $logo; ?>">

                    </div> -->



                    <div class="fila">
                        <label>Nombre (*)</label>
                        <input name="nombre" type="text" value="<?php echo $nombre; ?>">
                    </div>




                    <div class="fila">
                        <label>Categoría</label>
                        <select name="categoria">
                            <option value="ejecutados"
                                <?php if($categoria == 'ejecutados'){echo('selected="selected"');}?>>Ejecutados</option>
                            <option value="curso" <?php if($categoria == 'curso'){echo('selected="selected"');}?>>En
                                curso</option>
                            <option value="preventa" <?php if($categoria == 'preventa'){echo('selected="selected"');}?>>
                                En preventa</option>
                        </select>
                    </div>

                    <div class="fila">
                        <label>Ciudad (*)</label>
                        <input name="ciudad" type="text" value="<?php echo $ciudad; ?>">
                    </div>

                    <div class="fila">
                        <label>Dirección</label>
                        <input name="direccion" type="text" value="<?php echo $direccion; ?>">
                    </div>

                    <div class="fila">
                        <label>Descripción</label>
                        <textarea name="direccion"><?php echo $direccion; ?></textarea>
                    </div>


                    <div class="fila to_left margen">

                        <label class="auto">Destacado: </label>
                        <input name="destacado" type="checkbox" value="1"
                            <?php if($destacado == '1'){echo('checked="checked"');}?>>

                    </div>
                </div>










                <div class="col col_2_3 supermargen">
                    <div class="fila mediamargen">
                        <label>Foto (Peso Max. <?php echo PESO_MAXIMO_TEXT ?>)</label>
                        <?php if ($grande != '') { ?>
                        <img src="datas/<?php echo $grande; ?>">
                        <?php } ?>
                        <input name="grande" type="file">
                        <input name="grande_anterior" type="hidden" value="<?php echo $grande; ?>">
                        <input name="mini_anterior" type="hidden" value="<?php echo $mini; ?>">


                    </div>


                    <div class="fila">
                        <label>Foto Banner (Peso Max. <?php echo PESO_MAXIMO_TEXT ?>)</label>
                        <?php if ($foto_banner != '') { ?>
                        <img src="datas/<?php echo $foto_banner; ?>">
                        <?php } ?>
                        <input name="foto_banner" type="file">
                        <input name="foto_banner_anterior" type="hidden" value="<?php echo $foto_banner; ?>">
                        <?php if ($foto_banner != '') { ?>
                        <div class="item_actions simple">
                            <a href="panel/proyecto_remove_foto_banner/<?php echo $ID_proyecto; ?>/<?php echo $foto_banner; ?>"
                                class="btn_admin_eliminar item_remove"
                                data-alerta="Si confirma esta imagen se eliminará." title="Eliminar">Eliminar esta
                                foto</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>


            <hr />









            <?php if ($task != 'remove') { ?>


            <div class="fila mediamargen">
                <div class="cols">

                    <div class="col col_1_3">
                        <label>Área construida</label>
                        <input name="area" type="text" value="<?php echo $area; ?>">

                        <label>Inicio de obra</label>
                        <input name="obra_inicio" type="text" value="<?php echo $obra_inicio; ?>">

                        <label>Fin de obra</label>
                        <input name="obra_fin" type="text" value="<?php echo $obra_fin; ?>">
                    </div>
                    <div class="col col_2_3">
                        <label>Contratante</label>
                        <textarea name="contratante"><?php echo $contratante; ?></textarea>


                        <label>Web del proyecto</label>
                        <input name="web" type="text" value="<?php echo $web; ?>">


                    </div>
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
                            <a href="panel/proyecto_foto/new/<?php echo $ID_proyecto; ?>" class="btn_admin_anadir"
                                title="Añadir">Añadir</a>
                        </div>
                    </div>
                    <ul>
                        <?php foreach ($proyectoFotos as $key => $value) { ?>
                        <li style="background-image:url(datas/<?php echo $value['foto_mini'] ?>)">
                            <div class="item_actions">
                                <?php if ($value['caption'] != '') { ?>
                                <p><?php echo $value['caption'] ?></p>
                                <?php } ?>
                                <a href="panel/proyecto_foto/edit/<?php echo $value['ID_proyecto']; ?>/<?php echo $value['ID_foto']; ?>"
                                    class="btn_admin_editar" title="Editar">Cambiar texto</a>
                                <a href="panel/proyecto_foto_remove/<?php echo $value['ID_proyecto']; ?>/<?php echo $value['ID_foto']; ?>"
                                    class="btn_admin_eliminar item_remove"
                                    data-alerta="Si confirma esta foto se eliminará." title="Eliminar">Eliminar</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <?php } ?>
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
        // 'input[name="yearObra"]',
        'input[name="categoria"]',
        // 'input[name="estatusObra"]',
        'input[name="ciudad"]',
        // 'input[name="codigoVideoPrincipalObra"]',
        'input[name="grande"]'

    ].join(',');
    $(resaltar).addClass('requerido');
});
</script>
<?php } ?>





</body>

</html>