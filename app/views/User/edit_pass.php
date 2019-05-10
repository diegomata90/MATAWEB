          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Edición de Password </h6>
            </div>
            <div class="card-body">
              <?php !$info_item ? exit('Hubo un error al cargar la información del cliente') : '' ?>

            <form method="POST" action="<?= FOLDER_PATH . '/User/ActualizarPass' ?>" enctype="multipart/form-data" >
              <div class="row">
                <div class="col-xs-6">
                    <?php if($info_item->avatar != ''): ?>
                        <div class="img-thumbnail text-center">
                            <img src="<?= PATH_ASSETS . 'img/'.$info_item->avatar ?>" style="width:100%" />
                            <p><?= $info_item->usuario ?></p>
                        </div>
                    <?php endif; ?>            
                </div>
              </div> <!-- /.row -->  
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password" data-validacion-tipo="requerido|min:3" value="">
              </div>                                    


              <input type="hidden" name="id" value="<?= $info_item->id ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-default" href="<?= FOLDER_PATH . '/User' ?>" role="button">Cancel</a>
            </form>

            </div>
          </div>    