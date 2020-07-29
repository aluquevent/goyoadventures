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
    <title>Nuevo colaborador</title>
    <?php 

    import_css_crud();
    import_js_head();

    ?>
    <script src='../../assets/js/bootstrap.min.js'></script>
</head>
<body>
    <?php
    menu_crud();
    $conexion = conectarBD();
    ?>

    <div class="container">
        <div class="row">
            <h1 class="col-12">Nuevo colaborador</h1>            
            <form class="col-12" id="salida-form" action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">                    
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">                    
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link">
                </div>

                <label for="imagen">Seleccionar imagen de vista previa</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen " name="imagen">
                    <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                </div>
                <br>
                
                <button type="submit" class="btn btn-primary" name="crear">Crear colaborador</button>
            </form>
        </div>
    </div>

    <?php 
    if(isset($_POST['crear'])){
        $consulta = $conexion -> prepare("INSERT INTO colaborador VALUES (?, ?, ?, ?)");

        $id                 =null;
        $nombre             =$_POST['nombre'];
        $link               =$_POST['link'];
        $imagen             ="";
        
        $consulta -> bindParam(1,$id);
        $consulta -> bindParam(2,$nombre);
        $consulta -> bindParam(3,$link);
        $consulta -> bindParam(4,$imagen);   

        $consulta -> execute();

        $id_colaborador=$conexion->lastInsertId();
        //comprobamos que existe la carpeta de imágenes

        if(!file_exists("../../assets/img/colaboradores")){
            mkdir("../../assets/img/colaboradores");
        }
        //Copiar la imagen a nuestro servidor

        $nombre_tmp_imagen=$_FILES['imagen']['tmp_name'];

        $extension_imagen=extension_imagen($_FILES['imagen']['type']);

        //copiamos la imagen con name "imagen"

        $nombre_imagen="imagen_colaborador_$id_colaborador".$extension_imagen;
        move_uploaded_file($nombre_tmp_imagen,"../../assets/img/colaboradores/$nombre_imagen");

        //Actualizamos nuestro curson con los nombres de las imágenes

        $consulta_actualizacion=$conexion->prepare("UPDATE colaborador SET imagen=? where id=?");

        $consulta_actualizacion->bindParam(1, $nombre_imagen);
        $consulta_actualizacion->bindParam(2, $id_colaborador);

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