<?php
	
	$busqueda = $_POST["b"];
	if(!empty($busqueda)){
		//si no esta vacio el campo, hago la busqueda
		buscar($busqueda);
	}
	function buscar($b){
		//funciones posee la conexion 
	require("funciones.php");
	//la funcion conectar devuelve una variable de conexion $enlace
	$enlace=conectar();
	//recibo el campo mandado via ajax
			$busqueda_noticias="SELECT * FROM noticias WHERE titulo LIKE '%".$b."%' LIMIT 4";
			$query1=mysqli_query($enlace,$busqueda_noticias);
			$busqueda_paginas="SELECT * FROM paginas WHERE palabra LIKE '%".$b."%' LIMIT 4";
			$query2=mysqli_query($enlace,$busqueda_paginas);
			echo '<div class="container">';
			if(mysqli_num_rows($query1)==0){
				//no hay coincidencias
				echo '<div class="col-lg-4"><h5>No existen Noticias Relacionadas</h5></div>';
			}
			else{
				//si hay alguna coincidencia
				echo '<div class="col-lg-4"><h5><span class="glyphicon glyphicon-comment"></span> Noticias Relacionadas:</h5><div>';
				while ($fila=mysqli_fetch_array($query1)) {
					echo '<a href="ver.php?type=new&id='.$fila["ID"].'">'.$fila["titulo"].'</a>';
				}
				echo "</div></div>";

				}
			echo '<div class="container">';	
			if(mysqli_num_rows($query2)==0){
					echo '<div class="col-lg-4"><h5>No existen Videos Relacionados</h5><div>';
			}
			else{
					echo '<div class="col-lg-4"><h5><span class="glyphicon glyphicon-film"></span> Videos Relacionados:</h5><div>';
					while ($fila=mysqli_fetch_array($query2)) {
					echo '<a href="ver.php?type=video&id='.$fila["id"].'">'.$fila["palabra"].'</a><br>';
				}
				echo "</div></div>";
				}
			}	
	if(isset($_POST['submit'])){
		$busqueda_full=$_POST['busqueda-completa'];
		buscar($busqueda_completa);
	}
 ?>