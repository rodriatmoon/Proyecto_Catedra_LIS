document.getElementById("btnBuscar").addEventListener("click", function(){

  
    var txtBusqueda = document.getElementById("txtbuscar").value;
    window.location ="crear.html?textBuscador="+ txtBusqueda;

   
});
