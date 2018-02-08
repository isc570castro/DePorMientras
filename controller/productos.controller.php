<?php 
require_once 'model/producto.php';
class ProductosController{

	private $model;

	public function __CONSTRUCT(){
		$this->model = new Producto();
	}

	public function Index(){
		$page="view/productos/productos.php";
		$contenedor="view/productos/contenedor.php";
		require_once 'view/index.php';
	}

}



?>