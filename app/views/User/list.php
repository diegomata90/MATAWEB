          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Usuarios</h6>
            </div>
            <div class="card-body">
              <?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/user/New' ?>">+ Usuario</a>
              <br><br>
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Avatar</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Email</th>
                      <th>Estado</th>
                      <th>Rol</th>
                      <th>Opciones</th>                  
                    </tr>
                  </thead>
                  <tbody>
                    <?php  while ($row = $listado->fetch_assoc()){
                      $estado = $row['estado'] == 'A' ? 'Activo' : 'Inactivo';
                      $roll   = $row['rol'] == '1' ? 'Administrado' : 'Usuario';
                    ?>
                      <tr>
                        <td><img src="<?= PATH_ASSETS . 'img/'.$row['avatar']; ?>" class="img-rounded img-responsive" width='75px' height='75px' alt=""></td>
                        <td><?php echo $row['nombre']." ".$row['apellido']; ?></td>
                        <td><?php echo $row['usuario']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $estado; ?></td>
                        <td><?php echo $roll; ?></td>
                        <td>
                          <a href="<?php echo FOLDER_PATH ?>/user/Obtener/<?php echo $row['id']; ?>" class='btn btn-success btn-circle'><i class="fas fa-edit "></i></a>
                          <a href="<?php echo FOLDER_PATH ?>/user/ObtenerPas/<?php echo $row['id']; ?>" class='btn btn-primary btn-circle'><i class="fas fa-key"></i> </a>
                          <a onclick='javascript:return asegurar();' href='<?php echo FOLDER_PATH ?>/user/Eliminar/<?php echo $row['id']; ?>' class='btn btn-danger btn-circle' ><i class="fas fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
                <script>
                  function asegurar ()
                    {
                        rc = confirm("¿Seguro que desea Eliminar?");
                        return rc;
                    }
                </script>                  
              </div>
            </div>
          </div      