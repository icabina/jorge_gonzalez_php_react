<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = $trayectoria['nombre'].' | ' . PAGE_META_TITLE;
  $page_metadescription = 'Comercializamos, arrendamos y administramos propiedades para uso doméstico, comercial e industrial con inmuebles de la más alta calidad';
  include('views/includes/head.php');
  ?>






</head>

<body class="trayectoria_detalle">




    <div class="fila header mediamargen"><?php include("views/includes/header.php")?></div>




































    <div class="fila main minimargen">
        <div class="cols">
            <div class="col col_1">
                <h1><strong><?php echo $trayectoria['nombre']?></strong></h2>
                    <hr />
                    <h6><?php echo $trayectoria['ciudad']?>, <?php echo $trayectoria['fecha']?></h6>
                    <p>Área Total Construda: <?php echo $trayectoria['area']?> m2<br />
                        <?php echo $trayectoria['descripcion']?></p>

            </div>
        </div>
    </div>







    <div class="fila main supermargen">
        <div class="cols smallmargen">
            <div class="col col_1">
                <p><img src="datas/<?php echo $trayectoria['grande']?>" alt="<?php echo $trayectoria['nombre']?>"></p>
            </div>
        </div>
        <div class="cols wide">
            <div class="col col_1">

                <?php if($trayectoriaFotos != NULL){?>
                <ul class="cols galeria">
                    <?php foreach($trayectoriaFotos as $item){?>
                    <li class="col col_4">
                        <a href="datas/<?php echo $item['grande']?>" target="_self"
                            style="background-image: url(datas/<?php echo $item['mini']?>)"
                            rel="shadowbox[Galeria]"></a>
                        <p><?php echo $item['caption']?></p>
                    </li>

                    <?php } ?>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>















    <a onClick="history.go(-1)" target="_self" class="atras"></a>








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




</body>

</html>