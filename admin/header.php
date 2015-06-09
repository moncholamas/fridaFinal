<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Página</title>

		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
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
	      <a class="navbar-brand" href="#">Comunidad</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<!--en los class de cada li el codigo php detecta la direccion y muestra activo el enlace según corresponda-->
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "index.php" ? "active" : "")?>><a href="../index.php">Inicio<span class="sr-only">(current)</span></a></li>
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "servicios.php" ? "active" : "")?>><a href="../servicios.php">Servicios</a></li>
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "noticias.php" ? "active" : "")?>><a href="../noticias.php">Noticias</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Diccionario<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="../abecedario.php">Por abecedario</a></li>
	            <li><a href="../categorias.php">Por categoría</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Buscar" id="buscador-nav">
	        </div>
	        <button type="submit" class="btn btn-default">Buscar</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li class=<?php echo (basename($_SERVER['PHP_SELF']) == "admin.php" ? "active" : "")?>>

	        	<a href="admin.php" id=<?php 
	    	if(!isset($_SESSION)){
	    		echo "no-login";

	    	}
	    	 ?> >Administrar</a>

	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	    <div id="resultado">
	    	
	    </div>
	    <div>
	    	<?php 
	    	if(isset($_SESSION)){
	    		echo "<div>ADMIN</div>";

	    	}
	    	 ?>
	    </div>
	    <div class="navlog col-lg-4	bg-primary" id="login">
	    	<h4>administr</h4>
	    	<form class="navbar-form">
	    		<label for="usuario" class="col-sm-2">Usuario</label>
	    		<input type="text" name="usuario" id="usuario" class="form-control" required="required" title="">
	    		<input type="password" name="pass" id="input" class="form-control" required="required" title="">
	    		<button type="submit" class="btn btn-default">Ingresar</button>
	    	</form>
	    </div>
		</nav>		
	  </div><!-- /.container-fluid -->