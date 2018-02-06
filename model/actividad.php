<?php
class Actividad
{    
	public $idActividad;
	public $nombreActividad;
	public $idUsuario;
	public $idNegocio;
	public $idOrganizacion;
	public $tipo;
	public $fecha;
	public $hora;
	public $duracion;
	public $notas;
	private $pdo;
	
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
	//Metodo para listar las actividades
	public function Listar()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM actividades, usuarios, negocios, organizaciones WHERE actividades.idUsuario = usuarios.idUsuario AND actividades.idNegocio=negocios.idNegocio AND organizaciones.idOrganizacion = actividades.idOrganizacion");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Metodo para contar las actividades
	public function Contador()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT COUNT(*) FROM actividades ");
			$stm->execute();
			$cont = implode($stm->fetchAll(PDO::FETCH_COLUMN));
			return $cont;	
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    //Metodo para registrar actividades
	public function Registrar(Actividad $data)
	{
		try
		{
			$sql ="INSERT INTO actividades VALUES(?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->idUsuario,
					$data->idNegocio,
					$data->idOrganizacion,
					$data->tipo,
					$data->fecha,
					$data->hora,
					$data->duracion,
					$data->notas,
					$data->idCliente
				)
			);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}