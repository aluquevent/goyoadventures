<?php
$page='token';
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
    
        $consulta_salida= $conexion -> prepare("SELECT titulo, descripcion_corta, imagen, dificultad, localizacion, link_maps, dia1_img, dia2_img, dia3_img, dia4_img, dia5_img, dia6_img, dia7_img, dia8_img, incluye1, incluye2, incluye3, incluye4, incluye5, incluye6, incluye7, incluye8, incluye9, incluye10 from salida WHERE id=?");
        $consulta_salida -> bindParam(1,$id);
        $consulta_salida -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_salida -> execute();
        $datos_salida = $consulta_salida ->fetch();
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
                                if($datos_salida['dia'.$i.'_img'] !=""){
                                    echo "
                                    <div class='w-100 py-2 pr-0 pl-1'>
                                        <div class='imagen-dia' name='imagen-dia-$i'>
                                            <p>Día $i</p>
                                        </div>
                                    </div>";
                                }
                            }
                            ?>                       
                        </div>
    
                        <div class="descripcion p-5" id="descripcion-dia">
                            <h2>Día 1</h2>
                            <div class="separador"></div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores excepturi voluptas quidem culpa reprehenderit fuga, eaque nesciunt, sapiente quasi sequi earum facilis quos, in consequatur asperiores? A maxime natus atque necessitatibus. Ab obcaecati inventore, saepe consequatur ex recusandae eius rerum, voluptatum magnam nostrum similique magni omnis ut doloremque id itaque dolore, laboriosam necessitatibus autem laudantium? Aperiam nobis dolore sint quisquam corporis hic beatae optio velit nesciunt earum ipsum consequuntur cum, nemo minima mollitia commodi, voluptas expedita quas reprehenderit ullam debitis illum? Vel a possimus atque autem quas tempora, reprehenderit suscipit vero ex! Dolor sint distinctio temporibus esse, culpa labore qui accusamus ducimus impedit nam iste maiores repellendus aliquid tempore porro ut, delectus corrupti cupiditate nisi sit obcaecati tenetur fugiat fuga aperiam. Veritatis quasi molestiae eligendi similique amet nulla deleniti ex, nam non excepturi nisi consequuntur laudantium modi! Consequatur optio repellendus repellat? Corrupti, sequi ipsum, minima fugiat incidunt nisi eveniet deleniti nulla explicabo, quidem delectus magni quisquam quos ducimus reprehenderit repudiandae distinctio laudantium dicta obcaecati quibusdam amet unde. Exercitationem ex doloremque nam sint, officia quo itaque! Error fugit nesciunt commodi laudantium aperiam dignissimos quisquam molestiae. Nesciunt voluptate earum numquam id corrupti delectus nostrum, cupiditate distinctio ab cum? Ratione molestias tenetur fuga?</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="sidebar">
                            <h2>Informe técnico</h2>
                            <div class="separador"></div>
                            <p class="sidebar-item"> Dificultad <?php 
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
                            <p class="sidebar-item">Duración: <?= $datos_salida['duracion']?></p>
                            <div class="separador-secundario"></div>
                            <p class="sidebar-item"><p><i class="fas mr-2 fa-map-marked-alt"></i>Localizacion: <?= $datos_salida['localizacion']?></p>
                            <div style="width:100%;"><?=$datos_salida['link_maps']?></div>
                            <ul class="mt-5">
                                <h3>Incluye</h3>
                                <div class="separador"></div>
                                <?php
                                for($i=1;$i<10;$i++){
                                    if($datos_salida['incluye'.$i]!=""){
                                        echo "<li>$datos_salida[incluye$i]</li>"
                                    }
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
}elseif($_COOKIE['idioma']=="en"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goyo Adventures | Actividad</title> 
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

    $consulta_salida= $conexion -> prepare("SELECT titulo, desc_corta_en, imagen, dificultad, localizacion, link_maps from salida WHERE id=?");
    $consulta_salida -> bindParam(1,$id);
    $consulta_salida -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_salida -> execute();
    $datos_salida = $consulta_salida ->fetch();
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
                        <p><?= $datos_salida['desc_corta_en']?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="w-100 py-2 pl-0 pr-1">
                            <div class="imagen-dia">
                                <p>Day 1</p>
                            </div>
                        </div>
                        <div class="w-100 py-2 px-1">
                            <div class="imagen-dia">
                                <p>Day 2</p>
                            </div>
                        </div>
                        <div class="w-100 py-2 pr-0 pl-1">
                            <div class="imagen-dia">
                                <p>Day 3</p>
                            </div>
                        </div>                        
                    </div>

                    <div class="descripcion p-5">
                        <h2>Día 1</h2>
                        <div class="separador"></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores excepturi voluptas quidem culpa reprehenderit fuga, eaque nesciunt, sapiente quasi sequi earum facilis quos, in consequatur asperiores? A maxime natus atque necessitatibus. Ab obcaecati inventore, saepe consequatur ex recusandae eius rerum, voluptatum magnam nostrum similique magni omnis ut doloremque id itaque dolore, laboriosam necessitatibus autem laudantium? Aperiam nobis dolore sint quisquam corporis hic beatae optio velit nesciunt earum ipsum consequuntur cum, nemo minima mollitia commodi, voluptas expedita quas reprehenderit ullam debitis illum? Vel a possimus atque autem quas tempora, reprehenderit suscipit vero ex! Dolor sint distinctio temporibus esse, culpa labore qui accusamus ducimus impedit nam iste maiores repellendus aliquid tempore porro ut, delectus corrupti cupiditate nisi sit obcaecati tenetur fugiat fuga aperiam. Veritatis quasi molestiae eligendi similique amet nulla deleniti ex, nam non excepturi nisi consequuntur laudantium modi! Consequatur optio repellendus repellat? Corrupti, sequi ipsum, minima fugiat incidunt nisi eveniet deleniti nulla explicabo, quidem delectus magni quisquam quos ducimus reprehenderit repudiandae distinctio laudantium dicta obcaecati quibusdam amet unde. Exercitationem ex doloremque nam sint, officia quo itaque! Error fugit nesciunt commodi laudantium aperiam dignissimos quisquam molestiae. Nesciunt voluptate earum numquam id corrupti delectus nostrum, cupiditate distinctio ab cum? Ratione molestias tenetur fuga?</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="sidebar">
                        <h2>Technical inform</h2>
                        <div class="separador"></div>
                        <p class="sidebar-item"> Difficulty <?php 
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
                        <!-- <div class="separador-secundario"></div>
                        <p class="sidebar-item">Duration: 3 días</p> -->
                        <div class="separador-secundario"></div>
                        <p class="sidebar-item"><p><i class="fas mr-2 fa-map-marked-alt"></i>Location: <?= $datos_salida['localizacion']?></p>
                        <div style="width: 100%;"><?=$datos_salida['link_maps']?></div>
                        <ul class="mt-5">
                            <h3>Includes</h3>
                            <div class="separador"></div>
                            <li>Guía certificado de barrancos</li>
                            <li>Todo el material necesario</li>
                            <li>Picnic</li>
                            <li>Transporte</li>
                            <li>Seguro</li>
                            <li>Reportaje fotográfico</li>
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