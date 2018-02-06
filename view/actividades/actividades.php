<div class="panel-body">
  <div class="row">
   <div class="col-xs-4 col-sm-3 col-md-4 col-lg-4">
    <div class="btn-group">
      <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#añadiractividad" onclick="myFunctionNuevo()"> Añadir actividad </a>
    </div>
    <br><br>
  </div>
  
  <div class="col-xs-4 col-sm-3 col-md-3 col-lg-4" align="center">
    <div class="btn-group">
      <?php $Contador = $this->model->Contador(); 
      if ($Contador == 1) { ?>

      <h5><strong><?php echo ($Contador) ?> Actividad</strong></h5>
      <?php 

    }else { ?>
    <h5><strong><?php echo ($Contador) ?> Actividades</strong></h5>

    <?php } ?>
  </div>
</div>

<div class="col-xs-4 col-sm-12 col-md-2 col-lg-4" align="right">
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
 <div class="col-xs-6 col-lg-6">
  <div class="btn-group btn-group-sm" role="group" aria-label="...">
    <button type="button" class="btn btn-default">Todas</button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Llamada"><span class="glyphicon glyphicon-earphone"></span></button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Reunión"><span class="glyphicon glyphicon-user"></span></button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Tarea"><span class="glyphicon glyphicon-time"></span></button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Plazo"><span class="glyphicon glyphicon-flag"></span></button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Correo electrónico"><span class="glyphicon glyphicon-send"></span></button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Comida"><span class="glyphicon glyphicon-cutlery"></span></button>
    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Whats"><span class="glyphicon glyphicon-phone"></span></button>
  </div>
</div>

<div class="col-xs-6 col-lg-6" align="right">
  <div class="btn-group btn-group-sm" role="group" aria-label="...">
    <button type="button" class="btn btn-default">Planeado</button>
    <button type="button" class="btn btn-default">Vencida</button>
    <button type="button" class="btn btn-default">Hoy</button>
    <button type="button" class="btn btn-default">Mañana</button>
    <button type="button" class="btn btn-default">Esta semana</button>
    <button type="button" class="btn btn-default">Próxima semana</button>
    <button type="button" class="btn btn-default">Seleccionar periodo</button>
  </div>
</div>
</div>
</div>
<!--Fin de Encabezado-->

<!-- Inicio del contenedor -->
<div class="table-responsive" id="tbl">
  <table class="table table-hover">
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
    </tr>
    <?php foreach($this->model->Listar() as $r): ?>
      <tr>
        <td><input type="checkbox"></td>
        <td><?php echo $r->tipo ?></td>
        <td><?php echo $r->usuario ?></td>
        <td><?php echo $r->tituloNegocio ?></td>
        <td><?php echo $r->nombreOrganizacion ?></td>
        <td><?php echo $r->fecha ?></td>
        <td><?php echo $r->hora ?></td>
        <td><?php echo $r->duracion ?></td>
        <td><?php echo $r->notas ?></td>
        <td><a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#añadiractividad" onclick="myFunctionEditar(<?php echo  "'".$r->tipo."'"; ?>,<?php echo  "'".$r->usuario."'"; ?> , <?php echo  "'".$r->tituloNegocio."'"; ?>,<?php echo  "'".$r->nombreOrganizacion."'"; ?>,<?php echo  "'".$r->fecha."'"; ?>,<?php echo  "'".$r->hora."'"; ?>,<?php echo  "'".$r->duracion."'"; ?>,<?php echo  "'".$r->notas."'"; ?>)"> Editar <span class="glyphicon glyphicon-refresh"></span></a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<!-- Fin del contenedor -->

