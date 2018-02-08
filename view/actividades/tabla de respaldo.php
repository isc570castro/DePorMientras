 <?php foreach($this->model->Listar() as $r): ?>
    <tr>
      <td><input type="checkbox" id="checkEstado1" <?php if($r->estado==1){ ?> checked <?php } ?> onclick="cambiaEstado(<?php echo $r->idActividad; ?>)"></td>
      <td><?php echo $r->tipo ?></td>
      <td><?php echo $r->usuario ?></td>
      <td><?php echo $r->tituloNegocio ?></td>
      <td><?php echo $r->nombreOrganizacion ?></td>
      <td><?php echo $r->fecha ?></td>
      <td><?php echo $r->hora ?></td>
      <td><?php echo $r->duracion ?></td>
      <td><?php echo $r->notas ?></td>
      <td><a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#añadiractividad" onclick="myFunctionEditar(<?php echo  $r->idActividad; ?>, <?php echo  "'".$r->tipo."'"; ?>,<?php echo  "'".$r->usuario."'"; ?> , <?php echo  "'".$r->tituloNegocio."'"; ?>,<?php echo  "'".$r->nombreOrganizacion."'"; ?>,<?php echo  "'".$r->fecha."'"; ?>,<?php echo  "'".$r->hora."'"; ?>,<?php echo  "'".$r->duracion."'"; ?>,<?php echo  "'".$r->notas."'"; ?>)"> <span class="glyphicon glyphicon-refresh"></span></a></td>
    </tr>
  <?php endforeach; ?>
</table>