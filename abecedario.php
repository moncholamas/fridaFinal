<?php
    include "php/partes/header.php";
    include "php/funciones.php";
    $conexion = conectar();
    $consulta = "SELECT * FROM paginas";
    $resultado = mysqli_query($conexion,$consulta);
?>
    <!--Contenido de la página de inicio.-->
    <!-- Aceso a videos del sitio a travez de un abecedario.-->
    <div class="container-fluid">
    <div class="col-xs-12 col-md-8 ">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'>Colección de palabras ordenadas alfabeticamente.</h3>
            </div>
            <div class='panel-body'>
                <ul class='nav nav-tabs'>
                    <?php
                        for ($l = '65'; $l <= '90'; $l++) 
                        {
                            $tabs = chr($l);
                            echo    "<li><a href='#$tabs' data-toggle='tab'>$tabs</a></li>";
                        }
                    ?>
                </ul> 
                <div id="my-tab-content" class="tab-content">
                    <?php
                        for ($i = '65'; $i <= '90'; $i++)
                        {
                            $content = chr($i);
                            $consult = "SELECT * FROM paginas
                                         WHERE palabra LIKE '".$content."%'";
                            $result = mysqli_query($conexion,$consult); 
                             
                            echo "<div class='tab-pane' id='".$content."'>
                                    <div class='col-xs-12 col-sm-6 col-lg-4'>";
                                while ($res = mysqli_fetch_array($result)) 
                                {
                                    echo    "<div class='thumbnail' style='background:url(img/subidas/".$res['imagen'].");background-size:100%;'>
                                                  <div class='oculto'><img src='#' alt='$res[alt]'></div>
                                                  <div class='caption'>
                                                    <p><span class='titulo'>".$res['palabra']."</span><br />
                                                    ".$res['d_video']."<br /> 
                                                    <a href='ver.php?type=video&id=(iddelvideo)".$res['id']."' class='btn btn-primary' role='button'>Ver video</a></p>
                                                  </div>
                                                </div>";
                                }
                            echo "</div></div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
<!-- Este es el pie de pagina -->
        <?php
            include("php/partes/footer.php");
        ?>
