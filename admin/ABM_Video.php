    <?php include "../php/funciones.php";

// Compramos la sesion. (Faltante).

// Guardamos lo que recibimos del formulario en variables.
// Falta usuario.
    $palabra = $_POST['palabra'];
    $alt = $_POST['alt'];
    $url = $_POST['url'];
    $url = explode("=",$_POST['url']);
    $dvideo = $_POST['des_video'];
    $categoria = $_POST['categoria'];
    $imagensubida = "true";
    $tamanioimg = $_FILES['imagen']['size'];
    $nombre = $_FILES['imagen']['name'];
    $nombretemp = $_FILES['imagen']['tmp_name'];
    $tipoimg = strtolower($_FILES['imagen']['type']);
    $direccion = "../img/subidas/$nombre";

    //CODIGO DE ERRORES
    //0=El nombre del video o la direccion ya existen
    //1=No se pudo mover la imagen a la carpeta
    //2=El formato de la imagen no es compatible
    //3=La imagen pesa demasiado (podriamos rearmar la imagen en el servidor)
    //4=No se pudo escribir en la base de datos el registro del nuevo video 


    // Comprobamos que el tamaño de imagen no pase de los 400kb, 409600 bytes.
    if ($tamanioimg > 409600){
        // error "la imagen pesa demasiado"
        header('location:../admin.php?action=nuevo_video&error=3');
    } 
    // Comprobamos el formato de imagenes permitidas.
    else{
     if (!( $tipoimg == "image/jpg" OR $tipoimg == "image/gif" OR $tipoimg == "image/jpeg" OR $tipoimg == "image/png")){
            //debe volver a la pagina nuevo video, error "el formato no es compatible"
        	header('location:../admin.php?action=nuevo_video&error=2');
    	}  
        // Si la imagen paso las pruebas. 
            else{

            // Obtenemos la fecha de creacion del post con la hora del servidor.
            $fecha = time();
            $conexion = conectar();
            //Consulto a la BDD si existe algun registro que coincida con el nombre o la direccion del video
            $reg_video="SELECT palabra,video FROM paginas WHERE palabra='$palabra' OR video='$url[1]'";
            $consul=mysqli_query($conexion,$reg_video);
                if(mysqli_num_rows($consul)==0)
                {
                    if (move_uploaded_file ( $nombretemp , $direccion))
                    {
                		// Hacemos la consulta.
                		$consulta = "INSERT INTO paginas (fecha, palabra, imagen, alt, video, d_video, categoria) VALUES ('$fecha', '$palabra', '$nombre', '$alt', '$url[1]', '$dvideo', '$categoria')";
                		$resultado = mysqli_query($conexion, $consulta);

                        if(!isset($resultado)){ 
                       		//Si ocurre un error en la consulta, error "no se puedo modificar la base de datos"
                    		header('location:../admin.php?action=nuevo_video&error=4');
                		} else{
                    		//SUBIDO CORRECTAMENTE
                            header("location:../admin.php?action=subido");
                		}
            		}
                    else
                    {
                    //no se pudo mover el video
                        header('location:../admin.php?action=nuevo_video&error=1');
                    }   
        		}
                else
                {
                    //EL VIDEO YA EXISTE O EL NOMBRE SE REPITE
                    //le mando al admin la opcion de elegir editar el video que ya existia
                    while ($registros=mysqli_fetch_array($consul)) {
                        //busco en todos los registro encontrados
                        if($registros['palabra']==$palabra){
                            //si la palabra ya existe la mando junto con el error
                            header('location:../admin.php?action=nuevo_video&error=0&palabra='.$registros["palabra"].'');
                        }
                        elseif($registros['video']==$url[1]){
                           //si la palabra ya existe la mando junto con el error
                            header('location:../admin.php?action=nuevo_video&error=0&direccion='.$registros["video"].'');
                        }
                    }
                    
                }
            
            }
        }        
?>








