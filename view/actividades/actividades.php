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
  <div class="btn-group">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Buscar" id="buscar" onkeyup="consultas();">
    </div> 
  </div>
  <div class="btn-group form-group btn-sm" style="padding-left: 0px; padding-right: 0px;">
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
 <div class="col-xs-12 col-sm-12 col-lg-7" style="padding-right: 0px;">
  <div class="btn-group form-group btn-group-sm" role="group" aria-label="...">
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

<div class="col-xs-12 col-sm-12 col-lg-5">
  <div class="btn-group form-group btn-group-sm" role="group">
    <button type="button" class="btn btn-default">Planeado</button>
    <button type="button" class="btn btn-default">Vencida</button>
    <button type="button" class="btn btn-default">Hoy</button>
    <button type="button" class="btn btn-default">Mañana</button>
    <button type="button" class="btn btn-default">Esta semana</button>
    <button type="button" class="btn btn-default">Próxima semana</button>
  </div>
</div>
</div>
</div>
<!--Fin de Encabezado-->

<!-- Inicio del contenedor -->
<div class="table-responsive" id="tbl">  

  <div id="resultadoBusqueda">
   <!--Aqui se vera a tabla de resultados-->
 </div>

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
              <input type="hidden" class="form-control" value="0" name="idActividad" id="txtIdActividad" readonly>
            </div>

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
              <input style="text-align:center; font-weight: bold;" readonly class="form-control" placeholder="Actividad" name="tipo" id="txtTipo">
            </div>

            <div class="form-group">
              <font size="1">FECHA</font>
              <input required type="date" class="form-control" name="fecha" id="txtFecha" placeholder="Fecha de actividad">
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
                 <input type="text" class="form-control" maxlength="12" name="duracion" id="txtDuracion" placeholder="Ejem: 1 h" required>
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
              <select class="form-control" name="idNegocio" id="selectIdNegocio"  onchange="listarPersonasPorNegocio()">
                <option>Seleccione un negocio</option>
                <?php foreach ($this->modelNegocio->Listar() as $negocio): ?>
                  <option value="<?php echo $negocio->idNegocio; ?>"><?php echo $negocio->tituloNegocio; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
              <select class="form-control" name="idCliente" id="selectIdPersonas">
               <option value="">Seleccione una persona</option>
               <?php foreach ($this->modelPersona->Listar() as $persona): ?>
                <option value="<?php echo $persona->idCliente; ?>"><?php echo $persona->nombrePersona; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tower"></span></span>
            <select class="form-control" name="idOrganizacion" id="selectIdOrganizaciones">
              <option value="">Seleccione una organizacion</option>
              <?php foreach ($this->modelOrganizacion->Listar() as $organizacion): ?>
                <option value="<?php echo $organizacion->idOrganizacion; ?>"><?php echo $organizacion->nombreOrganizacion; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

      </div>
    </form>
    <div class="respuesta2">
    </div>

    <div class="respuesta3">
    </div>

    <!-- fin cuerpo --> 
  </div>
  <div class="modal-footer">
    <div class="col-xs-12 col-sm-12 col-lg-12" align="right">

      <a href="#" id="" class="btn btn-danger" data-toggle="modal" data-target="#mEliminar" data-toggle="tooltip" title="Eliminar organización" id="btnEliminar" onclick="myFunctionEliminar()"><span class="glyphicon glyphicon-trash"></span></a>

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


