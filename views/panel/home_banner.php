<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
</head>

<body class="panel parent">
    <?php include('views/panel/includes/admin-header.php'); ?>


    <?php //-------------Titulo Seccion?>
    <div class="fila">
        <div class="cols">
            <div class="col col_1 titulo_seccion">
                <h1><?php echo $txt_titulo;?></h1>
            </div>
        </div>
    </div>


    <?php //-------------Atrás?>
    <div class="fila acciones">
        <div class="cols">
            <div class="col col_1">
                <a href="panel/banners" class="btn_admin_atras" title="Atrás">Atrás</a>
            </div>
        </div>
    </div>


    <?php //-------------Formulario?>
    <div class="fila adminpage" id="block-inicio">
        <div class="cols">
            <div class="col col_1">
                <form action="panel/home_banner/<?php echo $accionSubmit; ?>" method="post" target="_self"
                    enctype="multipart/form-data">

                    <input name="ID_banner" type="hidden" value="<?php echo $ID_banner; ?>">





                    <div class="fila">
                        <div class="cols">





                            <div class="col col_1_3">
                                <div class="fila">
                                    <label>Nombre(*)</label>
                                    <input name="nombre" type="text" value="<?php echo $nombre; ?>">
                                </div>

                                <div class="fila">
                                    <label>Descripción</label>
                                    <input name="descripcion" type="text" value="<?php echo $descripcion; ?>">
                                </div>




                                <div class="fila">
                                    <label>Vínculo</label>
                                    <input name="link" type="text" value="<?php echo $link; ?>">
                                </div>




                                <div class="fila">
                                    <label>Abre en ventana nueva?</label>
                                    <select name="target">
                                        <option value="_self"
                                            <?php if($target == '_self'){echo('selected="selected"');}?>>Abrir en la
                                            misma ventana.</option>
                                        <option value="_blank"
                                            <?php if($target == '_blank'){echo('selected="selected"');}?>>Abrir en
                                            ventana nueva.</option>
                                    </select>
                                </div>



                                <div class="fila">
                                    <label>Orden</label>
                                    <input name="orden" type="text" value="<?php echo $orden; ?>">
                                </div>


                                <div class="fila to_left margen">

                                    <label class="auto">Activo: </label>
                                    <input name="activo" type="checkbox" value="1"
                                        <?php if($activo == '1'){echo('checked="checked"');}?>>

                                </div>
                            </div>


                            <div class="col col_2_3 pad_left">
                                <div class="fila margen">
                                    <label>Banner(*) (Peso Max. <?php echo PESO_MAXIMO_TEXT ?>)</label>
                                    <?php if($ID_banner != '0'){ ?>
                                    <h5 class="nombre_archivo"><?php echo $banner; ?></h5>
                                    <img src="datas/<?php echo $banner; ?>">
                                    <input name="banner_anterior" type="hidden" value="<?php echo $banner; ?>">
                                    <?php } ?>

                                    <input name="foto" type="file">
                                </div>





                            </div>

                            <?php //-------------?>


                            <div class="row boton">
                                <input type="submit" value="<?php echo $txt_btn_form;?>" class="boton_formulario">

                            </div>




                </form>
            </div>
        </div>



        <?php #--------------- Footer ?>

        <?php include('views/panel/includes/admin-footer.php'); ?>





        <?php #--------------- Resaltar campos requeridos en formulario NEW y EDIT ?>
        <?php if($task == 'new' || $task == 'edit'){?>
        <script>
        $(document).ready(function() {
            var resaltar = [
                'input[name="nombre"]',
                'input[name="foto"]'
            ].join(',');
            $(resaltar).addClass('requerido');
        });
        </script>
        <?php }?>





</body>

</html>