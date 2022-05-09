
<?php

require_once  "beans/UsuarioBean.php";
class EmpresarioModel extends Model
{

    function __construct()
    {
        parent::__construct();//accedemos al constructor de Model, para poder usar la bdd
    }

   
    function nombreUsuario($idusuario){
        
        $query = "SELECT usuario FROM usuario WHERE idUsuario = :idusuario";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idusuario', $idusuario);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->execute();
        $nombre="";
        while ($resultado = $row->fetch()) {
         
            $nombre= $resultado['usuario'];

            
        }
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $nombre;
    }

    function listaEmpleados($idempresa){
        $tipo =3;
        $query = "SELECT * FROM usuario WHERE idEmpresa = :idempresa AND idTipoUsuario=:idtipo";
        $this->conexion = $this->con->conectar();
        
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idempresa', $idempresa);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':idtipo', $tipo);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->execute();
       $array=array();
        while ($resultado = $row->fetch()) {
         $usuariobj = new UsuarioBean();
         $usuariobj->setIdUsuario($resultado['idUsuario']);
         $usuariobj->setNombre($resultado['nombreUsuario']);
         $usuariobj->setCorreo($resultado['correoUsuario']);
         $usuariobj->setTelefono($resultado['numeroTelefono']);
         $usuariobj->setUsuario($resultado['usuario']);
         $array[]= $usuariobj;
        }
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $array;
    }

    function listaEventos($idusuario){
        $mes = date("m");
        $anio=date("Y"); 
        $fecha1actual= $anio."-".$mes."-"."01";
        $fecha2actual= $anio."-".$mes."-".date( 't' );
        $query = "SELECT * FROM eventos e INNER JOIN categorias c ON e.idCategoria = c.idCategoria WHERE c.idUsuario=:idusuario AND fechaInicio BETWEEN :fecha1 AND :fecha2";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idusuario', $idusuario);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':fecha1', $fecha1actual);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':fecha2', $fecha2actual);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->execute();
       $array=array();
        while ($resultado = $row->fetch()) {
         $eventosobj = new EventosBean();
         $eventosobj->setIdEvento($resultado['idEvento']);
         $eventosobj->setTituloEvento($resultado['tituloEvento']);
         $eventosobj->setDescripcionEvento($resultado['descripcionEvento']);
         $eventosobj->setFechaInicio($resultado['fechaInicio']);
         $eventosobj->setFechaFin($resultado['fechaFin']);
         $eventosobj->setHoraInicio($resultado['horaInicio']);
         $eventosobj->setHoraFin($resultado['horaFin']);
         $eventosobj->setIdCategoria($resultado['idCategoria']);
         $eventosobj->setCategoria($resultado['categoria']);
         $array[]= $eventosobj;
        }
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $array;
    }

    function listaEventosBusqueda($idusuario, $mes , $anio, $diasCant){
       
        $fecha1actual= $anio."-".$mes."-"."01";
        $fecha2actual= $anio."-".$mes."-".$diasCant;
        $query = "SELECT * FROM eventos e INNER JOIN categorias c ON e.idCategoria = c.idCategoria WHERE c.idUsuario=:idusuario AND fechaInicio BETWEEN :fecha1 AND :fecha2;";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idusuario', $idusuario);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':fecha1', $fecha1actual);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':fecha2', $fecha2actual);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->execute();
       $array=array();
        while ($resultado = $row->fetch()) {
         $eventosobj = new EventosBean();
         $eventosobj->setIdEvento($resultado['idEvento']);
         $eventosobj->setTituloEvento($resultado['tituloEvento']);
         $eventosobj->setDescripcionEvento($resultado['descripcionEvento']);
         $eventosobj->setFechaInicio($resultado['fechaInicio']);
         $eventosobj->setFechaFin($resultado['fechaFin']);
         $eventosobj->setHoraInicio($resultado['horaInicio']);
         $eventosobj->setHoraFin($resultado['horaFin']);
         $eventosobj->setIdCategoria($resultado['idCategoria']);
         $eventosobj->setCategoria($resultado['categoria']);
         $array[]= $eventosobj;
        }
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $array;
    }

    function listaCategorias($idusuario){
        $tipo =3;
        $query = "SELECT * FROM categorias WHERE idUsuario= :idusuario";
        $this->conexion = $this->con->conectar();
        
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idusuario', $idusuario);//enviamos parametros a la consulta, esto evita inyecciones SQL
       $row->execute();
       $array=array();
        while ($resultado = $row->fetch()) {
         $categoriaobj = new CategoriaBean();
         $categoriaobj->setIdCategoria($resultado['idCategoria']);
         $categoriaobj->setCategoria($resultado['categoria']);
         $categoriaobj->setDescripcionCategoria($resultado['descripcionCategoria']);
        
         $array[]= $categoriaobj;
        }
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $array;
    }

    function empresaInfo($idempresa, $empresaobj){
        
        $query = "SELECT * FROM empresas WHERE idEmpresa = :idempresa";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idempresa', $idempresa);//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->execute();
       
        while ($resultado = $row->fetch()) {
         
            $empresaobj->setEmpresa($resultado["nombreEmpresa"]);
            $empresaobj->setImagen($resultado["logo"]);
            $empresaobj->setDescripcion($resultado["descripcionEmpresa"]);
            
        }
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $empresaobj;
    }

