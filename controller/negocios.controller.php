<?php 

class NegociosController{

  private $contenedor;

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
}

?>