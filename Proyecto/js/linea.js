
document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("contenedor").innerHTML = "";
    baseDatos = JSON.parse(localStorage.getItem(objeto.idsuceso));
    
    
 if(baseDatos === null){
    baseDatos = [];
 }else{

    baseDatos.sort(function(a,b){

        return a.anioevento - b.anioevento || a.mesevento - b.mesevento || a.diaevento - b.diaevento;
    });

    var mestext= "";
    var anioant= "";
    var idant = "";
    for(datos in baseDatos){
      
        switch(baseDatos[datos].mesevento){
            case "1":
            mestext = "Enero";
            break;
            case "2":
            mestext = "Febrero";
            break;
            case "3":
            mestext = "Marzo";
            break;
            case "4":
            mestext = "Abril";
            break;
            case "5":
            mestext = "Mayo";
            break;
            case "6":
            mestext = "Junio";
            break;
            case "7":
            mestext = "Julio";
            break;
            case "8":
            mestext = "Agosto";
            break;
            case "9":
            mestext = "Septiembre";
            break;
            case "10":
            mestext = "Octubre";
            break;
            case "11":
            mestext = "Noviembre";
            break;
            case "12":
            mestext = "Diciembre";
            break;
 
        }

        if(anioant === baseDatos[datos].anioevento){

            document.getElementById(idant).innerHTML += "<div class='timeline__card card'><header class='card__header'><time class='time' datetime='2008-02-02'><span class='time__day'>"+ baseDatos[datos].diaevento +"</span><span class='time__month'>"+ mestext +"</span></time><h3 class='card__title r-title'>"+ baseDatos[datos].evento +"</h3></header><div class='card__content'><p>"+ baseDatos[datos].descripcion +"</p><button type='button' class='btn btn-primary' data-toggle='modal' onclick='btnModificar(`"+ baseDatos[datos].idevento +"`, `"+baseDatos[datos].evento+"` , `"+ baseDatos[datos].descripcion+"` , `"+ baseDatos[datos].diaevento+"` , `"+ baseDatos[datos].mesevento+"` , `"+ baseDatos[datos].anioevento+"` );' data-target='#exampleModal2'>Modificar evento</button><button type='button' onclick='btnEliminar("+"`"+ baseDatos[datos].idevento+"`"+")' class='btn btn-danger'>Eliminar evento</button></div></div>"
        }else{

            document.getElementById("contenedor").innerHTML += "<div class='timeline__group'><span class='timeline__year time' aria-hidden='true'>"+ baseDatos[datos].anioevento +"</span><div class='timeline__cards' id='carta"+baseDatos[datos].anioevento+"'><div class='timeline__card card'><header class='card__header'><time class='time' datetime='2008-08-18'><span class='time__day'>"+ baseDatos[datos].diaevento +"</span><span class='time__month'>"+ mestext+"</span></time><h3 class='card__title r-title'>"+ baseDatos[datos].evento +"</h3></header><div class='card__content'><p>"+ baseDatos[datos].descripcion +"</p><button type='button' class='btn btn-primary' data-toggle='modal' onclick='btnModificar(`"+ baseDatos[datos].idevento +"`, `"+baseDatos[datos].evento+"` , `"+ baseDatos[datos].descripcion+"` , `"+ baseDatos[datos].diaevento+"` , `"+ baseDatos[datos].mesevento+"` , `"+ baseDatos[datos].anioevento+"` );' data-target='#exampleModal2'>Modificar evento</button><button type='button' onclick='btnEliminar("+"`"+baseDatos[datos].idevento+"`"+")' class='btn btn-danger'>Eliminar evento</button></div></div></div></div>";

        }

        idant = "carta"+ baseDatos[datos].anioevento;

        anioant = baseDatos[datos].anioevento;

    }

 }
});
function Evento(idevento, evento, descripcion, diaevento, mesevento ,anioevento){

    this.idevento = idevento;
    this.evento = evento;
    this.descripcion = descripcion;
    this.diaevento = diaevento;
    this.mesevento = mesevento;
    this.anioevento = anioevento;
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var idsuceso = getParameterByName("idlinea");


arregloSucesos =  JSON.parse(localStorage.getItem("sucesos"));

var objeto = arregloSucesos.find(elemento => {

    return elemento.idsuceso === idsuceso;
});

let baseDatos = [];

document.getElementById("h1titulo").innerHTML = objeto.suceso;

document.getElementById("btnAgregarEvento").addEventListener("click", function(){

    date  = new Date(document.getElementById("fechaevento").value);
    var idevent = "evento"+ baseDatos.length;
    var titevent = document.getElementById("txttitulo").value;
    var descevent = document.getElementById("txtdescripcion").value; 
    var diaevent =  date.getDate()+1;
    var mesevent =   date.getMonth()+1;
    var anioevent =  date.getFullYear();

    if(titevent === "" || descevent==="" || isNaN(diaevent)=== true || isNaN(mesevent)=== true || isNaN(anioevent)=== true ){

        alert("Todos los campos son requeridos");
    }else{

    document.getElementById("contenedor").innerHTML = "";

    baseDatos = JSON.parse(localStorage.getItem(objeto.idsuceso));

    
    if(baseDatos === null){
        baseDatos = [];
    }
 
 
    
    nuevoEvento = new Evento(idevent, titevent,descevent,diaevent.toString(), mesevent.toString(),anioevent.toString());

    baseDatos.push(nuevoEvento);
    
    localStorage.setItem(objeto.idsuceso, JSON.stringify(baseDatos));

    document.getElementById("txttitulo").value = "";
    document.getElementById("txtdescripcion").value = ""; 
    document.getElementById("fechaevento").value= "";


    location.reload();
}
});




document.getElementById("btnAñadirEventModl").addEventListener("click", function(){
    document.getElementById("btnAgregarEvento").style.display = "block";
    document.getElementById("btnModificarEvento").style.display = "none";
});

function btnEliminar(id){

    var confirmacion = confirm("¿Esta seguro de eliminar este evento?");
    if(confirmacion == true){
        baseDatos = JSON.parse(localStorage.getItem(objeto.idsuceso));
    
        var indice = baseDatos.findIndex(elemento => {

            return elemento.idevento === id;
        });

        baseDatos.splice(indice,1);

        for(datos in baseDatos){
            baseDatos[datos].idevento = "evento" + datos;
        }

        localStorage.setItem(objeto.idsuceso, JSON.stringify(baseDatos));

        location.reload();
        alert("Evento eliminado exitosamente");
    }else{

  }
}

function btnModificar(id, evento, descripcion, dia, mes, anio){
   
    if(dia <10){
        dia = "0"+ dia;
    }
    if(mes <10){
        mes = "0"+ mes;
    }
    
    document.getElementById("exampleModalLabel").innerHTML = "Modificar evento";
    document.getElementById("btnAgregarEvento").style.display = "none";
    document.getElementById("btnModificarEvento").style.display = "block";
    document.getElementById("fechaevento").value = anio +"-"+ mes+"-" +dia;

    document.getElementById("txttitulo").value = evento;
    document.getElementById("txtdescripcion").value = descripcion; 
    document.getElementById("txtIdEvento").value = id;

  
}

document.getElementById("btnModificarEvento").addEventListener("click", function(){

   
   date  = new Date(document.getElementById("fechaevento").value);
   var dialocal = date.getDate()+1;
   var meslocal = date.getMonth()+1;
   var aniolocal =    date.getFullYear();
  


   var titulo = document.getElementById("txttitulo").value;
   var descripcion = document.getElementById("txtdescripcion").value; 
  var id = document.getElementById("txtIdEvento").value;

  if(titulo === "" || descripcion==="" || isNaN(dialocal)=== true || isNaN(meslocal)=== true ||isNaN(aniolocal)=== true ) {
      alert("Todos los campos son requeridos");
  }else{

  
  baseDatos = JSON.parse(localStorage.getItem(objeto.idsuceso));
    
  var indice = baseDatos.findIndex(elemento => {

      return elemento.idevento === id;
  });


  for(datos in baseDatos){
    
    if(datos == indice){
       
        baseDatos[datos].evento = titulo;
        baseDatos[datos].descripcion = descripcion;
        baseDatos[datos].diaevento = dialocal.toString();
        baseDatos[datos].mesevento = meslocal.toString();
        baseDatos[datos].anioevento = aniolocal.toString(); 
    }
  }

  localStorage.setItem(objeto.idsuceso, JSON.stringify(baseDatos));

  location.reload();
}
   
});