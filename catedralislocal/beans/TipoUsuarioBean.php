
<?php

class TipoUsuarioBean
{


    private $idTipoUsuario;
    private $tipoUsuario;
  


    function setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario = $idTipoUsuario;
    }
    function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }


    function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }
    function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

}

?>