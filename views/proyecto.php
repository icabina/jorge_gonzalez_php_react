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





    <div class="fila main showcase goodmargen" style="background-image:url(datas/<?php echo $proyecto['grande']?>)">
        <div class="cols">
            <div class="col col_1_4">

                <p class="pads"><img src="datas/<?php echo $proyecto['logo']?>" alt="logo" class="logo" /></p>

                <div class="fila pads formulario">
                    <h2><strong><?php echo $proyecto['tipo']?> en <?php echo $proyecto['ciudad']?></strong></h2>
                    <p><?php echo $proyecto['direccion']?></p>
                    <h3><strong>Desde $<?php echo $proyecto['precio']?></strong></h3>
                    <p class="halfmargen">Áreas <?php echo $proyecto['area']?></p>
                    <hr />
                    <h2 class="tinymargen"><strong>Te llamamos</strong></h2>
                    <form class="main">
                        <input type="text" id="fant">
                        <input type="text" name="accept" id="accept">
                        <input type="hidden" name="proyecto" value="<?php echo $proyecto['nombre']?>">
                        <input type="text" name="nombre" placeholder="Nombre">
                        <input type="text" name="apellido" placeholder="Apellido">
                        <input type="text" name="email" placeholder="Email">
                        <input type="text" name="telefono" placeholder="Teléfono">

                        <div class="aviso_privacidad">
                            <input id="privacidad_check" name="privacidad_check" type="checkbox" value="1" />
                            <p class="etiqueta">Acepto la <a href="#" target="_blank">Política de Privacidad</a> de IV3
                                Arquitectura</p>
                        </div>
                        <div class="fila centro">
                            <input name="boton" type="submit" class="btn bold" value="enviar" disabled='disabled' />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="fila main margen">
        <div class="cols wide">

            <div class="col col_1_5">
                <!-- =============================================== -->
                <ul class="tabs">
                    <li><a href="#" target="_self">Presentación</a></li>
                    <?php if( $proyecto['ubicacion_htm'] != '' || $proyecto['googlemaps'] != '' || $proyecto['waze'] != ''){?>
                    <li><a href="#" target="_self">Ubicación</a></li>
                    <?php } ?>
                    <?php if($proyectoVideos != NULL){?>
                    <li><a href="#" target="_self">Videos</a></li>
                    <?php } ?>
                    <?php if($proyectoFotos != NULL){?>
                    <li><a href="#" target="_self">Galería</a></li>
                    <?php } ?>
                    <?php if($proyectoRecorridos != NULL){?>
                    <li><a href="#" target="_self">Recorrido virtual</a></li>
                    <?php } ?>
                    <?php if($proyectoPlanos != NULL){?>
                    <li><a href="#" target="_self">Areas y planos</a></li>
                    <?php } ?>
                    <?php if($proyectoAvances != NULL){?>
                    <li><a href="#" target="_self">Avances de Obra</a></li>
                    <?php } ?>
                    <li><a href="#" target="_self">Contacto</a></li>
                </ul>
                <!-- =============================================== -->
            </div>
            <div class="col col_4_5">
                <!-- =============================================== -->
                <div class="fila tab_content">
                    <h1><strong>Presentación</strong></h1>
                    <hr class="smallmargen" />

                    <?php if($proyecto['foto_presentacion'] != ''){?>
                    <p><img src="datas/<?php echo $proyecto['foto_presentacion']?>"
                            alt="<?php echo $proyecto['nombre']?>" /></p>
                    <?php } ?>

                    <div class="fila mediamargen"><?php echo $proyecto['presentacion_htm']?></div>



                    <div class="fila inline goodmargen">
                        <?php if($proyecto['brochure'] != ''){?>
                        <a href="datas/<?php echo $proyecto['brochure']?>" target="_blank"
                            class="btn descarga"><strong>descargar</strong> brochure</a>
                        <?php } ?>
                        <?php if($proyecto['especificaciones'] != ''){?>
                        <a href="datas/<?php echo $proyecto['especificaciones']?>" target="_blank"
                            class="btn descarga"><strong>descargar</strong>
                            especificaciones</a>
                        <?php } ?>
                    </div>

                    <?php if( $proyecto['urbanismo_htm'] != ''){?>
                    <h3><strong>Urbanismo / Zonas Comunes</strong></h3>
                    <hr />
                    <div class="fila mediamargen"><?php echo $proyecto['urbanismo_htm']?></div>
                    <?php } ?>


                </div>
                <!-- =============================================== -->
                <?php if($proyecto['ubicacion_htm'] != ''|| $proyecto['googlemaps'] != '' || $proyecto['waze'] != '' || $proyecto['foto_ubicacion'] != ''){?>
                <div class="fila tab_content">
                    <h2><strong>Ubicación estratégica</strong></h2>
                    <hr class="smallmargen" />
                    <div class="fila inline mediamargen">

                        <?php if($proyecto['waze'] != ''){?>
                        <a href="<?php echo $proyecto['waze']?>" target="_blank" class="btn waze">llega con
                            <strong>waze</strong></a>
                        <?php } ?>

                        <?php if($proyecto['googlemaps'] != ''){?>
                        <a href="<?php echo $proyecto['googlemaps']?>" target="_blank" class="btn mapa">ver en
                            <strong>Googlemaps</strong></a>
                        <?php } ?>
                    </div>
                    <?php if($proyecto['foto_ubicacion'] != ''){?>
                    <p><img src="datas/<?php echo $proyecto['foto_ubicacion']?>"
                            alt="<?php echo $proyecto['nombre']?>" /></p>
                    <?php } ?>
                </div>
                <?php } ?>
                <!-- =============================================== -->


                <?php if($proyectoVideos != NULL){?>
                <div class="fila tab_content">

                    <h2><strong>Videos</strong></h2>
                    <hr class="smallmargen" />
                    <?php foreach($proyectoVideos as $item){?>
                    <div class="contiene_video margen">
                        <p>
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/<?php echo $item['video']?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </p>
                    </div>
                    <?php }?>
                </div>
                <?php }?>
                <!-- =============================================== -->
                <!-- Galeria -->

                <?php if($proyectoFotos != NULL){?>
                <div class="fila tab_content">

                    <h2><strong>Galería</strong></h2>
                    <hr class="smallmargen" />

                    <ul class="galeria cols">
                        <?php foreach($proyectoFotos as $item){?>
                        <li class="col col_3">
                            <a href="datas/<?php echo $item['foto_grande']?>" target="_self"
                                style="background-image: url(datas/<?php echo $item['foto_mini']?>)"
                                rel="shadowbox[Galeria]" title="<?php echo $item['caption']?>"></a>
                            <p><?php echo $item['caption']?></p>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>
                <!-- =============================================== -->
                <!-- Recorridos -->

                <?php if($proyectoRecorridos != NULL){?>
                <div class="fila tab_content">

                    <h2><strong>Recorridos virtuales</strong></h2>
                    <hr class="smallmargen" />


                    <div class="cols margen">
                        <?php foreach($proyectoRecorridos as $item){?>
                        <div class="col col_2">
                            <div class="fila recorrido"
                                style="background-image: url(datas/<?php echo $proyecto['grande']?>)">
                                <a href="<?php echo $item['recorrido_link']?>" target="_blank">
                                    <h3><strong><?php echo $item['recorrido_nombre']?></strong></h3>
                                </a>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php }?>
                <!-- =============================================== -->
                <!-- Planos -->
                <?php if($proyectoPlanos != NULL){?>
                <div class="fila tab_content">

                    <h2><strong>Areas y Planos</strong></h2>
                    <hr class="smallmargen" />


                    <div class="cols margen">
                        <?php foreach($proyectoPlanos as $item){?>
                        <div class="col col_2">
                            <div class="fila plano">
                                <h4><strong><?php echo $item['nombre']?></strong>
                                    <span><?php echo $item['precio']?></span>
                                </h4>
                                <a href="datas/<?php echo $item['grande_planta']?>" target="_self"
                                    rel="shadowbox[Planta]" title="<?php echo $item['nombre']?>, 
                                    <?php echo $item['area']?>">

                                    <img src="datas/<?php echo $item['mini_planta']?>"
                                        alt="<?php echo $item['nombre']?>">
                                </a>
                                <?php if( $item['area'] != '' || $item['balcon'] != '' || $item['privada'] != '' ){?>
                                <div class="cols">
                                    <div class="col col_3">
                                        <?php if( $item['area'] != '' ){?>
                                        <h5><strong>Área:</strong> <?php echo $item['area']?></h5>
                                        <?php } ?>
                                    </div>
                                    <div class="col col_3">
                                        <?php if( $item['balcon'] != '' ){?>
                                        <h5><strong>Balcón:</strong> <?php echo $item['balcon']?></h5>
                                        <?php } ?>
                                    </div>

                                    <div class="col col_3">
                                        <?php if( $item['privada'] != '' ){?>
                                        <h5><strong>Privada:</strong> <?php echo $item['privada']?></h5>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if( $item['alcobas'] != 0 && $item['banos'] != 0 && $item['duchas'] != 0 ){?>
                                <div class="cols">
                                    <div class="col col_3">
                                        <?php if( $item['alcobas'] != 0){?>
                                        <h5><img src="views/images/ico_bedroom.svg"><span><?php echo $item['alcobas']?>
                                                alcoba(s)</span></h5>
                                        <?php } ?>
                                    </div>
                                    <div class="col col_3">
                                        <?php if( $item['banos'] != 0 ){?>
                                        <h5><img src="views/images/ico_sanitario.svg"><span><?php echo $item['banos']?>
                                                baño(s)</span></h5> <?php } ?>
                                    </div>
                                    <div class="col col_3">
                                        <?php if( $item['duchas'] != 0 ){?>
                                        <h5><img src="views/images/ico_ducha.svg"><span><?php echo $item['duchas']?>
                                                ducha(s)</span></h5>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php }?>
                <!-- =============================================== -->
                <!-- Avances -->
                <?php if($proyectoAvances != NULL){?>
                <div class="fila tab_content">

                    <h2><strong>Avances de obra</strong></h2>
                    <hr class="smallmargen" />

                    <p class="marginless"><img src="datas//<?php echo $proyectoAvances[0]['grande']?>" alt="ejemplo"
                            class="full"></p>
                    <p class="margen">Caption final</p>
                    <ul class="cols galeria avances">
                        <?php foreach($proyectoAvances as $itemAvance){?>
                        <li class="col col_4">
                            <a href="datas/<?php echo $itemAvance['grande']?>" target="_self"
                                style="background-image: url(datas/<?php echo $itemAvance['mini']?>)"
                                rel="shadowbox[Galeria]" title="<?php echo $itemAvance['caption']?>"></a>
                            <p><?php echo $itemAvance['caption']?></p>
                        </li>

                        <?php }?>
                    </ul>
                </div>
                <?php }?>
                <!-- =============================================== -->

                <!-- Contacto -->
                <div class="fila tab_content contacto">

                    <h2><strong>Contacto</strong></h2>
                    <hr class="smallmargen" />
                    <div class="cols goodmargen">
                        <div class="col foto">
                            <?php if($proyecto['contacto_foto'] !='') { ?>
                            <div class="fila"
                                style="background-image:url(datas/<?php echo $proyecto['contacto_foto']?>)">

                            </div>
                            <?php }else {?>
                            <div class="fila" style="background-image:url(datas/<?php echo $proyecto['grande']?>)">

                            </div>
                            <?php } ?>
                        </div>
                        <div class="col texto">
                            <div class="fila tinymargen">
                                <?php echo $proyecto['contacto_msg']?>

                            </div>

                            <a href="https://api.whatsapp.com/send?phone=<?php  echo WAPP ?>" target="_blank" id="wap">

                            </a>
                            <?php if( $proyecto['contacto_wap'] != ''){?>
                            <p><a href="https://api.whatsapp.com/send?phone=<?php echo $proyecto['contacto_wap'] ?>"
                                    target="_blank" class="wap"><?php echo $proyecto['contacto_wap']?></a></p>
                            <?php } ?>


                            <?php if( $proyecto['contacto_tel'] != ''){?>
                            <p><a href="tel:<?php echo $proyecto['contacto_tel']?>" target="_self"
                                    class="tel"><?php echo $proyecto['contacto_tel']?></a></p>
                            <?php } ?>


                            <?php if( $proyecto['contacto_ventas'] != ''){?>
                            <div class="pointer mediamargen">
                                <?php echo $proyecto['contacto_ventas']?>
                            </div>
                            <?php } ?>
                            <a href="#" target="_self" class="btn" id="dejanos_datos">
                                <strong>Déjanos tus datos</strong> y te contactamos
                            </a>
                        </div>
                    </div>

                </div>
                <!-- =============================================== -->
                <div class="fila nota">
                    <p>Las imagenes presentadas en esta cartilla son representaciones artísticas y junto con los
                        inmuebles exhibidos pueden variar en la percepción y construcción final por recomendaciones
                        técnicas, por orden de curaduría o alcaldía competente a la expedición de la licencia de
                        construcción, entre otros factores que razonablemente pueden generar variaciones en las áreas
                        privadas construidas. Las áreas privadas libres quedarán finalmente determinadas en los
                        contratos suscritos entre las partes.</p>
                </div>
            </div>
        </div>
    </div>




    <a onclick="history.back()" target="_self" class="atras"></a>



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



    <script>
    const waptel = document.getElementById("wap");

    waptel.href =
        "https://wa.me/573182513388?text=Estaba%20navegando%20por%20la%20web%20de%20IV3%20y%20me %20gustaría%20obtener%20más%20información%20del%20proyecto%20 <?php echo $proyecto['nombre']?>";
    </script>




</body>

</html>