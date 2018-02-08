<div class="panel-body">
  <div class="col-xs-5 col-sm-4 col-md-4 col-lg-4" id="pan2">
    <div class="btn-group form-group" role="group">
      <a href="?c=negocios" class="btn btn-default btn-sm" data-toggle="tooltip" title="Embudo"><span class="glyphicon glyphicon-filter"></span></a>
      <a href="?c=negocios&a=lista" class="btn btn-default btn-sm" data-toggle="tooltip" title="Lista"><span class="glyphicon glyphicon-list"></span></a>
      <a href="?c=negocios&a=timeline" class="btn btn-default btn-sm" data-toggle="tooltip" title="Pronóstico"><span class="glyphicon glyphicon-time"></span></a>
    </div>
    <div class="btn-group">
      <div class="form-group">
        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#añadirnegocio" onClick="myFunction()"> Añadir Negocio</a>  
      </div>
    </div>
  </div>
  
  <div class="col-xs-2 col-sm-4 col-md-3 col-lg-4" align="center">
    <div class="btn-group">
      <?php $Contador = $this->model->Contador(); 
      if ($Contador == 1) { ?>

        <h5><strong> $2 755,37 - <?php echo ($Contador) ?> Negocio</strong></h5>
        <?php 

      }else { ?>
        <h5><strong> $2 755,37 - <?php echo ($Contador) ?> Negocios</strong></h5>

        <?php } ?>
      </div>
    </div>

    <div class="col-xs-5 col-sm-4 col-md-5 col-lg-4" align="right">
      <div class="btn-group">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar">
        </div> 
      </div>

      <div class="btn-group form-group btn-sm" style="padding-left: 0px; padding-right: 0px;">
        <div class="dropdown">
         <button class="btn btn-warning dropdown-toggle btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
         Ver Negocios</button>
         <ul class="dropdown-menu dropdown-menu-right btn-sm" aria-labelledby="dropdownMenu1">
           <li><a href="#">AMMMEC</a></li>
           <li><a href="#">DINGO</a></li> 
           <li><a href="#">PAULS FANS</a></li> 
         </ul>
       </div>
     </div> 
   </div>
 </div>


 <!--Inicio modal de añadir negocio -->
 <div class="modal fade" id="añadirnegocio" role="dialog">
  <div class="modal-dialog">
    <form  method="post" action="actualizarMateria.php" enctype="multipart/form-data" onsubmit="return actual();" >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Añadir negocio</strong></h4>
        </div>
        <div class="modal-body">  
          <!-- Cuerpo -->
          
          <div class="form-group">
            <h5>Nombre de la persona de contacto</h5>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" name="idCliente">
              </div>
            </div>

            <div class="form-group">
              <h5>Nombre de la organización</h5>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <span class="glyphicon glyphicon-briefcase"></span></span>
                  <input type="text" class="form-control"  name="idOrganizacion">
                </div>
              </div>

              <div class="form-group">
                <h5>Título del negocio</h5>
                <input type="text" class="form-control" name="nombreNegocio">
              </div>

              <div class="form-group">
                <h5>Clave del negocio</h5>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">
                    <span class="glyphicon glyphicon-qrcode"></span></span>
                    <input type="text" class="form-control" aria-describedby="basic-addon2">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="padding-right: 0px;">
                      <h5>Valor del Negocio</h5>
                    </div>

                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="padding-left: 10px;">
                      <h5>Tipo de Moneda</h5>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    <div class="col-xs-4 col-sm-4" style="width: 40%; padding-right: 0px">
                      <input type="text" class="form-control" maxlength="12">
                    </div>
                    <div class="col-xs-8 col-sm-8" style="width: 60%">
                      <select class="form-control">
                        <option>US Dollar (USD)</option>
                        <option>Pesos Méxicanos (MXN)</option>
                      </select>
                    </div>                
                  </div>
                </div>

                <h5>Etapa del embudo</h5>
                <div class="form-group">
                  <select class="form-control">
                    <option>Leads</option>
                    <option>Contacto/Oportunidades Visualizadas</option>
                    <option>Solicitudes de Cotización</option>
                    <option>Autorización</option>
                    <option>Cotización/Propuesta</option>
                    <option>Pedido</option>
                    <option>Realizando/se</option>
                    <option>Facturación</option>
                    <option>Pagado</option>
                    <option>Perdido</option>
                  </select>
                </div>
                <div class="form-group">
                  <h5>Fecha de cierre prevista</h5>
                  <input type="date" class="form-control">
                </div>

                <h5>% Ponderación</h5>
                <div class="form-group">
                  <select class="form-control">
                    <option>25 %</option>
                    <option>50 %</option>
                    <option>75 %</option>
                    <option>100 %</option>
                  </select>
                </div>

                <!-- fin cuerpo -->
              </div>
              <div class="modal-footer">
                <div class="col-xs-12 col-sm-12 col-lg-12" align="right">
                  <input type="submit" class="btn btn-success" value="Guardar" >
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>    
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>     
      <!--fin modal de añadir negocio -->

      <?php include($this->contenedor); ?>