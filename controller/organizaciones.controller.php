<?php 
require_once 'model/organizaciones.php';

class OrganizacionesController{

  private $model;
  private $pdo;
  public $mensaje;
  
  public function __CONSTRUCT(){
     $this->model = new Organizaciones();
 }

 public function Index(){
    $page="view/organizaciones/organizaciones.php";
    require_once 'view/index.php';
}

public function Guardar(){
    try
    {
        $alm = new Organizaciones();
        $alm->id = $_REQUEST['idOrganizacion'];
        $alm->Nombre = $_REQUEST['nombreOrganizacion'];
        $alm->Propietario = $_REQUEST['propietario'];
        $alm->Direccion = $_REQUEST['direccion'];
        $alm->PaginaWeb = $_REQUEST['paginaWeb'];
        $alm->Telefono = $_REQUEST['telefono'];

        if(isset($_POST['Actualizar'])){

            if ($alm->id > 0){
                $this->model->Actualizar($alm); 
            }else{

                $this->model->Registrar($alm); 
                $mensaje="Se ha registrado correctamente la organización";
            }

        }else if(isset($_POST['Eliminar'])){
            $this->model->Eliminar($alm);
        }
        $page="view/organizaciones/organizaciones.php";
        require_once 'view/index.php';
    }
    catch(Exception $e)
    {
        $error=true;
        $mensaje= "Se ha producido un error al guardar la organización";
        $page="view/organizaciones/organizaciones.php";
        require_once 'view/index.php';
    }
}
}
?>