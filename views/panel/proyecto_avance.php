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
            <div class="col col_1">
                <h1><?php echo $txt_titulo;?></h1>
            </div>
        </div>
    </div>


    <?php //-------------Atrás?>
    <div class="fila">
        <div class="cols acciones">
            <div class="col col_1">

                <a href="panel/proyecto/edit/<?php echo $ID_proyecto; ?>#block-fotos" class="btn_admin_atras"
                    title="Atrás">Atrás</a>
            </div>
        </div>
    </div>


    <?php //-------------Formulario?>
    <div class="fila">
        <div class="cols">
            <div class="col col_1">
                <form action="panel/proyecto_avance/<?php echo $accionSubmit; ?>" method="post" target="_self"
                    enctype="multipart/form-data">

                    <input name="ID_avance" type="hidden" value="<?php echo $ID_avance; ?>">
                    <input name="ID_proyecto" type="hidden" value="<?php echo $ID_proyecto; ?>">









                    <div class="fila">


                        <label>Foto (*) (Peso Max. <?php echo PESO_MAXIMO_TEXT ?>)</label>

                        <?php if($ID_avance != '0'){ ?>
                        <h5 class="nombre_archivo"><?php echo $foto_grande; ?></h5>
                        <img src="datas/<?php echo $foto_grande; ?>" class="notanalta">


                        <input name="foto_grande" type="file">


                        <input name="foto_grande_anterior" type="hidden" value="<?php echo $foto_grande; ?>">
                        <input name="foto_mini_anterior" type="hidden" value="<?php echo $foto_mini; ?>">

                        <hr />
                        <div class="fila margen">

                            <label>Pie de foto (opcional):</label>
                            <input name="caption" value="<?php echo $caption; ?>">

                        </div>

                        <?php } ?>





                        <?php if($ID_avance == '0'){ ?>
                        <div id="zona_campos_dinamicos" class="fila">
                            <div class="fila campos_maestro">
                                <div class="fila grupo_campos">
                                    <div class="fila">
                                        <input name="foto_grande[]" type="file" size="70" />
                                    </div>
                                    <div class="fila">
                                        <label>Pie de foto (opcional):</label>
                                        <input name="caption[]" type="text" />
                                    </div>
                                    <hr />
                                </div>
                            </div>
                        </div>
                        <a id="AnadirCampos" href="#">Añadir otra foto</a>
                        <?php } ?>
                    </div>











                    <div class="fila supermargen boton">
                        <input type="submit" value="<?php echo $txt_btn_form;?>" class="boton_formulario">

                    </div>




                </form>
            </div>




        </div>
    </div>



    <?php #--------------- Footer ?>

    <?php include('views/panel/includes/admin-footer.php'); ?>






    <?php #--------------- Resaltar campos requeridos en formulario NEW y EDIT ?>
    <?php if($task == 'new' || $task == 'edit'){?>
    <script>
    $(document).ready(function() {
        var resaltar = [
            /*'select[name="ID_sede"]',
            'select[name="ID_tipo_inmueble"]',
            'input[name="numero"]',*/
        ].join(',');
        $(resaltar).addClass('requerido');
    });
    </script>
    <?php }?>





</body>

</html>