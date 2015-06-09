$(document).ready(function(){
	//Si la resolucion es mayor a 800px el buscador muestra una vista previa
	if($(window).width()>=800){
		//si preciona una tecla 
		$('#cont_body').removeClass('.container');
		$('#buscador-nav').keyup(function(e){
		$('#resultado').show('fast');
		$('#login').hide('fast');	
		var consulta=$(this).val();
		$.ajax({
			type:"POST",
			url:"php/buscar.php",
			data:"b="+consulta,
			dataType:"html",
			beforesend:function(){
				$('#resultado').html('<img src="img/cargar.png">');
			},
			error: function(){
				$('#resultado').html('<p>Error en la vista previa, haga click en buscar</p>');
			},
			success: function(data){
				$('#resultado').empty();
				$('#resultado').append(data);
			}
		});
	});

	//si no se inicion sesión el boton administrar tiene un id=no-login
	$('#no-login').on('click',function(e){
		//cuando hacemos click en administrar
		//detenemos el enlace
		e.preventDefault();
		$('#resultado').hide('fast');
		$("#login").toggle('fast');
	});
	}
});