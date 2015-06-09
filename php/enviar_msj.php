<?php 

require('funciones.php');
$enlace=conectar();
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$mensaje=$_POST['mensaje'];
if($nombre!=null){
	if($mensaje!=null){	
		$up_msj="INSERT INTO mensajes (nombre,correo,mensaje)VALUES('$nombre','$correo','$mensaje')";
		if(mysqli_query($enlace,$up_msj))
		header("location:../index.php?action=snd_msj");
	}
	else{
		header("location:../mensaje.php?error=21");
	}
}
else{
	header("location:../mensaje.php?error=20");
}

 ?>