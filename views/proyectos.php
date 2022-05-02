<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = 'Proyectos | ' . PAGE_META_TITLE;
  $page_metadescription = 'Desarrollamos y construimos proyectos de vivienda, hotelería, comercio e industria';
  include('views/includes/head.php');
  ?>






</head>

<body class="all_proyectos <?php echo $clase ?>">




    <div class="fila header mediamargen"><?php include("views/includes/header.php")?></div>





    <div class="fila banner">
        <div class="cols">
            <div class="col col_1">
                <h1>Proyectos <?php echo $category ?></h1>
            </div>
        </div>
    </div>





    <?php if($proyectos != NULL){ ?>
    <div class="fila main supermargen">
        <div class="cols">
            <?php foreach ($proyectos as $proyecto){?>
            <div class="col col_2 project">
                <div class="foto" style="background-image: url(datas/<?php echo $proyecto['mini'] ?>)">
                    <a href="proyecto/<?php echo $proyecto['ID_proyecto'] ?>" target="_self"></a>
                </div>
                <h3><?php echo $proyecto['nombre'] ?></h3>
                <h4><?php echo $proyecto['ciudad'] ?></h4>
                <a href="proyecto/<?php echo $proyecto['ID_proyecto'] ?>" target="_self" class="btn">ver</a>
                <p>
                    <?php echo $proyecto['descripcion'] ?> </p>

            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>



















    <?php include("views/includes/footer.php")?>












</body>

</html>