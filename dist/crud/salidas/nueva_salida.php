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
    <script src="../../assets/js/app.js"></script>
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
                    <label for="categoria">Categoría</label>
                    <select class="custom-select" name="categoria" id="inputGroupSelect01">
                    <option selected>Elegir categoría</option>
                    <?php
                    $consulta_categorias = $conexion -> prepare("SELECT id,nombre from categoria");
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
                    <select class="custom-select" name="epoca" id="inputGroupSelect02">
                        <option selected>Elegir época</option>
                        <option value="invierno">Invierno</option>
                        <option value="primavera">Primavera</option>
                        <option value="verano">Verano</option>
                        <option value="otoño">Otoño</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dificultad">Dificultad</label>
                    <select class="custom-select" name="dificultad" id="inputGroupSelect03">
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
                    <label for="imagen">Seleccionar imagen de vista previa</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen " name="imagen">
                        <label class="custom-file-label" for="imagen">Seleccionar imagen</label>
                    </div>
                </div>
                <div class="form-group"> 
                    <label for="dia1_imagen">Seleccionar imagen de vista previa para el día 1</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="dia1_imagen" name="dia1_imagen">
                        <label class="custom-file-label" for="dia1_imagen">Seleccionar imagen</label>
                    </div>
                </div>

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
        $consulta = $conexion -> prepare("INSERT INTO salida VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $id                 =null;
        $titulo             =$_POST['nombre'];
        $descripcion        =$_POST['descripcion'];
        $categoria          =$_POST['categoria'];
        $ubicacion          =$_POST['ubicacion'];
        $maps               =$_POST['googlemaps_encuentro'];
        $imagen             ="";
        $punto_encuentro    =$_POST['encuentro'];
        $max_asistentes     =$_POST['asistentes'];
        $epoca              =$_POST['epoca'];
        $dificultad         =$_POST['dificultad'];
        $dia1_imagen        ="";
        $dia1_descripcion   ="";
        $dia2_imagen        ="";
        $dia2_descripcion   ="";
        $dia3_imagen        ="";
        $dia3_descripcion   ="";
        $dia4_imagen        ="";
        $dia4_descripcion   ="";
        $dia5_imagen        ="";
        $dia5_descripcion   ="";
        $dia6_imagen        ="";
        $dia6_descripcion   ="";
        $visible            =0;
        if(isset($_POST['visible'])){
            $visible=1;
        }

    
        $consulta -> bindParam(1,$id);
        $consulta -> bindParam(2,$titulo);
        $consulta -> bindParam(3,$descripcion);
        $consulta -> bindParam(4,$categoria);
        $consulta -> bindParam(5,$ubicacion);
        $consulta -> bindParam(6,$maps);
        $consulta -> bindParam(7,$imagen);
        $consulta -> bindParam(8,$punto_encuentro);
        $consulta -> bindParam(9,$max_asistentes);
        $consulta -> bindParam(10,$epoca);
        $consulta -> bindParam(11,$dificultad);
        $consulta -> bindParam(12,$dia1_imagen);
        $consulta -> bindParam(13,$dia1_descripcion);
        $consulta -> bindParam(14,$dia2_imagen);
        $consulta -> bindParam(15,$dia2_descripcion);
        $consulta -> bindParam(16,$dia3_imagen);
        $consulta -> bindParam(17,$dia3_descripcion);
        $consulta -> bindParam(18,$dia4_imagen);
        $consulta -> bindParam(19,$dia4_descripcion);
        $consulta -> bindParam(20,$dia5_imagen);
        $consulta -> bindParam(21,$dia5_descripcion);
        $consulta -> bindParam(22,$dia6_imagen);
        $consulta -> bindParam(23,$dia6_descripcion);
        $consulta -> bindParam(24,$visible);

        $consulta -> execute();
        
        

        $id_salida=$conexion->lastInsertId();
        //comprobamos que existe la carpeta de imágenes

        if(!file_exists("../../assets/img/salidas")){
            mkdir("../../assets/img/salidas");
        }
        //Copiar la imagen a nuestro servidor

        $nombre_tmp_imagen=$_FILES['imagen']['tmp_name'];

        $extension_imagen=extension_imagen($_FILES['imagen']['type']);

        //copiamos la imagen con name "imagen"

        $nombre_imagen="imagen_salida_$id_salida".$extension_imagen;
        move_uploaded_file($nombre_tmp_imagen,"../../assets/img/salidas/$nombre_imagen");

        //Actualizamos nuestro curson con los nombres de las imágenes

        $consulta_actualizacion=$conexion->prepare("UPDATE salida SET imagen=? where id=$id_salida");

        $consulta_actualizacion->bindParam(1, $nombre_imagen);

        $consulta_actualizacion->execute();

        // $consulta_dias_imagenes = $conexion -> prepare("UPDATE salida SET dia1_img=? dia2_img=?, dia3_img=?, dia4_img=?, dia5_img=?, dia6_img=? WHERE id=?");
        // for($i=1; $i<6; $i++){            
        //     if(isset($_POST['dia'.$i.'_imagen'])){
        //         if(!file_exists("../../assets/img/salidas")){
        //             mkdir("../../assets/img/salidas");
        //         }
        //         //Copiar la imagen a nuestro servidor
        
        //         $nombre_tmp_imagen=$_FILES['dia'.$i.'_imagen']['tmp_name'];
        
        //         $extension_imagen=extension_imagen($_FILES['dia'.$i.'_imagen']['type']);
        
        //         //copiamos la imagen con name "imagen"
        
        //         $nombre_imagen="imagen_salida_".$id_salida."_dia".$i."".$extension_imagen;
        //         move_uploaded_file($nombre_tmp_imagen,"../../assets/img/salidas/$nombre_imagen");

                
        //         $consulta_dias_imagenes -> bindParam($i,$nombre_imagen);
        //     }         
        // }
        // $consulta_dias_imagenes -> bindParam(7,$id_salida);
        // $consulta_dias_imagenes -> execute();

        // $consulta_dias_descripcion = $conexion -> prepare("UPDATE salida set dia1_desc=?, dia2_desc=?, dia3_desc=?, dia4_desc=?, dia5_desc=?, dia6_desc=? WHERE id=?");        

        // for($i=1; $i<=6; $i++){
            
        //     if(isset($_POST['dia'.$i.'_descripcion']) && $_POST['dia'.$i.'_descripcion']!=""){
        //         $descripcion = $_POST['dia'.$i.'_descripcion'];
        //         $consulta_dias_descripcion -> bindParam($i,$descripcion);
        //     }else{
        //         $descripcion="";
        //         $consulta_dias_descripcion -> bindParam($i,$descripcion);
        //     }           
        // }
        // $consulta_dias_descripcion -> bindParam(7,$id_salida);
        // $consulta_dias_descripcion -> execute();

        echo "<meta http-equiv='refresh' content='0; url=salidas.php'>";

    }
    $conexion = null;
    ?>

</body>
</html>
<?php
// }
?>