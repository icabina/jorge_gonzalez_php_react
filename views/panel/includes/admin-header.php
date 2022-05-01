<?php //-------------Header?>
<div class="fila" id="header">
    <div class="cols">
        <div class="col col_1">
            <div class="logo"><img src="views/images/logo_w.svg" alt="" /></div>
            <div class="header_acciones">
                <a href="panel/logout" id="btn_admin_salir">Salir</a>
                <a href="#" id="btn_admin_menu">Menu</a>
            </div>
        </div>
    </div>
</div>



<?php //-------------Menu?>
<div class="fila" id="menu">
    <div class="cols">
        <div class="col col_1">
            <?php include('views/panel/includes/admin-menu.php'); ?>
        </div>
    </div>
</div>