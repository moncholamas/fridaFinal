<?php
include "header.php";
require_once('../php/funciones.php');
 $palabra = "0";
if (isset($_GET['palabra'])) {
    $palabra = $_GET['palabra'];
}
    $conexion=conectar(); 
    $modificar = "SELECT * FROM paginas WHERE id='".$palabra."'";	
	$resultado_modificar = mysqli_query($conexion,$modificar);
?>
 	<div class="col-lg-8">
				<form enctype="multipart/form-data" action="../php/palabra_modificada.php" method="POST" role="form">
					<legend>Modificar contenido</legend>
				    <?php 
				    while($modificar= mysqli_fetch_array($resultado_modificar)){
                    	echo   "<!--  NUeva palabra -->
				              	<div class='form-group'>
				                  <label for='palabra'>Palabra</label>
				                  <input type='text' class='form-control' id='palabra' autofocus name='palabra' placeholder='Nombre de la palabra a publicar'
				                  value='".$modificar['palabra']."'>
				                  <input type='hidden' name='id' value='$palabra' />
				              	</div>

				              	<!-- Titlulo alternativo de la imagen -->
				              	<div class='form-group'>
				                  <label for='alt'>Descripción de la imagen</label>
				                  <input type='text' class='form-control' name='alt' id='alt' placeholder='Una pequña descripcion de la imagen'
				                  value='".$modificar['alt']."'>
				              	</div>
				          
				             	 <!-- URL del video -->
				              	<div class='form-group'>
				                  <label for='url'>Video</label>
				                  <input type='text' class='form-control' name='url' id='url' placeholder='Ej: https://www.youtube.com/watch?v=5ycILaRB3b4'
				                  value='".$modificar['video']."'>
				             	 </div>

				             	 <!-- Descripcion del video -->
				            	  <div class='form-group'>
				                  <label for='des_video'>Descripción del video</label>
				                  <textarea rows='3' cols='32' class='form-control' name='des_video' id='des_video' placeholder='Pequeño texto descriptivo del video'
				                  value='".$modificar['d_video']."'></textarea> 
				             	 </div>

				             	 <!-- categoría -->
				             	 <div class='form-group'>
				                  <label for='categoria'>Categoría</label>
				                  <input type='text' class='form-control' name='categoria' id='categoria' value='".$modificar['categoria']."'>
				             	 </div>";
				    }     
				    ?>							
					<button type="submit" class="btn btn-primary">Guardar cambios</button>
					<button type="button" class="btn btn-primary" onclick="history.back()">Cancelar</button>
				</form>
			  </div>
		</div>
    </div>
    <div class="col-md-1"></div>   
  </div>
	</div>
		<!--Script cuenta la longitud de palabras escritas-->
		<script>
			contenido_textarea = ""
			num_caracteres_permitidos = 90

			function valida_longitud(){
			   num_caracteres = document.forms[0].descripcion.value.length

			   if (num_caracteres > num_caracteres_permitidos){
			      document.forms[0].descripcion.value = contenido_textarea
			   }else{
			      contenido_textarea = document.forms[0].descripcion.value
			   }

			   if (num_caracteres >= num_caracteres_permitidos){
			      document.forms[0].caracteres.style.color="#ff0000";
			   }else{
			      document.forms[0].caracteres.style.color="#000000";
			   }

			   cuenta()
			}
			function cuenta(){
			   document.forms[0].caracteres.value=document.forms[0].descripcion.value.length
			}
		</script> 
		<?php include "footer.php" ?>
