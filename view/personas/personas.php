<div class="panel-body">
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="btn-group">
				<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mPersona"> Añadir persona </a>
			</div>
			<br><br>
		</div>

		<div class="col-xs-4 col-sm-4 col-md-3 col-lg-4" align="center">
			<div class="btn-group">
				<?php $Contador = $this->model->Contador(); 
				if ($Contador == 1) { ?>

					<h5><strong><?php echo ($Contador) ?> Persona</strong></h5>
					<?php 
				}else { ?>
					<h5><strong><?php echo ($Contador) ?> Personas</strong></h5>

					<?php } ?>
				</div>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-2 col-lg-4" align="right">
				<div class="btn-group btn-sm">
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true"><span class="glyphicon glyphicon-list"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right btn-sm" aria-labelledby="dropdownMenu1">
							<li><a href="#"> Exportar resultados del filtro </a></li> 
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-lg-12">
				<div class="btn-group btn-group-sm" role="group" aria-label="...">
					<button type="button" class="btn btn-default">Todas</button>
					<button type="button" class="btn btn-default">A</button>
					<button type="button" class="btn btn-default">B</button>
					<button type="button" class="btn btn-default">C</button>
					<button type="button" class="btn btn-default">D</button>
					<button type="button" class="btn btn-default">E</button>
					<button type="button" class="btn btn-default">F</button>
					<button type="button" class="btn btn-default">G</button>
					<button type="button" class="btn btn-default">H</button>
					<button type="button" class="btn btn-default">I</button>
					<button type="button" class="btn btn-default">J</button>
					<button type="button" class="btn btn-default">K</button>
					<button type="button" class="btn btn-default">L</button>
					<button type="button" class="btn btn-default">M</button>
					<button type="button" class="btn btn-default">N</button>
					<button type="button" class="btn btn-default">Ñ</button>
					<button type="button" class="btn btn-default">O</button>
					<button type="button" class="btn btn-default">P</button>
					<button type="button" class="btn btn-default">Q</button>
					<button type="button" class="btn btn-default">R</button>
					<button type="button" class="btn btn-default">S</button>
					<button type="button" class="btn btn-default">T</button>
					<button type="button" class="btn btn-default">U</button>
					<button type="button" class="btn btn-default">V</button>
					<button type="button" class="btn btn-default">W</button>
					<button type="button" class="btn btn-default">X</button>
					<button type="button" class="btn btn-default">Y</button>
					<button type="button" class="btn btn-default">Z</button>
				</div>
			</div>
		</div>     
	</div>
	<!--Fin de Encabezado-->
	<!--Inicio modal de añadir persona -->
	<div class="modal fade" id="mPersona" role="dialog">
		<div class="modal-dialog">
			<form  method="post" action="?c=personas&a=Guardar">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header bg-success">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><strong>Añadir persona nueva</strong></h4>
					</div>
					<!-- Cuerpo -->
					<div class="modal-body">	
						<div class="form-group">

							<div class="form-group">
								<h5>Nombre completo</h5>
								<input type="text" class="form-control" name="NomPersona">
							</div>

							<h5>Teléfono</h5>
							<div class="row">
								<div class="form-group">
									<div class="col-xs-4 col-sm-4" style="width: 60%">
										<input type="text" class="form-control" name="Telefono">
									</div>
									<div class="col-xs-8 col-sm-8" style="width: 40%">
										<select class="form-control">
											<option>Trabajo</option>
											<option>Casa</option>
											<option>Celular</option>
											<option>Otro</option>
										</select>
									</div>
								</div>
							</div>

							<h5>Correo electrónico</h5>
							<div class="row">
								<div class="form-group">
									<div class="col-xs-4 col-sm-4" style="width: 60%">
										<input type="text" class="form-control" name="Emailc">
									</div>
									<div class="col-xs-8 col-sm-8" style="width: 40%">
										<select class="form-control">
											<option>Trabajo</option>
											<option>Casa</option>
											<option>Celular</option>
											<option>Otro</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<h5>Organización</h5>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-briefcase"></span></span>
									<input type="text" class="form-control" aria-describedby="basic-addon2" name="IdOrganizacion">
								</div>
							</div>

							<div class="form-group">
								<input type="hidden" name="IdUsuario" id="IdUsuario" value="1">
							</div>

							<div class="form-group">
								<h5>Honorífico</h5>
								<select class="form-control" name="Honorifico">
									<option>(Ninguno)</option>
									<option value="Ing.">Ing.</option>
									<option value="Lic.">Lic.</option>
									<option value="Sr.">Sr.</option>
									<option value="Srta.">Srta.</option>
								</select>
							</div>

							<div class="form-group">
								<h5>Puesto</h5>
								<input type="text" class="form-control" name="Puesto">
							</div>
						</div>
					</div>
					<!-- fin cuerpo --> 
					<div class="modal-footer">
						<div class="col-lg-12">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<input type="submit" class="btn btn-success" value="Guardar" >
						</div>
					</div>
				</div>
			</form>
		</div>  
	</div>    
	<!--fin modal de añadir persona-->
	<!-- Inicio de contenedor -->
	<div class="table-responsive" id="tbl">
		<table class="table table-hover">
			<tr>
				<th>Nombre Completo</th>
				<th>Organización</th>
				<th>Teléfono</th>
				<th>Email</th>
				<th>Propietario</th>
				<th>Puesto</th>
				<th>Acción</th>
			</tr>	

			<?php foreach($this->model->Listar() as $r): ?>
				<tr>
					<td><?php echo $r->honorifico; ?> <?php echo $r->nombrePersona; ?></td>
					<td><?php echo $r->nombreOrganizacion;?></td>
					<td><?php echo $r->telefono; ?></td>
					<td><?php echo $r->email; ?></td>
					<td><?php echo $r->usuario; ?></td>
					<td><?php echo $r->puesto; ?></td>  
					<td><a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mEditarPersona" onclick="myFunctionEditarPersona()"> Editar <span class="glyphicon glyphicon-refresh"></span></a></td>
				</tr>  
			<?php endforeach; ?>
		</table>
	</div>
	<!-- Fin del contenedor -->

	<script>
		function myFunctionEditarPersona(IdCliente,IdOrganizacion,IdUsuario,NomPersona,Telefono,Emailc,Honorifico,NomOrganizacion,Puesto) {
			$('#txtIdCliente').val(IdCliente);
			$('#txtIdOrganizacion').val(IdOrganizacion);
			$('#txtIdUsuario').val(IdUsuario);  
			$('#txtNomPersonas').val(NomPersona);
			$('#txtTelefono').val(Telefono);
			$('#txtEmailc').val(Emailc); 
			$('#txtHonorifico').val(Honorifico);
			$('#busqueda').val(NomOrganizacion);
			$('#txtPuesto').val(Puesto);
		}
	</script>

	<!--Inicio modal de editar persona -->
	<div class="modal fade" id="mEditarPersona" role="dialog">
		<div class="modal-dialog">
			<form  method="post" action="?c=personas&a=Guardar">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header bg-success">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><strong>Editar persona </strong></h4>
					</div>
					<!-- Cuerpo -->
					<div class="modal-body">	
						<div class="form-group">

							<div class="form-group">
								<h5>Nombre completo</h5>
								<input type="text" class="form-control" name="NomPersona">
							</div>

							<h5>Teléfono</h5>
							<div class="row">
								<div class="form-group">
									<div class="col-xs-4 col-sm-4" style="width: 60%">
										<input type="text" class="form-control" name="Telefono">
									</div>
									<div class="col-xs-8 col-sm-8" style="width: 40%">
										<select class="form-control">
											<option>Trabajo</option>
											<option>Casa</option>
											<option>Celular</option>
											<option>Otro</option>
										</select>
									</div>
								</div>
							</div>

							<h5>Correo electrónico</h5>
							<div class="row">
								<div class="form-group">
									<div class="col-xs-4 col-sm-4" style="width: 60%">
										<input type="text" class="form-control" name="Emailc">
									</div>
									<div class="col-xs-8 col-sm-8" style="width: 40%">
										<select class="form-control">
											<option>Trabajo</option>
											<option>Casa</option>
											<option>Celular</option>
											<option>Otro</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<h5>Organización</h5>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-briefcase"></span></span>
									<input type="text" class="form-control" aria-describedby="basic-addon2" name="IdOrganizacion">
								</div>
							</div>

							<div class="form-group">
								<input type="hidden" name="IdUsuario" id="IdUsuario" value="1">
							</div>

							<div class="form-group">
								<h5>Honorífico</h5>
								<select class="form-control" name="Honorifico">
									<option>(Ninguno)</option>
									<option value="Ing.">Ing.</option>
									<option value="Lic.">Lic.</option>
									<option value="Sr.">Sr.</option>
									<option value="Srta.">Srta.</option>
								</select>
							</div>

							<div class="form-group">
								<h5>Puesto</h5>
								<input type="text" class="form-control" name="Puesto">
							</div>
						</div>
					</div>
					<!-- fin cuerpo --> 
					<div class="modal-footer">
						<div class="col-lg-12">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>    
							<button type="submit" class="btn btn-danger" name="Eliminar" data-toggle="tooltip" title="Eliminar organización"><span class="glyphicon glyphicon-trash"></span></span></button>
							<input type="submit" class="btn btn-success" value="Actualizar" name="Actualizar" >
						</div>
					</div>
				</div>
			</form>
		</div>  
	</div>    
	<!--fin modal de añadir persona-->