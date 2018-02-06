<?php

$conexion=new mysqli("localhost","root","","ammmec");

$consultaBusqueda = $_POST['valorBusqueda'];

$mensaje = ""; 	
	$query= "SELECT NOMBREORGANIZACION FROM organizacion WHERE NOMBREORGANIZACION like '%$consultaBusqueda%' ";
    $resultado=$conexion->query($query);
	$row_cnt = $resultado->num_rows;


 while ($row=$resultado->fetch_assoc()){
	?>
	<p><?php echo $row['NOMBREORGANIZACION']; ?></p>

	<?php } 


echo $mensaje;
?>

<!--

$query_services = mysql_query("SELECT NOMBREORGANIZACION FROM organizacion WHERE NOMBREORGANIZACION like '" . $search . "%' ORDER BY NOMBREORGANIZACION DESC", $conexion);

while ($row_services = mysql_fetch_array($query_services)) {
    echo '<div class="suggest-element"><a data="'.$row_services['NOMBREORGANIZACION'].'"></a></div>';
}*/-->


