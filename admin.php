		<?php
		//CABECERA incluye el head (el css js), el nav. 
			include("php/partes/header.php");

		//Panel del admin, le da un resumen de la ultima actividad
			//include("admin/panel.php");
		//CUERPO DEL ADMIN
			
		if(isset($_SESSION['usuario'])!=null){
			//dependiendo del parametro mandado por URL vemos el contenido que corresponde
			if(isset($_GET['action'])){
				require("php/funciones.php");
				switch ($_GET['action']) {
					case 'nueva_noticia':
						include("admin/agregar_noticia.php");
						break;
					case 'nuevo_video':
						include("admin/nuevo_video.php");
						break;
					case 'nueva_noticia':
						include("admin/agregar_noticia.php");
						break;
					case 'ver_msj':
						include("admin/ver_msj.php");
						break;
					default:
						# code...
						break;
				}
			}
			else{
				//si no hay ninguna accion cargo la tabla de videos subidos
				include("admin/index.php");
			}
		}
		else{
			include("admin/pagina_login.html");
		}	
		?>

		<?php
		//Este es el pie de pagina
			include("php/partes/footer.php");
		?>
