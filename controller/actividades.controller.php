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
			if (!isset($_REQUEST['idActividad'])){
				header("Location: index.php?c=Actividades");
			}else{
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
				$actividad->idCliente=$_REQUEST['idCliente'];

				if($actividad->idActividad>0){
					$this->model->Actualizar($actividad);
					$this->mensaje="Se han actualizado correctamente los datos";
				}else{
					$this->model->Registrar($actividad);
					$this->mensaje="Se ha registrado correctamente la actividad";
				}
				$this->Index();
			}
		}
		catch(Exception $e)
		{
			die($e->getMessage());
			$this->error=true;
			$this->mensaje= "Se ha producido un error al guardar la actividad";
			$this->Index();
		}	
	}

	public function Eliminar(){
		try
		{
			if (!isset($_REQUEST['idActividad'])){
				header("Location: index.php?c=Actividades");
			}
			$idActividad=$_REQUEST['idActividad'];
			$this->model->Eliminar($idActividad);
			$this->mensaje="Se elimino correctamente la actividad";
			$this->Index();
		}
		catch(Exception $e)
		{
			//die($e->getMessage());
			$this->error=true;
			$this->mensaje= "Se ha producido un error al eliminar la actividad";
			$this->Index();
		}	
	}


	//Metodo para listar personas en base al negocio
	public function ListarPersonasPorNegocio(){
		header('Content-Type: application/json');
		$idNegocio=$_REQUEST['idNegocio'];
		$datos = array();
		foreach ($this->model->ListarPersonasPorNegocio($idNegocio) as $persona):
			$row_array['idCliente']  = $persona->idCliente;
			$row_array['nombrePersona']  = $persona->nombrePersona;
			array_push($datos, $row_array);
		endforeach;		
		echo json_encode($datos, JSON_FORCE_OBJECT);
	}

	//Metodo para listar organizaciones en base al negocio
	public function ListarOrganizacionesPorNegocio(){
		header('Content-Type: application/json');
		$idNegocio=$_REQUEST['idNegocio'];
		$datos = array();
		foreach ($this->model->ListarOrganizacionesPorNegocio($idNegocio) as $organizacion):
			$row_array['idOrganizacion']  = $organizacion->idOrganizacion;
			$row_array['nombreOrganizacion']  = $organizacion->nombreOrganizacion;
			array_push($datos, $row_array);
		endforeach;
		
		echo json_encode($datos, JSON_FORCE_OBJECT);

	}

	//Metodo para cambiar el estado con checkbox
	public function CambiaEstado(){
		$idActividad=$_REQUEST['idActividad'];
		$estado=$_REQUEST['estado'];
		if($estado==1)
			$this->model->CambiaEstado($idActividad,0);
		else
			$this->model->CambiaEstado($idActividad,1);
		echo $this->mensaje="Se ha actualizado correctamente el estado";
	}

	//Metodo para realizar las consultas de acuerdo al valor de busqueda
	public function Consultas(){
		$valorBusqueda=$_REQUEST['valorBusqueda'];
		$resultado=$this->model->ConsultaActividades($valorBusqueda);
		echo '<table class="table table-hover">
		<tr>
		<th>Completado</th>
		<th>Actividad</th>
		<th>Usuario</th>
		<th>Negocio</th>
		<th>Organización</th>
		<th>Fecha</th>
		<th>Hora</th>
		<th>Duración</th>
		<th>Notas</th> 
		<th>Acción</th>
		</tr>';
		if($resultado==null){
			echo "No hay coincidencias";
		}
		foreach ($resultado as $r) :
			echo $r->estado;
			echo '
			<tr>
			<td>
			<input type="checkbox" id="checkEstado" onclick="cambiaEstado(' . $r->idActividad . ')"></td>
			<td>'. $r->tipo .'</td>
			<td>'. $r->usuario .'</td>
			<td>'. $r->tituloNegocio .'</td>
			<td>'. $r->nombreOrganizacion .'</td>
			<td>'. $r->fecha .'</td>
			<td>'. $r->hora .'</td>
			<td>'. $r->duracion .'</td>
			<td>'. $r->notas .'</td>
			<td><a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#añadiractividad" onclick="myFunctionEditar(' . $r->idActividad . ',' . $r->tipo . ',' . $r->usuario . ',' . $r->tituloNegocio. ','. $r->nombreOrganizacion. ',' .$r->fecha . ',' . $r->hora . ',' . $r->duracion . ',' . $r->notas .')"> <span class="glyphicon glyphicon-refresh"></span></a></td>
			</tr>';
		endforeach;
	}
}
