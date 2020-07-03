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
    <title>Nueva categoría</title>
    <?php 

    import_css_crud();
    import_js_head();

    ?>
    <script src="../../assets/js/app.js"></script>
    <script src='../../assets/js/bootstrap.min.js'></script>
</head>
<body>
    <?php

    $conexion = conectarBD();
    ?>

    <div class="container">
        <div class="row">
            <h1 class="col-12">Nueva categoría</h1>            
            <form class="col-12" id="salida-form" action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">                    
                    <label for="nombre">Título categoría</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">                
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                </div>

                <label for="imagen">Seleccionar imagen de vista previa</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen " name="imagen">
                    <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                </div>
                <br>
                <div class="form-check">    
                    <input class="form-check-input" type="checkbox" value="" id="visible" name="visible">
                    <label class="form-check-label" for="visible">¿Salida visible?</label>
                </div>
                <button type="submit" class="btn btn-primary" name="crear">Crear categoría</button>
            </form>
        </div>
    </div>

    <?php 
    if(isset($_POST['crear'])){
        $consulta = $conexion -> prepare("INSERT INTO categoria VALUES (?, ?, ?, ?, ?)");

        $id                 =null;
        $nombre             =$_POST['nombre'];
        $descripcion        =$_POST['descripcion'];
        $imagen             ="";
        $visible            =0;
        if(isset($_POST['visible'])){
            $visible=1;
        }
    
        $consulta -> bindParam(1,$id);
        $consulta -> bindParam(2,$nombre);
        $consulta -> bindParam(3,$descripcion);
        $consulta -> bindParam(4,$imagen);
        $consulta -> bindParam(5,$visible);    

        $consulta -> execute();

        $id_categoria=$conexion->lastInsertId();
        //comprobamos que existe la carpeta de imágenes

        if(!file_exists("../../assets/img/categorias")){
            mkdir("../../assets/img/categorias");
        }
        //Copiar la imagen a nuestro servidor

        $nombre_tmp_imagen=$_FILES['imagen']['tmp_name'];

        $extension_imagen=extension_imagen($_FILES['imagen']['type']);

        //copiamos la imagen con name "imagen"

        $nombre_imagen="imagen_categoria_$id_categoria".$extension_imagen;
        move_uploaded_file($nombre_tmp_imagen,"../../assets/img/categorias/$nombre_imagen");

        //Actualizamos nuestro curson con los nombres de las imágenes

        $consulta_actualizacion=$conexion->prepare("UPDATE categoria SET imagen=? where id=$id_categoria");

        $consulta_actualizacion->bindParam(1, $nombre_imagen);

        $consulta_actualizacion->execute();
        
        $conexion = null;

        echo "<meta http-equiv='refresh' content='0; url=categorias.php'>";

    }
    ?>

</body>
</html>
<?php
}
?>