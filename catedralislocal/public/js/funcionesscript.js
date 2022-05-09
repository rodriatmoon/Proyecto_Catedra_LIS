function btnModificarEmpleados(id, nombre, correo, numero, usuario) {

    document.getElementById("idempleado").value = id;
    document.getElementById("nombremodi").value = nombre;
    document.getElementById("correomodi").value = correo;
    document.getElementById("telefonomodi").value = numero;
    document.getElementById("usuariomodi").value = usuario;


}

function btnModificarCategoria(id, titulo, descripcion) {

    document.getElementById("idcategoriamodi").value = id;
    document.getElementById("titulomodi").value = titulo;
    document.getElementById("descripcionmodi").value = descripcion;

}


function btnModalEvento(idevento, titulo, descripcion, fechainicio, fechafin, horainicio, horafin, idcategoria, categoria, operacion) {

    
        document.getElementById("containerver").style.display = "block";
        document.getElementById("formmodificarevento").style.display = "none";
        document.getElementById("btnmodificarevento").style.display = "block";
        document.getElementById("btnenviarevento").style.display = "none"; 
        document.getElementById("vertituloevento").innerHTML = titulo;
        document.getElementById("lbldescripcion").innerHTML = descripcion;
        document.getElementById("lblfechaini").innerHTML = fechainicio + " " + horainicio;
        document.getElementById("lblfechafin").innerHTML = fechafin + " " + horafin;
        document.getElementById("lblcategoria").innerHTML = categoria;
        

        document.getElementById("ideventomodi").value = idevento;
        document.getElementById("tituloeventomodi").value = titulo;
        document.getElementById("descripcioneventomodi").value = descripcion;
        document.getElementById("inicioeventomodi").value = fechainicio + "T" + horainicio;
        document.getElementById("fineventomodi").value = fechafin + "T" + horafin;
        document.getElementById("categoriaeventomodi").value = idcategoria;
    
}
function modificar() {

    document.getElementById("formmodificarevento").style.display = "block";
       document.getElementById("containerver").style.display = "none";
       document.getElementById("btnmodificarevento").style.display = "none";
       document.getElementById("btnenviarevento").style.display = "block";     
 
    
}
function cancelar() {

    document.getElementById("formmodificarevento").style.display = "none";
       document.getElementById("containerver").style.display = "block";
       document.getElementById("btnmodificarevento").style.display = "block";
       document.getElementById("btnenviarevento").style.display = "none";     
    
}

function eliminarbtn(){
eliminar(document.getElementById("ideventomodi").value);
}