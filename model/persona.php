<?php
class Persona
{
	private $pdo;
	public $IdCliente;
	public $IdOrganizacion;
	public $IdUsuario;
	public $NombreCompleto;
	public $Telefono;
	public $Email;
	public $Honorifico;
	public $Puesto;
	public $NomOrganizacion;
	
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
			$stm = $this->pdo->prepare("SELECT * FROM personas, organizaciones, usuarios WHERE personas.idOrganizacion = organizaciones.idOrganizacion AND personas.idUsuario = usuarios.idUsuario");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Metodo para contar las personas
	public function Contador()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT COUNT(*) FROM personas ");
			$stm->execute();
			$cont = implode($stm->fetchAll(PDO::FETCH_COLUMN));
			return $cont;	
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Metodo para listar
	public function Registrar(Personas $data)
	{
		try 
		{
			$sql = "INSERT INTO personas (idOrganizacion,idUusuario,nombrePersona,telefono,email,honorifico,puesto) 
			VALUES (?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->idOrganizacion,
					$data->IdUsuario, 
					$data->NombreCompleto, 
					$data->Telefono,
					$data->Email,
					$data->Honorifico,
					$data->Puesto
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Personas $data)
	{
		try 
		{
			$sql = "UPDATE  SET 
			NOMBRECOMPLETO = ?,
			PROPIETARIO = ?,
			DIRECCION = ?,
			PAGINAWEB = ?,
			TELEFONO = ? 
			WHERE IDORGANIZACION = ? ";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->Nombre,
					$data->Propietario, 
					$data->Direccion, 
					$data->PaginaWeb,
					$data->Telefono,
					$data->id
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	//Metdo para eliminar
	public function Eliminar(Personas $data)
	{
		try 
		{
			$sql = "DELETE FROM  WHERE IDORGANIZACION = ? ";
			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->id
				)
			);                    
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}