<!doctype html>
<html>

<head>
    <?php include('views/panel/includes/admin-head.php'); ?>
</head>

<body>
    <?php 
//     $value = '123';
    
// echo crypt_pass($value);
    
  
    ?>

    <?php //-------------Login?>
    <div class="fila login formulario">


        <div class="cols">
            <div class="col col_3">
                <div class="logo"><img src="views/images/logo_w.svg" alt="IV3 Arquitectura" /></div>
                <div class="titulo_seccion">
                    <h1>Administrador Web</h1>
                </div>
                <form action="panel/login" method="post" target="_self">
                    <div class="fila">
                        <input name="usuario" type="text" placeholder="Usuario" autocomplete="no-complete">
                    </div>
                    <div class="fila">
                        <input name="contrasena" type="password" placeholder="Contraseña" autocomplete="no-complete">
                    </div>
                    <div class="fila">
                        <input type="submit" value="ENTRAR" class="btn">
                    </div>
                    <?php if(isset($_GET['msg']) && $_GET['msg']=='login_error'){?>
                    <hr>
                    <p class="alerta error"><strong>ERROR</strong><br>Usuario o contraseña inexistentes.
                        Inténtelo de nuevo.</p>
                    <?php }?>
                </form>
            </div>
        </div>

        <?php #--------------- Footer ?>
        <?php //include('views/panel/includes/admin-footer.php'); ?>
    </div>









    <?php /*?><h1><?php echo crypt_pass('especial@54321');?></h1><?php */?>



</body>

</html>