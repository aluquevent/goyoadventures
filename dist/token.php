<?php
$page='';
include 'assets/php/functions.php';
if($_COOKIE['idioma']=="es"){
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Goyo Adventures | Actividad</title> <!-- bd -->
        <?php
        import_css();
        import_js_head();    
        ?>
    </head>
    <body class="token">
        <?php
        menu($page);
        $conexion = conectarBD();
    
        $id = $_GET['id'];
    
        $consulta_salida= $conexion -> prepare("SELECT titulo, descripcion_corta, imagen, dificultad, localizacion, link_maps, duracion_dia, duracion_completa, material, precio, precio2, precio3 from salida WHERE id=?");
        $consulta_salida -> bindParam(1,$id);
        $consulta_salida -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_salida -> execute();
        $datos_salida = $consulta_salida ->fetch();

        $consulta_dias = $conexion -> prepare("SELECT dia1_img, dia2_img, dia3_img, dia4_img, dia5_img, dia6_img, dia7_img, dia8_img, dia1_desc, dia2_desc, dia3_desc, dia4_desc, dia5_desc, dia6_desc, dia7_desc, dia8_desc FROM dias WHERE id_salida=?");
        $consulta_dias -> bindParam(1,$id);
        $consulta_dias -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_dias -> execute();
        $datos_dias = $consulta_dias -> fetch();

        $consulta_incluye = $conexion -> prepare("SELECT incluye1, incluye2, incluye3, incluye4, incluye5, incluye6, incluye7, incluye8, incluye9, incluye10 FROM incluye WHERE id_salida=?");
        $consulta_incluye -> bindParam(1,$id);
        $consulta_incluye -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_incluye -> execute();
        $datos_incluye = $consulta_incluye -> fetch();
        ?>
        <!-- Banner -->
        <main id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="titulo" style="background: url(assets/img/salidas/<?=$datos_salida['imagen']?>) center center; background-size: cover;">
                            <div class="texto-titulo w-30 p-5">
                                <h1><?= $datos_salida['titulo']?></h1>
                            </div>
                        </div>
                        <div class="descripcion-general fondo-secundario p-5">
                            <p><?= $datos_salida['descripcion_corta']?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <?php
                            for($i=1;$i<=8;$i++){
                                if(!empty($datos_dias['dia'.$i.'_img'])){
                                    echo "
                                    <div class='w-100 py-2 pr-0 pl-1 col-md-4 col-6'>
                                        <div class='imagen-dia' name='imagen-dia-$i' style='background: url(assets/img/salidas/".$datos_dias['dia'.$i.'_img'].") center center; background-size: cover;'>
                                            <p>Día $i</p>
                                        </div>
                                    </div>";
                                }
                            }
                            ?>                       
                        </div>
    
                        <div class="descripcion p-5" id="descripcion-dia">
                            <?php
                                $aux = 1;
                                while($datos_dias['dia'.$aux.'_desc']!=""){
                                    echo "<h2>Día $aux</h2>
                                    <div class='separador'></div>
                                    <p>".$datos_dias['dia'.$aux.'_desc']."</p>
                                    ";
                                    $aux++;
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="sidebar">
                            <h2>Informe técnico</h2>
                            <div class="separador"></div>
                            <p class="sidebar-item"> <strong>Dificultad</strong> <?php 
                                switch ($datos_salida['dificultad']){
                                    case 1:
                                        ?>
                                        <i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                                    case 2:
                                        ?>
                                        <i class="fas fa-mountain"></i><i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                                    case 3:
                                        ?>
                                        <i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                                    case 4:
                                        ?>
                                        <i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                                    case 5:
                                        ?>
                                        <i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                            } ?></p>
                            <div class="separador-secundario"></div>
                            <p class="sidebar-item"><strong>Duración/día:</strong> <?= $datos_salida['duracion_dia']." horas"?></p>
                            <div class="separador-secundario"></div>
                            <p class="sidebar-item"><strong>Material necesario:</strong> <?= $datos_salida['material']?></p>
                           
                            <?php
                            if($datos_salida['duracion_completa'] != ""){
                                echo "<div class='separador-secundario'></div>
                                <p class='sidebar-item'><strong>Duración:</strong> $datos_salida[duracion_completa]</p>";
                            }  
                            if($datos_salida['precio'] != ""){
                                echo "<div class='separador-secundario'></div>
                                <h2>Precios</h2>
                                <p class='sidebar-item'>$datos_salida[precio]</p>";
                                if($datos_salida['precio2'] != ""){
                                    echo "<p class='sidebar-item'>$datos_salida[precio2]</p>";
                                }if($datos_salida['precio3'] != ""){
                                    echo "<p class='sidebar-item'>$datos_salida[precio3]</p>";
                                }                                  
                            }                            
                            ?>
                            <div class="separador-secundario"></div>                            
                            <p class="sidebar-item"><p><strong>Localización:</strong> <?= $datos_salida['localizacion']?></p>
                            <div style="width:100%;"><?=$datos_salida['link_maps']?></div>
                            <ul class="mt-5">
                                <h3>Incluye</h3>
                                <div class="separador"></div>
                                <?php
                                    $i=1;
                                    while($datos_incluye['incluye'.$i]!=""){
                                        echo "<li>".$datos_incluye['incluye'.$i.'']."</li>";
                                        $i++;
                                    }                                
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>   
        </main>
        <?php
        footer();
        $conexion=null;
        ?>
    </body>
    </html>
    <?php
} else{
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Goyo Adventures | Actividad</title> <!-- bd -->
        <?php
        import_css();
        import_js_head();    
        ?>
    </head>
    <body class="token">
        <?php
        menu_en($page);
        $conexion = conectarBD();
    
        $id = $_GET['id'];
    
        $consulta_salida= $conexion -> prepare("SELECT titulo_en, desc_corta_en, imagen, dificultad, localizacion, link_maps, duracion_dia, duracion_completa_en, material_en, precio1_en, precio2_en, precio3_en from salida WHERE id=?");
        $consulta_salida -> bindParam(1,$id);
        $consulta_salida -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_salida -> execute();
        $datos_salida = $consulta_salida ->fetch();

        $consulta_dias = $conexion -> prepare("SELECT dia1_img, dia2_img, dia3_img, dia4_img, dia5_img, dia6_img, dia7_img, dia8_img, dia1_desc_en, dia2_desc_en, dia3_desc_en, dia4_desc_en, dia5_desc_en, dia6_desc_en, dia7_desc_en, dia8_desc_en FROM dias WHERE id_salida=?");
        $consulta_dias -> bindParam(1,$id);
        $consulta_dias -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_dias -> execute();
        $datos_dias = $consulta_dias -> fetch();

        $consulta_incluye = $conexion -> prepare("SELECT incluye1_en, incluye2_en, incluye3_en, incluye4_en, incluye5_en, incluye6_en, incluye7_en, incluye8_en, incluye9_en, incluye10_en FROM incluye WHERE id_salida=?");
        $consulta_incluye -> bindParam(1,$id);
        $consulta_incluye -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_incluye -> execute();
        $datos_incluye = $consulta_incluye -> fetch();
        ?>
        <!-- Banner -->
        <main id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="titulo" style="background: url(assets/img/salidas/<?=$datos_salida['imagen']?>) center center; background-size: cover;">
                            <div class="texto-titulo w-30 p-5">
                                <h1><?= $datos_salida['titulo_en']?></h1>
                            </div>
                        </div>
                        <div class="descripcion-general fondo-secundario p-5">
                            <p><?= $datos_salida['desc_corta_en']?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <?php
                            for($i=1;$i<=8;$i++){
                                if(!empty($datos_dias['dia'.$i.'_img'])){
                                    echo "
                                    <div class='w-100 py-2 pr-0 pl-1 col-md-4 col-6'>
                                        <div class='imagen-dia' name='imagen-dia-$i' style='background: url(assets/img/salidas/".$datos_dias['dia'.$i.'_img'].") center center; background-size: cover;'>
                                            <p>Day $i</p>
                                        </div>
                                    </div>";
                                }
                            }
                            ?>                       
                        </div>
    
                        <div class="descripcion p-5" id="descripcion-dia">
                            <?php
                                $aux = 1;
                                while($datos_dias['dia'.$aux.'_desc_en']!=""){
                                    echo "<h2>Day $aux</h2>
                                    <div class='separador'></div>
                                    <p>".$datos_dias['dia'.$aux.'_desc_en']."</p>
                                    ";
                                    $aux++;
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="sidebar">
                            <h2>Techincal inform</h2>
                            <div class="separador"></div>
                            <p class="sidebar-item"> <strong>Difficulty</strong> <?php 
                                switch ($datos_salida['dificultad']){
                                    case 1:
                                        ?>
                                        <i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                                    case 2:
                                        ?>
                                        <i class="fas fa-mountain"></i><i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                                    case 3:
                                        ?>
                                        <i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                                    case 4:
                                        ?>
                                        <i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                                    case 5:
                                        ?>
                                        <i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i><i class="fas fa-mountain"></i>
                                        <?php
                                    break;
                            } ?></p>
                            <div class="separador-secundario"></div>
                            <p class="sidebar-item"><strong>Material necesario:</strong> <?= $datos_salida['material_en']?></p>
                            <div class="separador-secundario"></div>
                            <p class="sidebar-item"><strong>Duration/day:</strong> <?= $datos_salida['duracion_dia']." horas"?></p>
                           
                            <?php
                            if($datos_salida['duracion_completa_en'] != ""){
                                echo "<div class='separador-secundario'></div>
                                <p class='sidebar-item'><strong>Complete duration:</strong> $datos_salida[duracion_completa_en]</p>";
                            }  
                            if($datos_salida['precio1_en'] != ""){
                                echo "<div class='separador-secundario'></div>
                                <h2>Precios</h2>
                                <p class='sidebar-item'>$datos_salida[precio1_en]</p>";
                                if($datos_salida['precio2_en'] != ""){
                                    echo "<p class='sidebar-item'>$datos_salida[precio2_en]</p>";
                                }if($datos_salida['precio3_en'] != ""){
                                    echo "<p class='sidebar-item'>$datos_salida[precio3_en]</p>";
                                }                                  
                            }                            
                            ?>
                            <div class="separador-secundario"></div>                            
                            <p class="sidebar-item"><p><strong>Location:</strong> <?= $datos_salida['localizacion']?></p>
                            <div style="width:100%;"><?=$datos_salida['link_maps']?></div>
                            <ul class="mt-5">
                                <h3>Includes</h3>
                                <div class="separador"></div>
                                <?php
                                    $i=1;
                                    while($datos_incluye['incluye'.$i.'_en']!=""){
                                        echo "<li>".$datos_incluye['incluye'.$i.'_en']."</li>";
                                        $i++;
                                    }                                
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>   
        </main>
        <?php
        footer_en();
        $conexion=null;
        ?>
    </body>
    </html>
    <?php
}
?>