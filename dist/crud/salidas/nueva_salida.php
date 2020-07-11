<?php
session_start();
include '../../assets/php/functions.php';
// if(!isset($_SESSION['nombre']) || $_SESSION['tipo']!="administrador"){
    // echo "<meta http-equiv='refresh' content='0; url=../../index.php'>";
// }else{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva salida</title>
    <?php 

    import_css_crud();
    import_js_head();

    ?>
    <script src="../../assets/js/dias.js"></script>
    <script src="../../assets/js/incluye.js"></script>
    <script src='../../assets/js/bootstrap.min.js'></script>
</head>
<body>
    <?php

    $conexion = conectarBD();
    ?>

    <div class="container">
        <div class="row">
            <h1 class="col-12">Nueva salida</h1>            
            <form class="col-12" id="salida-form" action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <br>                    
                    <label for="nombre">Título salida</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">                   
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="form-group">                   
                    <label for="descripcion">Descripcion en inglés</label>
                    <textarea class="form-control" id="descripcion_en" name="descripcion_en"></textarea>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select class="custom-select" name="categoria" id="inputGroupSelect01">
                    <option selected>Elegir categoría</option>
                    <?php
                    $consulta_categorias = $conexion -> prepare("SELECT id, nombre from categoria");
                    $consulta_categorias -> setFetchMode(PDO::FETCH_ASSOC);
                    $consulta_categorias -> execute();
                    while($datos_categoria = $consulta_categorias -> fetch()){
                        echo "
                        <option value='$datos_categoria[id]'>$datos_categoria[nombre]</option>";
                    }                
                    ?>
                    </select>
                </div>
                
                
                <div class="form-group">
                    <label for="epoca">Época</label> 
                    <input type="text" class="form-control" name="epoca">                    
                </div>
                <div class="form-group">
                    <label for="material">Material necesario</label> 
                    <input type="text" class="form-control" name="material">                    
                </div>
                <div class="form-group">
                    <label for="dificultad">Dificultad</label>
                    <select class="custom-select" name="dificultad" id="inputGroupSelect02">
                        <option selected>Elegir dificultad</option>
                        <option value="1">1 - Muy fácil</option>
                        <option value="2">2 - Fácil</option>
                        <option value="3">3 - Moderado</option>
                        <option value="4">4 - Difícil</option>
                        <option value="5">5 - Muy difícil</option>
                    </select>
                </div>      
                

                <div class="form-group">                    
                    <label for="ubicacion">Ubicación ruta</label>
                    <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                </div>
                <div class="form-group">                    
                    <label for="encuentro">Punto de encuentro</label>
                    <input type="text" class="form-control" id="encuentro" name="encuentro">
                </div>
                <div class="form-group">                    
                    <label for="googlemaps_encuentro">Link Punto de encuentro</label>
                    <input type="text" class="form-control" id="googlemaps_encuentro" name="googlemaps_encuentro">
                </div>
                <div class="form-group">                    
                    <label for="asistentes">Número de asistentes</label>
                    <input type="number" class="form-control" id="asistentes" name="asistentes">
                </div>
                <div class="form-group">                    
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio">
                </div>
                <div class="form-group"> 
                    <label for="imagen">Seleccionar imagen de vista previa</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen " name="imagen">
                        <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                    </div>
                </div>

                <div id="padre_includes"></div>
                <button type="button" class="btn btn-success" id="incluye">Añadir incluído</button>
                <button type="button" class="btn btn-danger" id="borrar_incluye">Borrar último incluido</button>
                <br><br>

                <div id="padre"></div>
                <button type="button" class="btn btn-success" id="dias">Añadir día</button>
                <button type="button" class="btn btn-danger" id="borrar_dias">Borrar un día</button>
                

                <div class="form-group"> 
                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" value="" id="visible" name="visible">
                        <label class="form-check-label" for="visible">¿Salida visible?</label>
                    </div>
                </div>         

                <button type="submit" class="btn btn-primary" name="crear">Crear salida</button>

            </form>
        </div>
    </div>

    <?php 
    if(isset($_POST['crear'])){
        $consulta = $conexion -> prepare("INSERT INTO salida VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $id                 =null;
        $titulo             =$_POST['nombre'];
        $descripcion        =$_POST['descripcion'];
        $descripcion_en     =$_POST['descripcion_en'];
        $categoria          =$_POST['categoria'];
        $ubicacion          =$_POST['ubicacion'];
        $maps               =$_POST['googlemaps_encuentro'];
        $imagen             ="";
        $punto_encuentro    =$_POST['encuentro'];
        $max_asistentes     =$_POST['asistentes'];
        $epoca              =$_POST['epoca'];
        $dificultad         =$_POST['dificultad'];
        $precio             =$_POST['precio'];
        $material_necesario =$_POST['material'];

        $visible            =0;
        if(isset($_POST['visible'])){
            $visible=1;
        }
    
        $consulta -> bindParam(1, $id);
        $consulta -> bindParam(2, $titulo);
        $consulta -> bindParam(3, $descripcion);
        $consulta -> bindParam(4, $descripcion_en);
        $consulta -> bindParam(5, $categoria);
        $consulta -> bindParam(6, $ubicacion);
        $consulta -> bindParam(7, $maps);
        $consulta -> bindParam(8, $imagen);
        $consulta -> bindParam(9, $punto_encuentro);
        $consulta -> bindParam(10, $max_asistentes);
        $consulta -> bindParam(11, $epoca);
        $consulta -> bindParam(12, $dificultad);
        $consulta -> bindParam(13, $precio);
        $consulta -> bindParam(14, $material_necesario);
        $consulta -> bindParam(15, $visible);

        $consulta -> execute();   

        $id_salida=$conexion->lastInsertId();  

        if(!file_exists("../../assets/img/salidas")){
            mkdir("../../assets/img/salidas");
        }

        $nombre_tmp_imagen=$_FILES['imagen']['tmp_name'];

        $extension_imagen=extension_imagen($_FILES['imagen']['type']);     

        $nombre_imagen="imagen_salida_$id_salida".$extension_imagen;
        move_uploaded_file($nombre_tmp_imagen,"../../assets/img/salidas/$nombre_imagen");

        $consulta_actualizacion=$conexion->prepare("UPDATE salida SET imagen=? WHERE id=?");

        $consulta_actualizacion->bindParam(1, $nombre_imagen);
        $consulta_actualizacion->bindParam(2, $id_salida);

        $consulta_actualizacion->execute();

        $consulta_dias = $conexion -> prepare("INSERT INTO dias VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $dia1_imagen        ="";
        $dia1_descripcion   ="";
        $dia1_descripcion_en="";
        $dia2_imagen        ="";
        $dia2_descripcion   ="";
        $dia2_descripcion_en="";
        $dia3_imagen        ="";
        $dia3_descripcion   ="";
        $dia3_descripcion_en="";
        $dia4_imagen        ="";
        $dia4_descripcion   ="";
        $dia4_descripcion_en="";
        $dia5_imagen        ="";
        $dia5_descripcion   ="";
        $dia5_descripcion_en="";
        $dia6_imagen        ="";
        $dia6_descripcion   ="";
        $dia6_descripcion_en="";
        $dia7_imagen        ="";
        $dia7_descripcion   ="";
        $dia7_descripcion_en="";
        $dia8_imagen        ="";
        $dia8_descripcion   ="";
        $dia8_descripcion_en="";

        $consulta_dias -> bindParam(1, $id_salida);
        $consulta_dias -> bindParam(2, $dia1_imagen);
        $consulta_dias -> bindParam(3, $dia1_descripcion);
        $consulta_dias -> bindParam(4, $dia1_descripcion_en);
        $consulta_dias -> bindParam(5, $dia2_imagen);
        $consulta_dias -> bindParam(6, $dia2_descripcion);
        $consulta_dias -> bindParam(7, $dia2_descripcion_en);
        $consulta_dias -> bindParam(8, $dia3_imagen);
        $consulta_dias -> bindParam(9, $dia3_descripcion);
        $consulta_dias -> bindParam(10, $dia3_descripcion_en);
        $consulta_dias -> bindParam(11, $dia4_imagen);
        $consulta_dias -> bindParam(12, $dia4_descripcion);
        $consulta_dias -> bindParam(13, $dia4_descripcion_en);
        $consulta_dias -> bindParam(14, $dia5_imagen);
        $consulta_dias -> bindParam(15, $dia5_descripcion);
        $consulta_dias -> bindParam(16, $dia5_descripcion_en);
        $consulta_dias -> bindParam(17, $dia6_imagen);
        $consulta_dias -> bindParam(18, $dia6_descripcion);
        $consulta_dias -> bindParam(19, $dia6_descripcion_en);
        $consulta_dias -> bindParam(20, $dia7_imagen);
        $consulta_dias -> bindParam(21, $dia7_descripcion);
        $consulta_dias -> bindParam(22, $dia7_descripcion_en);
        $consulta_dias -> bindParam(23, $dia8_imagen);
        $consulta_dias -> bindParam(24, $dia8_descripcion);
        $consulta_dias -> bindParam(25, $dia8_descripcion_en);
        $consulta_dias -> execute();

        $consulta_dias_imagenes = $conexion -> prepare("UPDATE dias SET dia1_img=?, dia2_img=?, dia3_img=?, dia4_img=?, dia5_img=?, dia6_img=?, dia7_img=?, dia8_img=? WHERE id_salida=?");
        $vacio="";
        for($i=1; $i<=8; $i++){            
            if(!empty($_FILES['imagen_dia'.$i])){
                if(!file_exists("../../assets/img/salidas")){
                    mkdir("../../assets/img/salidas");
                }
        
                $nombre_tmp_imagen=$_FILES['imagen_dia'.$i]['tmp_name'];
        
                $extension_imagen=extension_imagen($_FILES['imagen_dia'.$i]['type']);
                
                $nombre_imagen="salida_".$id_salida."_dia".$i."".$extension_imagen;
                move_uploaded_file($nombre_tmp_imagen,"../../assets/img/salidas/$nombre_imagen");

                $consulta_dias_imagenes -> bindParam($i,$nombre_imagen);
                echo "hola";
            }else{                
                $consulta_dias_imagenes -> bindParam($i,$vacio);
            }         
        }
        $consulta_dias_imagenes -> bindParam(9,$id_salida);
        $consulta_dias_imagenes -> execute();

        $consulta_dias_descripcion = $conexion -> prepare("UPDATE dias set dia1_desc=?, dia2_desc=?, dia3_desc=?, dia4_desc=?, dia5_desc=?, dia6_desc=?, dia7_desc=?, dia8_desc=? WHERE id_salida=?");        
        $descripcion_vacia="";
        for($i=1; $i<=8; $i++){            
            if(isset($_POST['descripcion'.$i]) && $_POST['descripcion'.$i]!=""){
                $descripcion = $_POST['descripcion'.$i];
                $consulta_dias_descripcion -> bindParam($i,$descripcion);
            }else{                
                $consulta_dias_descripcion -> bindParam($i,$descripcion_vacia);
            }           
        }
        $consulta_dias_descripcion -> bindParam(9,$id_salida);
        $consulta_dias_descripcion -> execute();
        
        $consulta_dias_descripcion_en = $conexion -> prepare("UPDATE dias set dia1_desc_en=?, dia2_desc_en=?, dia3_desc_en=?, dia4_desc_en=?, dia5_desc_en=?, dia6_desc_en=?, dia7_desc_en=?, dia8_desc_en=? WHERE id_salida=?");        
        
        for($i=1; $i<=8; $i++){            
            if(isset($_POST['descripcion'.$i.'_en']) && $_POST['descripcion'.$i.'_en']!=""){
                $descripcion_en = $_POST['descripcion'.$i.'_en'];
                $consulta_dias_descripcion_en -> bindParam($i,$descripcion_en);
            }else{                
                $consulta_dias_descripcion_en -> bindParam($i,$descripcion_vacia);
            }           
        }
        $consulta_dias_descripcion_en -> bindParam(9,$id_salida);
        $consulta_dias_descripcion_en -> execute();

        // $incluye="";
        // for($i=1;$i<=10;$i++){
        //     if(isset($_POST['incluye'.$i])){
        //         $incluye."".$i= $_POST['incluye'.$i];
        //     }else{
        //         $incluye."".$i="";
        //     }
        // }

        // echo "<meta http-equiv='refresh' content='0; url=salidas.php'>";

    }
    $conexion = null;
    ?>

</body>
</html>
<?php
// }
?>