<?php 
require_once 'model/organizacion.php';

class OrganizacionesController{

  private $model;
  private $pdo;
  public $mensaje;
  private $error;
  
  public function __CONSTRUCT(){
   $this->model = new Organizacion();
}

public function Index(){
    $page="view/organizaciones/organizaciones.php";
    require_once 'view/index.php';
}

public function Guardar(){
    try
    {
        if (!isset($_REQUEST['idOrganizacion'])){
            header("Location: index.php?c=Organizaciones");
        }else{
            $organizacion= new Organizacion();
            $organizacion->idOrganizacion=$_REQUEST['idOrganizacion'];
            $organizacion->idUsuario=1;
            $organizacion->nombreOrganizacion=$_REQUEST['nombreOrganizacion'];
            $organizacion->direccion=$_REQUEST['direccion'];
            $organizacion->paginaWeb=$_REQUEST['paginaWeb'];
            $organizacion->telefono=$_REQUEST['telefono'];
            $organizacion->clave=$_REQUEST['clave'];


            if($organizacion->idOrganizacion>0){
                $this->model->Actualizar($organizacion);
                $this->mensaje="Se han actualizado correctamente los datos";
            }else{
                $this->model->Registrar($organizacion);
                $this->mensaje="Se ha registrado correctamente la organizacion";
            }
            $this->Index();
        }
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        $this->error=true;
        $this->mensaje= "Se ha producido un error al guardar la actividad";
        $this->Index();
    }   
}


}
?>