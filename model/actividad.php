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

		$sql ="INSERT INTO actividades VALUES(?,?,?,?,?,?,?,?,?,?,0)";
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
	
	//Metodo para actualizar actividades
	public function Actualizar(Actividad $data)
	{
		
		$sql ="UPDATE actividades SET 
		idNegocio=?,
		idOrganizacion=?,
		tipo=?,
		fecha=?,
		hora=?,
		duracion=?,
		notas=?,
		idCliente=? 
		WHERE idActividad=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idNegocio,
				$data->idOrganizacion,
				$data->tipo,
				$data->fecha,
				$data->hora,
				$data->duracion,
				$data->notas,
				$data->idCliente,
				$data->idActividad
			)
		);
		
	}

	//Metodo para actualizar estado de actividad
	public function CambiaEstado($idActividad, $estado)
	{
		
		$sql ="UPDATE actividades SET estado=? WHERE idActividad=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$estado,
				$idActividad
			)
		);
	}

	//Metodo para eliminar actividades
	public function Eliminar($idActividad)
	{
		$sql ="DELETE FROM actividades WHERE idActividad=?";
		$this->pdo->prepare($sql)
		->execute(
			array(
				$idActividad
			)
		);
	}

	//Metodo para listar personas por negocio
	public function ListarPersonasPorNegocio($idNegocio)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT personas.nombrePersona, personas.idCliente FROM personas, negocios, pertenece  WHERE personas.idCliente = pertenece.idCliente AND pertenece.idNegocio = negocios.idNegocio AND negocios.idNegocio=?");

			$stm->execute(array($idNegocio));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

   //Metodo para listar organizaciones por negocio
	public function ListarOrganizacionesPorNegocio($idNegocio)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT organizaciones.nombreOrganizacion, organizaciones.idOrganizacion FROM organizaciones, negocios  WHERE organizaciones.idOrganizacion = negocios.idOrganizacion AND negocios.idNegocio=?");

			$stm->execute(array($idNegocio));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} 


	public function ConsultaActividades($valor)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM actividades, usuarios, negocios, organizaciones WHERE actividades.idUsuario = usuarios.idUsuario AND actividades.idNegocio=negocios.idNegocio AND organizaciones.idOrganizacion = actividades.idOrganizacion AND tipo like '%$valor%' || nombreOrganizacion like '%$valor%'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}