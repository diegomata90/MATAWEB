<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success">Edición de Usuarios V2 </h6>
	</div>
	<div class="card-body">
		<?php !$info_item ? exit('Hubo un error al cargar la información del usuario') : '' ?>
		<form method="POST" action="<?= FOLDER_PATH . '/User/Actualizar' ?>" enctype="multipart/form-data" >
			<div class="row">
				<div class="col-md-5">
			        <div class="col-md-12">
			        <?php if($info_item->avatar != ''): ?>
			            <div class="img-circuler">
			                <img src="<?= PATH_ASSETS . 'img/'.$info_item->avatar ?>" width='100%' height='100%'/>
			            </div>
			        <?php endif; ?>						
					</div>
					<div class="form-group col-md-12">
						<input type="file" name="avatar" id="avatar"/>
					</div>
				</div>
				<div class="col-md-7">
					<div class="form-group">
						<label for="nombre" >Nombre:</label>
			    		<input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" data-validacion-tipo="requerido|min:3" value="<?= $info_item->nombre ?>">
					</div>
					<div class="form-group">
			    		<label for="apellido">Apellido</label>
			    		<input type="text" name="apellido" class="form-control" id="apellido" placeholder="apellido" data-validacion-tipo="requerido|min:3" value="<?= $info_item->apellido ?>">
					</div>
					<div class="form-group">
			    		<label for="usuario">Usuario</label>
			    		<input type="text" name="usuario" class="form-control" id="usuario" placeholder="usuario" data-validacion-tipo="requerido|min:3" value="<?= $info_item->usuario ?>">
					</div>
					<div class="form-group">
			            <label for="email">Email Address</label>
			            <input type="text" name="email" class="form-control" id="email" placeholder="@email" data-validacion-tipo="requerido|email" value="<?= $info_item->email ?>">
			        </div>
			        <div class="form-group ">
			            <label for="estado">Estado</label>
			            <select name="estado" class="form-control" id="estado">
			                <option <?php echo $info_item->estado == 'A' ? 'selected' : ''; ?> value="A">Activo</option>
			                <option <?php echo $info_item->estado == 'I' ? 'selected' : ''; ?> value="I">Inactivo</option>
			            </select>
			        </div>
			        <div class="form-group ">
			            <label for="rol">Rol</label>
			            <select name="rol" class="form-control" id="rol">
			                <option <?php echo $info_item->rol == 1 ? 'selected' : ''; ?> value = 1 >Administrador</option>
			                <option <?php echo $info_item->rol == 2 ? 'selected' : ''; ?> value = 2 >Usuario</option>
			            </select>
			        </div>			            						
				</div>					
			</div>
		    <input type="hidden" name="id" value="<?= $info_item->id ?>">
		    <input type="hidden" name="img_act" value="<?= $info_item->avatar ?>">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-default" href="<?= FOLDER_PATH . '/User' ?>" role="button">Cancel</a>
		</form>
	</div>
</div>	