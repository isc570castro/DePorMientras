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
		if (!$valorBusqueda=="")
			$resultado=$this->model->ConsultaActividades($valorBusqueda);
		else
			$resultado=$this->model->Listar();	
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
			echo '
			<tr>
			<td>
			<input type="checkbox"'; if($r->estado==1){ echo 'checked=true'; } echo 'id="checkEstado" onclick="cambiaEstado(' . $r->idActividad . ')"></td>
			<td>'. $r->tipo .'</td>
			<td>'. $r->usuario .'</td>
			<td>'. $r->tituloNegocio .'</td>
			<td>'. $r->nombreOrganizacion .'</td>
			<td>'. $r->fecha .'</td>
			<td>'. $r->hora .'</td>
			<td>'. $r->duracion .'</td>
			<td>'. $r->notas .'</td>
			<td><a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#añadiractividad" onclick="myFunctionEditar('.$r->idActividad; ?> , <?php echo  "'".$r->tipo."'"; ?> , <?php echo  "'".$r->tituloNegocio."'"; ?> , <?php echo  $r->idNegocio; ?> , <?php echo  "'".$r->nombreOrganizacion."'"; ?> , <?php echo  $r->idOrganizacion; ?> , <?php echo  "'".$r->fecha."'"; ?>  
				, <?php echo  "'".$r->hora."'"; ?> , <?php echo  "'".$r->duracion."'"; ?> , <?php echo  "'".$r->notas."'"; ?> , <?php echo  "'".$r->nombrePersona ."'"; ?> , <?php echo  $r->idCliente; echo ')"> <span class="glyphicon glyphicon-refresh"></span></a></td>
				</tr>';
			endforeach;
		}


		public function Exportar(){
			$valorBusqueda=$_REQUEST['valorBusqueda'];
			if (!$valorBusqueda=="")
				$resultado=$this->model->ConsultaActividades($valorBusqueda);
			else
				$resultado=$this->model->Listar();	

			require 'assets/plugins/PHPExcel/Classes/PHPExcel/IOFactory.php';

			//Logotipo
			$gdImage = imagecreatefrompng('assets/imagenes/logoammmec.png');

			//Objeto de PHPExcel
			$objPHPExcel  = new PHPExcel();

			//Propiedades de Documento
			$objPHPExcel->getProperties()->setCreator(" creador del reporte ")->setDescription("Actividades");

			//Establecemos la pestaña activa y nombre a la pestaña
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setTitle("actividades");
			$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
			$objDrawing->setName('Logotipo');
			$objDrawing->setDescription('Logotipo');
			$objDrawing->setImageResource($gdImage);
			$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
			$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
			$objDrawing->setHeight(100);
			$objDrawing->setCoordinates('J1');
			$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

			$estiloTituloReporte = array(
				'font' => array(
					'name'      => 'Arial',
					'bold'      => true,
					'italic'    => false,
					'strike'    => false,
					'size' =>13
				),
				'fill' => array(
					'type'  => PHPExcel_Style_Fill::FILL_SOLID
				),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_NONE
					)
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
			);

			$estiloTituloColumnas = array(
				'font' => array(
					'name'  => 'Arial',
					'bold'  => true,
					'size' =>10,
					'color' => array(
						'rgb' => 'FFFFFF'
					)
				),
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => '538DD5')
				),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				),
				'alignment' =>  array(
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
			);

			$estiloInformacion = new PHPExcel_Style();
			$estiloInformacion->applyFromArray( array(
				'font' => array(
					'name'  => 'Arial',
					'color' => array(
						'rgb' => '000000'
					)
				),
				'fill' => array(
					'type'  => PHPExcel_Style_Fill::FILL_SOLID
				),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				),
				'alignment' =>  array(
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
			));

			$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($estiloTituloReporte);
			$objPHPExcel->getActiveSheet()->getStyle('A2:C2')->applyFromArray($estiloTituloColumnas);

			//	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE PRODUCTOS');
			//	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');

			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$objPHPExcel->getActiveSheet()->setCellValue('A2', 'ACTIVIDAD');
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$objPHPExcel->getActiveSheet()->setCellValue('B2', 'USUARIO');
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$objPHPExcel->getActiveSheet()->setCellValue('C2', 'NEGOCIO');
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$objPHPExcel->getActiveSheet()->setCellValue('D2', 'ORGANIZACION');
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$objPHPExcel->getActiveSheet()->setCellValue('E2', 'FECHA');
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
			$objPHPExcel->getActiveSheet()->setCellValue('F2', 'HORA');
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
			$objPHPExcel->getActiveSheet()->setCellValue('G2', 'DURACION');
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
			$objPHPExcel->getActiveSheet()->setCellValue('H2', 'NOTAS');

			//Establecemos en que fila inciara a imprimir los datos
			$fila = 3; 

			//Recorremos los resultados de la consulta y los imprimimos
			while(!$resultado == null){
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $resultado->tipo);
			//Sumamos 1 para pasar a la siguiente fila
				$fila++; 
				
			}

			header("Content-Type: application/vnd.ms-excel");
			header('Content-Disposition: attachment;filename="Actividades.csv"');
			header('Cache-Control: max-age=0');

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
		}	
	}