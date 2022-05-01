<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
</head>

<body class="panel">
    <?php include('views/panel/includes/admin-header.php'); ?>



    <?php //-------------Titulo Destacados?>
    <div class="fila halfmargen">
        <div class="cols">

            <div class="col col_1 titulo_seccion">
                <h1><strong>¡Error!</strong></h1>
            </div>
        </div>
    </div>


    <?php //-------------Mensaje?>
    <div class="fila">
        <div class="cols">
            <div class="col col_1">
                <p class="alerta error"><?php echo $msg_error; ?></p>
            </div>
        </div>
    </div>


    <?php //-------------Acciones?>
    <div class="fila acciones">
        <div class="cols ">
            <div class="col col_1">

                <a href="#" onclick="window.history.go(-1); return false;" class="btn_admin_atras"
                    title="Atrás">Atrás</a>

            </div>
        </div>
    </div>



    <?php #--------------- Footer ?>
    <?php include('views/panel/includes/admin-footer.php'); ?>




    <?php #--------------- jQuery plugin: Fancy Table ?>
    <?php include('views/panel/includes/fancyTable-config.php'); ?>



</body>

</html>