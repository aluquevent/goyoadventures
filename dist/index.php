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
    <script type="text/javascript" src="assets/js/app.js"></script>      
</head>
    
<body>
    <?php
    menu();
    $conexion = conectarBD();
    $consulta_barranquismo= $conexion -> prepare("SELECT id, nombre, descripcion from categoria WHERE id=1");
    $consulta_barranquismo -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_barranquismo -> execute();
    $datos_barranquismo = $consulta_barranquismo ->fetch();

    $consulta_caballos= $conexion -> prepare("SELECT id, nombre, descripcion from categoria WHERE id=2");
    $consulta_caballos -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_caballos -> execute();
    $datos_caballos = $consulta_caballos ->fetch();

    $consulta_4x4= $conexion -> prepare("SELECT id, nombre, descripcion from categoria WHERE id=3");
    $consulta_4x4 -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_4x4 -> execute();
    $datos_4x4 = $consulta_4x4 ->fetch();

    $consulta_senderismo= $conexion -> prepare("SELECT id, nombre, descripcion from categoria WHERE id=4");
    $consulta_senderismo -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_senderismo -> execute();
    $datos_senderismo = $consulta_senderismo ->fetch();

    $consulta_bicicleta= $conexion -> prepare("SELECT id, nombre, descripcion from categoria WHERE id=5");
    $consulta_bicicleta -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_bicicleta -> execute();
    $datos_bicicleta = $consulta_bicicleta ->fetch();
    
    ?>
    <!-- Banner -->
    <main id="main">
    <section carrousel>
        <?php 
               
        
        ?>
        <input id="slide-0" name="carrousel" type="radio" checked/>
        <div class="slide" style="background: url(assets/img/banner/barranquismo.jpg) center center; background-size: cover;">
            <label for="slide-4" class="back">◀</label>
            <div class="slide-content">
                <h1><?= $datos_barranquismo['nombre']?></h1>
                <p><?= $datos_barranquismo['descripcion']?></p>
                <button class="boton"><a href="categories.php?id=<?=$datos_barranquismo['id']?>">Descubre</a></button>
            </div>
            <label for="slide-1" class="forward">▶</label>
        </div>
        
        <input id="slide-1" name="carrousel" type="radio" />
        <div class="slide" style="background: url(assets/img/banner/caballos.jpg) center center; background-size: cover;">
            <label for="slide-0" class="back">◀</label>
            <div class="slide-content">
            <h1><?= $datos_caballos['nombre']?></h1>
            <p><?= $datos_caballos['descripcion']?></p>
            <button class="boton"><a href="categories.php?id=<?=$datos_caballos['id']?>">Descubre</a></button>
            </div>
            <label for="slide-2" class="forward">▶</label>
        </div>
        
        <input id="slide-2" name="carrousel" type="radio" />
        <div class="slide" style="background: url(assets/img/banner/4x4.jpg) center center; background-size: cover;">
            <label for="slide-1" class="back">◀</label>
            <div class="slide-content">
            <h1><?= $datos_4x4['nombre']?></h1>
            <p><?= $datos_4x4['descripcion']?></p>
            <button class="boton"><a href="categories.php?id=<?=$datos_4x4['id']?>">Descubre</a></button>
            </div>
            <label for="slide-3" class="forward">▶</label>
        </div>  

        <input id="slide-3" name="carrousel" type="radio" />
        <div class="slide" style="background: url(assets/img/banner/senderismo.jpg) center center; background-size: cover;">
            <label for="slide-2" class="back">◀</label>
            <div class="slide-content">
            <h1><?= $datos_senderismo['nombre']?></h1>
            <p><?= $datos_senderismo['descripcion']?></p>
            <button class="boton"><a href="categories.php?id=<?=$datos_senderismo['id']?>">Descubre</a></button>
            </div>
            <label for="slide-4" class="forward">▶</label>
        </div>

        <input id="slide-4" name="carrousel" type="radio" />
        <div class="slide" style="background: url(assets/img/banner/bicicleta.jpg) center center; background-size: cover;">
            <label for="slide-3" class="back">◀</label>
            <div class="slide-content">
            <h1><?= $datos_bicicleta['nombre']?></h1>
            <p><?= $datos_bicicleta['descripcion']?></p>
            <button class="boton"><a href="categories.php?id=<?=$datos_bicicleta['id']?>">Descubre</a></button>
            </div>
            <label for="slide-0" class="forward">▶</label>
        </div>
        <?php
        
        ?>
