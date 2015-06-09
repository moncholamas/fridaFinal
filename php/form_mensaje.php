<form role="form" action="php/enviar_msj.php" method="post" id="mensaje">
		  <div class="form-group">
			    <label for="nombre">Nombre:</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="requerido" required="">
		  </div>
			<div class="form-group">
			    <label for="email">Direccion de Correo:</label>
			    <input type="email" class="form-control" id="email" name="correo" placeholder="opcional">
			</div>
			<div class="form-group">
				<label for="mensaje">Mensaje:</label>
				<textarea name="mensaje" id="mensaje" cols="30" rows="10" class="form-control" placeholder="mensaje" required=""></textarea>
			</div>
				<button type="submit" class="btn btn-default">Enviar</button>
</form>