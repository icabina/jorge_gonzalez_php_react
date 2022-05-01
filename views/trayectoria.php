<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = 'Trayectoria | ' . PAGE_META_TITLE;
  $page_metadescription = 'Comercializamos, arrendamos y administramos propiedades para uso doméstico, comercial e industrial con inmuebles de la más alta calidad';
  include('views/includes/head.php');
  ?>






</head>

<body class="trayectoria">




    <div class="fila header mediamargen"><?php include("views/includes/header.php")?></div>




































    <div class="fila main margen">
        <div class="cols">
            <div class="col col_1">
                <h1>Trayectoria / <strong><?php echo $my_categoria ?></strong></h2>
                    <hr />
            </div>
        </div>
    </div>






    <div class="fila main supermargen">
        <div class="cols wide">
            <?php if($trayectorias != NULL){ ?>
            <?php foreach ($trayectorias as $trayectoria){?>
            <div class="col col_3 card">
                <div class="fila foto" style="background-image: url(datas/<?php echo $trayectoria['mini'];?>)">
                    <a href="trayectoria_detalle/<?php echo $trayectoria['ID_trayectoria'];?>" target="_self"></a>
                </div>
                <div class="fila texto">
                    <h2><?php echo $trayectoria['nombre'];?><br />
                        <span><?php echo $trayectoria['ciudad'];?>, <?php echo $trayectoria['fecha'];?></span>
                    </h2>
                    <?php if($trayectoria['area'] != ''){?>
                    <p>Área Total Construda: <?php echo $trayectoria['area'];?> m2</p> <?php } ?>
                    <?php if($trayectoria['descripcion'] != ''){ ?>
                    <p><?php echo $trayectoria['descripcion'] ?></p>
                    <?php } ?>
                </div>
            </div>

            <?php } ?>
            <?php } else{
                echo ("<p class='centro'>No se encontraron proyectos en esta categoría</p>");
            }?>
        </div>
    </div>























    <?php include("views/includes/footer.php")?>












</body>

</html>