
<div class="borde">

<?php 
$enlace=conectar();
$list_msj="SELECT nombre,correo FROM mensajes";
$consul_msj=mysqli_query($enlace,$list_msj);
$bandera=0;
$copia;
echo '<h3><span class="glyphicon glyphicon-envelope"></span> Mensajes</h3>';
while ($reg=mysqli_fetch_array($consul_msj)) {
	echo $reg['nombre']."<br>";
	if($bandera==0){
		$copia=$reg;
	}
	$bandera++;
}
print_r($copia);
echo $copia[1];
print_r($reg);
 ?>
 </div>