<!--Inicio modal de añadir negocio -->
<div class="modal fade" id="mEliminar" role="dialog">   
  <div class="modal-dialog">
   <form  method="post" action="index.php?c=Actividades&a=Eliminar" enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong><label id="labTitulo"></label> </strong></h4>
      </div>
      <div class="modal-body">  
        <!-- Cuerpo --> 
        <p style="font-size: 20px;">¿Esta seguro que desea eliminar la actividad?</p>
        <input type="text" id="txtIdActividadE" name="idActividad" hidden>
        <!-- fin cuerpo --> 
      </div>
      <div class="modal-footer">
        <div class="col-xs-12 col-sm-12 col-lg-12" align="right">
          <input type="submit" class="btn btn-success" value="Eliminar">
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
    $('#txtTipo').val($tipo);
  }  

  function myFunctionEditar(idActividad, tipo, usuario, tituloNegocio, nombreOrganizacion, fecha, hora, duracion, notas) {
    alert("entra");
    $('#txtIdActividad').val(idActividad);  
    $('#txtTipo').val(tipo); 
    $('#txtUsuario').val(usuario);  
    $('#txtTituloNegocio').val(tituloNegocio);
    $('#txtNombreOrganizacion').val(nombreOrganizacion);
    $('#txtFecha').val(fecha);
    $('#txtHora').val(hora);
    $('#txtDuracion').val(duracion);
    $('#txtNotas').val(notas);
    $('#btnEliminar').show();
    $('#labTitulo').html("Editar actividad");
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
    $('#labTitulo').html("Programar actividad");
  }

  function myFunctionEliminar(){
    var idActividad = $('#txtIdActividad').val();
    $('#txtIdActividadE').val(idActividad);  
  }

  listarPersonasPorNegocio = function (idNegocio){
    var idNegocio = $('#selectIdNegocio').val();
    datos = {"idNegocio":idNegocio};
    $.ajax({
      url: "index.php?c=Actividades&a=ListarPersonasPorNegocio",
      type: "POST",
      data: datos
    }).done(function(respuesta){
      console.log(JSON.stringify(respuesta));
      $("#selectIdPersonas").empty();
      var selector = document.getElementById("selectIdPersonas");
      selector.options[0] = new Option("Seleccione la persona de contacto","");
      for (var i in respuesta) {
        var j=parseInt(i)+1;
        selector.options[j] = new Option(respuesta[i].nombrePersona,respuesta[i].idCliente);
      }
      var selector2 = document.getElementById("selectIdOrganizaciones");
      selector2.options[0] = new Option("Seleccione la organización","");

      //$(".respuesta2").html("Personas:<br><pre>"+JSON.stringify(respuesta, null, 2)+"</pre>");

      listarOrganizacionesPorNegocio(idNegocio);
    });
  }

  listarOrganizacionesPorNegocio = function (idNegocio){
    var idNegocio = $('#selectIdNegocio').val();
    datos = {"idNegocio":idNegocio};
    $.ajax({
      url: "index.php?c=Actividades&a=ListarOrganizacionesPorNegocio",
      type: "POST",
      data: datos
    }).done(function(respuesta){
      console.log(JSON.stringify(respuesta));
      $("#selectIdOrganizaciones").empty();
      var selector = document.getElementById("selectIdOrganizaciones");
      for (var i in respuesta) {
        selector.options[0] = new Option(respuesta[i].nombreOrganizacion,respuesta[i].idOrganizacion);
      }
      //$(".respuesta3").html("Organizaciones:<br><pre>"+JSON.stringify(respuesta, null, 2)+"</pre>");
    });
  }

  //Metodo para cambiar el estado en la base de datos de acuerdo al idActividad
  cambiaEstado = function(idActividad){
    alert(idActividad);
   if( $('#checkEstado').prop('checked') ) 
    var estado=0;
  else estado=1; 
  datos = {"idActividad":idActividad, "estado":estado};
  $.ajax({
    url: "index.php?c=Actividades&a=CambiaEstado",
    type: "POST",
    data: datos
  }).done(function(respuesta){
      //Muestra mensaje de correcto cambio
      $("#mensajejs").html('<div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 0px;"><button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button><strong><center>'+respuesta+'</center></strong></div>');
    });
}

window.onload=function(){
  consultas();
}
 //Metodo de busqueda por ajax
 consultas = function (){ 
   var busqueda=$("#buscar").val();
   $.post("index.php?c=Actividades&a=Consultas", {valorBusqueda: busqueda}, function(mensaje) {
    $("#resultadoBusqueda").html(mensaje);
  });
 }
</script>

