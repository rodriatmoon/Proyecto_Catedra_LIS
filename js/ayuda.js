var titulo;
$(".enlace").on("click", function () {
    titulo=($(this).val());
    console.log(titulo);
  document.getElementById("exampleModalCenterTitle").innerHTML ="Titulo "+($(this).val());
});
$(".imagen").click(function (e) {
  var img = e.target.src;
  var modal_imagen = "";
  var cont = "";
  modal_imagen += '<img src="' + img + '" alt="" class="imagen_modal"></img>';
  document.getElementById("modal-img").innerHTML = modal_imagen;
  //document.getElementById("exampleModalCenterTitle").innerHTML = cont;
});
