<div class="table-responsive" id="tbl">
	<table class="table table-hover">
		<tr>
			<th>Título</th>
			<th>Clave</th>
			<th>Etapa de Venta</th>
			<th>Valor de negocio</th>
			<th>Fecha de cierre</th>
			<th>Ponderación</th>
			<th>Organización</th>
			<th>Persona</th>
			<th align="center">Editar</th>
		</tr>
		<?php foreach($this->model->Listar() as $r): ?>
			<tr>
				<td><?php echo $r->tituloNegocio ?></td>
				<td><?php echo $r->clave ?></td>
				<td><?php echo $r->nombreEtapa ?></td>
				<td>$<?php echo $r->valorNegocio ?> / <?php echo $r->tipoMoneda ?></td>
				<td><?php echo $r->fechaCierre ?></td>
				<td><?php echo $r->ponderacion ?></td>
				<td><?php echo $r->nombreOrganizacion ?></td>
				<td><?php echo $r->nombrePersona ?></td>
				<td><a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#" onclick="myFunctionEditar()"> <span class="glyphicon glyphicon-pencil"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>