<?PHP
	//CONEXION
	function conectar()
	{
		$base="guorpresnueva";
		$host = "localhost";
		$user = "root";
		$pass = "";
		$enlace = mysqli_connect($host, $user, $pass, $base);
		//or die("Error al conectarse a la base de datos");
		if(isset($enlace))
		{
			mysqli_set_charset($enlace,'utf8');
			return $enlace;

		}
		else{
			die($enlace);
		}

	}
	//DESCONEXION
	function desconectar()
	{
		mysqli_close($enlace);
	}
	function login(){
		$enlace = conectar();
		$usuario=$_POST["usuario"];
		$clave=$_POST["pass"];
		$consulta="SELECT usuario,contrasena FROM usuarios WHERE usuario='$usuario'";
		$query=mysqli_query($enlace,$consulta);
		$cant=mysqli_num_rows($consulta);
		if($cant==0){
			//nos manda de nuevo al login no existe usuario
		}
		else{
			//existe el usuario
			while($fila=mysqli_fetch_array($query)){
				if($fila['contrasena'] == $clave){
					session_start();
					$_SESSION["usuario"]=$usuario;
					header("location:admin/index.php");
				}
			}
		}
	}
	
?>