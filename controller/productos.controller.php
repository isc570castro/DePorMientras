<?php 
require_once 'model/productos.php';
class ProductosController{

	private $model;

	public function __CONSTRUCT(){
		$this->model = new Productos();
	}

	public function Index(){
		$page="view/productos/productos.php";
		$contenedor="view/productos/contenedor.php";
		require_once 'view/index.php';
	}

}



?>