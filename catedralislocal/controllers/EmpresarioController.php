<?php

class EmpresarioController extends Controller{//extenderemos de controller para poder acceder a sus funciones


    function principal(){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            if(isset($_COOKIE["exito"])){

                $this->view->exito=$_COOKIE["exito"];
                
                setcookie("exito", null, time() - 3600,"/",$_SERVER["HTTP_HOST"]);
                
               
            }else if(isset($_COOKIE["fracaso"])){
                $this->view->fracaso=$_COOKIE["fracaso"];
                
                setcookie("fracaso", null, time() - 3600,"/",$_SERVER["HTTP_HOST"]);
            }
        
            $empresa = new EmpresasBean();
            $this->view->usuario= $this->model->nombreUsuario($_SESSION["usuario"]);
            $this->view->empresa= $this->model->empresaInfo($_SESSION["empresa"],$empresa);
            $this->view->listaEmpleados= $this->model->listaEmpleados($_SESSION["empresa"]);
            $this->view->renderView('empresario/principal.php');
        }else{
            header('Location:'. constant('URL')."Main/principal");
        }
        
    }
    
    function eventos(){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            
            
            if(isset($_COOKIE["exito"])){

                $this->view->exito=$_COOKIE["exito"];
                
                setcookie("exito", null, time() - 3600,"/",$_SERVER["HTTP_HOST"]);
                
               
            }else if(isset($_COOKIE["fracaso"])){
                $this->view->fracaso=$_COOKIE["fracaso"];
                
                setcookie("fracaso", null, time() - 3600,"/",$_SERVER["HTTP_HOST"]);
            }
        
            if(isset($_POST["fechabuscar"])){
                $fechaBusqueda=$_POST["fechabuscar"];
                $fechaEntera = strtotime($fechaBusqueda);
                $anioif = date("Y", $fechaEntera);
                $mesif = date("m", $fechaEntera);
                $diaif = date("d", $fechaEntera);
                $hora = date("H", $fechaEntera);
                $minutos = date("i", $fechaEntera);
                $segundos = date("s", $fechaEntera);
 
                $dt1 = new DateTime($fechaBusqueda);
                $date1 = $dt1->format('Y-m-d');
                $diasCant=date( 't', strtotime( $date1 ));
                $mes = $mesif;
                $anio=$anioif; 
                $catidadDias= $diasCant;
                $this->view->busquedascript= $date1 ."T".$hora.":".$minutos.":".$segundos;
                $this->view->datobusqueda = $fechaBusqueda;
                $this->view->listaEventos= $this->model->listaEventosBusqueda($_SESSION["usuario"],$mesif, $anioif,$diasCant);
            }else{
                $mes = date("m");
                $anio=date("Y"); 
                $catidadDias= date( 't' );
                $this->view->listaEventos= $this->model->listaEventos($_SESSION["usuario"]);
            }
            

            $this->view->usuario= $this->model->nombreUsuario($_SESSION["usuario"]);
            $empresa = new EmpresasBean();
            $this->view->empresa= $this->model->empresaInfo($_SESSION["empresa"],$empresa);
            $this->view->listaCategorias= $this->model->listaCategorias($_SESSION["usuario"]);
            $this->view->mes=$mes;
            $this->view->anio=$anio;
            $this->view->cantidadDias=$catidadDias;
            
            $this->view->renderView('empresario/eventos.php');
        }else{
            header('Location:'. constant('URL')."Main/principal");
        }
        
    }

    function buscarEvento(){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            if(isset($_COOKIE["exito"])){

                $this->view->exito=$_COOKIE["exito"];
                
                setcookie("exito", null, time() - 3600,"/",$_SERVER["HTTP_HOST"]);
                
               
            }else if(isset($_COOKIE["fracaso"])){
                $this->view->fracaso=$_COOKIE["fracaso"];
                
                setcookie("fracaso", null, time() - 3600,"/",$_SERVER["HTTP_HOST"]);
            }
            $fechaBusqueda=$_POST["fechabuscar"];
            $fechaEntera = strtotime($fechaBusqueda);
            $anio = date("Y", $fechaEntera);
            $mes = date("m", $fechaEntera);
            $dia = date("d", $fechaEntera);
            $dt1 = new DateTime($fechaBusqueda);
            $date1 = $dt1->format('Y/m/d');

 
            $empresa = new EmpresasBean();
            $this->view->usuario= $this->model->nombreUsuario($_SESSION["usuario"]);
            $this->view->empresa= $this->model->empresaInfo($_SESSION["empresa"],$empresa);
            $this->view->listaEventos= $this->model->listaEventosBusqueda($_SESSION["usuario"], $mes, $anio);
            $this->view->listaCategorias= $this->model->listaCategorias($_SESSION["usuario"]);
            $this->view->renderView('empresario/eventosbusqueda.php');
        }else{
            header('Location:'. constant('URL')."Main/principal");
        }
        
    }
    
    function categorias(){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            if(isset($_COOKIE["exito"])){

                $this->view->exito=$_COOKIE["exito"];
                
                setcookie("exito", null, time() - 3600,"/",$_SERVER["HTTP_HOST"]);
                
               
            }else if(isset($_COOKIE["fracaso"])){
                $this->view->fracaso=$_COOKIE["fracaso"];
                
                setcookie("fracaso", null, time() - 3600,"/",$_SERVER["HTTP_HOST"]);
            }
        
            $empresa = new EmpresasBean();
            $this->view->usuario= $this->model->nombreUsuario($_SESSION["usuario"]);
            $this->view->empresa= $this->model->empresaInfo($_SESSION["empresa"],$empresa);
            $this->view->listaCategorias= $this->model->listaCategorias($_SESSION["usuario"]);
            $this->view->renderView('empresario/categorias.php');
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
   
    public function agregarEmpleado(){
       
      
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            $nombreuser = $_POST["nombre"];
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];
            $usuario = $_POST["usuario"];
            $contrasenia = $_POST["contrasenia"];
            $usuarioobj = new UsuarioBean();
            $tipoUsuario = new TipoUsuarioBean();
           
            $usuarioobj->setNombre($nombreuser);
            $usuarioobj->setUsuario($usuario);
            $usuarioobj->setCorreo($correo);
            $usuarioobj->setContrasenia($contrasenia);
            $usuarioobj->setTelefono($telefono);
            $tipoUsuario->setTipoUsuario(3);
            $usuarioobj->setTipoUsuario($tipoUsuario);
            $usuarioobj->setEmpresa($_SESSION["empresa"]);
            
            
            if($this->model->agregarUsuario($usuarioobj)){
                
                setcookie("exito", "empleado agregado exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/principal");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al agregar el empleado", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/principal");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }

    public function agregarCategoria(){
 
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
          
            $categoriaobj = new CategoriaBean();
           
            $categoriaobj->setCategoria($titulo);
            $categoriaobj->setDescripcionCategoria($descripcion);
            $categoriaobj->setIdUsuario($_SESSION["usuario"]);
            
            if($this->model->agregarCategoria($categoriaobj)){
                
                setcookie("exito", "categoria agregada exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/categorias");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al agregar la categoria", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/categorias");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }

    public function agregarEvento(){
       
      
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            
            $titulo = $_POST["tituloevento"];
            $descripcion = $_POST["descripcionevento"];
            $fechainicio = $_POST["inicioevento"];
            $fechafin = $_POST["finevento"];
            $idcategoria = $_POST["categoriaevento"];
          
            $dt1 = new DateTime($fechainicio);
            $date1 = $dt1->format('Y/m/d');
            $time1 = $dt1->format('H:i:s');

            $dt2 = new DateTime($fechafin);
            $date2 = $dt2->format('Y/m/d');
            $time2 = $dt2->format('H:i:s');
            $eventosobj = new EventosBean();
           
            
            $eventosobj->setTituloEvento($titulo);
            $eventosobj->setDescripcionEvento($descripcion);
            $eventosobj->setFechaInicio($date1);
            $eventosobj->setFechaFin($date2);
            $eventosobj->setHoraInicio($time1);
            $eventosobj->setHoraFin($time2);
            $eventosobj->setCategoria($idcategoria);

            if($this->model->agregarEvento($eventosobj)){
                
                setcookie("exito", "evento agregado exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/eventos");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al agregar el evento", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/eventos");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }

    public function modificarEmpleado(){
       
      
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            $nombreuser = $_POST["nombre"];
            $correo = $_POST["correo"];
            $telefono = $_POST["telefono"];
            $usuario = $_POST["usuario"];
            $idemplado = $_POST["idempleado"];
            $usuarioobj = new UsuarioBean();
           
            $usuarioobj->setNombre($nombreuser);
            $usuarioobj->setUsuario($usuario);
            $usuarioobj->setCorreo($correo);
            $usuarioobj->setTelefono($telefono);
            $usuarioobj->setIdUsuario($idemplado);
            
            
            if($this->model->modificarUsuario($usuarioobj)){
                
                setcookie("exito", "empleado modificado exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/principal");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al modificar el empleado", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/principal");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }

    public function modificarCategoria(){
       
      
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            $idcategoria = $_POST["idcategoriamodi"];
            $categoria = $_POST["titulomodi"];
            $descripcioncat = $_POST["descripcionmodi"];
            
            $categoriaobj = new CategoriaBean();
           
            $categoriaobj->setIdCategoria($idcategoria);
            $categoriaobj->setCategoria($categoria);
            $categoriaobj->setDescripcionCategoria($descripcioncat);
          
            
            if($this->model->modificarCategoria($categoriaobj)){
                
                setcookie("exito", "categoria modificada exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/categorias");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al modificar la categoria", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/categorias");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }

    public function modificarEvento(){
       
      
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){

            $idevento = $_POST["ideventomodi"];
            $titulo = $_POST["tituloevento"];
            $descripcion = $_POST["descripcionevento"];
            $fechainicio = $_POST["inicioevento"];
            $fechafin = $_POST["finevento"];
            $idcategoria = $_POST["categoriaevento"];
          
            $dt1 = new DateTime($fechainicio);
            $date1 = $dt1->format('Y/m/d');
            $time1 = $dt1->format('H:i:s');

            $dt2 = new DateTime($fechafin);
            $date2 = $dt2->format('Y/m/d');
            $time2 = $dt2->format('H:i:s');
            $eventosobj = new EventosBean();
           
            $eventosobj->setIdEvento($idevento);
            $eventosobj->setTituloEvento($titulo);
            $eventosobj->setDescripcionEvento($descripcion);
            $eventosobj->setFechaInicio($date1);
            $eventosobj->setFechaFin($date2);
            $eventosobj->setHoraInicio($time1);
            $eventosobj->setHoraFin($time2);
            $eventosobj->setCategoria($idcategoria);

            if($this->model->modificarEvento($eventosobj)){
                
                setcookie("exito", "evento modificado exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/eventos");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al modificar el evento", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/eventos");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }


    public function eliminarEvento($idevento){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){
            $id=$_POST["id"];
            if($this->model->eliminarEvento($idevento)){
                
                setcookie("exito", "evento eliminado exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/eventos");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al eliminar el evento", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/eventos");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }

    public function eliminarEmpleado($idemplado){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){
            $id=$_POST["id"];
            if($this->model->eliminarUsuario($idemplado)){
                
                setcookie("exito", "empleado eliminado exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/principal");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al eliminar el empleado", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/principal");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }

    public function eliminarCategoria($idcategoria){
        parent::__construct();
        session_start();
        if(isset($_SESSION["usuario"])){
            
            if($this->model->eliminarCategoria($idcategoria)){
                
                setcookie("exito", "categoria eliminada exitosamente", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/categorias");
                
            }else{
                setcookie("fracaso", "algo ha salido mal al eliminar la categoria", time() + 3600,"/",$_SERVER["HTTP_HOST"]);
                header('Location:'. constant('URL')."Empresario/categorias");
                
            }

        }else{
        
            header('Location:'. constant('URL')."Main/principal");
        }
    }
 
}

?>