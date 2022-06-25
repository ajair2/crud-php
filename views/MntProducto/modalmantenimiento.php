<div class="modal fade" id="mantenimientoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlTitulo"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="producto-form">
        <div class="modal-body">
          <input type="hidden" name="prod_id" id="prod_id">

          <div class="row mb-3"> 
            <label for="cat_id" class="col-sm-2 col-form-label">Categoría:</label>
            <div class="col-sm-10"> 
              <select class="form-select" id="cat_id" name="cat_id">

              </select>
            </div>
          </div>

          <div class="row mb-3"> 
            <label for="prod_name" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="prod_name" name="prod_name" placeholder="Ingrese su nombre" required>
            </div>
          </div>
          <div class="row mb-3"> 
            <label for="prod_desc" class="col-sm-2 col-form-label">Descripción:</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="prod_desc" name="prod_desc" placeholder="Ingrese una descripción" required style="height: 100px"></textarea>
            </div>
          </div>
          <div class="row mb-3"> 
            <label for="prod_cantidad" class="col-sm-2 col-form-label">Cantidad:</label>
            <div class="col-sm-10"> 
              <input type="number" class="form-control" id="prod_cantidad" name="prod_cantidad" placeholder="Ingrese cantidad" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" name="action" id="#" value="add" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      
    </div>
  </div>
</div>