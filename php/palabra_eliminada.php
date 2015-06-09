<?php
  require_once('funciones.php');
  $conexion = conectar();
  $palabra=$_POST['palabra'];
  $estado=0; 
   
	$eliminar_palabra = "DELETE FROM paginas WHERE id='".$palabra."'";
    if (mysqli_query($conexion, $eliminar_palabra)) {
        
            header("Location: ../admin/index.php");
		 
     } else {
             echo "Error al borrar los datos: " . mysqli_error($conexion);
     }
?>