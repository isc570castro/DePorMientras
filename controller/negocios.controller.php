<?php 
require_once 'model/negocio.php';

class NegociosController{

  private $contenedor;

  public function __CONSTRUCT()
  {
    try{
      $this->model = new Negocio();
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function Index(){
    $this->contenedor="view/negocios/negocios.php";
    $page="view/negocios/encabezado.php";
    require_once 'view/index.php';
  }

  public function Index2(){
    $page="view/negocios/encabezado.php";
    require_once 'view/index.php';
  }

  public function lista(){
    $this->contenedor="view/negocios/lista.php";
    $this->Index2();
  }

  public function timeline(){
    $this->contenedor="view/negocios/timeline.php";
    $this->Index2();
  }

  public function ConfigurarEmbudos(){
     $page="view/configuracion/menu.php";
     $contenedor="view/configuracion/embudos.php";
     require_once 'view/index.php';
  }

}

?>