</section>

        

    <!-- Aventuras -->
    <section id="aventuras">
        <div class="container mb-5">
            <div class="row section-titular">
                <h2>¡Elige tu aventura!</h2>
                <div class="separador"></div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor modi sed eum doloremque ratione maiores nobis laudantium debitis soluta voluptatem.</p>    
            </div>
        </div>

        <div class="fondo-crema">          
            <div class="container-fluid">         
                <div class="row">    
                    <div class="col-md-6 col-12 p-0 bloque-imagen-texto">
                        <img class="" src="assets/img/SIERRA_NEVADA.jpg" alt="">
                    </div>                             
                    <div class="col-md-6 col-12 p-5 bloque-imagen-texto">
                        <h4 class="mb-3">Lorem ipsum dolor sit amet.</h4>
                        <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                    </div>                                                   
                </div>
            </div>
        </div>
        <div class="fondo-terracota">          
            <div class="container-fluid">         
                <div class="row">    
                    <div class="order-1 order-md-0 col-md-6 col-12 p-5 bloque-imagen-texto">
                        <h4 class="mb-3">Lorem ipsum dolor sit amet.</h4>
                        <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                    </div>                                                   
                    <div class="order-0 order-md-1 col-md-6 col-12 p-0 bloque-imagen-texto">
                        <img class="" src="assets/img/MARQUESADO.jpg" alt="">
                    </div>                             
                </div>
            </div>
        </div>
        <div class="fondo-azul">          
            <div class="container-fluid">         
                <div class="row">    
                    <div class="col-md-6 col-12 p-0 bloque-imagen-texto">
                        <img class="" src="assets/img/DESCENSO_BARRANCOS.jpg" alt="">
                    </div>                             
                    <div class="col-md-6 col-12 p-5 bloque-imagen-texto">
                        <h4 class="mb-3">Lorem ipsum dolor sit amet.</h4>
                        <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                    </div>                                                   
                </div>
            </div>
        </div>
    </section>
    <section id="profesionales">
        <div class="container">
            <div class="row section-titular">
                <h2>Profesionales</h2>
                <div class="col-12 separador"></div>
            </div>            
        </div>
        <div class="fondo-azulOsc">
            <div class="container">            
                <div class="row">
                    <div id="goyo" class="col-md-6 p-0 col-12 section-titular">
                        <h3>Goyo Garrido</h3>
                        <p>Coordinador</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus nihil ipsum debitis, porro delectus est qui quisquam explicabo fugiat!</p>
                        <button class="boton fondo-azul"><a href="about.php">Conócenos</a></button>
                    </div>
                    <div id="esmeralda" class="d-none col-md-6 p-0 col-12 section-titular">
                        <h3>Esmeralda</h3>
                        <p>Coordinadora</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus nihil ipsum debitis, porro delectus est qui quisquam explicabo fugiat!</p>
                        <button class="boton fondo-azul" href="about.php"><a href="about.php">Conócenos</a></button>
                    </div>
                    <div class="col-md-6 p-0 col-12 image-block">
                        <div>
                            <img id="goyo-img" src="assets/img/SIERRA_NEVADA.jpg" alt="">
                        </div>
                        <div>
                            <img id="esmeralda-img" src="assets/img/SIERRA_NEVADA.jpg" alt="">
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>

    <section id="contacto">
        <div class="container">
            <div class="row">
                <h2 class="w-100">Contacto</h2>
                <div class="separador"></div>
            </div>
            
            <div class="row contacto">
                <div class="col-md-6 col-12 info">
                    <h3 class="w-100">Déjame un mensaje y me pondré en contacto</h3>
                    <div class="contact-info">
                        <div>
                            <a href="tel:+679529844"><i class="fas fa-phone mr-3"></i>679 52 98 44</a>
                        </div>
                        <div>
                            <a target="_blank" href="https://wa.link/yedscm"><i class="fab fa-whatsapp mr-3"></i>679 52 98 44</a>
                        </div>
                        <div>
                            <a href="mailto:tobinere@hotmail.com"><i class="far fa-envelope mr-3"></i>tobinere@hotmail.com</a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6 col-12 formulario">
                    <form action="contacto.php" method="POST">
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                        <input type="email" name="email" id="email" placeholder="Email">
                        <input type="text" name="asunto" id="asunto" placeholder="Asunto">
                        <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Mensaje..."></textarea>
                    </form>
                    <button type="submit" class="boton">Enviar</button>
                </div>
            </div>
        </div>
    </section>

    </main>
    <?php
    footer();
    import_js();
    $conexion=null;
    ?>

</body>
</html>