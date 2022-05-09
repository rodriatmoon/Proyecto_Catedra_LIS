<?php

class EmpleadoController extends Controller{//extenderemos de controller para poder acceder a sus funciones

    function __construct(){
     
    
    }

    function principal(){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){
            $this->view->renderView('empleado/principal.php');
        }else{
            header('Location:'. constant('URL')."Main/principal");
        }
        
    }
   
}

?>