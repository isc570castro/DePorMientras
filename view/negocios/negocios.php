<style>
  #sortable1, #sortable2, #sortable3,#sortable4 {
    border: 0px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
  }
  #sortable1 li, #sortable2 li,#sortable3 li,#sortable4 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 2px 2px 5px #999;
  }
  .placeholder {
    border: 1px dotted black;
    margin: 0 1em 1em 0;
    height: 50px;
    background-color: rgb(242, 243, 244);
  }
</style>



    <!-- Inicio del contenedor -->
    <div class="table-responsive" id="tblem">
      <table class="table table-bordered">
        <tr align="center" style="">
          <td><strong>Leads</strong></td>
          <td><strong>Contacto</strong></td>
          <td><strong>Solicitud</strong></td>
          <td><strong>Autorización</strong></td>
          <td><strong>Cotización</strong></td>
          <td><strong>Pedido</strong></td>
          <td><strong>Relizando</strong></td>
          <td><strong>Facturación</strong></td>
          <td><strong>Pagado</strong></td>
          <td><strong>Perdido</strong></td>
        </tr>
        <tr>
          <td>
            <ul id="sortable1" class="connectedSortable">
              <li class="ui-state-default"><span class="ui-icon ui-icon-alert"></span>Item 1</li>
              <li class="ui-state-highlight"><span class="ui-icon ui-icon-circle-close"></span>Item 2</li>
              <li class="ui-state-focus"><span class="ui-icon ui-icon-circle-plus"></span>Item 3</li>
              <li class="ui-widget-header"><span class="ui-icon ui-icon-check"></span>Item 4</li>
            </ul>
          </td>
          <td>
            <ul id="sortable2" class="connectedSortable">
              <li class="ui-state-active">Item 5</li>
              <li class="ui-state-error">Item 6</li>
              <li class="ui-priority-primary">Item 7</li>
              <li class="ui-priority-secondary">Item 8</li>
            </ul>
          </td>
          <td>
            <ul id="sortable3" class="connectedSortable">
              <li class="ui-widget-shadow">Item 9</li>
              <li class="">Item 10</li>
              <li class="">Item 11</li>
              <li class="list-group-item">Item 12</li>
            </ul>
          </td>
          <td>
            <ul id="sortable4" class="connectedSortable">
              <li class="list-group-item list-group-item-success"><span class="ui-icon ui-icon-plusthick"></span>Item 13</li>
              <li class="list-group-item list-group-item-info">Item 14</li>
              <li class="list-group-item list-group-item-warning">Item 15</li>
              <li class="list-group-item list-group-item-danger">Item 16</li>
            </ul>
          </td>
          <td>
            <ul id="sortable5" class="connectedSortable">
              <li class="list-group-item list-group-item-success"><span class="ui-icon    ui-icon-circle-zoomout"></span>Item 17</li>
              <li class="list-group-item list-group-item-info">Item 18</li>
              <li class="list-group-item list-group-item-warning">Item 19</li>
              <li class="list-group-item list-group-item-danger">Item 20</li>
            </ul>
          </td>
          <td>
            <ul id="sortable6" class="connectedSortable">
              <li class="list-group-item">Item 21</li>
              <li class="list-group-item">Item 22</li>
              <li class="list-group-item">Item 23</li>
              <li class="list-group-item">Item 24</li>
            </ul>
          </td>
          <td>
            <ul id="sortable7" class="connectedSortable">
              <li class="list-group-item">Item 25</li>
              <li class="list-group-item">Item 26</li>
              <li class="list-group-item">Item 27</li>
              <li class="list-group-item">Item 28</li>
            </ul>
          </td>
          <td>
            <ul id="sortable8" class="connectedSortable">
              <li class="list-group-item">Item 29</li>
              <li class="list-group-item">Item 30</li>
              <li class="list-group-item">Item 31</li>
              <li class="list-group-item">Item 32</li>
            </ul>
          </td>
          <td>
            <ul id="sortable9" class="connectedSortable">
              <li class="list-group-item">Item 33</li>
              <li class="list-group-item">Item 34</li>
              <li class="list-group-item">Item 35</li>
              <li class="list-group-item">Item 36</li>
            </ul>
          </td>
          <td>
            <ul id="sortable10" class="connectedSortable">
              <li class="list-group-item">Item 37</li>
              <li class="list-group-item">Item 38</li>
              <li class="list-group-item">Item 39</li>
              <li class="list-group-item">Item 40</li>
            </ul>
          </td>
        </tr>
      </table>
    </div>
<!-- Fin del contenedor -->