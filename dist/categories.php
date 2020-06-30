<?php
include 'assets/php/functions.php'
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
    menu();
    $conexion = conectarBD();
    $id = $_GET['id'];

    $consulta_categoria= $conexion -> prepare("SELECT id, nombre, imagen from categoria WHERE id=?");
    $consulta_categoria -> bindParam(1,$id);
    $consulta_categoria -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_categoria -> execute();
    $datos_categoria = $consulta_categoria ->fetch();

    $consulta_salida= $conexion -> prepare("SELECT id, titulo, descripcion_corta, imagen, visible from salida WHERE categoria=?");
    $consulta_salida -> bindParam(1,$id);
    $consulta_salida -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_salida -> execute();
    
    ?>
    <!-- Banner -->
    <main id="main">
        <div class="container pt-3">

            <div class="row">
                <div class="titulo" style="background: url(assets/img/categorias/<?=$datos_categoria['imagen']?>) center center; background-size: cover;">
                    <div  class="texto-titulo w-30 p-5">
                        <h1><?= $datos_categoria['nombre']?></h1>
                    </div>
                </div>
            </div>            
        </div>
        <div class="container">
        <?php
            while($datos_salida = $consulta_salida -> fetch()){
            if($datos_salida['visible']==0){

            } else {

            
            ?>
            <div class="row">
                <div class="col-md-12 salida">
                    <div class="titulo-salida" >
                        <h2><?=$datos_salida['titulo']?></h2>
                        <button class="boton"type="button"><a href="token.php?id=<?=$datos_salida['id']?>">Ver ficha</a></button>
                    </div>

                    <div class="separador"></div>
                    <p><?= $datos_salida['descripcion_corta']?></p>
                </div>

                <div class="col-md-4 imagen-categoria">
                    <img src="assets/img/ALTIPLANO.jpg" alt="">
                </div>
                <div class="col-md-4 imagen-categoria">
                    <img src="assets/img/ALTIPLANO.jpg" alt="">
                </div>
                <div class="col-md-4 imagen-categoria">
                    <img src="assets/img/ALTIPLANO.jpg" alt="">
                </div>

            </div>
            <?php
            }
            }
            ?>
        </div>
    </main>
        

    <?php
    footer();
    import_js();
    $conexion=null;
    ?>

</body>

</html>