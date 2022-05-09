
<?php

class EventosBean
{


    private $idEvento;
    private $tituloEvento;
    private $descripcionEvento;
    private $fechaInicio;
    private $fechaFin;
    private $horaInicio;
    private $horaFin;
    private $idCategoria;
    private $categoria;

    function setIdEvento($idEvento)
    {
        $this->idEvento = $idEvento;
    }
    function getIdEvento()
    {
        return $this->idEvento;
    }


    function setTituloEvento($tituloEvento)
    {
        $this->tituloEvento = $tituloEvento;
    }
    function getTituloEvento()
    {
        return $this->tituloEvento;
    }


    function setDescripcionEvento($descripcionEvento)
    {
        $this->descripcionEvento = $descripcionEvento;
    }
    function getDescripcionEvento()
    {
        return $this->descripcionEvento;
    }


    function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }
    function getFechaInicio()
    {
        return $this->fechaInicio;
    }


    function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }
    function getFechaFin()
    {
        return $this->fechaFin;
    }


    function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    function getCategoria()
    {
        return $this->categoria;
    }

    function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }
    function getIdCategoria()
    {
        return $this->idCategoria;
    }

    function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }
    function getHoraInicio()
    {
        return $this->horaInicio;
    }

    function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }
    function getHoraFin()
    {
        return $this->horaFin;
    }
}

?>