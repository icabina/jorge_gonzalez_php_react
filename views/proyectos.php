<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = 'Proyectos | ' . PAGE_META_TITLE;
  $page_metadescription = 'Comercializamos, arrendamos y administramos propiedades para uso doméstico, comercial e industrial con inmuebles de la más alta calidad';
  include('views/includes/head.php');
  ?>






</head>

<body class="all_proyectos">




    <div class="fila header mediamargen"><?php include("views/includes/header.php")?></div>




































    <div class="fila main margen">
        <div class="cols">
            <div class="col col_1">
                <h1>Proyectos <strong>En Venta</strong></h2>
                    <hr />
            </div>
        </div>
    </div>





    <?php if($proyectos != NULL){ ?>
    <?php foreach ($proyectos as $proyecto){?>


    <div class="fila main supermargen">
        <div class="cols flx tall">

            <div class="col col_3_4 flx padless desk">
                <div class="bg" style="background-image:url(datas/<?php echo $proyecto['grande'];?>)"><a
                        href="proyecto/<?php echo $proyecto['ID_proyecto'];?>" target="_self"></a>
                </div>


            </div>
            <div class="col col_1_4 flx">
                <p class="rspnsv mediamargen"><a href="proyecto/<?php echo $proyecto['ID_proyecto'];?>"
                        target="_self"><img src="datas/<?php echo $proyecto['mini'];?>"
                            alt="<?php echo $proyecto['nombre'];?>" class="full" /></a>
                </p>
                <section>

                    <p class="mediamargen"><a href="proyecto/<?php echo $proyecto['ID_proyecto'];?>"
                            target="_self"><?php if($proyecto['logo'] != ''){?><img
                                src="datas/<?php echo $proyecto['logo'];?>" alt="<?php echo $proyecto['nombre'];?>"
                                class="logo" /><?php }  ?></a>
                    </p>

                    <h2><strong><?php echo $proyecto['tipo'];?> en <?php echo $proyecto['ciudad'];?></strong></h2>
                    <p><?php echo $proyecto['direccion'];?></p>
                    <h3><strong>Desde $<?php echo $proyecto['precio'];?></strong></h3>
                    <p>Áreas<br />
                        <?php echo $proyecto['area'];?></p>
                </section>
            </div>
        </div>
    </div>



    <?php } ?>
    <?php } ?>



















    <?php include("views/includes/footer.php")?>












</body>

</html>