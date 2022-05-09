
<?php

class AdministradorModel extends Model
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
       
        while ($row = $row->fetch()) {
         
            return $row['usuario'];

        }
        return null;
    }


}

?>