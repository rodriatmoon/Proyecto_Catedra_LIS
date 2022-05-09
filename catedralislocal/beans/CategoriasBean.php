
<?php

class CategoriaBean
{


    private $idCategoria;
    private $categoria;
    private $descripcionCategoria;
    private $idUsuario;



    function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }
    function getIdCategoria()
    {
        return $this->idCategoria;
    }


    function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    function getCategoria()
    {
        return $this->categoria;
    }

    function setDescripcionCategoria($descripcionCategoria)
    {
        $this->descripcionCategoria = $descripcionCategoria;
    }
    function getDescripcionCategoria()
    {
        return $this->descripcionCategoria;
    }


    function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    function getIdUsuario()
    {
        return $this->idUsuario;
    }
}

?>