<?php
      include("../php/funciones.php"); 
      $conexion = conectar();    
		if($_POST['contenidos']!="" && $_POST['titulo']!=""){
            //recojo datos formulario
            $fecha=time();
            $titulo=$_POST['titulo'];
            $contenido=$_POST['contenidos'];
            $categoria=$_POST['cate'];
            
            //controlo por titulo o contenido si lo que se quiere ingresar no se encuentra ya en la base de datos
                    $yaesta=mysqli_query( $conexion , "SELECT*FROM noticias WHERE contenido LIKE '$contenido' OR '$titulo'");
                    //en caso de que no exista
                    if(!mysqli_fetch_array($yaesta)){
                         //agregar la noticia
                    	 $agregar="INSERT INTO noticias(fecha, titulo, contenido, categoria) VALUES(FROM_UNIXTIME('$fecha'), '$titulo', '$contenido', '$categoria')";
                    	 //si los datos se agregaron correctamente
                        if(mysqli_query( $conexion, $agregar)){
                          //se envio correctamente
                           header('location:../admin.php?action=nueva_noticia&value=subido');
                        }else{
                            //si no se pudieron cargar los datos en la base de datos
                            header('location:../admin.php?action=nueva_noticia&error=13');
                        }
                    }else{
                    	//si el contenido que se intenta ingresar ya esta en la base de datos
                    	header('location:../admin.php?action=nueva_noticia&error=12');
                    }
               }else{
               	    if($_POST['titulo']=="")
                      //NO tiene titulo
               	        header('location:../admin.php?action=nueva_noticia&error=10');
               	    if($_POST['contenidos']=="")
                      //no tiene contenido
               	        header('location:../admin.php?action=nueva_noticia&error=11');
               	}
			?>
