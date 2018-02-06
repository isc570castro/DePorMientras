<?php 

class Productos{

	private $pdo;
	
	public $IdProductos;
	public $NombreProducto;
	public $CodigoProducto;
	public $PUnitario;
	public $TipoMonedaUni;
	public $CostoXUnidad;
	public $CostoDirecto;
	public $ProyServ;
	public $Equipo;
	public $PrecioRefe;
	public $TipoMonedaRef;
	public $TiempoEntrega;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Metodo para listar
	public function Listar()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM productos ");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}




}


?>