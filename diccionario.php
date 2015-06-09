<?php
    include "php/partes/header.php";
    include "php/funciones.php";
    $conexion = conectar();
    $consulta = "SELECT * FROM paginas";
    $resultado = mysqli_query($conexion,$consulta);
?>
<div class="row">
    
    <!--Contenido de la página de inicio.-->
    <!-- Aceso a videos del sitio a travez de un abecedario.-->

    <div class=" col-md-8 col-lg-8">
    <div class="cabecera">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'>BUSCADOR DE PALABRAS LSA</h3>
                <div class="panel-body">
                    
                  <form class="navbar-form navbar-left buscador-nav" role="search" action="ver.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="buscar_vid" value="">
                      <input type="text" class="form-control" placeholder="Buscar" id="buscador-nav" name="b_full">
                        <button type="submit" class="btn btn-default">Buscar</button>
                    </div>
                  </form>
                </div>
            </div>

    </div>
    </div>
    </div>
     
            <?php 
            $mostrar_ult="SELECT * FROM paginas ORDER BY fecha desc LIMIT 5";
            $query=mysqli_query($conexion,$mostrar_ult);
            echo '<div class="col-lg-4">';
            echo '<div class="panel panel-primary">';
            echo '<div class="panel">';
            echo '<div class="panel-heading"><h3 class="panel-title">Últimos videos</h3></div>';
            
            echo '<div class="panel-body">';
            echo '</div>';
            echo '<ul class="list-group">';
                while($reg=mysqli_fetch_array($query)){
                echo '<li class="list-group-item"><a href="ver.php?type=video&id='.$reg["id"].'">'.$reg["palabra"].'</a>;</li>';
               }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
             ?>

</div>

<!-- Este es el pie de pagina -->
        <?php
            include("php/partes/footer.php");
        ?>
