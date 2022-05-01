<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = 'Contacto | ' . PAGE_META_TITLE;
  $page_metadescription = 'Comercializamos, arrendamos y administramos propiedades para uso doméstico, comercial e industrial con inmuebles de la más alta calidad';
  include('views/includes/head.php');
  ?>






</head>

<body class="contact">




    <div class="fila header mediamargen"><?php include("views/includes/header.php")?></div>






    <div class="fila main trimargen">
        <div class="cols">
            <div class="col col_1">
                <h1><strong>Contacto</strong></h2>
                    <hr />
            </div>
        </div>
    </div>




    <div class="fila main supermargen formulario">
        <div class="cols narrow">
            <div class="col col_1 centro">

                <div class="inline tinymargen">
                    <a target="blank" href="https://api.whatsapp.com/send?phone=573182513388" class="wap">
                        <span>+57 318 251 3388</span></a>
                    <a href="tel:+57 (601) 927 9304" class="tel"><span>+57 (601) 927 9304</span></a>
                </div>

                <p class="mediamargen">Cra. 78 # 11- C21 / Bogotá, Colombia</p>

                <hr class="smallmargen" />



                <form action="envia-contacto" method="post" target="_self">

                    <input id="fant" type="text" name="fant" autocomplete="no-complete" value="">
                    <input id="fant2" type="text" name="fant2" autocomplete="no-complete" value="">

                    <div class="cols">
                        <div class="col col_2">

                            <input type="text" name="nombre" placeholder="Tu nombre(*)" autocomplete="no-complete"
                                value="">
                        </div>
                        <div class="col col_2">

                            <input type="text" name="apellido" placeholder="Tu apellido(*)" autocomplete="no-complete"
                                value="">
                        </div>
                    </div>

                    <div class="cols">
                        <div class="col col_2">

                            <input type="text" name="email" placeholder="Email(*)" autocomplete="no-complete" value="">
                        </div>
                        <div class="col col_2">

                            <input type="text" name="celular" placeholder="Celular(*)" autocomplete="no-complete"
                                value="">
                        </div>
                    </div>

                    <div class="cols">
                        <div class="col col_1">

                            <select name="asunto">
                                <option value="0">Seleccionar...</option>
                                <option value="Información comercial de proyectos">Información comercial de proyectos
                                </option>
                                <option value="Petición">Petición</option>
                                <option value="Queja">Queja</option>
                                <option value="Reclamo">Reclamo</option>
                                <option value="Felicitación">Felicitación</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                    </div>

                    <div class="fila cols">
                        <div class="col col_1">

                            <textarea name="comentarios" placeholder="Comentario"></textarea>
                        </div>
                        <div class="col col_1 aviso_privacidad mediamargen">
                            <div>
                                <input id="privacidad_check" name="privacidad_check" type="checkbox" value="1">
                                <p class="etiqueta">Acepto la <a target="_blank" href="#">política de manejo de datos
                                        personales</a>
                                    de IV3 Arquitectura</p>
                            </div>
                        </div>
                        <div class="fila">
                            <input class="btn" name="boton" type="submit" value="Enviar" disabled>
                        </div>
                    </div>

                </form>



            </div>





        </div>
    </div>


    <?php include("views/includes/footer.php")?>












</body>

</html>