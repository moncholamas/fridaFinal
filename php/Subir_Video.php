<?php
	//Falta verificacion de usuarios mediante sesiones
	//Conexion
	include "funciones.php";

	conectar();

	//consultas a la base de datos

	$nombre = strtolower($_POST["palabra"]);  
	$url_video = $_POST["video"];
	$nombre = strtolower($nombre);
	$categoria = $_POST["categoria"];
	$consulta="SELECT * FROM paginas WHERE nombre='$nombre'";
	if(mysqli_num_rows($consulta)){
		header("location:subir.php?error=1")
	}
	//faltan columnas en la tabla
	//
	$result = "INSERT INTO paginas (nombre,categoria,video) VALUES ('$nombre','$categoria','$video')";
	if (mysqli_query($GLOBALS['conexion'],$result))
		echo "<p>Pagina añadida exitosamente</p>";
	else
		echo "<p>Error</p>";
?>



?>