<div class="panel-body">
  <div class="row">
    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
      <div class="btn-group">
        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mOrganizacion" onclick="myFunctionNuevo();"> Añadir organización</a>
      </div>
      <br><br>
    </div>
    
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4" align="center">
      <div class="btn-group">
        <?php $Contador = $this->model->Contador(); 
        if ($Contador == 1) { ?>

          <h5><strong><?php echo ($Contador) ?> Organización</strong></h5>
          <?php 

        }else { ?>
          <h5><strong><?php echo ($Contador) ?> Organizaciones</strong></h5>

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

<!-- Inicio contenedor -->
<div class="table-responsive" id="tbl"> 
  <table class="table table-hover">
    <tr>
      <th>Nombre completo</th>
      <th>Dirección</th>
      <th>Teléfono</th>
      <th>Personas</th>
      <th>Negocios cerrados</th>
      <th>Negocios abiertos</th>
      <th>Fecha próxima</th>
      <th>Propietario</th>
      <th>Pagina Web</th>
      <th>Acción</th>
    </tr>
    <!--<?php $contador //= 0 ?> -->
    <?php foreach($this->model->Listar() as $r): ?>
      <tr>   
        <td><?php echo $r->nombreOrganizacion; ?></td>
        <td><?php echo $r->direccion; ?></td>
        <td><?php echo $r->telefono; ?></td>
        <td><?php echo "5"; ?></td>
        <td><?php echo "3"; ?></td>
        <td><?php echo "2"; ?></td>
        <td><?php echo "21 de noviembre"; ?></td>
        <td><?php echo $r->usuario; ?></td>
        <td><?php echo $r->paginaWeb; ?></td>
        <td><a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mOrganizacion" onclick="myFunctionEditar(<?php echo "'".$r->idOrganizacion."'"; ?>,<?php echo "'".$r->nombreOrganizacion."'"; ?>,<?php echo "'".$r->direccion."'"; ?>, <?php echo "'".$r->paginaWeb."'"; ?>, <?php echo "'".$r->telefono."'"; ?>, <?php echo "'".$r->idUsuario."'"; ?> );"> Editar <span class="glyphicon glyphicon-refresh"></span></a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<!--Inicio modal de añadir persona -->
<div class="modal fade" id="mOrganizacion" role="dialog">   
  <div class="modal-dialog">
   <form  method="post" action="?c=Organizaciones&a=Guardar" 
   enctype="multipart/form-data">
   <!-- Modal content-->
   <div class="modal-content">
    <div class="modal-header bg-success">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><strong> Editar organización </strong></h4>
    </div>
    <div class="modal-body">  
      <!-- Cuerpo --> 
      <form action="" method="post">
        <div class="form-group">

          <input type="hidden" class="form-control" name="idOrganizacion" id="editarIdOrganizacion" value="">
          
          <div class="form-group">
           <h5>Nombre completo</h5>
           <input type="text" class="form-control" name="nombreOrganizacion" id="editarNomOrganizacion" value="editarNomOrganizacion" required>
         </div>

         <div class="form-group">
          <input type="hidden" name="propietario" id="editarPropietario" value="1">
        </div>
        
        <div class="form-group">
          <h5>Dirección</h5>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-pushpin"></span></span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="direccion" id="editarDireccion" >
          </div>
        </div>

        <div class="form-group">
          <h5>Página web</h5>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-globe"></span></span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="paginaWeb" id="editarPaginaWeb" >
          </div>
        </div>

        <div class="form-group">
          <h5>Teléfono</h5>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-phone"></span></span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="telefono" id="editarTelefono" >
          </div>
        </div>
      </div>
    </form>
    
    <!-- fin cuerpo --> 
  </div>
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
<!--fin modal de añadir organizacion -->

<script>
  function myFunctionEditar(IdO, NomOrga, Direccion, PaginaWeb, Telefono, Propietario) {
    $('#editarIdOrganizacion').val(IdO); 
    $('#editarNomOrganizacion').val(NomOrga);  
    $('#editarDireccion').val(Direccion);
    $('#editarPaginaWeb').val(PaginaWeb);
    $('#editarTelefono').val(Telefono);
    $('#editarPropietario').val(Propietario);
  }
    function myFunctionNuevo() {
      alert("entra");
    $('#editarIdOrganizacion').val(""); 
    $('#editarNomOrganizacion').val("");  
    $('#editarDireccion').val("");
    $('#editarPaginaWeb').val("");
    $('#editarTelefono').val("");
    $('#editarPropietario').val("");
    $('#')
  }
</script>
