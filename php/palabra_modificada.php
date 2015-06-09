<?php
  include "partes/header.php";
  include "funciones.php";
  $id = $_POST['id'];
  $palabra = $_POST['palabra'];
  $alt = $_POST['alt'];
  $video = explode("=",$_POST['url']);
  $dvideo = $_POST['des_video'];
  $categoria = $_POST['categoria'];

  //Se las vuelve a convertir con la funcion contraria html_entity_decode(Variable);
  //------------------------------------
  $fecha = time();
  $conexion = conectar();
  // Hacemos la consulta.
  $consulta = "UPDATE paginas SET fecha=$fecha, palabra=$palabra, alt=$alt, video=$video[1], d_video=$dvideo, categoria=$categoria WHERE id=$id";
  $resultado = mysqli_query($conexion, $consulta);
  //Si ocurre un error en la consulta.
  if(!isset($resultado)){ 
    echo "<div class='alert alert-warning text-center' role='alert'>Error al subir el archivo Vuelve a intentar<br> 
       <span class='label label-warning'><button type='button' class='btn btn-primary' onclick='history.back()'>Volver</button></span></div>";
  } else{
     //subido correctamente
      header("location:../admin/index.php");
  }
  /*include "header.php";
  require_once('funciones.php');
  $conexion = conectar();
  $id = $_POST['id_pal'];
  $palabra = $_POST['palabra'];
  $alt = $_POST['alt'];
  $video = $_POST['video'];
  $dvideo = $_POST['dvideo'];
  $categoria = $_POST['categoria'];
  $imagensubida = "true";
  $tamanioimg=$_FILES['img']['size'];
  $nombre = $_FILES['img']['name'];
  $nombretemp = $_FILES['img']['tmp_name'];
  $tipoimg = $_FILES['img']['type'];
  $direccion="../img/$nombre";
  if ($tamanioimg > 400000)
  {
    echo "Tu imagen debe ser menor a 400kb";
    $imagensubida = "false";
  }
  else if (!( $tipoimg == "image/jpg" OR $tipoimg == "image/gif" OR $tipoimg == "image/jpeg" OR $tipoimg == "image/png"))
  {
    echo "Solo se permiten imágenes jpg o gif.";
  $imagensubida = "false";
  }
  else if($imagensubida == "true")
  {
    if(move_uploaded_file ( $nombretemp , $direccion))
    {
      //aqui va la consulta.
      $fecha = time();
      $conexion = conectar();
      $consulta = "UPDATE pagina SET fecha='".$fecha."', palabra='".$palabra."', imagen='".$nombre."', alt='".$alt."', video='".$video."', d_video='".$dvideo."', categoria='".$categoria."' WHERE id_video='".$id."'";
      $resultado = mysqli_query($conexion, $consulta);
      if(! $consulta=mysqli_query($conexion,$consulta)){ 
        echo "<div class='alert alert-warning text-center' role='alert'>Error al subir el archivo Vuelve a intentar<br> 
         <span class='label label-warning'><a href='../admin/subirvideo.php'>Regresar</a></span></div>";
      }else{
        echo "<div class='alert alert-success text-center' role='alert'>Los datos se ingresaron perfectamente<br>
          <span class='label label-success'><a href='../admin/subirvideo.php'>Subir otro contenido</a></span>"."    "."<span class='label label-success'><a href='../index.php'>Ir a la pagina de usuario</a></span></div>" ;
      }
    } 
      //Aqui termina la consulta.
  }else
  {
    echo "<div class='alert alert-warning text-center' role='alert'>Error al subir el archivo </div>";
  }*/
  

  include "partes/footer.php";
?>
