<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-success">Editar Variación del Precios </h6>
  </div>
  <div class="card-body">
    <?php !$info_item ? exit('Hubo un error al cargar la información del Variación') : '' ?>

    <form method="POST" action="<?= FOLDER_PATH . '/vary/Actualizar' ?>" enctype="multipart/form-data" >
      <div class="row">
        <div class="col-md-6">
          <div class="form-group ">
            <label for="codigo">Código</label>
            <input type="text" name="codigo" class="form-control" id="codigo" placeholder="codigo" value="<?= $info_item->codigo ?>">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcion" data-validacion-tipo="requerido|min:3" value="<?= $info_item->descripcion ?>">
          </div>
          <div class="form-group">
            <label for="presentacion">Presentacion</label>
            <input type="text" name="presentacion" class="form-control" id="presentacion" placeholder="presentacion" data-validacion-tipo="requerido|min:3" value="<?= $info_item->presentacion ?>">                  
          </div>
          <div class="form-group">
            <label for="clase">Clase</label>
            <input type="text" name="clase" class="form-control" id="clase" placeholder="clase" data-validacion-tipo="requerido|min:3" value="<?= $info_item->clase ?>">
          </div>
          <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" class="form-control" id="tipo">
                <option <?php echo $info_item->tipo == 'U' ? 'selected' : ''; ?> value = 'U' >URGENTE</option>
                <option <?php echo $info_item->tipo == 'N' ? 'selected' : ''; ?> value = 'N' >NUEVO</option>
                <option <?php echo $info_item->tipo == 'Q' ? 'selected' : ''; ?> value = 'Q'>QUINCENA</option>
            </select>
          </div> 
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="acprec01">Precio 01 Actual</label>
            <input type="text" name="acprec01" class="form-control" id="acprec01" placeholder="acprec01" data-validacion-tipo="requerido|min:3" value="<?= $info_item->acprec01 ?>">
          </div>
          <div class="form-group">
            <label for="newprec01">Precio 01 Nuevo</label>
            <input type="text" name="newprec01" class="form-control" id="newprec01" placeholder="newprec01" data-validacion-tipo="requerido|min:3" value="<?= $info_item->newprec01 ?>">
          </div>
          <div class="form-group">
            <label for="variacion">Variacion ¢</label>
            <input type="text" name="variacion" class="form-control" id="variacion" placeholder="variacion" data-validacion-tipo="requerido|min:3" value="<?= $info_item->variacion ?>">
          </div>
          <div class="form-group">
            <label for="porcvar">Variacion %</label>
            <input type="text" name="porcvar" class="form-control" id="porcvar" placeholder="porcvar" data-validacion-tipo="requerido|min:3" value="<?= $info_item->porcvar ?>">
          </div>
          <div class="form-group">
            <label for="fecha_comun">Fecha Comunicado</label>
            <input type="date" name="fecha_comun" class="form-control datepicker" id="fecha_comun" placeholder="fecha_comun" data-validacion-tipo="requerido|min:3" value="<?= $info_item->fecha_comun ?>">
          </div>
                            
        </div>
      </div>
      <input type="hidden" name="id" value="<?= $info_item->id ?>">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/vary' ?>" role="button">Cancel</a>
    </form>
  </div>
</div>