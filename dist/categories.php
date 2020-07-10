<?php
include 'assets/php/functions.php';
$id = $_GET['id'];
switch ($id) {
    case 1:
        $page='barranquismo';
        break;
    case 2:
        $page='caballos';
        break;
    case 3:
        $page='4x4';
        break;
    case 4:
        $page='senderismo';
        break;
    case 5:
        $page='bicicleta';
        break;    

}
if($_COOKIE['idioma']=="es"){
    ?>
    <!DOCTYPE html>
    <html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Goyo Adventures | Inicio</title>
        <?php
        import_css();
        import_js_head();    
        ?>
    </head>
    
    <body>
        <?php
        menu($page);
        $conexion = conectarBD();
        
    
        $consulta_categoria= $conexion -> prepare("SELECT id, nombre, imagen from categoria WHERE id=?");
        $consulta_categoria -> bindParam(1,$id);
        $consulta_categoria -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_categoria -> execute();
        $datos_categoria = $consulta_categoria ->fetch();
    
        $consulta_salida= $conexion -> prepare("SELECT id, titulo, descripcion_corta, imagen, dificultad, localizacion, visible from salida WHERE categoria=?");
        $consulta_salida -> bindParam(1,$id);
        $consulta_salida -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_salida -> execute();
        
        ?>
        <!-- Banner -->
        <main id="main">
            <div class="container">
    
                <div class="row pt-3">
                    <div class="titulo" style="background: url(assets/img/categorias/<?=$datos_categoria['imagen']?>) center center; background-size: cover;">
                        <div  class="texto-titulo w-30 p-5">
                            <h1><?= $datos_categoria['nombre']?></h1>
                        </div>
                    </div>
                </div>            
            </div>
            <div class="container">
            <div class="row mt-5">            
            <?php
                while($datos_salida = $consulta_salida -> fetch()){
                if($datos_salida['visible']==0){
    
                } else {            
                ?>
                <div class="col-md-4 col-12 p-2">         
                
                    <div class="card" >
                        <img src="assets/img/salidas/<?= $datos_salida['imagen']?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?=$datos_salida['titulo']?></h5>
                            <p class="card-text"><?= $datos_salida['descripcion_corta']?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dificultad:<?php 
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
                                    } ?>
                            </li>
                            <li class="list-group-item">Localización: <?= $datos_salida['localizacion']?></li>
                        </ul>
                        <div class="card-body">
                        <button class="boton"type="button"><a href="token.php?id=<?=$datos_salida['id']?>">Ver ficha</a></button>                    
                        </div>
                    </div>
                </div>
                <?php
                }
            }
            ?>
            </div>
            </div>
        </main>
            
    
        <?php
        footer($page);
        import_js();
        $conexion=null;
        ?>
    
    </body>
    
    </html>
    <?php
} elseif($_COOKIE['idioma']=="en"){
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goyo Adventures | Categoría</title>
    <?php
    import_css();
    import_js_head();    
    ?>
</head>

<body>
    <?php
    menu_en($page);
    $conexion = conectarBD();
    

    $consulta_categoria= $conexion -> prepare("SELECT id, nombre_en, imagen from categoria WHERE id=?");
    $consulta_categoria -> bindParam(1,$id);
    $consulta_categoria -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_categoria -> execute();
    $datos_categoria = $consulta_categoria ->fetch();

    $consulta_salida= $conexion -> prepare("SELECT id, titulo, desc_corta_en, imagen, dificultad, localizacion, visible from salida WHERE categoria=?");
    $consulta_salida -> bindParam(1,$id);
    $consulta_salida -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_salida -> execute();
    
    ?>
    <!-- Banner -->
    <main id="main">
        <div class="container">

            <div class="row pt-3">
                <div class="titulo" style="background: url(assets/img/categorias/<?=$datos_categoria['imagen']?>) center center; background-size: cover;">
                    <div  class="texto-titulo w-30 p-5">
                        <h1><?= $datos_categoria['nombre_en']?></h1>
                    </div>
                </div>
            </div>            
        </div>
        <div class="container">
        <div class="row mt-5">            
        <?php
            while($datos_salida = $consulta_salida -> fetch()){
            if($datos_salida['visible']==0){

            } else {            
            ?>
            <div class="col-md-4 col-12 p-2">         
            
                <div class="card" >
                    <img src="assets/img/salidas/<?= $datos_salida['imagen']?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?=$datos_salida['titulo']?></h5>
                        <p class="card-text"><?= $datos_salida['desc_corta_en']?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Difficulty:<?php 
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
                                } ?>
                        </li>
                        <li class="list-group-item">Location: <?= $datos_salida['localizacion']?></li>
                    </ul>
                    <div class="card-body">
                    <button class="boton"type="button"><a href="token.php?id=<?=$datos_salida['id']?>">See more</a></button>                    
                    </div>
                </div>
            </div>
            <?php
            }
        }
        ?>
        </div>
        </div>
    </main>
        

    <?php
    footer_en($page);
    import_js();
    $conexion=null;
    ?>

</body>

</html>
<?php
}
?>
