
<?php

class UsuarioBean 
{
    private $idUsuario;
    private $nombre;
    private $usuario;
    private $correo;
    private $telefono;
    private $contrasenia;
    private $tipoUsuario;
    private $empresa;
   
    function setIdUsuario($idUsuario){
        $this->idUsuario=$idUsuario;
    }
    function getIdUsuario(){
        return $this->idUsuario;
    }

    function setNombre($nombre){
        $this->nombre=$nombre;
    }
    function getNombre(){
        return $this->nombre;
    }

    function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    function getTelefono(){
        return $this->telefono;
    }

    function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    function getUsuario(){
        return $this->usuario;
    }

    function setCorreo($correo){
        $this->correo=$correo;
    }
    function getCorreo(){
        return $this->correo;
    }


    function setContrasenia($contrasenia){
        $this->contrasenia=$contrasenia;
    }
    function getContrasenia(){
        return $this->contrasenia;
    }

    function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario=$tipoUsuario;
    }
    function getTipoUsuario(){
        return $this->tipoUsuario;
    }
    function setEmpresa($empresa){
        $this->empresa=$empresa;
    }
    function getEmpresa(){
        return $this->empresa;
    }
}

?>