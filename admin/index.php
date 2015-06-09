	<div class="container"
	<?php 
	if(isset($_SESSION['usuario'])){
		echo "class=margen-admin";
	}
	 ?>
	>	
	<div class="col-xs-12 col-lg-12">
		<div class='panel panel-default'>
			<div class='panel-heading'>
			   	<h3 class='panel-title'>
			   		Videos subidos 
			   		<a class="btn btn-default" href="nuevo_video.php" role="button">Agregar video</a>
			   	</h3>
			</div>
			<div class='panel-body'>
				<table class="table table-striped">
			    <thead>
			        <tr>
			        	<th>#</th>
			        	<th>Palabra</th>
			        	<th>Categoría</th>
			        	<th>Descripción</th>
			        	<th>Acción</th>
			        	<th>Acción</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php
			        	include("php/funciones.php");
			         	$enlace = conectar();
			         	// Pedimos el nombre de la página ej: index.php.
			         	$url = basename($_SERVER ["PHP_SELF"]);

			         	// Capturamos el numero de pagina.
			         	if (isset($_GET['pagina'])){
	  						$ini=$_GET['pagina'];
						}else{
	  						$ini=1; 	
	  					}		
			         	// El usuario decide el orden desde un select.
			         	//Falta hacer el orden de las palabras y varias cosas mas, me re fui a buberkin.
			         	$orden = "palabra";

			         	// Hacemos la primera consulta para calcular el numero de paginas.
						$consulta1 = "SELECT * FROM paginas";
						$resultado1 = mysqli_query($enlace,$consulta1);
						$num_post = mysqli_num_rows($resultado1);
						// Número de resultados a mostrar y numero de paginas.
						$final = 10;
						$inicio = ($ini -1) * $final;
						$num_paginas = ceil($num_post / $final);
						$pag_ant = $ini - 1;
						$pag_prox = $ini +1;

						// Segunda consulta para mostrar los resultados ordenados segun el usuario
						$consulta2 = "SELECT * FROM paginas LIMIT $inicio,$final"; 
						$resultado2 = mysqli_query($enlace,$consulta2);
						
						// Mostramos todos los datos.
						while($nuevos = mysqli_fetch_array($resultado2))
						{
							echo"<tr>
						    <td>".$nuevos['id']."</td>
						    <td><div class='words'>".$nuevos['palabra']."</div></td>
						    <td>".$nuevos['categoria']."</td>
						    <td>".$nuevos['d_video']."</td>
						    <td><a href='modificar_palabra.php?palabra=".$nuevos['id']."'>Modificar</a></td>
						    <td><a href='eliminar_palabra.php?palabra=".$nuevos['id']."'>Eliminar</a></td></tr>";
						}  
			        ?>
			    </tbody>
			    </table>
			    <?php	
					//mostrar paginación
					echo "<nav  class='col-lg-8 col-lg-offset-2'>
						    <ul class='pagination'>";
								for ($i=1; $i <= $num_paginas; $i++) { 
						    		if($i == 1)
						    		{
						        		echo "<li><a href='".$url."?pagina=".$i."'>Principio</a></li>";
						    			if($pag_ant != 0){ 
						    				echo "<li><a href='".$url."?pagina=".$pag_ant."'><<</a></li>";
						    			}
						    		}
						    		if($i == 1 || $i == $num_paginas - 1 || ($i >= $ini - 4 && $i <= $ini + 4))
						    		{
						        		echo "<li><a href='".$url."?pagina=".$i."'>".$i."</a></li>";
						    		}
						    		if($i == $num_paginas)
						    		{
						    			if($pag_prox <= $num_paginas){
						        			echo "<li><a href='".$url."?pagina=".$pag_prox."'>>></a></li>";
						        		}
						        		echo "<li><a href='".$url."?pagina=".$i."'>Final</a></li>";
						    		}
						    	}
					echo "</ul>
					       </nav>";
				?>	
			</div>
		</div>	
	</div>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>
  <div class="panel-body">
    <p>...</p>
  </div>

  <!-- Table -->
  <table class="table">
    ...
  </table>
</div>
	</div>