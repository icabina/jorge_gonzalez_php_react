<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
</head>

<body class="panel">
    <?php include('views/panel/includes/admin-header.php'); ?>


    <?php //-------------Titulo Destacados?>
    <div class="fila mediamargen">
        <div class="cols">
            <div class="col col_1 titulo_seccion">
                <h1><strong>Bienvenid@</strong><br>¿Qué quieres administrar?</h1>
            </div>
        </div>
    </div>


    <?php //-------------Destacados Inicio?>
    <div class="fila accesos_destacados altura_minima_3">
        <div class="cols">
            <div class="col col_1">
                <?php include('views/panel/includes/admin-menu.php'); ?>
            </div>
        </div>
    </div>




    <?php #--------------- Footer ?>
    <?php include('views/panel/includes/admin-footer.php'); ?>



</body>

</html>