<!-- Button trigger modal -->
<a href="" data-toggle="modal" data-target="#exampleModalCenter"><img src="<?= PATH_ASSETS . 'img/excel-ico-UP.png' ?>" alt="SubirExcel" width='45px' height='45%'></a>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Subir Archivo Excel >> Variaciones de Precios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row" >
		    <form action="<?= FOLDER_PATH . '/vary/Guardar_excel' ?>" enctype="multipart/form-data" method="post">
				
			 <div class="form-group">			 
			 	<label>Buscar Archivo Excel</label>
		      	<input id="archivo" accept=".csv" name="archivo" type="file" class="form-control"/>
		     </div> 
		      
		     <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
		     
		     <div class="form-group">
		      <input class="btn btn-success" name="enviar" type="submit" value="Importar" class="btn btn-success" />
		     </div>

		   	</form>
		</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>