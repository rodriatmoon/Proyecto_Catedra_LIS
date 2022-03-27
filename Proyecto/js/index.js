
    function Suceso(idsuceso, suceso, descripcion){

        this.idsuceso = idsuceso;
        this.suceso = suceso;
        this.descripcion = descripcion;
        
    }
    let baseDatos = [];
   
    document.getElementById("btnBlockMod").addEventListener("click", function(){
        document.getElementById("exampleModalLabel").innerHTML ="Agregar categoria";
        document.getElementById("btnModificarSuceso").style.display="none";
        document.getElementById("btnAnadirSuceso").style.display="block";
    });



document.getElementById("btnAnadirSuceso").addEventListener("click", function(){


    var suces= document.getElementById("titulosuceso").value;
  
    var descrip = document.getElementById("descripcionsuceso").value;


    if(suces === "" || descrip ===""){
        alert("Todos los campos son requeridos");
    }else{

    document.getElementById("contenedor").innerHTML = "";


    baseDatos = JSON.parse(localStorage.getItem("sucesos"));

    if(baseDatos === null){
        baseDatos = [];
    }

    var i= 0;
    var id;
    var bandera = false; 
   do{

    id= "suceso" + i;

    if(baseDatos[i] === undefined){
        
        bandera = true;
        
        break;
        
    }

    if(baseDatos[i].idsuceso != id){

        
        bandera = true;
        break;
    }
   
    i++;
    
   }while(bandera = true);
   
  
    
  
    nuevoSuceso = new Suceso(id, suces, descrip);


    baseDatos.push(nuevoSuceso);

    function dynamicSort(property) {
        var sortOrder = 1;
        if(property[0] === "-") {
            sortOrder = -1;
            property = property.substr(1);
        }
        return function (a,b) {
            /* next line works with strings and numbers, 
             * and you may want to customize it to your needs
             */
            var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
            return result * sortOrder;
        }
    }

    baseDatos.sort(dynamicSort("idsuceso"));

     
localStorage.setItem("sucesos",JSON.stringify(baseDatos));
   
    
    document.getElementById("titulosuceso").value= "";
    document.getElementById("descripcionsuceso").value="";


    for(datos in baseDatos){
       
        document.getElementById("contenedor").innerHTML += "<div class='col-md-3'><div class='card mb-4 shadow-sm'> <rect width='100%' height='100%' fill='#55595c' /><div class='card-body'><h4 class='card-title'>"+baseDatos[datos].suceso+"</h4><p class='card-text' >Descripción de la categoria: "+ baseDatos[datos].descripcion +"</p><div class='d-flex justify-content-between align-items-center'><div class='btn-group'><a type='button' href='linea.html?idlinea="+baseDatos[datos].idsuceso +"'  class='btn btn-sm btn-outline-secondary'>Ver linea</a><div class='btn-group'><a type='button' class='btn btn-sm btn-outline-info' id='btnModificar' onclick='modificarSuceso(`"+baseDatos[datos].idsuceso+"`, `"+baseDatos[datos].suceso+"`, `"+baseDatos[datos].descripcion+"` )'  data-toggle='modal' data-target='#exampleModal'>Modificar</a></div><div class='btn-group'><a type='button' class='btn btn-sm btn-outline-danger' id='btnModificar' onclick='btnEliminar(`"+baseDatos[datos].idsuceso+"`)'  >Eliminar</a></div></div></div></div>  </div>"; 

      }


    }
});

