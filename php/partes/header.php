<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Comunidad LSA - Tucumán</title>

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/cabeceralegal.css" rel="stylesheet">
    	<link href="css/cuerpolegal.css" rel="stylesheet">
    	<link href="css/aboutus.css" rel="stylesheet">
        <link href="css/aboutus2.css" rel="stylesheet">
   		 <!-- Custom Fonts -->
    	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<link href="css/font-awesome.css" rel="stylesheet"> 
		<!-- Fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> 
		<!-- Custom styles -->
		<link rel="stylesheet" href="css/voluntariado.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/base.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
<script> 
var repeat=0 
var title=document.title 
var leng=title.length 
var start=1 
function titlemove() { 
titl=title.substring(start, leng) + title.substring(0, start) 
document.title=titl 
start++ 
if (start==leng+1) { 
start=0 
if (repeat==-1) 
return 
} 
setTimeout("titlemove()",140) 
} 
if (document.title) 
titlemove() 
</script> 
</head>
<body>
		
	<div class="container-fluid">
	<nav class="navbar navbar-default navbar-fixed-top">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <div class="logo">
	      <a class="navbar-brand" href="index.php">Comunidad LSA</a>
	    </div>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<!--en los class de cada li el codigo php detecta la direccion y muestra activo el enlace según corresponda-->
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "index.php" ? "active" : "")?>><a href="index.php">Inicio<span class="sr-only">(current)</span></a></li>
	        <!--<li class=<?php echo (basename($_SERVER['PHP_SELF']) == "servicios.php" ? "active" : "")?>><a href="servicios.php">Servicios</a></li>-->
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "noticias.php" ? "active" : "")?>><a href="noticias.php?quemostrar=todas&num=1">Novedades</a></li>

	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "legal.php" ? "active" : "")?>><a href="legal.php">Asesoramiento</a></li>
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "comunidad.php" ? "active" : "")?>><a href="comunidad.php">Quienes somos</a></li>
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "voluntariado.php" ? "active" : "")?>><a href="voluntariado.php">Unetenos</a></li>
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "diccionario.php" ? "active" : "")?>><a href="diccionario.php">Diccionario</a></li>
	        <!--COMENTADO HASTA TERMINAR lo basico
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Diccionario<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="abecedario.php">Por abecedario</a></li>
	          </ul>
	        </li>
	    	-->
	      </ul>
	      <form class="navbar-form navbar-left buscador-nav" role="search" action="ver.php" method="POST">
	        <div class="form-group">
	        	<input type="hidden" name="buscar" value="todo">
	          <input type="text" class="form-control" placeholder="Buscar" id="buscador-nav" name="b_full">
	        <button type="submit" class="btn btn-default">Buscar</button>
	        </div>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "admin.php" ? "active" : "")?>>

	        	<a href="admin.php" id=<?php 
	    	if($_SESSION==null){
	    		echo "no-login";
	    	}
	    	 ?> ><span class="glyphicon glyphicon-user"></span></a>

	      	</li>
	        
	      </ul>
	    </div><!-- /.navbar-collapse -->
	    <div id="resultado">
	    	
	    </div>
		</nav>		
	    	<?php 
	    	if(isset($_SESSION['usuario'])){
	    		echo '<div class="container menu-adminwell well">';
	    		echo "Bienvenidx $_SESSION[usuario] ";
	    		
	    		echo '<div class="btn-group">
				<a href="admin.php?action=nueva_noticia" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Agregar noticia</a>
				<a href="admin.php?action=nuevo_video" class="btn btn-primary"><span class="glyphicon glyphicon-film"></span> Agregar video</a>
				<a href="admin.php?action=ver_msj" class="btn btn-primary"><span class="glyphicon glyphicon-comment"></span> Ver Mensajes</a>
				<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-wrench"></span> Editar noticia/video</a>
	    		</div>';
	    		echo ' <a href="php/logout.php "type="button" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-remove-sign"></span> Cerrar Sesion</a>';
	    		echo '</div>';
	    	}
	    	if(isset($_GET['error'])){
	    		switch ($_GET['error']) {
	    			case '1':
	    				echo '<div class="container alert alert-danger">Error los datos ingresados son incorrectos</div>';
	    				break;
	    			
	    			default:
	    				# code...
	    				break;
	    		}
	    	}
	    	 ?>
	    	
	    <div class="navlog col-lg-6 col-lg-offset-3	col-ms-6" id="login">
	    	
	    	<form class="navbar-form" method="post" action="php/login.php">
	    		<label for="usuario" class="col-sm-2"></label>
	    		<input type="text" name="usuario" id="usuario" class="form-control" required="required" placeholder="Usuario">
	    		<input type="password" name="pass" id="input" class="form-control" required="required" placeholder="Contraseña">
	    		<button type="submit" class="btn btn-default">Ingresar</button>
	    	</form>
	    </div>
	  </div><!-- /.container-fluid -->
	  <div class="container container-principal" id="cont_body">