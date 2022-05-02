<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = $proyecto['nombre'].' | ' . PAGE_META_TITLE;
  $page_metadescription = 'Comercializamos, arrendamos y administramos propiedades para uso doméstico, comercial e industrial con inmuebles de la más alta calidad';
  include('views/includes/head.php');
  ?>






</head>

<body class="proyecto">




    <div class="fila header"><?php include("views/includes/header.php")?></div>



    <div class="fila banner">
        <div class="fila blur" style="background-image:url(datas/<?php echo $proyecto['foto_banner']?>)">></div>
        <div class="cols">
            <div class="col col_1">
                <h1><?php echo $proyecto['nombre']?>
                    <span><?php echo $proyecto['ciudad']?></span>
                </h1>
            </div>
        </div>
    </div>


    <div class="fila main goodmargen">
        <div class="cols">
            <div class="col col_1_4">

                <a onclick="history.back()" target="_self" class="atras">atrás</a>

                <h2><?php echo $proyecto['nombre']?></h2>
                <h3><?php echo $proyecto['ciudad']?></h3>
                <p><?php echo $proyecto['direccion']?><br /><br />
                    <?php echo $proyecto['descripcion']?></p>

                <hr />

                <p class="halfmargen"><span>Area construida:</span> <?php echo $proyecto['area']?></p>
                <p class="halfmargen"><span>Inicio de obra:</span> <?php echo $proyecto['obra_inicio']?></p>
                <p class="halfmargen"><span>Fin de obra:</span> <?php echo $proyecto['obra_fin']?></p>
                <p class="marginless"><span>Contratante:</span> </p>
                <div class="halfmargen"><?php echo $proyecto['contratante']?></div>


                <?php if($proyecto['web'] != ''){?>
                <a href="<?php echo $proyecto['web']?>" target="_self" class="web">web del proyecto</a>
                <?php } ?>
            </div>

            <div class="col col_3_4">
                <p class="nanomargen"><img src="views/images/ico_lupa.svg"></p>

                <div class="fila"><a href="datas/<?php echo $proyecto['grande']?>" class="lupa" rel="shadowbox[Lupa]">
                        <img src="datas/<?php echo $proyecto['grande']?>" alt="<?php echo $proyecto['nombre']?>">
                    </a> </div>

            </div>
        </div>
    </div>




    <div class="fila main margen">
        <div class="cols">
            <div class="col col_1_4"></div>

            <div class="col col_3_4">

                <!-- =============================================== -->
                <!-- Galeria -->


                <?php if($proyectoFotos != NULL){?>


                <p class="lupa" rel="shadowbox[Lupa]"><img src="views/images/ico_lupa.svg"></p>

                <ul class="galeria cols">
                    <?php foreach($proyectoFotos as $item){?>
                    <li class="col col_8">
                        <a href="datas/<?php echo $item['foto_grande']?>" target="_self"
                            style="background-image: url(datas/<?php echo $item['foto_mini']?>)"
                            rel="shadowbox[Galeria]" title="<?php echo $item['caption']?>"></a>
                        <!--  <p><?php //echo $item['caption']?></p> -->
                    </li>
                    <?php }?>
                </ul>

                <?php }?>
                <!-- =============================================== -->


            </div>
        </div>
    </div>







    <?php include("views/includes/footer.php")?>



    <link rel="stylesheet" href="views/js/shadowbox/shadowbox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="views/js/shadowbox/shadowbox.js"></script>
    <script type="text/javascript">
    Shadowbox.init({
        handleOversize: "resize",
        overlayOpacity: 0.90,
        showOverlay: true,
        displayNav: true,
        initialHeight: 100,
        initialWidth: 100,
        slideshowDelay: 0,
        continuous: false,
        modal: false,
        players: ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
    });
    </script>



    <!-- <script>
    const waptel = document.getElementById("wap");

    waptel.href =
        "https://wa.me/573182513388?text=Estaba%20navegando%20por%20la%20web%20de%20IV3%20y%20me %20gustaría%20obtener%20más%20información%20del%20proyecto%20 <?php //echo $proyecto['nombre']?>";
    </script> -->




</body>

</html>