<?php
session_start();
include '../../assets/php/functions.php';
if(!isset($_SESSION['id'])){
    echo "<meta http-equiv='refresh' content='0; url=../../index.php'>";
}else{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
    <?php 

    import_css_crud();
    import_js_head();

    ?>
    <script src="../../assets/js/app.js"></script>
    <script src='../../assets/js/bootstrap.min.js'></script>
</head>
<body>
    <?php
    if(!isset($_GET['id'])){
        echo "<meta http-equiv='refresh' content='0; url=categorias.php'>";
    } else {
        $id = $_GET['id'];
        $conexion = conectarBD();
        $consulta_categorias = $conexion -> prepare("SELECT * FROM categoria WHERE id=?");
        $consulta_categorias -> bindParam(1, $id);
        $consulta_categorias -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_categorias -> execute();
        $datos_categoria = $consulta_categorias -> fetch();
        ?>
    
        <div class="container">
            <div class="row">
                <h1 class="col-12">Editar categoría</h1>            
                <form class="col-12" id="salida-form" action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">                    
                        <label for="nombre">Título categoría</label>
                        <input value="<?= $datos_categoria['nombre']?>" type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">                
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"><?= $datos_categoria['descripcion']?></textarea>
                    </div>
                    <div class="form-group">                    
                        <label for="nombre">Título categoría inglés</label>
                        <input value="<?= $datos_categoria['nombre_en']?>" type="text" class="form-control" id="nombre_en" name="nombre_en">
                    </div>
                    <div class="form-group">                
                        <label for="descripcion">Descripción en inglés</label>
                        <textarea class="form-control" id="descripcion_en" name="descripcion_en"><?= $datos_categoria['descripcion_en']?></textarea>
                    </div>
    
                    <label for="imagen">Seleccionar imagen de vista previa</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen " name="imagen">
                        <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                    </div>
                    <br>
                    <div class="form-check">
                    <?php    
                        if ($datos_categoria['visible']==1) {
                            echo "<input class='form-check-input' type='checkbox' id='visible' name='visible' checked>";
                        } else { 
                            echo "<input class='form-check-input' type='checkbox' id='visible' name='visible'>";
                        }
                    ?>
                        <label class="form-check-label" for="visible">¿Salida visible?</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="actualizar">Actualizar categoría</button>
                </form>
            </div>
        </div>
    
        <?php 
        if(isset($_POST['actualizar'])){
            $consulta = $conexion -> prepare("UPDATE categoria SET nombre=?, descripcion=?, nombre_en=?, descripcion_en=?, imagen=?, visible=? WHERE id=?");
    
            
            $nombre             =$_POST['nombre'];
            $descripcion        =$_POST['descripcion'];
            $nombre_en          =$_POST['nombre_en'];
            $descripcion_en        =$_POST['descripcion_en'];
            $imagen             =$datos_categoria['imagen'];
            $visible            =0;
            if(isset($_POST['visible'])){
                $visible=1;
            }

            $consulta -> bindParam(1,$nombre);
            $consulta -> bindParam(2,$descripcion);
            $consulta -> bindParam(3,$nombre_en);
            $consulta -> bindParam(4,$descripcion_en);
            $consulta -> bindParam(5,$imagen);
            $consulta -> bindParam(6,$visible);    
            $consulta -> bindParam(7,$id);    
    
            $consulta -> execute();
    
            if($_FILES['imagen']['tmp_name'] != ""){
                if(!file_exists("../../assets/img/categorias")){
                    mkdir("../../assets/img/categorias");
                }
                unlink("../../assets/img/categorias/$datos_categoria[imagen]");
                
        
                $nombre_tmp_imagen=$_FILES['imagen']['tmp_name'];
        
                $extension_imagen=extension_imagen($_FILES['imagen']['type']);
        
                //copiamos la imagen con name "imagen"
        
                $nombre_imagen="imagen_categoria_$id".$extension_imagen;
                move_uploaded_file($nombre_tmp_imagen,"../../assets/img/categorias/$nombre_imagen");
        
                //Actualizamos nuestro curson con los nombres de las imágenes
        
                $consulta_actualizacion=$conexion->prepare("UPDATE categoria SET imagen=? where id=$id");
        
                $consulta_actualizacion->bindParam(1, $nombre_imagen);
        
                $consulta_actualizacion->execute();         
                
            }
            echo "<meta http-equiv='refresh' content='0; url=categorias.php'>";

    
        }
        
    }
    $conexion = null;
    ?>

</body>
</html>
<?php
}
?>