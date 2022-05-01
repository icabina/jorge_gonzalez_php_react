<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = 'Mensaje Enviado | ' . PAGE_META_TITLE;
  $page_metadescription = 'Comercializamos, arrendamos y administramos propiedades para uso doméstico, comercial e industrial con inmuebles de la más alta calidad';
  include('views/includes/head.php');
  ?>






</head>

<body>




    <div class="fila header mediamargen"><?php include("views/includes/header.php")?></div>






    <div class="fila main margen">
        <div class="cols">
            <div class="col col_1">
                <h1><strong>¡Tu mensaje fue enviado!</strong></h2>
                    <hr />
            </div>
        </div>
    </div>




    <div class="fila main supermargen">
        <div class="cols">
            <div class="col col_1 centro">
                <p><img src="views/images/ico_mensaje_enviado.svg"></p>
                <h3>Te estaremos contactando pronto.<br />
                    <strong>Gracias por escribirnos.</strong>
                </h3>
            </div>
        </div>
    </div>





    <?php include("views/includes/footer.php")?>




</body>

</html>