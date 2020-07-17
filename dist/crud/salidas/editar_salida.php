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
    <script src="../../assets/js/dias.js"></script>
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

        $consulta_dias = $conexion -> prepare("SELECT * FROM dias WHERE id_salida=?");
        $consulta_dias -> bindParam(1, $id);
        $consulta_dias -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_dias -> execute();
        $datos_dia = $consulta_dias -> fetch();
        
        $consulta_incluye = $conexion -> prepare("SELECT * FROM incluye WHERE id_salida=?");
        $consulta_incluye -> bindParam(1, $id);
        $consulta_incluye -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_incluye -> execute();
        $datos_incluye = $consulta_incluye -> fetch();
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
                    <br>                    
                    <label for="nombre_en">Título salida inglés</label>
                    <input value="<?= $datos_salida['titulo_en'] ?>" type="text" class="form-control" id="nombre_en" name="nombre_en">
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
                    <label for="imagen">Seleccionar imagen de vista previa</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen " name="imagen">
                        <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                    </div>
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
                    <input value="<?= $datos_salida['epoca'] ?>" type="text" class="form-control" id="epoca" name="epoca">
                </div>
                <div class="form-group">
                    <label for="epoca_en">Época inglés</label> 
                    <input value="<?= $datos_salida['epoca_en'] ?>" type="text" class="form-control" id="epoca_en" name="epoca_en">
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
                    <label for="material">Material necesario</label>
                    <input value="<?= $datos_salida['material'] ?>" type="text" class="form-control" id="material" name="material">
                </div>
                <div class="form-group">                    
                    <label for="material_en">Material necesario inglés</label>
                    <input value="<?= $datos_salida['material_en'] ?>" type="text" class="form-control" id="material_en" name="material_en">
                </div>
                <div class="form-group">                    
                    <label for="min_asistentes">Mínimo de asistentes</label>
                    <input value="<?= $datos_salida['min_personas'] ?>" type="number" class="form-control" id="min_asistentes" name="min_asistentes">
                </div>
                <div class="form-group">                    
                    <label for="asistentes">Máximo de asistentes</label>
                    <input value="<?= $datos_salida['max_personas'] ?>" type="number" class="form-control" id="asistentes" name="asistentes">
                </div>
                <div class="form-group">                    
                    <label for="duracion_dia">Duración actividad/día </label>
                    <input value="<?= $datos_salida['duracion_dia'] ?>" type="number" class="form-control" id="duracion_dia" name="duracion_dia">
                </div>
                <div class="form-group">                    
                    <label for="duracion_completa">Duración completa </label>
                    <input value="<?= $datos_salida['duracion_completa'] ?>" type="text" class="form-control" id="duracion_completa" name="duracion_completa">
                </div>
                <div class="form-group">                    
                    <label for="duracion_completa_en">Duración completa inglés </label>
                    <input value="<?= $datos_salida['duracion_completa_en'] ?>" type="text" class="form-control" id="duracion_completa_en" name="duracion_completa_en">
                </div>
                <div class="form-group">                    
                    <label for="precio">Precio 1</label>
                    <input value="<?= $datos_salida['precio'] ?>" type="text" class="form-control" id="precio" name="precio">
                </div>
                <div class="form-group">                    
                    <label for="precio2">Precio 2</label>
                    <input value="<?= $datos_salida['precio2'] ?>" type="text" class="form-control" id="precio2" name="precio2">
                </div>
                <div class="form-group">                    
                    <label for="precio3">Precio 3</label>
                    <input value="<?= $datos_salida['precio3'] ?>" type="text" class="form-control" id="precio3" name="precio3">
                </div>
                <div class="form-group">                    
                    <label for="precio1_en">Precio 1 inglés</label>
                    <input value="<?= $datos_salida['precio1_en'] ?>" type="text" class="form-control" id="precio1_en" name="precio1_en">
                </div>
                <div class="form-group">                    
                    <label for="precio2_en">Precio 2 inglés</label>
                    <input value="<?= $datos_salida['precio2_en'] ?>" type="text" class="form-control" id="precio2_en" name="precio2_en">
                </div>
                <div class="form-group">                    
                    <label for="precio3_en">Precio 3 inglés</label>
                    <input value="<?= $datos_salida['precio3_en'] ?>" type="text" class="form-control" id="precio3_en" name="precio3_en">
                </div>

                <?php
                    for($i=1; $i <= 8; $i++){
                        echo "<h2>Día $i</h2>
                        <div class='form-group'>
                            <label for='dia".$i."_img'>Seleccionar imagen</label>
                            <div class='custom-file'>
                                <input type='file' class='custom-file-input' id='dia".$i."_imagen ' name='dia".$i."_imagen'>
                            <label class='custom-file-label' for='imagen'>Seleccionar imagen</label>
                            </div>
                            <div class='form-group'>                   
                                <label for='descripcion_dia$i'>Descripción día $i</label>
                            <textarea  class='form-control' id='descripcion_dia$i' name='descripcion_dia$i'>".$datos_dia['dia'.$i.'_desc']."</textarea>
                            </div>
                            <div class='form-group'>                   
                                <label for='descripcion_en_dia".$i."'>Descripción en inglés</label>
                            <textarea class='form-control' id='descripcion_en_dia".$i."' name='descripcion_en_dia".$i."'>".$datos_dia['dia'.$i.'_desc_en']."</textarea>
                            </div>
                        </div>";

                    }
                    for($i=1; $i <= 10; $i++){
                        echo "<h2>Incluído $i</h2>
                        <div class='form-group'>
                            <label for='incluido".$i."'>Incluye español</label>
                            <input value='".<?= $datos_incluye['incluye'.$i.''] ?>."' type='text' class='form-control' id='incluye$i' name='incluye$i'>
                            <input value='".<?= $datos_incluye['incluye'.$i.'_en'] ?>."' type='text' class='form-control' id='incluye_en$i' name='incluye_en$i'>
                        </div>";

                    }
                ?>
                

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
            $consulta = $conexion -> prepare("UPDATE salida SET titulo=?, descripcion_corta=?, categoria=?, localizacion=?, link_maps=?, imagen=?, punto_encuentro=?, max_personas=?, epoca=?, dificultad=?, visible=?, desc_corta_en=?, titulo_en=?, epoca_en=?, min_personas=?, material=?, material_en=?, precio=?, precio2=?, precio3=?, precio1_en=?, precio2_en=?, precio3_en=?, duracion_dia=?, duracion_completa=?, duracion_completa_en=? WHERE id=?");
    
            
            $titulo             =$_POST['nombre'];
            $descripcion        =$_POST['descripcion'];
            $descripcion_en     =$_POST['descripcion_en'];
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
            $titulo_en = $_POST['nombre_en'];
            $epoca_en = $_POST['epoca_en'];
            $material = $_POST['material'];
            $material_en = $_POST['material_en'];
            $precio = $_POST['precio'];
            $precio2 = $_POST['precio2'];
            $precio3 = $_POST['precio3'];
            $precio1_en = $_POST['precio1_en'];
            $precio2_en = $_POST['precio2_en'];
            $precio3_en = $_POST['precio3_en'];
            $duracion_dia = $_POST['duracion_dia'];
            $duracion_completa = $_POST['duracion_completa'];
            $duracion_completa_en =$_POST['duracion_completa_en'];
            
           
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
            $consulta -> bindParam(13,$titulo_en);
            $consulta -> bindParam(14,$epoca_en);
            $consulta -> bindParam(15,$min_personas);
            $consulta -> bindParam(16,$material);
            $consulta -> bindParam(17,$material_en);
            $consulta -> bindParam(18,$precio);
            $consulta -> bindParam(19,$precio2);
            $consulta -> bindParam(20,$precio3);
            $consulta -> bindParam(21,$precio1_en);
            $consulta -> bindParam(22,$precio2_en);
            $consulta -> bindParam(23,$precio3_en);
            $consulta -> bindParam(24,$duracion_dia);
            $consulta -> bindParam(25,$duracion_completa);
            $consulta -> bindParam(26,$duracion_completa_en);           
            $consulta -> bindParam(27,$id); 
    
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
                
                
                $consulta_dias_imagen = $conexion -> prepare("UPDATE dias SET dia1_img=?, dia2_img=?, dia3_img=?, dia4_img=?, dia5_img=?, dia6_img=?, dia7_img=?, dia8_img=? WHERE id_salida=?");              
                
                for($i=1; $i<=8; $i++){
                    if(!empty($_FILES['dia'.$i.'_imagen']['tmp_name'])){                        
                        if(!file_exists("../../assets/img/salidas")){
                            mkdir("../../assets/img/salidas");
                        }
                        unlink("../../assets/img/salidas/".$datos_salida['dia'.$i.'_img']);                        
                
                        $nombre_tmp_imagen=$_FILES['dia'.$i.'_imagen']['tmp_name'];
                
                        $extension_imagen=extension_imagen($_FILES['dia'.$i.'_imagen']['type']);
                        
                        $nombre_imagen="salida_".$id."_dia".$i."".$extension_imagen;
                        move_uploaded_file($nombre_tmp_imagen,"../../assets/img/salidas/$nombre_imagen");
                        $consulta_dias_imagen -> bindParam($i, $nombre_imagen);
                    }else{
                        $dia_imagen        =$datos_dia['dia'.$i.'_img'];
                        $consulta_dias_imagen -> bindParam($i, $dia_imagen);
                    }
                }
                $consulta_dias_imagen -> bindParam(9, $id);
                $consulta_dias_imagen -> execute();                
                
            }
            $consulta_dias_desc = $conexion -> prepare("UPDATE dias SET dia1_desc=?, dia2_desc=?, dia3_desc=?, dia4_desc=?, dia5_desc=?, dia6_desc=?, dia7_desc=?, dia8_desc=?, dia1_desc_en=?, dia2_desc_en=?, dia3_desc_en=?, dia4_desc_en=?, dia5_desc_en=?, dia6_desc_en=?, dia7_desc_en=?, dia8_desc_en=? WHERE id_salida=?");
            $dia1_desc = $_POST['descripcion_dia1'];
            $dia2_desc = $_POST['descripcion_dia2'];
            $dia3_desc = $_POST['descripcion_dia3'];
            $dia4_desc = $_POST['descripcion_dia4'];
            $dia5_desc = $_POST['descripcion_dia5'];
            $dia6_desc = $_POST['descripcion_dia6'];
            $dia7_desc = $_POST['descripcion_dia7'];
            $dia8_desc = $_POST['descripcion_dia8'];

            $dia1_desc_en = $_POST['descripcion_en_dia1'];
            $dia2_desc_en = $_POST['descripcion_en_dia2'];
            $dia3_desc_en = $_POST['descripcion_en_dia3'];
            $dia4_desc_en = $_POST['descripcion_en_dia4'];
            $dia5_desc_en = $_POST['descripcion_en_dia5'];
            $dia6_desc_en = $_POST['descripcion_en_dia6'];
            $dia7_desc_en = $_POST['descripcion_en_dia7'];
            $dia8_desc_en = $_POST['descripcion_en_dia8'];

            $consulta_dias_desc -> bindParam(1, $dia1_desc);
            $consulta_dias_desc -> bindParam(2, $dia2_desc);
            $consulta_dias_desc -> bindParam(3, $dia3_desc);
            $consulta_dias_desc -> bindParam(4, $dia4_desc);
            $consulta_dias_desc -> bindParam(5, $dia5_desc);
            $consulta_dias_desc -> bindParam(6, $dia6_desc);
            $consulta_dias_desc -> bindParam(7, $dia7_desc);
            $consulta_dias_desc -> bindParam(8, $dia8_desc);
            $consulta_dias_desc -> bindParam(9, $dia1_desc_en);
            $consulta_dias_desc -> bindParam(10, $dia2_desc_en);
            $consulta_dias_desc -> bindParam(11, $dia3_desc_en);
            $consulta_dias_desc -> bindParam(12, $dia4_desc_en);
            $consulta_dias_desc -> bindParam(13, $dia5_desc_en);
            $consulta_dias_desc -> bindParam(14, $dia6_desc_en);
            $consulta_dias_desc -> bindParam(15, $dia7_desc_en);
            $consulta_dias_desc -> bindParam(16, $dia8_desc_en);
            $consulta_dias_desc -> bindParam(17, $id);

            $consulta_dias_desc -> execute();
            
            
            $consulta_incluye = $conexion -> prepare("UPDATE dias SET incluye1=?, incluye2=?, incluye3=?, incluye4=?, incluye5=?, incluye6=?, incluye7=?, incluye8=?, incluye9=?, incluye10=?, incluye1_en=?, incluye2_en=?, incluye3_en=?, incluye4_en=?, incluye5_en=?, incluye6_en=?, incluye7_en=?, incluye8_en=?, incluye9_en=?, incluye10_en=? WHERE id_salida=?");
            $incluye1 = $_POST['incluye1'];
            $incluye2 = $_POST['incluye2'];
            $incluye3 = $_POST['incluye3'];
            $incluye4 = $_POST['incluye4'];
            $incluye5 = $_POST['incluye5'];
            $incluye6 = $_POST['incluye6'];
            $incluye7 = $_POST['incluye7'];
            $incluye8 = $_POST['incluye8'];
            $incluye9 = $_POST['incluye9'];
            $incluye10 = $_POST['incluye10'];

            $incluye1_en = $_POST['incluye_en1'];
            $incluye2_en = $_POST['incluye_en2'];
            $incluye3_en = $_POST['incluye_en3'];
            $incluye4_en = $_POST['incluye_en4'];
            $incluye5_en = $_POST['incluye_en5'];
            $incluye6_en = $_POST['incluye_en6'];
            $incluye7_en = $_POST['incluye_en7'];
            $incluye8_en = $_POST['incluye_en8'];
            $incluye9_en = $_POST['incluye_en9'];
            $incluye10_en = $_POST['incluye_en10'];

            $consulta_incluye -> bindParam(1, $incluye1);
            $consulta_incluye -> bindParam(2, $incluye2);
            $consulta_incluye -> bindParam(3, $incluye3);
            $consulta_incluye -> bindParam(4, $incluye4);
            $consulta_incluye -> bindParam(5, $incluye5);
            $consulta_incluye -> bindParam(6, $incluye6);
            $consulta_incluye -> bindParam(7, $incluye7);
            $consulta_incluye -> bindParam(8, $incluye8);
            $consulta_incluye -> bindParam(9, $incluye9);
            $consulta_incluye -> bindParam(10, $incluye10);
            $consulta_incluye -> bindParam(11, $incluye1_en);
            $consulta_incluye -> bindParam(12, $incluye2_en);
            $consulta_incluye -> bindParam(13, $incluye3_en);
            $consulta_incluye -> bindParam(14, $incluye4_en);
            $consulta_incluye -> bindParam(15, $incluye5_en);
            $consulta_incluye -> bindParam(16, $incluye6_en);
            $consulta_incluye -> bindParam(17, $incluye7_en);
            $consulta_incluye -> bindParam(18, $incluye8_en);
            $consulta_incluye -> bindParam(19, $incluye9_en);
            $consulta_incluye -> bindParam(20, $incluye10_en);
            $consulta_incluye -> bindParam(21, $id);

            $consulta_incluye -> execute();


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