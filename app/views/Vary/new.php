<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-success">Nueva Variación del Precios </h6>
  </div>
  <div class="card-body">
    <form method="POST" action="<?= FOLDER_PATH . '/vary/Agregar' ?>" enctype="multipart/form-data" >
      <div class="row">
        <div class="col-md-6">
          <div class="form-group ">
            <label for="codigo">Código</label>
            <input type="text" name="codigo" class="form-control" id="codigo" placeholder="codigo" >
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcion" >
          </div>
          <div class="form-group">
            <label for="presentacion">Presentacion</label>
            <input type="text" name="presentacion" class="form-control" id="presentacion" placeholder="presentacion" >                  
          </div>
          <div class="form-group">
            <label for="clase">Clase</label>
            <input type="text" name="clase" class="form-control" id="clase" placeholder="clase">
          </div>
          <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" class="form-control" id="tipo">
                <option value = 'U' >Urgente</option>
                <option value = 'N' >Nuevo</option>
                <option value = 'Q' >Quincena</option>
            </select>
          </div> 
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="acprec01">Precio 01 Actual</label>
            <input type="text" name="acprec01" class="form-control" id="acprec01" placeholder="Precio Actual" >
          </div>
          <div class="form-group">
            <label for="newprec01">Precio 01 Nuevo</label>
            <input type="text" name="newprec01" class="form-control" id="newprec01" placeholder="Precio Nuevo" >
          </div>
          <div class="form-group">
            <label for="variacion">Variacion ¢</label>
            <input type="text" name="variacion" class="form-control" id="variacion" placeholder="Valor de la variación" >
          </div>
          <div class="form-group">
            <label for="porcvar">Variacion %</label>
            <input type="text" name="porcvar" class="form-control" id="porcvar" placeholder="% Variación" >
          </div>
          <div class="form-group">
            <label for="fecha_comun">Fecha Comunicado</label>
            <input type="date" name="fecha_comun" class="form-control" id="fecha_comun" >
          </div>
                            
        </div>
      </div>

      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>
      
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/vary' ?>" role="button">Cancel</a>
    </form>
  </div>
</div>