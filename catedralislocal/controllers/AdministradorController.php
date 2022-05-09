<?php

class AdministradorController extends Controller{//extenderemos de controller para poder acceder a sus funciones

    function __construct(){
     
    
    }
 
    function principal(){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){
            
            $this->view->usuario= $this->model->nombreUsuario($_SESSION["usuario"]);
           
            $this->view->renderView('administrador/principal.php');
        }else{
            header('Location:'. constant('URL')."Main/principal");
        }
        
    }
    function cerrarSesion(){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){
            $_SESSION["usuario"]=null;
            unset($_SESSION["usuario"]);
            header('Location:'. constant('URL')."Main/principal");
        }else{
           
            header('Location:'. constant('URL')."Main/principal");
        }
        
    }

}

?>