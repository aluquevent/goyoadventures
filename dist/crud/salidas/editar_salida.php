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
        echo "<meta http-equiv='refresh' content='0; url=salidas.php'>";
    } else {
        $id = $_GET['id'];
        $conexion = conectarBD();
        $consulta_salidas = $conexion -> prepare("SELECT * FROM salida WHERE id=?");
        $consulta_salidas -> bindParam(1, $id);
        $consulta_salidas -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_salidas -> execute();
        $datos_salida = $consulta_salidas -> fetch();
        ?>
    
        <div class="container">
            <div class="row">
                <h1 class="col-12">Editar salida</h1>            
                <form class="col-12" id="salida-form" action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <br>                    
                    <label for="nombre">Título salida</label>
                    <input value="<?= $datos_salida['titulo'] ?>" type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">                   
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"><?= $datos_salida['descripcion_corta'] ?></textarea>
                </div>
                <div class="form-group">                   
                    <label for="descripcion">Descripcion en inglés</label>
                    <textarea class="form-control" id="descripcion_en" name="descripcion_en"><?= $datos_salida['desc_corta_en'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select class="custom-select" name="categoria" id="inputGroupSelect01">
                    <option selected>Elegir categoría</option>
                    <?php
                    $consulta_categorias = $conexion -> prepare("SELECT id,nombre from categoria");
                    $consulta_categorias -> setFetchMode(PDO::FETCH_ASSOC);
                    $consulta_categorias -> execute();
                    while($datos_categoria = $consulta_categorias -> fetch()){
                        if($datos_salida['categoria']==$datos_categoria['id']){
                            echo "
                            <option value='$datos_categoria[id]' selected>$datos_categoria[nombre]</option>";
                        }else{
                        echo "
                        <option value='$datos_categoria[id]'>$datos_categoria[nombre]</option>";
                        }
                    }                
                    ?>
                    </select>
                </div>
                
                
                <div class="form-group">
                    <label for="epoca">Época</label> 
                    <select class="custom-select" name="epoca" id="inputGroupSelect02">                    
                        <?php
                        $epocas =["invierno" => "Invierno", "primavera" => "Primavera", "verano" => "Verano", "otoño" => "Otoño"];
                        foreach ($epocas as $key => $valor) {
                            if($key == $datos_salida['epoca']){
                                echo "<option value='$key' selected>$valor</option>";
                            }else{
                                echo "<option value='$key'>$valor</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dificultad">Dificultad</label>
                    <select class="custom-select" name="dificultad" id="inputGroupSelect03">
                        <?php
                        $dificultad =["1" => "Muy fácil", "2" => "Fácil", "3" => "Moderano", "4" => "Difícil", "5" => "Experto"];
                        foreach ($dificultad as $key => $valor) {
                            if($key == $datos_salida['dificultad']){
                                echo "<option value='$key' selected>$valor</option>";
                            }else{
                                echo "<option value='$key'>$valor</option>";
                            }
                        }
                        ?>                        
                    </select>
                </div>      
                

                <div class="form-group">                    
                    <label for="ubicacion">Ubicación ruta</label>
                    <input value="<?= $datos_salida['localizacion'] ?>" type="text" class="form-control" id="ubicacion" name="ubicacion">
                </div>
                <div class="form-group">                    
                    <label for="encuentro">Punto de encuentro</label>
                    <input value="<?= $datos_salida['punto_encuentro'] ?>" type="text" class="form-control" id="encuentro" name="encuentro">
                </div>
                <div class="form-group">                    
                    <label for="googlemaps_encuentro">Link Punto de encuentro</label>
                    <input value="<?= $datos_salida['link_maps'] ?>" type="text" class="form-control" id="googlemaps_encuentro" name="googlemaps_encuentro">
                </div>
                <div class="form-group">                    
                    <label for="asistentes">Número de asistentes</label>
                    <input value="<?= $datos_salida['max_personas'] ?>" type="number" class="form-control" id="asistentes" name="asistentes">
                </div>
                <div class="form-group"> 
                    <label for="imagen">Seleccionar imagen de vista previa</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen " name="imagen">
                        <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                    </div>
                </div>

                    <br>
                    <div class="form-check">
                    <?php    
                        if ($datos_salida['visible']==1) {
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
            $consulta = $conexion -> prepare("UPDATE salida SET titulo=?, descripcion_corta=?, categoria=?, localizacion=?, link_maps=?, imagen=?, punto_encuentro=?, max_personas=?, epoca=?, dificultad=?, visible=?, desc_corta_en=? WHERE id=?");
    
            
            $titulo             =$_POST['nombre'];
            $descripcion        =$_POST['descripcion'];
            $descripcion_en        =$_POST['descripcion_en'];
            $categoria          =$_POST['categoria'];
            $ubicacion          =$_POST['ubicacion'];
            $maps               =$_POST['googlemaps_encuentro'];
            $imagen             =$datos_salida['imagen'];
            $punto_encuentro    =$_POST['encuentro'];
            $max_asistentes     =$_POST['asistentes'];
            $epoca              =$_POST['epoca'];
            $dificultad         =$_POST['dificultad'];
            $visible            =0;
            if(isset($_POST['visible'])){
                $visible=1;
            }
           
            $consulta -> bindParam(1,$titulo);
            $consulta -> bindParam(2,$descripcion);
            $consulta -> bindParam(3,$categoria);
            $consulta -> bindParam(4,$ubicacion);
            $consulta -> bindParam(5,$maps);
            $consulta -> bindParam(6,$imagen);
            $consulta -> bindParam(7,$punto_encuentro);
            $consulta -> bindParam(8,$max_asistentes);
            $consulta -> bindParam(9,$epoca);
            $consulta -> bindParam(10,$dificultad);
            $consulta -> bindParam(11,$visible); 
            $consulta -> bindParam(12,$descripcion_en); 
            $consulta -> bindParam(13,$id); 
    
            $consulta -> execute();
    
            if($_FILES['imagen']['tmp_name'] != ""){
                if(!file_exists("../../assets/img/salidas")){
                    mkdir("../../assets/img/salidas");
                }
                unlink("../../assets/img/salidas/$datos_salida[imagen]");
                
        
                $nombre_tmp_imagen=$_FILES['imagen']['tmp_name'];
        
                $extension_imagen=extension_imagen($_FILES['imagen']['type']);
        
                //copiamos la imagen con name "imagen"
        
                $nombre_imagen="imagen_salida_$id".$extension_imagen;
                move_uploaded_file($nombre_tmp_imagen,"../../assets/img/salidas/$nombre_imagen");
        
                //Actualizamos nuestro curson con los nombres de las imágenes
        
                $consulta_actualizacion=$conexion->prepare("UPDATE salida SET imagen=? where id=?");
        
                $consulta_actualizacion->bindParam(1, $nombre_imagen);
                $consulta_actualizacion->bindParam(2, $id);
        
                $consulta_actualizacion->execute();    
                
            }
            echo "<meta http-equiv='refresh' content='0; url=salidas.php'>";

    
        }
        
    }
    $conexion = null;
    ?>

</body>
</html>
<?php
}
?>