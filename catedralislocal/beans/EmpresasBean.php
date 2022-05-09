
<?php

class EmpresasBean
{


    private $idEmpresa;
    private $empresa;
    private $imagen;
    private $descripcion;


    function setIdEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;
    }
    function getIdEmpresa()
    {
        return $this->idEmpresa;
    }


    function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }
    function getEmpresa()
    {
        return $this->empresa;
    }

    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    function getImagen()
    {
        return $this->imagen;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    function getDescripcion()
    {
        return $this->descripcion;
    }

}

?>