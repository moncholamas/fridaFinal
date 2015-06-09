<?php 
	session_start();
	include("funciones.php");
		$enlace = conectar();
		$usuario=$_POST["usuario"];
		$clave=$_POST["pass"];
		$consulta="SELECT usuario,contrasena FROM usuarios WHERE usuario='$usuario' AND contrasena='$clave'";
		$query=mysqli_query($enlace,$consulta);
		$cant=mysqli_num_rows($query);
		if($cant==0){
			//nos manda de nuevo al login no existe usuario
			//error1 no existe el usuario
			header("location:../index.php?error=1");
		}
		else{
			$_SESSION["usuario"]=$usuario;
			header("location:../admin.php");
				
		}
 ?>