<?php 
require_once 'model/persona.php';
class PersonasController{

  private $model;

  public function __CONSTRUCT(){
   $this->model = new Persona();
}

public function Index(){
    $page="view/personas/personas.php";
    $contenedor="view/personas/contenedor.php";
    require_once 'view/index.php';
}

public function Guardar(){
    $alm = new Personas();
    
        //$alm->IdC = $_REQUEST['IdC'];
    $alm->IdOrganizacion = $_REQUEST['IdOrganizacion'];
    $alm->IdUsuario = $_REQUEST['IdUsuario'];
    $alm->NombreCompleto = $_REQUEST['NomPersona'];
    $alm->Telefono = $_REQUEST['Telefono'];
    $alm->Email = $_REQUEST['Emailc'];
    $alm->Honorifico = $_REQUEST['Honorifico'];
    $alm->Puesto = $_REQUEST['Puesto'];

    
    $this->model->Registrar($alm);

        //header("Location: ?c=organizaciones");
    echo '<script> window.location = "?c=personas"; </script>';
}
}



?>