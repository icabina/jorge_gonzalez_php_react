<script>
$(document).ready(function() {
    var ancho_pantalla = $(window).width();


    //---------Anadir grupo de campos forms
    $('#AnadirCampos').click(function() {
        var campos_dinamicos = $('#zona_campos_dinamicos .campos_maestro .grupo_campos').html();
        //
        campos_dinamicos =
            '<div class="grupo_campos">' +
            campos_dinamicos +
            '<a href="#" class="remover">Eliminar</a>' +
            '</div>';
        //
        $('#zona_campos_dinamicos').append(
            campos_dinamicos
        );
        return false;
    });
    //---------Eliminar grupo de campos forms
    $(document).on('click', '.remover', function() {
        $(this).parent().remove();
        return false;
    });

    /*--------Subir--------*/
    $(document).scroll(function() {
        var y = $(this).scrollTop();
        if (y > 200) {
            $('#subir').fadeIn();
        } else {
            $('#subir').fadeOut();

        }
    });
    $('#subir').on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 'fast');
        return false;
    });

    /*--------Menu rspnsv--------*/
    $('#btn_admin_menu').on('click', function() {
        $(this).toggleClass('cerrar');
        $('#menu').toggle('fast');
        return false;
    });

    /*--------Bottom-------*/

    $(window).on('scroll', function() {
        if ($(window).scrollTop() >= $(
                '.adminpage').offset().top + $('.adminpage').outerHeight() - window.innerHeight - 100) {

            $('.parent .boton_formulario').addClass("final");
        } else {
            $('.parent .boton_formulario').removeClass('final');
        }
    });


    /*--------------Delete button*/
    $(".item_remove, .btn_admin_eliminar").click(function(e) {
        var url = $(this).attr("href");
        var textAlerta = $(this).data("alerta");
        e.preventDefault();

        Swal.fire({
                title: '¿Está seguro?',
                text: textAlerta,
                type: 'warning',
                confirmButtonText: '¡Confirmar!',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            })

            .then(function(result) {
                if (result.value) {
                    //window.location = "controladores/admin_picture_delete.php"; 
                    window.location = url;
                    //envia_solicitudes_y_finaliza();
                } else {
                    $(this).attr("href") = "";
                    //console.log('Cancelado');
                    //$('#campos_paso3 .botones').show();
                    //$('.enviando').hide();
                }
            });
    });


});
</script>