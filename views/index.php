<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = 'Home | ' . PAGE_META_TITLE;
  $page_metadescription = 'Desarrollamos y construimos proyectos de vivienda, hotelería, comercio e industria';
  include('views/includes/head.php');
  ?>





</head>

<body class="clear home">
    <?php include("views/includes/header.php")?>


    <div class="section superbanner">

        <ul class="slider">


            <?php foreach ($banners as $banner) { ?>

            <li class="fila" style="background-image: url(datas/<?php echo $banner['banner'] ?>)">
                <div class="cols wide">
                    <div class="col col_1">
                        <div class="cajon">
                            <h3><?php echo $banner['nombre'] ?></h3>
                            <?php if($banner['descripcion'] !=''){ ?><h4><?php echo $banner['descripcion'] ?></h4>
                            <?php } ?>
                            <?php if($banner['link'] !='') {?>
                            <a href="<?php echo $banner['link'] ?>" target="<?php echo $banner['target'] ?>"
                                class="btn"><span>ver</span></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </li>
            <?php } ?>
        </ul>


    </div>




















    <div class="fila main greatmargen">
        <div class="cols flx max">
            <div class="col col_2 flx right">
                <img src="views/images/home_1.jpg" alt="" class="full rspnsv halfmargen" />
                <section>

                    <h1>Desarrollamos y construimos proyectos de vivienda, hotelería, comercio e industria
                    </h1>

                    <p>Hacemos realidad los proyectos de nuestros clientes buscando los más altos estándares de calidad
                        y cumplimiento en cuanto a tiempo de ejecución y dentro de los costos previstos.</p>



                    <a href="#" class="btn" target="_self">más</a>


                </section>
            </div>
            <div class="col col_2 flx left desk">
                <!--  <div class="bg" style="background-image:url(views/images/home_1.jpg)"></div> -->

                <img src="views/images/home_1.jpg" alt="Jorge Gonzalez Ingeniería Medellín Colombia">
            </div>
        </div>
    </div>











    <div class="fila main supermargen">
        <div class="cols">
            <div class="col col_1">
                <h2 class="title goodmargen">Últimos proyectos ejecutados</h2>
            </div>

            <div class="cols margen" id="destacados">

            </div>

            <div class="fila">
                <a href="proyectos/ejecutados" target="_self" class="btn clear">ver todos</a>
            </div>
        </div>
    </div>


    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <!--   Load Babel -->
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <!-- Load our React component. -->
    <script type="text/babel" src="controllers/DestacadosC.jsx">
    </script>










    <?php include("views/includes/footer.php")?>










    <link rel="stylesheet" href="views/js/bxslider/bxslider-4-4.2.12/dist/jquery.bxslider.min.css">
    <script src="views/js/bxslider/bxslider-4-4.2.12/dist/jquery.bxslider.min.js"></script>

    <script>
    $(document).ready(function() {

        $('.slider').bxSlider({
            auto: true,
            pause: 8500,
            autoHover: false,
            pager: false,
            controls: true,
            //mode: 'vertical',
            mode: 'fade',
            nextText: 'SIGUIENTE',
            prevText: 'ANTERIOR',
            adaptiveHeight: true,
            touchEnabled: false
        });
    });
    </script>



</body>

</html>