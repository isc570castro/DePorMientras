<?php 

require_once 'model/actividad.php';
require_once 'model/negocio.php';
require_once 'model/persona.php';
require_once 'model/organizacion.php';

class ActividadesController{

	private $model;
	private $modelNegocios;
	private $pdo;
	private $mensaje;
	private $error;

	public function __CONSTRUCT()
	{
		try{
			$this->model = new Actividad();
			$this->modelNegocio = new Negocio();
			$this->modelPersona = new Persona();
			$this->modelOrganizacion = new Organizacion();
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Index(){
		$page="view/actividades/actividades.php";
		require_once 'view/index.php';
	}

	public function Guardar(){
		try
		{
			$actividad= new Actividad();
			$actividad->idActividad=$_REQUEST['idActividad'];
			$actividad->idUsuario=2;
			$actividad->idNegocio=$_REQUEST['idNegocio'];
			$actividad->idOrganizacion=$_REQUEST['idOrganizacion'];
			$actividad->tipo=$_REQUEST['tipo'];
			$actividad->fecha=$_REQUEST['fecha'];
			$actividad->hora=$_REQUEST['hora'];
			$actividad->duracion=$_REQUEST['duracion'];
			$actividad->notas=$_REQUEST['notas'];
			$actividad->idCliente=3;

			if($actividad->idActividad>0){
				$this->model->Actualizar($actividad);
				$this->mensaje="Se han actualizado correctamente los datos";
			}else{
				$this->model->Registrar($actividad);
				$this->mensaje="Se ha registrado correctamente la actividad";
			}
			$this->Index();
		}
		catch(Exception $e)
		{
			//die($e->getMessage());
			$this->error=true;
			$this->mensaje= "Se ha producido un error al guardar la actividad";
			$this->Index();
		}	
	}
}
