<!DOCTYPE HTML>
<html>

<head>





    <?php
  $page_metatitle = 'Contacto | ' . PAGE_META_TITLE;
  $page_metadescription = 'Desarrollamos y construimos proyectos de vivienda, hotelería, comercio e industria';
  include('views/includes/head.php');
  ?>






</head>

<body class="contacto">




    <div class="fila header mediamargen"><?php include("views/includes/header.php")?></div>





    <div class="fila banner">
        <div class="cols">
            <div class="col col_1">
                <h1>Contacto</h1>
            </div>
        </div>
    </div>




    <div class="fila main supermargen formulario">
        <div class="cols narrow">
            <div class="col col_1_3">
                <div class="fila">
                    <a href="tel:+576044237149" class="tel">+57 (604) 4237149</a>
                </div>

                <hr />

                <p>Calle 8 43 C 48<br />
                    Medellín, Colombia</p>

                <div class="fila">
                    <a href="#" target="_self" class="btn">ver en mapa</a>
                </div>
            </div>
            <div class="col col_2_3">

                <form action="envia-contacto" method="post" target="_self">

                    <input id="fant" type="text" name="fant" autocomplete="no-complete" value="">
                    <input id="fant2" type="text" name="fant2" autocomplete="no-complete" value="">

                    <div class="cols">
                        <div class="col col_2">
                            <input type="text" name="nombre" placeholder="Nombre(*)" autocomplete="no-complete"
                                value="">
                        </div>
                        <div class="col col_2">

                            <input type="text" name="empresa" placeholder="Empresa" autocomplete="no-complete" value="">
                        </div>
                    </div>

                    <div class="cols">
                        <div class="col col_2">

                            <input type="text" name="email" placeholder="Email(*)" autocomplete="no-complete" value="">
                        </div>
                        <div class="col col_2">

                            <input type="text" name="celular" placeholder="Celular" autocomplete="no-complete" value="">
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
                        <div class="col col_1 mediamargen">

                            <textarea name="comentarios" placeholder="Comentario"></textarea>
                        </div>
                        <div class="col col_1 aviso_privacidad halfmargen">
                            <div>
                                <input id="privacidad_check" name="privacidad_check" type="checkbox" value="1">
                                <p class="etiqueta">Acepto la <a target="_blank" href="#">política de manejo de datos
                                        personales</a>
                                    de Jorge Gonzales Ingeniería</p>
                            </div>
                        </div>
                        <div class="fila centro">
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