    public function agregarUsuario($usuarioobj)
    {

        $query = "INSERT INTO usuario( nombreUsuario, correoUsuario, numeroTelefono, usuario, contrasenia, idTipoUsuario, idEmpresa) VALUES (:nombre,:correo,:numero,:usuario,sha2(:contrasenia,256), :tipouser,:empresa)";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':nombre', $usuarioobj->getNombre());//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':correo', $usuarioobj->getCorreo());
        $row->bindValue(':numero', $usuarioobj->getTelefono());
        $row->bindValue(':usuario', $usuarioobj->getUsuario());
        $row->bindValue(':contrasenia', $usuarioobj->getContrasenia());
        $row->bindValue(':tipouser', $usuarioobj->getTipoUsuario()->getTipoUsuario());
        $row->bindValue(':empresa',  $usuarioobj->getEmpresa());
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }

    public function agregarCategoria($categoriaobj)
    {

        $query = "INSERT INTO categorias(categoria, descripcionCategoria, idUsuario) VALUES (:titulo, :descripcion , :idusuario )";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindParam(':titulo', $categoriaobj->getCategoria());//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindParam(':descripcion', $categoriaobj->getDescripcionCategoria());
        $row->bindParam(':idusuario', $categoriaobj->getIdUsuario());
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }

    public function agregarEvento($eventosobj)
    {

        $query = "INSERT INTO eventos(tituloEvento, descripcionEvento, fechaInicio, fechaFin, horaInicio, horaFin, idCategoria) VALUES (:titulo,:descripcion,:fechaInicio,:fechaFin,:horaInicio,:horaFin,:idCategoria)";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindParam(':titulo', $eventosobj->getTituloEvento());//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindParam(':descripcion', $eventosobj->getDescripcionEvento());
        $row->bindParam(':fechaInicio', $eventosobj->getFechaInicio());
        $row->bindParam(':fechaFin', $eventosobj->getFechaFin());
        $row->bindParam(':horaInicio', $eventosobj->getHoraInicio());
        $row->bindParam(':horaFin', $eventosobj->getHoraFin());
        $row->bindParam(':idCategoria', $eventosobj->getCategoria());
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }

    public function modificarEvento($eventosobj)
    {

        $query = "UPDATE eventos SET tituloEvento=:tituloEvento ,descripcionEvento=:descripcionEvento , fechaInicio=:fechaInicio ,fechaFin=:fechaFin, horaInicio=:horaInicio ,horaFin=:horaFin,idCategoria=:idCategoria WHERE idEvento = :idEvento";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindParam(':tituloEvento', $eventosobj->getTituloEvento());//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindParam(':descripcionEvento', $eventosobj->getDescripcionEvento());
        $row->bindParam(':fechaInicio', $eventosobj->getFechaInicio());
        $row->bindParam(':fechaFin', $eventosobj->getFechaFin());
        $row->bindParam(':horaInicio', $eventosobj->getHoraInicio());
        $row->bindParam(':horaFin', $eventosobj->getHoraFin());
        $row->bindParam(':idCategoria', $eventosobj->getCategoria());
        $row->bindParam(':idEvento', $eventosobj->getIdEvento());
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }

    public function modificarUsuario($usuarioobj)
    {

        $query = "UPDATE usuario SET nombreUsuario=:nombre,correoUsuario=:correo,numeroTelefono=:numero,usuario=:usuario WHERE idUsuario=:idusuario";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':nombre', $usuarioobj->getNombre());//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':correo', $usuarioobj->getCorreo());
        $row->bindValue(':numero', $usuarioobj->getTelefono());
        $row->bindValue(':usuario', $usuarioobj->getUsuario());
        $row->bindValue(':idusuario', $usuarioobj->getIdUsuario());
        
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }

    public function modificarCategoria($categoriaobj)
    {

        $query = "UPDATE categorias SET categoria=:categoria , descripcionCategoria=:descripcion WHERE idCategoria=:idcategoria";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':categoria', $categoriaobj->getCategoria());//enviamos parametros a la consulta, esto evita inyecciones SQL
        $row->bindValue(':descripcion', $categoriaobj->getDescripcionCategoria());
        $row->bindValue(':idcategoria', $categoriaobj->getIdCategoria());
        
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }

    public function eliminarEvento($idevento)
    {

        $query = "DELETE FROM eventos WHERE idEvento= :idEvento";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idEvento', $idevento);
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }


    public function eliminarUsuario($idusuario)
    {

        $query = "DELETE FROM usuario WHERE idUsuario=:idusuario";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idusuario', $idusuario);
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }

    public function eliminarCategoria($idcategoria)
    {

        $query = "DELETE FROM categorias WHERE idCategoria= :idcategoria";
        $this->conexion = $this->con->conectar();
        $row =  $this->conexion->prepare($query);
        $row->bindValue(':idcategoria', $idcategoria);
        $exito= $row->execute();
        $this->con->desconectar($this->conexion);//cerramos la conexion
        return $exito; //devolvera un booleano dependiendo si la consulta y conexion fue exitosa

    }

}

?>