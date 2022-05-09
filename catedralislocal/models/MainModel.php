<?php

class MainModel extends Model
{

    public function __construct()
    {
        parent::__construct();//accedemos al constructor de Model, para poder usar la bdd
    }
/*
    function listaPersonas()
    {
        $query = "SELECT *  FROM persona a INNER JOIN ocupaciones o ON a.id_ocupacion = o.id_ocupacion";
        $this->conexion = $this->con->conectar();//accedemos a la funcion conectar, y por ende su return, el cual recordara es la bdd
        $resultado =  $this->conexion->prepare($query); //preparamos la consulta
        $resultado->execute();//ejecutamos la consulta

        $array =array();
        while ($row = $resultado->fetch()) {//obtenemos los resultados de la consulta, aqui se convertiran en arreglos nativos de php que podemos recorrer y usar
            $persona = new PersonaBean();//instaciamos una nueva persona
            $ocupacion = new OcupacionBean();//instaciamos una nueva ocupacion, recordara que en Persona Bean hay  un atributo llamado Ocupacion
            $persona->setIdPersona($row['id_persona']);
            $persona->setNombre($row['nombre_persona']);
            $persona->setEdad($row['edad_persona']);
            $persona->setTelefono($row['telefono_persona']);
            $persona->setSexo($row['sexo_persona']);
            $persona->setFecha($row['fecha_nac']);//setiamos los valore de persona
            $ocupacion->setOcupacion($row['ocupacion']);
            $ocupacion->setIdOcupacion($row['id_ocupacion']);
            $persona->setOcupacion($ocupacion);//finalmente cargamos el atributo ocupacion con un objeto ocupacion
            $array[]= $persona;//cargamos el arreglo
        }
        $this->con->desconectar($this->conexion);//cerramos la conexion
       
        return $array;//retornamos el arreglo
    }

*/
/*
    function listaOcupaciones()
    {
        $query = "SELECT *  FROM ocupaciones";
        $this->conexion = $this->con->conectar();
        $resultado =  $this->conexion->prepare($query);
        $resultado->execute();

        $array =array();
        while ($row = $resultado->fetch()) {//obtenemos los resultados de la consulta, aqui se convertiran en arreglos nativos de php que podemos recorrer y usar
           
            $ocupacion = new OcupacionBean();           
            $ocupacion->setOcupacion($row['ocupacion']);
            $ocupacion->setIdOcupacion($row['id_ocupacion']);
          
            $array[]= $ocupacion;//cargamos el arreglo
        }

        $this->con->desconectar($this->conexion);
        return $array;
    }
    */

    public function agregarEmpresa($empresaobj){
        $query = "INSERT INTO empresas(nombreEmpresa,logo,descripcionEmpresa) VALUES (:empresa,:logo,:descripcion)";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindParam(':empresa', $empresaobj->getEmpresa());//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindParam(':logo', $empresaobj->getImagen());
        $row->bindParam(':descripcion', $empresaobj->getDescripcion());
        $row->execute();
        return $this->con->desconectar($this->conexion);//cerramos la conexion
    }

    public function inicioSesion($usuario,$contrasenia,$usuarioobj){
        
        $query = "SELECT * FROM usuario WHERE usuario = :usuario OR correoUsuario =:correo AND contrasenia = SHA2(:contrasenia,256);";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':usuario', $usuario);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':correo', $usuario);
        $row->bindValue(':contrasenia', $contrasenia);
        $row->execute();
       
        while ($row = $row->fetch()) {
          $usuarioobj->setUsuario($row['idUsuario']);
          $usuarioobj->setCorreo($row['correoUsuario']);
          $usuarioobj->setTipoUsuario($row['idTipoUsuario']);
          $usuarioobj->setEmpresa($row['idEmpresa']);
            return $usuarioobj;
        }
        return null;
    }


    public function obtenerUltimaEmpresa(){
        
        $query = "SELECT MAX(idEmpresa) AS id FROM empresas";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->execute();
        
        while ($row = $row->fetch()) {
          
            return $row['id'];
        }
    }

    public function agregarUsuario($usuarioobj,$empresaobj)
    {
        $this->agregarEmpresa($empresaobj);
        $idEmpresa=$this->obtenerUltimaEmpresa();

        $query = "INSERT INTO usuario( nombreUsuario, correoUsuario, numeroTelefono, usuario, contrasenia, idTipoUsuario, idEmpresa) VALUES (:nombre,:correo,:numero,:usuario,sha2(:contrasenia,256), :tipouser,:empresa)";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':nombre', $usuarioobj->getNombre());//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':correo', $usuarioobj->getCorreo());
        $row->bindValue(':numero', $usuarioobj->getTelefono());
        $row->bindValue(':usuario', $usuarioobj->getUsuario());
        $row->bindValue(':contrasenia', $usuarioobj->getContrasenia());
        $row->bindValue(':tipouser', $usuarioobj->getTipoUsuario()->getTipoUsuario());
        $row->bindValue(':empresa',  $idEmpresa);
        $exito = $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito;//devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }
/*
    function obtenerPersona()
    {
        $id = 1;
        $query = "SELECT * FROM persona WHERE id_persona = :valor";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindParam(':valor', $id);
        $row->execute();
        while ($row = $row->fetch()) {
            $persona = new PersonaBean();
            $ocupacion = new OcupacionBean();
            $persona->setIdPersona($row['id_persona']);
            $persona->setNombre($row['nombre_persona']);
            $persona->setEdad($row['edad_persona']);
            $persona->setTelefono($row['telefono_persona']);
            $persona->setSexo($row['sexo_persona']);
            $persona->setFecha($row['fecha_nac']);
            $ocupacion->setOcupacion(null);
            $ocupacion->setIdOcupacion($row['id_ocupacion']);
            $persona->setOcupacion($ocupacion);
            return $persona;
        }
        return $persona;
    }

    
    function modificarPersona($nombre, $edad, $telefono, $sexo, $ocupacion, $fecha,$idpersona)
    {
        $query = "UPDATE persona SET nombre_persona=:nombrepersona ,edad_persona=:edadpersona , telefono_persona=:telefono , sexo_persona=:sexo , id_ocupacion=:ocupacion , fecha_nac=:fechanac WHERE id_persona = :idpersona";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindParam(':nombrepersona', $nombre);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindParam(':edadpersona', $edad);
        $row->bindParam(':telefono', $telefono);
        $row->bindParam(':sexo', $sexo);
        $row->bindParam(':ocupacion', $ocupacion);
        $row->bindParam(':fechanac', $fecha);
        $row->bindParam(':idpersona', $idpersona);
        
        return $row->execute();//devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    } */

}

?>