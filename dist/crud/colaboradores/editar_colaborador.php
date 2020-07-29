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
    <title>Editar colaborador</title>
    <?php 

    import_css_crud();
    import_js_head();

    ?>
    <script src='../../assets/js/bootstrap.min.js'></script>
</head>
<body>
    <?php
    menu_crud();
    if(!isset($_GET['id'])){
        echo "<meta http-equiv='refresh' content='0; url=categorias.php'>";
    } else {
        $id = $_GET['id'];
        $conexion = conectarBD();
        $consulta_colaborador = $conexion -> prepare("SELECT * FROM colaborador WHERE id=?");
        $consulta_colaborador -> bindParam(1, $id);
        $consulta_colaborador -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_colaborador -> execute();
        $datos_colaborador = $consulta_colaborador -> fetch();
        ?>
    
        <div class="container">
            <div class="row">
                <h1 class="col-12">Editar colaborador</h1>            
                <form class="col-12" action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">                    
                        <label for="nombre">Nombre</label>
                        <input value="<?= $datos_colaborador['nombre']?>" type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">                
                        <label for="link">Link</label>
                        <textarea class="form-control" id="link" name="link"><?= $datos_colaborador['link']?></textarea>
                    </div>
    
                    <label for="imagen">Seleccionar imagen</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen " name="imagen">
                        <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="actualizar">Actualizar colaborador</button>
                </form>
            </div>
        </div>
    
        <?php 
        if(isset($_POST['actualizar'])){
            $consulta = $conexion -> prepare("UPDATE colaborador SET nombre=?, link=?, imagen=? WHERE id=?");

            $nombre      =$_POST['nombre'];
            $link        =$_POST['link'];
            $imagen      =$datos_colaborador['imagen'];

            $consulta -> bindParam(1,$nombre);
            $consulta -> bindParam(2,$link);
            $consulta -> bindParam(3,$imagen);
            $consulta -> bindParam(4,$id);    
    
            $consulta -> execute();
    
            if($_FILES['imagen']['tmp_name'] != ""){
                if(!file_exists("../../assets/img/colaboradores")){
                    mkdir("../../assets/img/colaboradores");
                }
                unlink("../../assets/img/colaboradores/$datos_colaborador[imagen]");
                
        
                $nombre_tmp_imagen=$_FILES['imagen']['tmp_name'];
        
                $extension_imagen=extension_imagen($_FILES['imagen']['type']);
        
                //copiamos la imagen con name "imagen"
        
                $nombre_imagen="imagen_colaborador_$id".$extension_imagen;
                move_uploaded_file($nombre_tmp_imagen,"../../assets/img/colaboradores/$nombre_imagen");
        
                //Actualizamos nuestro curson con los nombres de las imágenes
        
                $consulta_actualizacion=$conexion->prepare("UPDATE colaborador SET imagen=? where id=?");
        
                $consulta_actualizacion->bindParam(1, $nombre_imagen);
                $consulta_actualizacion->bindParam(2, $id);
        
                $consulta_actualizacion->execute();         
                
            }
            echo "<meta http-equiv='refresh' content='0; url=colaboradores.php'>";

    
        }
        
    }
    $conexion = null;
    ?>

</body>
</html>
<?php
}
?>