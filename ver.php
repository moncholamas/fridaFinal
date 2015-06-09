		<?php
		//muestra el resultado de la busqueda, o el contenido de lo que llegue por GET
		//CABECERA incluye el head (el css js), el nav. 
			include("php/partes/header.php");
			
		?>
			<div class="col-lg-9">
				<div class="">
					
			<?php 
			//resolver lo que nos mandan por GET
			if(isset($_GET['type'])){
				include("php/funciones.php");
					$enlace=conectar();
					$id=$_GET['id'];
				//si es un video
				if($_GET['type']=="video"){
					$buscar="SELECT * FROM paginas WHERE id='$id'";
					$consulta_b=mysqli_query($enlace,$buscar);
					while ($registro=mysqli_fetch_array($consulta_b)) {
						echo '<div class="borde">';
						echo '<h2>'.$registro['palabra'].'</h2>';
						echo '<div class="delimitador">';
						echo '<div class="contenedor3">';
						echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$registro["video"].'" frameborder="0" allowfullscreen></iframe>';
						echo '</div>';
						echo '<div class="contenedor2"><br>';
						echo '<img  align="center" class="img2" alt="imagen del diccionario" src="img/subidas/'.$registro["imagen"].'"</img>';
						echo '</div>';
						echo '<div class="col">';
						
						echo '<p align="center" <h5 align="center">Descripción del Video</h5><br>'.$registro["d_video"].'</p>';
						$cat=$registro["categoria"];
						echo '</div>';					
						echo '</div>';									
						echo '</div>';
					}
					$type="video";
				}
				elseif($_GET['type']=="new"){
					$buscar="SELECT * FROM noticias WHERE ID='$id'";
					$consulta_b=mysqli_query($enlace,$buscar);
					while ($registro=mysqli_fetch_array($consulta_b)) {
						echo '<div class="col-lg-12">';
						echo '<div class="cabecera">';
						echo '<h2>'.$registro['titulo'].'</h2>';
						echo '</div>';
						echo '<div class="borde">';
						echo 'Fecha de Publicación: '.$registro["fecha"];
						echo '<p>'.$registro["contenido"].'"</p>';
						echo '</div>';
						echo '</div>';
						$cat=$registro["categoria"];
					}
					$type="new";
				}
				elseif($_GET['type']=="legal"){
					$buscar="SELECT * FROM legales WHERE ID='$id'";
					$consulta_b=mysqli_query($enlace,$buscar);
					while ($registro=mysqli_fetch_array($consulta_b)) {
						echo '<div class="col-lg-12">';
						echo '<h2 align="center" class="cabecera">'.$registro['titulo'].'</h2>';
						echo '<p align="center" class="borde">'.$registro["cuerpo"].'"</p>';
						echo '</div>';
					}
				}
			}
				if(isset($_POST["buscar"])){
					include("php/funciones.php");
					$enlace=conectar();
					$b_full=$_POST['b_full'];
				//recibo el campo mandado via ajax
			$busqueda_noticias="SELECT * FROM noticias WHERE titulo LIKE '%".$b_full."%'";
			$query1=mysqli_query($enlace,$busqueda_noticias);
			$busqueda_paginas="SELECT * FROM paginas WHERE palabra LIKE '%".$b_full."%'";
			$query2=mysqli_query($enlace,$busqueda_paginas);
			$busqueda_="SELECT id FROM legales WHERE titulo LIKE '%".$b_full."%'";
			$query3=mysqli_query($enlace,$busqueda_paginas);
			if(mysqli_num_rows($query1)==0){
				//no hay coincidencias
				echo '<div class="col-lg-12"><h5>No existen resultados Relacionadas con <strong>'.$b_full.'</strong></h5></div>';
			}
			else{
				//si hay alguna coincidencia
				echo '<div class="col-lg-12"><h5><span class="glyphicon glyphicon-comment"></span> Noticias Relacionadas:</h5><div>';
				while ($fila=mysqli_fetch_array($query1)) {
					echo '<a href="ver.php?type=new&id='.$fila["ID"].'">'.$fila["titulo"].'</a><br>';
				}
				echo "</div></div>";

				}
			if(mysqli_num_rows($query2)==0){
					echo '<div class="col-lg-4"><h5>No existen Videos Relacionados</h5></div>';
			}
			else{
					echo '<div class="col-lg-4"><h5><span class="glyphicon glyphicon-film"></span> Videos Relacionados:</h5><div>';
					while ($fila=mysqli_fetch_array($query2)) {
					echo '<a href="ver.php?type=video&id='.$fila["id"].'">'.$fila["palabra"].'</a><br>';
					}
				}
			}
			if(isset($_POST["buscar_vid"])){
					include("php/funciones.php");
					$enlace=conectar();
					$b_full=$_POST['b_full'];
			$busqueda_noticias="SELECT * FROM paginas WHERE palabra LIKE '%".$b_full."%'";
			$query3=mysqli_query($enlace,$busqueda_noticias);
			if(mysqli_num_rows($query3)==0){
				//no hay coincidencias
				echo '<div class="borde"><h5>No existen resultados Relacionadas con <strong>'.$b_full.'</strong></h5>';
				echo '<a href="diccionario.php" class="btn btn-default">Volver al diccionario.</a></div>';
			}
			else{
				//si hay alguna coincidencia
				echo '<div class="col-lg-12"><h5><span class="glyphicon glyphicon-comment"></span> Videos Relacionadas:</h5><div>';
				while ($fila=mysqli_fetch_array($query3)) {
					echo '<a href="ver.php?type=video&id='.$fila["id"].'">'.$fila["palabra"].'</a><br>';
				}
				echo "</div></div>";

				}
			}
			 ?>
				</div>
			</div>		
			<div class="col-lg-3">
			 
				<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Sitios recomendados</h3>	
				</div>
				<div class="panel-body">
					
				<p>A continuación las páginas de Instituciones u Organizaciones que te pueden interesar</p>
				</div>	
				<ul class="list-group">
					<li class="list-group-item"><a href="http://modalidadespecial.educ.ar/datos/aprendiendo-en-el-zoo.html#contenidoPrincipal">Escritorio Modalidad Educación Especial</a></li>
					<li class="list-group-item"><a href="http://www.agencia-anita.com.ar/index.php/derechos">ANITA Agencia de Noticias sobre Infancias de Tucumán Argentina</a></li>
					<li class="list-group-item"><a href="http://inadi.gob.ar">INADI Instituto Nacional Contra la Discriminación, la Xenofobia y el Racismo</a></li>
					<li class="list-group-item"><a href="http://www.conadis.gov.ar/accesibilidad.html#principal">CONADIS</a> </li>
					<li class="list-group-item"><a href="http://www.villasoles.com.ar">Villasoles Asociación Civil</a> </li>
					<li class="list-group-item"><a href="http://manosquehablan.com.ar">Manos que Hablan: Diccionario de Lengua de Señas Argentina on-line </a> </li>
					<li class="list-group-item"><a href="http://www.sssalud.gov.ar/index/home.php">Superintendencia de Servicios de Salud</a> </li>
				</ul>
				</div>
			
			</div>
		<?php
		//Este es el pie de pagina
			include("php/partes/footer.php");
		?>
