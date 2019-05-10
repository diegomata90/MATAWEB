<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#mostrarBuscador" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="mostrarBuscador">
    <h6 class="m-0 font-weight-bold text-success">Consulta Variaciones de Precios</h6>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse show" id="mostrarBuscador">
    <div class="card-body">
      <form class="form-inline" id="frm-buscar" action="<?= FOLDER_PATH . '/vary/Buscar' ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="codigo" value="" class="form-control" placeholder="Ingrese el código" />
            </div>  
            <div class="form-group">
              <input type="text" name="descripcion" value="" class="form-control" placeholder="Ingrese la descripción" />
            </div>            
            <div class="form-group">
              <label>Desde</label>
              <input type="date" name="desde" value="" class="form-control" placeholder="Fecha de comunicado" />
            </div>
            <div class="form-group">
              <label>Hasta</label>
              <input type="date" name="hasta" value="" class="form-control" placeholder="Fecha de comunicado"  />
            </div>
            <div class="form-group">
              <button name="buscar" class="btn btn-success">Buscar</button>              
              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/vary' ?>">MES</a>
            </div>                  
      </form>
      <div class="form-group">
        <?php !empty($message) ? print("<hr> <div class=\"alert alert-$message_type\">$message</div>") : '' ?>
        <br>
       
        <a class="btn btn-primary" href="<?= FOLDER_PATH . '/vary/New' ?>">+ Variación</a>
                <!-- Modal --> <!-- Boton para subir desde excel --> 
        <?php require 'app/views/Vary/modal-excel.php';     ?>
        <a href="<?= FOLDER_PATH . '/vary/bajarexcel' ?>"><img src="<?= PATH_ASSETS . 'img/excel-ico-down.png' ?>" alt="SubirExcel" width='45px' height='45%'></a>
      </div>
    </div>
  </div>
</div>

<!-- DataTable -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-success">Variación del Precios</h6>
  </div>
  <div class="card-body">

    <div class="table-responsive">
      <table class="table table-striped table-sm" id="dataTable" cellspacing="0" >
        <thead>
          <tr>
            <th style="width:25px;">Cód</th>
            <th style="width:100px;">Descripcion</th>
            <th style="width:50px;">Present</th>
            <th style="width:50px;">Prec 01 Act</th>
            <th style="width:50px;">Prec 01 New</th>
            <th style="width:50px;">Var ¢</th>
            <th style="width:50px;">Var %</th>
            <th style="width:80px;">Fecha Envio</th>
            <th style="width:10px;">Tipo</th>
            <th style="width:5px;">Opciones</th>                  
          </tr>
        </thead>
        <tbody>
          <?php  while ($row = $listado->fetch_assoc()){?>
            <tr>
              <td ><?php echo $row['codigo']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
              <td><?php echo $row['presentacion']; ?></td>
              <td><?php echo number_format ($row['acprec01'],2); ?></td>
              <td><?php echo number_format ($row['newprec01'],2); ?></td>
              <td><?php echo number_format ($row['variacion'],2); ?></td>
              <td><?php echo number_format ($row['porcvar']*100,0)."%"; ?></td>
              <td><?php echo $row['fecha_comun']; ?></td>
              <td><?php echo $row['tipo']; ?></td>
              <td>
                <a href="<?php echo FOLDER_PATH ?>/vary/Obtener/<?php echo $row['id']; ?>" class='btn btn-success btn-circle btn-sm'><i class="fas fa-edit"></i></a>
                <a onclick='javascript:return asegurar();' href='<?php echo FOLDER_PATH ?>/vary/Eliminar/<?php echo $row['id']; ?>' class='btn btn-danger btn-circle btn-sm' ><i class="fas fa-trash-alt"></i></a>
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
</div>