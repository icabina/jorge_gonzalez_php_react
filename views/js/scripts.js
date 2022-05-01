$(document).ready(function () {
  /*---------------------*/
  $("body").click(function () {
    $(this).find("iframe").removeClass("disabled");
  });

  /*--------------Validacion campos obligatorios formulario--------*/
  $("form input.btn").click(function () {
    var nombre = $('input[name="nombre"]').val();
    var email = $('input[name="email"]').val();
    var celular = $('input[name="celular"]').val();
    var asunto = $('select[name="asunto"]').val();

    if (nombre.length < 2) {
      swal("Error", "Por favor escriba su nombre.", "error");
      return false;
    }
    if (nombre.indexOf("@", 0) != -1) {
      swal(
        "Error",
        "Por favor no escriba el email en el campo del nombre.",
        "error"
      );
      return false;
    }
    if (!/(.+)@(.+){2,}\.(.+){2,}/.test(email) || email.split(" ").length > 1) {
      swal(
        "Error",
        "Por favor use un email válido, sin espacios vacíos.",
        "error"
      );
      return false;
    }
    if (celular.length < 2) {
      swal("Error", "Por favor escriba su número de celular.", "error");
      return false;
    }
    if (asunto == 0) {
      swal("Error", "Por favor seleccione un asunto.", "error");
      return false;
    }
  });

  $(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 200) {
      $("#subir").fadeIn();
    } else {
      $("#subir").fadeOut();
    }
  });
  $("#subir").on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, "fast");
    return false;
  });

  /*--------------Privacidad check formulario*/
  $(".formulario #privacidad_check").click(function () {
    if ($(this).is(":checked")) {
      $(".formulario .btn").removeAttr("disabled");
      $('input[name="accept"]').val("ACCEPT");
    } else {
      $(".formulario .btn").attr("disabled", "true");
      $('input[name="accept"]').val("");
    }
  });
  /*=============*/
  $("#dejanos_datos").click(function () {
    $("html, body").animate(
      {
        scrollTop: $(".showcase").offset().top + "px",
      },
      "normal"
    );
    return false;
  });
  /*=============*/
  // var loc = window.location.toString().split("/");
  // loc = loc[loc.length - 1];
  // // console.log(loc);

  // var loc_upercase = loc.charAt(0).toUpperCase() + loc.slice(1);
  // $(".menu li a:contains(" + loc_upercase + ")").addClass("current");

  /*=================================*/
  $("#pull").click(function (e) {
    e.preventDefault();
    if ($(this).hasClass("active")) {
      $(".menu").removeClass("mostrar");
      $(this).removeClass("active");
      pone_scroll_del_body();
    } else {
      $(".menu").addClass("mostrar");
      $(this).addClass("active");
      quita_scroll_del_body();
    }
    return false;
  });
  /*=================================*/
  function quita_scroll_del_body() {
    $("body").addClass("sin_scroll");
  }
  function pone_scroll_del_body() {
    $("body").removeClass("sin_scroll");
  }
  /*=============*/

  /*var width = jQuery(window).width();
	if (width > 980) {*/

  /*var width = jQuery(window).width();
	if (width > 980) {*/
  $("header .parent").click(function (e) {
    e.preventDefault();
    if ($(this).hasClass("activo")) {
      $(this).removeClass("activo");
      $(this).parent().find(".dropdown").hide("fast");
    } else {
      $(".dropdown").hide("fast");
      $(".parent").removeClass("activo");
      $(this).addClass("activo");
      $(this).parent().find(".dropdown").show("fast");
    }
    return false;
  });
  /*=================================*/
  var width = jQuery(window).width();

  if (width >= 980) {
    $(".all_proyectos .tall:odd").addClass("alt");
  }
  if (width < 980) {
  }
  /*=================================*/
  $(".tab_content").hide();
  $(".tab_content:first").show();
  $(".tabs li:first").addClass("activo");
  $(".tabs li a").bind("click", function (e) {
    e.preventDefault();
    let linkIndex = $(".tabs li a").index(this);
    $(".tabs li").removeClass("activo");
    $(".tab_content:visible").hide();
    $(".tab_content:eq(" + linkIndex + ")").show();
    $(this).parent().addClass("activo");

    $("html, body").animate(
      { scrollTop: $(".col_4_5").offset().top + "px" },
      "normal"
    );

    return false;
  });

  /*=============*/
  $("body").click(function () {
    $("body").removeClass("sin_scroll");
    $(".dropdown").hide("fast");
    $(".parent").removeClass("activo");
  });

  /*--------------Functions Validaciones*/
});
