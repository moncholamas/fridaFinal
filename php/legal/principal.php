<br>
<div class="borde">
<div class="row">
	<div class="col-lg-12">
		<h2 align="center"><i>Promoviendo Derechos</i></h2>
		
	</div>
	<div class="col-lg-9">


		<h3 align="center">Conocer para respetar y hacer respetar.</h3>
		<?php 
		$enlace=conectar();
			$legales="SELECT * FROM legales";
			$consul_legal=mysqli_query($enlace,$legales);
			while ($reg_leg=mysqli_fetch_array($consul_legal)) {
				echo '<div class="col-lg-4">';
				echo '<div class="panel panel-default">';
				echo '<div class="panel-heading">';

				echo '<h3 class="panel-title">'.$reg_leg["titulo"].'</h3></div>';
				echo '<div class="cabecera">'.$reg_leg["prologo"].'
				<br><br><a href="ver.php?type=legal&id='.$reg_leg["id"].'" class="boton" align="center">Seguir leyendo</a></div>';
				echo '</div>';
				echo '</div>';
			}
		 ?>

	</div>
	<div class="col-lg-3">
		<div class="panel panel-primary">
		<div class="panel3">
		<div class="panel-heading">
			<h3 class="panel-title">Sitios recomendados</h3>	
		</div>
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
</div>
</div>