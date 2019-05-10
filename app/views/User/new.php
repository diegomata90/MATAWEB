<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-success">Nuevo Usuario </h6>
  </div>
  <div class="card-body">

    <form method="POST" action="<?= FOLDER_PATH . '/User/Agregar' ?>" enctype="multipart/form-data" >
      <div class="row">
        <div class="col-md-5">
          <br>
          <div class="file-loading">
              <input name="avatar" id="avatar" class="file" type="file" >
          </div>
          <br>
        </div>
        <div class="col-md-7">
          <div class="form-group">
            <label for="nombre" >Nombre:</label>
              <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre...">
          </div>
          <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" class="form-control" id="apellido" placeholder="apellido...">
          </div>
          <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" name="usuario" class="form-control" id="usuario" placeholder="usuario...">
          </div>
          <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="@email...">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="*****" >
          </div>
          <div class="form-group ">
              <label for="rol">Rol</label>
              <select name="rol" class="form-control" id="rol">
                  <option value = 1 >Administrador</option>
                  <option value = 2 >Usuario</option>
              </select>
          </div>                              
        </div>          
      </div>
      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/User' ?>" role="button">Cancel</a>
    </form>
  </div>
</div>
