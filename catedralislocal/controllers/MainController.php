<?php

class MainController extends Controller{//extenderemos de controller para poder acceder a sus funciones

    private $mensaje;
    public function __construct(){
   
    }

    
 
    public function principal(){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            header('Location:'. constant('URL')."Empresario/principal");

        }else{
            if(isset($_COOKIE["exito"])){
                $this->view->exito=$_COOKIE["exito"];
                unset($_COOKIE['exito']);
                setcookie('exito', null, time() - 3600, "Main/Principal");
               
            }else if(isset($_COOKIE["fracaso"])){
                $this->view->fracaso=$_COOKIE["fracaso"];
                unset($_COOKIE['fracaso']);
                setcookie('fracaso', null, time() - 3600, "Main/Principal");
            }
        
       
        $this->view->renderView('main/main.php');
        }
        
    }
    
    public function agregarEmpresario(){
       
      
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            header('Location:'. constant('URL')."Empresario/principal");

        }else{
        $nombreuser = $_POST["nombre"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];
        $organizacion = $_POST["organizacion"];
        $descripcion = $_POST["descripcion"];
        $nombre=$_FILES['archivo']['name'];
        $guardado=$_FILES['archivo']['tmp_name'];
        $ruta = "public/logos/".$nombre;
        move_uploaded_file($guardado,$ruta);
        $empresaobj = new EmpresasBean();
        $usuarioobj = new UsuarioBean();
        $tipoUsuario = new TipoUsuarioBean();
        $empresaobj->setEmpresa($organizacion);
        $empresaobj->setImagen($ruta);
        $empresaobj->setDescripcion($descripcion);
        $usuarioobj->setNombre($nombreuser);
        $usuarioobj->setUsuario($usuario);
        $usuarioobj->setCorreo($correo);
        $usuarioobj->setContrasenia($contrasenia);
        $usuarioobj->setTelefono($telefono);
        $tipoUsuario->setTipoUsuario(2);
        $usuarioobj->setTipoUsuario($tipoUsuario);
        
        if($this->model->agregarUsuario($usuarioobj,$empresaobj)){
            
            setcookie("exito", "Usuario ingresado exitosamente", time() + 3600);
            header('Location:'. constant('URL')."Main/principal");
            
        }else{
            setcookie("fracaso", "Algo salio mal al insertar el usuario", time() + 3600 );
            header('Location:'. constant('URL')."Main/principal");
            
        }
        }
    }


    public function inicioSesion(){
        
        parent::__construct();

        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];
        $usuarioobj = new UsuarioBean();
        $usuarioobj = $this->model->inicioSesion($usuario,$contrasenia,$usuarioobj);
        if($usuarioobj == null){
            setcookie("fracaso", "Usuario no encontrado", time() + 3600);
            header('Location:'. constant('URL')."Main/principal");
    }else{
        if($usuarioobj->getTipoUsuario() == 1){
            session_start();
            $_SESSION["usuario"]=$usuarioobj->getUsuario();
            
            header('Location:'. constant('URL')."Administrador/principal");
        }else if($usuarioobj->getTipoUsuario() == 2){
            session_start();
            $_SESSION["usuario"]=$usuarioobj->getUsuario();
            $_SESSION["empresa"]=$usuarioobj->getEmpresa();
            header('Location:'. constant('URL')."Empresario/principal");
        }else if($usuarioobj->getTipoUsuario() == 3){
            session_start();
            $_SESSION["usuario"]=$usuarioobj->getUsuario();
            $_SESSION["empresa"]=$usuarioobj->getEmpresa();
            header('Location:'. constant('URL')."Empleado/principal");
        }
        
    }
    }
 
}

?>