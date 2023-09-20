<!-- Migas de Pan -->
<div class="migas row m-2 d-flex align-items-center bg-white border-bottom">
            <div class="col p-0">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb rounded-0 m-0 p-2 bg-white">
                        <li class="breadcrumb-item"><a href="?c=Dashboard">Inicio</a></li>
                        <li class="breadcrumb-item">Módulo Ventas</li>
                        <li class="breadcrumb-item active" aria-current="page">Ingresar Venta</li>
                    </ol>
                </div>
            </div>
        </div>
        
  <div class="container">
    <div class="row mt-4">
      <div class="col-md">

        <div class="form-group row">
          <label for="CodigoFactura" class="col-lg-3 col-form-label">Número de factura:</label>
          <div class="col-lg-3">
            <input type="text" disabled class="form-control" id="CodigoFactura" value="">
          </div>
        </div>


        <div class="form-group row">
          <label for="Fecha" class="col-lg-3 col-form-label">Fecha de emisión:</label>
          <div class="col-lg-3">
            <input type="date" class="form-control" id="Fecha">
          </div>
        </div>

        <div class="form-group row">
          <label for="CodigoCliente" class="col-lg-3 col-form-label">Cliente:</label>
          <div class="col-lg-3">
            <select class="form-control" id="CodigoCliente">

              echo "<option value='0'>Seleccionar Cliente</option>";
              foreach ($clientes as $cli) {
                echo "<option value='" . $cli['codigo'] . "'>" . $cli['nombre'] . "</option>";
              }
              ?>
            </select>
          </div>
        </div>


      </div>
    </div>


    <div class="row mt-4">
      <div class="col-md">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Código de Artículo</th>
              <th>Descripción</th>
              <th class="text-right">Cantidad</th>
              <th class="text-right">Precio Unitario</th>
              <th class="text-right">Total</th>
              <th class="text-right"></th>
            </tr>
          </thead>
          <tbody id="DetalleFactura">

          </tbody>
        </table>
        <button type="button" id="btnAgregarProducto" class="btn btn-success">Agregar Producto</button>
        <button type="button" id="btnTerminarFactura" class="btn btn-success">Terminar Factura</button>
      </div>
    </div>

  </div>



  <!-- ModalProducto(Agregar) -->
  <div class="modal fade" id="ModalProducto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Producto:</label>
            <select class="form-control" id="CodigoProducto">
             <!--  -->
            </select>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Cantidad:</label>
              <input type="number" id="Cantidad" class="form-control" placeholder="" min="1">
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" id="btnConfirmarAgregarProducto" class="btn btn-success">Agregar a la factura</button>
          <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ModalFinFactura -->
  <div class="modal fade" id="ModalFinFactura" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="max-width: 600px" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1>Acciones</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnConfirmarFactura" class="btn btn-success">Confirmar Factura</button>
          <button type="button" id="btnConfirmarImprimirFactura" class="btn btn-success">Confirmar e Imprimir Factura</button>
          <button type="button" id="btnConfirmarDescartarFactura" class="btn btn-success">Descartar la Factura</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ModalConfirmarBorrar -->
  <div class="modal fade" id="ModalConfirmarBorrar" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="max-width: 600px" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1>¿Realmente quiere borrarlo?</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnConfirmarBorrado" class="btn btn-success">Confirmar</button>
          <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>