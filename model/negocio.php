<?php
class Negocio
{    
	public $idNegocio;
	public $idUsuario;
	public $idEtapa;
	public $idOrganizacion;
	public $idCliente;
	public $clave;
	public $tituloNegocio;
	public $valorNegocio;
	public $tipoMoneda;
	public $fechaCierre;
	public $contadorActivo;
	public $status;

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
			$stm = $this->pdo->prepare("SELECT * FROM negocios, organizaciones, pertenece, etapasventas, personas WHERE negocios.idOrganizacion = organizaciones.idOrganizacion AND negocios.idNegocio = pertenece.idNegocio AND pertenece.idCliente = personas.idCliente AND negocios.idEtapa = etapasventas.idEtapa");
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
			$stm = $this->pdo->prepare("SELECT COUNT(*) FROM negocios ");
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