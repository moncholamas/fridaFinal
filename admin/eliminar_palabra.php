<?php
	include "header.php"; require_once('../php/funciones.php');
	$conexion = conectar(); 
	$palabra = "0";
	if (isset($_GET['palabra'])) 
	{
    	$palabra = $_GET['palabra'];
	}    
    	$consulta_eliminar = mysqli_query($conexion,"SELECT * FROM paginas WHERE id='".$palabra."'");
    	$eliminar = mysqli_fetch_assoc($consulta_eliminar);
?>	
		<div class="col-lg-4"></div>
		<div class="col-lg-4 text-center">
	       		<div class="alert-borrar">
	         		<div class="alert alert-danger alert-dismissable">
	                	<form action="../php/palabra_eliminada.php"  name="formulario-eliminar-palabra" method="post">
			           		<h4>¿Quieres eliminar esta palabra?</h4>
			             	<p class="eliminar-text"><?php echo $eliminar['palabra'];?> </p>
			             	<p>Si eliminas este palabra, no podrás recuperarla</p>
	                     	<p>
	                       		<input type="hidden" name="palabra" value="<?php echo $eliminar['id'];?>">
			               		<button type="submit" class="btn btn-danger">Eliminar</button>
				           		<button type="button" class="btn btn-danger" onclick="history.back()">Cancelar</button>
			            	</p>
			        	</form>    
	          		</div>
	        	</div>
	    </div>
		<div class="col-lg-4"></div>
	<?php	include "footer.php"; ?>

