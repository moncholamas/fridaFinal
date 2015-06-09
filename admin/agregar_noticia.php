<div class="container">
  <?php
  if(isset($_GET['error'])){
              echo '<div class="col-lg-4 col-lg-offset-4 alert alert-danger">
              <strong>Error</strong>
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              ';
              switch ($_GET['error']) {
                case '10':
                  echo "<p>Debe ingresar un título.</p>";
                  break;
                case '11':
                  echo "<p>No escribio nada en el cuerpo del documento.</p>";
                  break;
                case '12':
                  echo "<p>Ocurrio un error en la subida, reintentelo en un momento.</p>";
                  break;
                case '13':
                  echo "<p>Ocurrio un error en la subida, reintentelo en un momento.</p>";
                  break;
                

                  
                  break;

              }
              echo "</div>";
            }
           ?>
</div>
<div class="row">
<div class="col-lg-12"> 
<script src="ckeditor/ckeditor.js"></script>

<legend><h3>Añadir una noticia</h3></legend>
    <form name="carga" id="carga" action="admin/cargar_noticia.php" method="post" enctype="multipart/form-data" class="form">
      <div class="form-group">
        <label for="titulo">Titulo:</label><input class="form-control" type="text" id="titulo" name="titulo">
      </div>
      <div class="form-group"> 
       <textarea name="contenidos" id="contenidos" cols="30" rows="10">
       </textarea>
      </div>
      <div class="form-group"> 
       <label for="cate">Categoría:</label>
            <select id="cate" name="cate"  class="form-control">
               <option value="LSA">Sobre Comunidad LSA</option>
               <option value="general">Interés General</option>
            </select><br>
      </div>
      <div class="form-group">
        <label for="imagen">Imagen:</label><input type="file" name="imagen" class="form-control">
      </div>
      <div class="form-group">
       <button type="button" class="btn btn-primary" onClick="if(confirm('¿Está seguro de que quiere cargar la noticia?')){ document.carga.submit()}">Subir</button>
       <input type="button" class="btn btn-danger" value="Borrar">
      </div>
      <br>
       
     </form>

     <script type="text/javascript">
        CKEDITOR.replace('contenidos', {
          "extraPlugins": "imgbrowse",
          "filebrowserImageBrowseUrl": "/frida3/ckeditor/plugins/imgbrowse/imgbrowse.html?imgroot=frida3/img/",
          "filebrowserImageUploadUrl": "/frida3/ckeditor/plugins/imgupload/imgupload.php"
        });
     </script>
</div>
</div>