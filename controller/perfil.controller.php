<?php 
//require_once 'model/producto.php';
class PerfilController{

	private $model;

	public function __CONSTRUCT(){
		//$this->model = new Producto();
	}

	public function Index(){
		$page="view/configuracion/menu.php";
		$contenedor="view/configuracion/perfil.php";
		require_once 'view/index.php';
	}
}
?>