<!--Inicio modal de añadir negocio -->
<div class="modal fade" id="añadiractividad" role="dialog">   
  <div class="modal-dialog">
   <form  method="post" action="index.php?c=Actividades&a=Guardar" enctype="multipart/form-data" onsubmit="return actual();">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong><label id="labTitulo"></label> </strong></h4>
      </div>
      <div class="modal-body">  
        <!-- Cuerpo --> 

        <form action="" method="post">
          <div class="form-group">
            <div class="form-group">
              <div class="btn-group btn-group-sm" role="group" aria-label="...">
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Llamada" onclick="tipoActividad('Llamada');"><span class="glyphicon glyphicon-earphone"></span></button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Reunión" onclick="tipoActividad('Reunion');"><span class="glyphicon glyphicon-user"></span></button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Tarea" onclick="tipoActividad('Tarea');"><span class="glyphicon glyphicon-time"></span></button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Plazo" onclick="tipoActividad('Plazo');"><span class="glyphicon glyphicon-flag"></span></button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Correo electrónico" onclick="tipoActividad('Email');"><span class="glyphicon glyphicon-send"></span></button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Comida" onclick="tipoActividad('Comida');"><span class="glyphicon glyphicon-cutlery"></span></button>
                <button type="button" class="btn btn-default" data-toggle="tooltip" title="WhatsApp" onclick="tipoActividad('WhatsApp');"><span class="glyphicon glyphicon-phone"></span></button>
              </div>
            </div>
            
            <div class="form-group">
              <input readonly class="form-control" value="0" name="idActividad" id="idActividad" type="hidden">
            </div>

            <div class="form-group">
              <input style="text-align:center; font-weight: bold;" readonly class="form-control" placeholder="Actividad" name="tipo" id="tipo">
            </div>


            <div class="form-group">
              <font size="1">FECHA</font>
              <input type="date" class="form-control" name="fecha" id="txtFecha" placeholder="Fecha de actividad">
            </div>


            <div class="row">
              <div class="form-group">
                <div class="col-xs-6 col-sm-6 col-lg-6">
                  <font size="1">HORA</font>
                </div>

                <div class="col-xs-6 col-sm-6 col-lg-6">
                  <font size="1">DURACIÓN</font>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <div class="col-xs-6 col-sm-6 col-lg-6">
                 <input type="time" class="form-control" maxlength="12" name="hora" id="txtHora">
               </div>
               <div class="col-xs-6 col-sm-6 col-lg-6">
                 <input type="text" class="form-control" maxlength="12" name="duracion" id="txtDuracion" placeholder="Ejem: 1 h">
               </div>
             </div>
           </div><br>

           <div class="form-group">
            <textarea id="txtNotas" type="text" class="form-control autoExpand" placeholder="Notas" name="notas"></textarea>
          </div>

          <div class="form-group">
            <font size="1">VINCULADO A</font>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-briefcase"></span></span>
              <select class="form-control" name="idNegocio" id="txtIdNegocio">
                <?php foreach ($this->modelNegocio->Listar() as $negocio): ?>
                  <option value="<?php echo $negocio->idNegocio; ?>"><?php echo $negocio->tituloNegocio; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
              <select class="form-control" name="idContacto" id="idContacto">
                <?php foreach ($this->modelPersona->Listar() as $persona): ?>
                  <option value="<?php echo $persona->idCliente; ?>"><?php echo $persona->nombrePersona; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tower"></span></span>
              <select class="form-control" name="idOrganizacion" id="txtIdOrganizacion">
                <?php foreach ($this->modelOrganizacion->Listar() as $organizacion): ?>
                  <option value="<?php echo $organizacion->idOrganizacion; ?>"><?php echo $persona->nombreOrganizacion; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

        </div>
      </form>

      <!-- fin cuerpo --> 
    </div>
    <div class="modal-footer">
      <div class="col-xs-12 col-sm-12 col-lg-12" align="right">
        <button type="submit" class="btn btn-danger" name="Eliminar" data-toggle="tooltip" title="Eliminar organización" id="btnEliminar"><span class="glyphicon glyphicon-trash"></span></span></button>
        <input type="submit" class="btn btn-success" value="Guardar" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>    
      </div>
      <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
    </div>
  </div>
</form>
</div>
</div>     
<!--fin modal de añadir negocio -->

<script>
  tipoActividad = function ($tipo)
  {
    $('#tipo').val($tipo);
  }  
  function myFunctionEditar(tipo, usuario, tituloNegocio, nombreOrganizacion, fecha, hora, duracion, notas) {
    $('#txtTipo').val(tipo); 
    $('#txtUsuario').val(usuario);  
    $('#txtTituloNegocio').val(tituloNegocio);
    $('#txtNombreOrganizacion').val(nombreOrganizacion);
    $('#txtFecha').val(fecha);
    $('#txtHora').val(hora);
    $('#txtDuracion').val(duracion);
    $('#txtNotas').val(notas);
    $('#btnEliminar').show();
    $('#labTitulo').val("Editar");


  }
  function myFunctionNuevo() {
    $('#txtTipo').val(""); 
    $('#txtUsuario').val("");  
    $('#txtTituloNegocio').val("");
    $('#txtNombreOrganizacion').val("");
    $('#txtFecha').val("");
    $('#txtHora').val("");
    $('#txtDuracion').val("");
    $('#txtNotas').val("");
    $('#btnEliminar').hide();
    $('#labTitulo').html("Programar una");

  }
</script>

