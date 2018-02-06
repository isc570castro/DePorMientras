<?php
class Organizacion
{
	private $pdo;    
	public $Nombre;
	public $Propietario;
	public $Direccion;
	public $PaginaWeb;
	public $Telefono;
	
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
	//Metodo para listar datos
	public function Listar()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM organizaciones, usuarios WHERE organizaciones.idUsuario = usuarios.idUsuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Metodo para contar las organizaciones
	public function Contador()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT COUNT(*) FROM organizaciones ");
			$stm->execute();
			$cont = implode($stm->fetchAll(PDO::FETCH_COLUMN));
			return $cont;	
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Metodo para registrar
	public function Registrar(Organizaciones $data)
	{
		try 
		{
			$sql = "INSERT INTO organizaciones (nombreOrganizacion,idUsuario,direccion,paginaWeb,telefono) 
			VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					$data->Nombre,
					$data->Propietario, 
					$data->Direccion, 
					$data->PaginaWeb,
					$data->Telefono
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Organizaciones $data)
	{
		try 
		{
			$sql = "UPDATE organizaciones SET 
			nombreOrganizacion = ?,
			idUsuario = ?,
			direccion = ?,
			paginaWeb = ?,
			telefono = ? 
			WHERE idOrganizacion = ? ";

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
	public function Eliminar(Organizaciones $data)
	{
		try 
		{
			$sql = "DELETE FROM organizaciones WHERE idOrganizacion = ? ";
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