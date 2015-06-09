<div class="row">
		<div class="container video">
		<div class="col-lg-12 col-md-12">
	    <h2>Seccion de VIDEOS</h2>
	    <!--ULTIMOS VIDEOS videos importantes vista previa y descripcion-->
		</div>
		<div class="contvideogaleria">
			<div class="contvideogaleriaimg">
				<a href="http://www.youtube.com/v/Hr0Wv5DJhuk" onclick="return cambiarvideo(this.href)" title="Video 1"><img src="http://img.youtube.com/vi/Hr0Wv5DJhuk/default.jpg" /></a>
				<a href="http://www.youtube.com/v/boDvXJLau1A" onclick="return cambiarvideo(this.href)" title="Video 2"><img src="http://img.youtube.com/vi/boDvXJLau1A/default.jpg" /></a> 
				<a href="http://www.youtube.com/v/sf_-CA9Ecf0" onclick="return cambiarvideo(this.href)" title="Video 3"><img src="http://img.youtube.com/vi/sf_-CA9Ecf0/default.jpg" /></a> 
				<a href="http://www.youtube.com/v/dMH0bHeiRNg" onclick="return cambiarvideo(this.href)" title="Video 4"><img src="http://img.youtube.com/vi/dMH0bHeiRNg/default.jpg" /></a> 
				<a href="http://www.youtube.com/v/M11SvDtPBhA" onclick="return cambiarvideo(this.href)" title="Video 5"><img src="http://img.youtube.com/vi/M11SvDtPBhA/default.jpg" /></a> 
				<a href="http://www.youtube.com/v/uelHwf8o7_U" onclick="return cambiarvideo(this.href)" title="Video 6"><img src="http://img.youtube.com/vi/uelHwf8o7_U/default.jpg" /></a>
				<a href="http://www.youtube.com/v/pRpeEdMmmQ0" onclick="return cambiarvideo(this.href)" title="Video 7"><img src="http://img.youtube.com/vi/pRpeEdMmmQ0/default.jpg" /></a> 
				<a href="http://www.youtube.com/v/_OBlgSz8sSM" onclick="return cambiarvideo(this.href)" title="Video 8"><img src="http://img.youtube.com/vi/_OBlgSz8sSM/default.jpg" /></a> 
			</div>
		</div>
		<div id="videogaleria"></div>
		<!-- DE ACÁ PARA ABAJO NO TOCAR EL CÓDIGO -->
		<a href="http://loseasi.blogspot.com/2011/02/video-galeria-con-css-y-javascript.html" style="position:absolute; top: 15px; right: 15px;" target="_blank"><img style="width:14px; height:14px;border:0" src="http://2.bp.blogspot.com/_lMNoba63Ric/TUoIgRbfNQI/AAAAAAAAALI/SW1xBJs4SEM/s1600/informacion.gif" /></a>
	</div>
	<script type="text/javascript">
		// Creado por Vku.
		// http://loseasi.blogspot.com/
		function cambiarvideo( url ){
		document.getElementById('videogaleria').innerHTML = '<object width="425" height="344"><param name="movie" value="' + url + '?fs=1&amp;hl=es_ES&amp;rel=0&amp;autoplay=1"/><param value="true" name="allowFullScreen"/><param value="always" name="allowscriptaccess"/><param value="transparent" name="wmode"/><embed width="425" height="344" wmode="transparent" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="' + url + '?fs=1&amp;hl=es_ES&amp;rel=0&amp;autoplay=1"/></object>';
		return false;
		}
	</script>
</div>