document.addEventListener("DOMContentLoaded", function(){
    
    
    document.getElementById("contenedor").innerHTML = "";
    baseDatos = JSON.parse(localStorage.getItem("sucesos"));

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var pal = getParameterByName("textBuscador");

    if(pal === ""){

        if(baseDatos === null){
            baseDatos = [];
         }else{
           
        
            for(datos in baseDatos){
               
              document.getElementById("contenedor").innerHTML += "<div class='col-md-3'><div class='card mb-4 shadow-sm'> <rect width='100%' height='100%' fill='#55595c' /><div class='card-body'><h4 class='card-title'>"+baseDatos[datos].suceso+"</h4><p class='card-text' >Descripción de  la categoria: "+ baseDatos[datos].descripcion +"</p><div class='d-flex justify-content-between align-items-center'><div class='btn-group'><a type='button' href='linea.html?idlinea="+baseDatos[datos].idsuceso +"'  class='btn btn-sm btn-outline-secondary'>Ver eventos</a><div class='btn-group'><a type='button' class='btn btn-sm btn-outline-info' id='btnModificar' onclick='modificarSuceso(`"+baseDatos[datos].idsuceso+"`, `"+baseDatos[datos].suceso+"`, `"+baseDatos[datos].descripcion+"` )'  data-toggle='modal' data-target='#exampleModal'>Modificar</a></div><div class='btn-group'><a type='button' class='btn btn-sm btn-outline-danger' id='btnModificar' onclick='btnEliminar(`"+baseDatos[datos].idsuceso+"`)'  >Eliminar</a></div></div></div></div>  </div>"; 
        
            }
        }
        
    }else{

        for(datos in baseDatos){
       
            var titulo = baseDatos[datos].suceso;
    
           
            if(titulo.toLowerCase().search(pal.toLowerCase()) != -1){
                    document.getElementById("contenedor").innerHTML += "<div class='col-md-3'><div class='card mb-4 shadow-sm'> <rect width='100%' height='100%' fill='#55595c' /><div class='card-body'><h4 class='card-title'>"+baseDatos[datos].suceso+"</h4><p class='card-text' >Descripción del suceso: "+ baseDatos[datos].descripcion +"</p><div class='d-flex justify-content-between align-items-center'><div class='btn-group'><a type='button' href='linea.html?idlinea="+baseDatos[datos].idsuceso +"'  class='btn btn-sm btn-outline-secondary'>Ver eventos</a><div class='btn-group'><a type='button' class='btn btn-sm btn-outline-info' id='btnModificar' onclick='modificarSuceso(`"+baseDatos[datos].idsuceso+"`, `"+baseDatos[datos].suceso+"`, `"+baseDatos[datos].descripcion+"` )'  data-toggle='modal' data-target='#exampleModal'>Modificar</a></div><div class='btn-group'><a type='button' class='btn btn-sm btn-outline-danger' id='btnModificar' onclick='btnEliminar(`"+baseDatos[datos].idsuceso+"`)'  >Eliminar</a></div></div></div></div>  </div>"; 
            }
        }
    }
});

function modificarSuceso(id, titulo, descripcion){

    document.getElementById("exampleModalLabel").innerHTML ="Modificar Suceso";
    document.getElementById("btnModificarSuceso").style.display="block";
    document.getElementById("btnAnadirSuceso").style.display="none";
    document.getElementById("idsuceso").value = id;
    document.getElementById("titulosuceso").value = titulo;
    document.getElementById("descripcionsuceso").value = descripcion;
    
}
function btnEliminar(id){
    
    var confirmacion = confirm("¿Esta seguro de eliminar este suceso?");
    if(confirmacion ==  true){

        baseDatos = JSON.parse(localStorage.getItem("sucesos"));

        var indice = baseDatos.findIndex(elemento => {

            return elemento.idsuceso === id;
        });

        
        baseDatos.splice(indice,1);
        console.log(baseDatos);
        localStorage.setItem("sucesos", JSON.stringify(baseDatos));

        localStorage.removeItem(id);
        location.reload();
        alert("Evento eliminado exitosamente");
    }

}

document.getElementById("btnModificarSuceso").addEventListener("click", function(){

    var id = document.getElementById("idsuceso").value;
    var titulo =  document.getElementById("titulosuceso").value; 
    var descripcion =  document.getElementById("descripcionsuceso").value;

    if(titulo === "" || descripcion === ""){
        alert("Todos los campos son requeridos");
    }else{
    baseDatos = JSON.parse(localStorage.getItem("sucesos"));

    var indice = baseDatos.findIndex(elemento => {

        return elemento.idsuceso === id;
    });

    for(datos in baseDatos){
    
    if(datos == indice){

        baseDatos[datos].suceso = titulo;
        baseDatos[datos].descripcion = descripcion;

    }
    }
    
    localStorage.setItem("sucesos", JSON.stringify(baseDatos));

    location.reload();
}
});

