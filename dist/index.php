<?php
$page='home';
include 'assets/php/functions.php';
if (isset($_GET['lang'])){
    if ($_GET['lang']=='en') {        
        setcookie('idioma','en');
        
    } elseif ($_GET['lang']=='es'){        
        setcookie('idioma','es');
        
        
    }
} else {
    setcookie("idioma","es");
}
$conexion = conectarBD();
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
        <script type="text/javascript" src="assets/js/app.js"></script>
    
    </head>
        
    <body>

        <?php
        $conexion = conectarBD();
        
            menu($page);
            
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
            <div class="slider">
                <div class="slide_viewer">
                    <div class="slide_group">
                    <div class="slide" style="background: url(assets/img/banner/barranquismo.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">
                            <h1><?= $datos_barranquismo['nombre']?></h1>
                            <p><?= $datos_barranquismo['descripcion']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_barranquismo['id']?>">Descubre</a>
                        </div>
        
                    </div>
                    <div class="slide" style="background: url(assets/img/banner/caballos.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">
                            <h1><?= $datos_caballos['nombre']?></h1>
                            <p><?= $datos_caballos['descripcion']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_caballos['id']?>">Descubre</a>
                        </div>
                    </div>
                    <div class="slide" style="background: url(assets/img/banner/4x4.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">                    
                            <h1><?= $datos_4x4['nombre']?></h1>
                            <p><?= $datos_4x4['descripcion']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_4x4['id']?>">Descubre</a>
                        </div>
                    </div>
                    <div class="slide" style="background: url(assets/img/banner/senderismo.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">
                            <h1><?= $datos_senderismo['nombre']?></h1>
                            <p><?= $datos_senderismo['descripcion']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_senderismo['id']?>">Descubre</a>
                        </div>
                    </div>
                    <div class="slide" style="background: url(assets/img/banner/bicicleta.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">
                            <h1><?= $datos_bicicleta['nombre']?></h1>
                            <p><?= $datos_bicicleta['descripcion']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_bicicleta['id']?>">Descubre</a>
                        </div> 
                    </div>
                    </div>
                </div>
            </div><!-- End // .slider -->
        
            <div class="slide_buttons">
            </div>
            
            <div class="directional_nav">
            <div class="previous_btn" title="Previous">
                <svg viewbox="0 0 100 100">
                    <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform=" translate(15,0)">
                </svg>
            </div>
            <div class="next_btn" title="Next">
                <svg viewbox="0 0 100 100">
                    <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z "transform="translate(85,100) rotate(180) ">
                </svg>
            </div>
            </div><!-- End // .directional_nav -->     
        
            <!-- Aventuras -->
            <section id="aventuras">
                <div class="container mb-5">
                    <div class="row section-titular">
                        <h2 class="col-12">¡Elige tu aventura!</h2>
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
                                <h4 class="mb-3">Disfruta de la naturaleza</h4>
                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                            </div>                                                   
                        </div>
                    </div>
                </div>
                <div class="fondo-terracota">          
                    <div class="container-fluid">         
                        <div class="row">    
                            <div class="order-1 order-md-0 col-md-6 col-12 p-5 bloque-imagen-texto">
                                <h4 class="mb-3">Descubre la comarca de Granada</h4>
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
                                <h4 class="mb-3">Vive auténticas experiencias</h4>
                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                            </div>                                                   
                        </div>
                    </div>
                </div>
            </section>
            <section id="profesionales">
                <div class="container">
                    <div class="row">
                        <h2 class="col-12">Profesionales</h2>
                        <div class="separador"></div>
                    </div>            
                </div>
                <div class="fondo-azulOsc">
                    <div class="container">            
                        <div class="row">
                            <div id="goyo" class="col-md-6 col-12 profesionales-titular">
                                <h3>Goyo Garrido</h3>
                                <p class="subtitle">Coordinador</p>
                                <p>Mi vida deportiva va de la mano de mis distintos trabajos en España y el extranjero, que me han permitido los distintos viajes. <br><br>La bicicleta me ha dado infinitos placeres en la vida, y alguna cicatriz también, pero los mayores no han sido ni mucho menos los mas extremos; la bicicleta híbrida con alforjas me ha enseñado a viajar, y eso, más mi trabajo de guía, me ha permitido conocer buena parte de la geografía nacional e internacional, como Marruecos, Cuba, Italia, Francia, Alemania… <br><br>Gracias a mi pasión por la montaña, he podido titularme en muchos de los ámbitos que amo, soy Tecnico Deportivo de Esquí Alpino, Barranquismo y Escalada, entre otros.</p>
                                <div>
                                    <button class="boton fondo-azul"><a href="about.php">Conócenos</a></button>
                                </div>
                            </div>
                            <div id="esmeralda" class="d-none col-md-6  col-12 profesionales-titular">
                                <h3>Esmeralda</h3>
                                <p class="subtitle">Coordinadora</p>
                                <p>Me llamo Esmeralda y ofrezco tour culturales en Granada! Trabajo como guía autónoma especializada en tours privados. <br><br>Será un placer enseñarte la belleza de esta ciudad y transportarte a los mágicos tiempos de la Alhambra medieval. Soy una antropóloga italiana experta en interculturalidad que se mudó en Granada  hace más de 16 años. Vine por un intercambio universitario, me enamoré de esta ciudad y nunca me fui de vuelta!. <br><br>Te llevaré mas allá de la belleza de los sitios históricos en un tour que explora la complexidad de esta tierra llena de historia, literatura y filosofía.</p>
                                <div>
                                <a class="boton fondo-azul" href="about.php">Conócenos</a>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 col-12 image-block">
                                <div id="goyo-img" class="imagen-perfil" style="background: url(assets/img/goyo.jpg) center center; background-size: cover;">
                                    
                                </div>
                                <div id="esmeralda-img" class="imagen-perfil" style="background: url(assets/img/esmeralda.jpg) center center; background-size: cover;">
                                    
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
                                    <a target="_blank" href="https://wa.link/yedscm"><i class="fab fa-whatsapp-square mr-3"></i></i></i>679 52 98 44</a>
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
        <script type="text/javascript">
        $('.slider').each(function() {
            var $this = $(this);
            var $group = $this.find('.slide_group');
            var $slides = $this.find('.slide');
            var bulletArray = [];
            var currentIndex = 0;
            var timeout;
            
            function move(newIndex) {
                var animateLeft, slideLeft;
                
                advance();
                
                if ($group.is(':animated') || currentIndex === newIndex) {
                return;
                }
                
                bulletArray[currentIndex].removeClass('active');
                bulletArray[newIndex].addClass('active');
                
                if (newIndex > currentIndex) {
                slideLeft = '100%';
                animateLeft = '-100%';
                } else {
                slideLeft = '-100%';
                animateLeft = '100%';
                }
                
                $slides.eq(newIndex).css({
                display: 'flex',
                'flex-direction':'column',
                'justify-content': 'center',
                'align-items': 'center',
                left: slideLeft
                });
                $group.animate({
                left: animateLeft
                }, function() {
                $slides.eq(currentIndex).css({
                    display: 'none'
                });
                $slides.eq(newIndex).css({
                    left: 0
                });
                $group.css({
                    left: 0
                });
                currentIndex = newIndex;
                });
            }
            
            function advance() {
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                if (currentIndex < ($slides.length - 1)) {
                    move(currentIndex + 1);
                } else {
                    move(0);
                }
                }, 10000);
            }
            
            $('.next_btn').on('click', function() {
                if (currentIndex < ($slides.length - 1)) {
                move(currentIndex + 1);
                } else {
                move(0);
                }
            });
            
            $('.previous_btn').on('click', function() {
                if (currentIndex !== 0) {
                move(currentIndex - 1);
                } else {
                move(3);
                }
            });
            
            $.each($slides, function(index) {
                var $button = $('<a class="slide_btn">&bull;</a>');
                
                if (index === currentIndex) {
                $button.addClass('active');
                }
                $button.on('click', function() {
                move(index);
                }).appendTo('.slide_buttons');
                bulletArray.push($button);
            });
            
            advance();
        });
        </script>      

    </body>
    </html>
    <?php
} elseif ($_COOKIE['idioma']=="en"){
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Goyo Adventures | Home</title>
        
        <?php
        import_css();
        import_js_head();    
        ?>
        <script type="text/javascript" src="assets/js/app.js"></script>
       
    </head>
        
    <body>
    
        <?php
        $conexion = conectarBD();
        
            menu_en($page);
            
            $consulta_barranquismo= $conexion -> prepare("SELECT id, nombre_en, descripcion_en from categoria WHERE id=1");
            $consulta_barranquismo -> setFetchMode(PDO::FETCH_ASSOC);
            $consulta_barranquismo -> execute();
            $datos_barranquismo = $consulta_barranquismo ->fetch();
        
            $consulta_caballos= $conexion -> prepare("SELECT id, nombre_en, descripcion_en from categoria WHERE id=2");
            $consulta_caballos -> setFetchMode(PDO::FETCH_ASSOC);
            $consulta_caballos -> execute();
            $datos_caballos = $consulta_caballos ->fetch();
        
            $consulta_4x4= $conexion -> prepare("SELECT id, nombre_en, descripcion_en from categoria WHERE id=3");
            $consulta_4x4 -> setFetchMode(PDO::FETCH_ASSOC);
            $consulta_4x4 -> execute();
            $datos_4x4 = $consulta_4x4 ->fetch();
        
            $consulta_senderismo= $conexion -> prepare("SELECT id, nombre_en, descripcion_en from categoria WHERE id=4");
            $consulta_senderismo -> setFetchMode(PDO::FETCH_ASSOC);
            $consulta_senderismo -> execute();
            $datos_senderismo = $consulta_senderismo ->fetch();
        
            $consulta_bicicleta= $conexion -> prepare("SELECT id, nombre_en, descripcion_en from categoria WHERE id=5");
            $consulta_bicicleta -> setFetchMode(PDO::FETCH_ASSOC);
            $consulta_bicicleta -> execute();
            $datos_bicicleta = $consulta_bicicleta ->fetch();
            
            ?>
            <!-- Banner -->
            <main id="main">
            <div class="slider">
                <div class="slide_viewer">
                    <div class="slide_group">
                    <div class="slide" style="background: url(assets/img/banner/barranquismo.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">
                            <h1><?= $datos_barranquismo['nombre_en']?></h1>
                            <p><?= $datos_barranquismo['descripcion_en']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_barranquismo['id']?>">Discover</a>
                        </div>
        
                    </div>
                    <div class="slide" style="background: url(assets/img/banner/caballos.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">
                            <h1><?= $datos_caballos['nombre_en']?></h1>
                            <p><?= $datos_caballos['descripcion_en']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_caballos['id']?>">Discover</a>
                        </div>
                    </div>
                    <div class="slide" style="background: url(assets/img/banner/4x4.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">                    
                            <h1><?= $datos_4x4['nombre_en']?></h1>
                            <p><?= $datos_4x4['descripcion_en']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_4x4['id']?>">Discover</a>
                        </div>
                    </div>
                    <div class="slide" style="background: url(assets/img/banner/senderismo.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">
                            <h1><?= $datos_senderismo['nombre_en']?></h1>
                            <p><?= $datos_senderismo['descripcion_en']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_senderismo['id']?>">Discover</a>
                        </div>
                    </div>
                    <div class="slide" style="background: url(assets/img/banner/bicicleta.jpg) center center; background-size: cover;">
                        <div class="fondo-azulOscOp slider-content">
                            <h1><?= $datos_bicicleta['nombre_en']?></h1>
                            <p><?= $datos_bicicleta['descripcion_en']?></p>
                            <a class="boton" href="categories.php?id=<?=$datos_bicicleta['id']?>">Discover</a>
                        </div> 
                    </div>
                    </div>
                </div>
            </div><!-- End // .slider -->
        
            <div class="slide_buttons">
            </div>
            
            <div class="directional_nav">
            <div class="previous_btn" title="Previous">
                <svg viewbox="0 0 100 100">
                    <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform=" translate(15,0)">
                </svg>
            </div>
            <div class="next_btn" title="Next">
                <svg viewbox="0 0 100 100">
                    <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z "transform="translate(85,100) rotate(180) ">
                </svg>
            </div>
            </div><!-- End // .directional_nav -->     
        
            <!-- Aventuras -->
            <section id="aventuras">
                <div class="container mb-5">
                    <div class="row section-titular">
                        <h2 class="col-12">¡Choose your adventure!</h2>
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
                                <h4 class="mb-3">Enjoy the nature</h4>
                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                            </div>                                                   
                        </div>
                    </div>
                </div>
                <div class="fondo-terracota">          
                    <div class="container-fluid">         
                        <div class="row">    
                            <div class="order-1 order-md-0 col-md-6 col-12 p-5 bloque-imagen-texto">
                                <h4 class="mb-3">Discover the region of Granada</h4>
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
                                <h4 class="mb-3">Live an unique experience</h4>
                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                            </div>                                                   
                        </div>
                    </div>
                </div>
            </section>
            <section id="profesionales">
                <div class="container">
                    <div class="row">
                        <h2 class="col-12">Profesionals</h2>
                        <div class="separador"></div>
                    </div>            
                </div>
                <div class="fondo-azulOsc">
                    <div class="container">            
                        <div class="row">
                            <div id="goyo" class="col-md-6 col-12 profesionales-titular">
                                <h3>Goyo Garrido</h3>
                                <p class="subtitle">Coordinator</p>
                                <p>Mi vida deportiva va de la mano de mis distintos trabajos en España y el extranjero, que me han permitido los distintos viajes. <br><br>La bicicleta me ha dado infinitos placeres en la vida, y alguna cicatriz también, pero los mayores no han sido ni mucho menos los mas extremos; la bicicleta híbrida con alforjas me ha enseñado a viajar, y eso, más mi trabajo de guía, me ha permitido conocer buena parte de la geografía nacional e internacional, como Marruecos, Cuba, Italia, Francia, Alemania… <br><br>Gracias a mi pasión por la montaña, he podido titularme en muchos de los ámbitos que amo, soy Tecnico Deportivo de Esquí Alpino, Barranquismo y Escalada, entre otros.</p>
                                <div>
                                    <button class="boton fondo-azul"><a href="about.php">Know us</a></button>
                                </div>
                            </div>
                            <div id="esmeralda" class="d-none col-md-6  col-12 profesionales-titular">
                                <h3>Esmeralda</h3>
                                <p class="subtitle">Coordinator</p>
                                <p>Me llamo Esmeralda y ofrezco tour culturales en Granada! Trabajo como guía autónoma especializada en tours privados. <br><br>Será un placer enseñarte la belleza de esta ciudad y transportarte a los mágicos tiempos de la Alhambra medieval. Soy una antropóloga italiana experta en interculturalidad que se mudó en Granada  hace más de 16 años. Vine por un intercambio universitario, me enamoré de esta ciudad y nunca me fui de vuelta!. <br><br>Te llevaré mas allá de la belleza de los sitios históricos en un tour que explora la complexidad de esta tierra llena de historia, literatura y filosofía.</p>
                                <div>
                                  <a class="boton fondo-azul" href="about.php">Know us</a>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 col-12 image-block">
                                <div id="goyo-img" class="imagen-perfil" style="background: url(assets/img/goyo.jpg) center center; background-size: cover;">
                                    
                                </div>
                                <div id="esmeralda-img" class="imagen-perfil" style="background: url(assets/img/esmeralda.jpg) center center; background-size: cover;">
                                    
                                </div>
                            </div>
                        </div>                
                    </div>
                </div>
            </section>
        
            <section id="contacto">
                <div class="container">
                    <div class="row">
                        <h2 class="w-100">Contact</h2>
                        <div class="separador"></div>
                    </div>
                    
                    <div class="row contacto">
                        <div class="col-md-6 col-12 info">
                            <h3 class="w-100">Leave me a message and I'll get in touch</h3>
                            <div class="contact-info">
                                <div>
                                    <a href="tel:+679529844"><i class="fas fa-phone mr-3"></i>679 52 98 44</a>
                                </div>
                                <div>
                                    <a target="_blank" href="https://wa.link/yedscm"><i class="fab fa-whatsapp-square mr-3"></i></i></i>679 52 98 44</a>
                                </div>
                                <div>
                                    <a href="mailto:tobinere@hotmail.com"><i class="far fa-envelope mr-3"></i>tobinere@hotmail.com</a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-12 formulario">
                            <form action="contacto.php" method="POST">
                                <input type="text" name="nombre" id="nombre" placeholder="Name">
                                <input type="email" name="email" id="email" placeholder="Email">
                                <input type="text" name="asunto" id="asunto" placeholder="Affair">
                                <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Message..."></textarea>
                            </form>
                            <button type="submit" class="boton">Send</button>
                        </div>
                    </div>
                </div>
            </section>
        
            </main>
            <?php
            footer_en();
            import_js();        
        $conexion=null;
        ?>
        <script type="text/javascript">
        $('.slider').each(function() {
            var $this = $(this);
            var $group = $this.find('.slide_group');
            var $slides = $this.find('.slide');
            var bulletArray = [];
            var currentIndex = 0;
            var timeout;
            
            function move(newIndex) {
                var animateLeft, slideLeft;
                
                advance();
                
                if ($group.is(':animated') || currentIndex === newIndex) {
                return;
                }
                
                bulletArray[currentIndex].removeClass('active');
                bulletArray[newIndex].addClass('active');
                
                if (newIndex > currentIndex) {
                slideLeft = '100%';
                animateLeft = '-100%';
                } else {
                slideLeft = '-100%';
                animateLeft = '100%';
                }
                
                $slides.eq(newIndex).css({
                display: 'flex',
                'flex-direction':'column',
                'justify-content': 'center',
                'align-items': 'center',
                left: slideLeft
                });
                $group.animate({
                left: animateLeft
                }, function() {
                $slides.eq(currentIndex).css({
                    display: 'none'
                });
                $slides.eq(newIndex).css({
                    left: 0
                });
                $group.css({
                    left: 0
                });
                currentIndex = newIndex;
                });
            }
            
            function advance() {
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                if (currentIndex < ($slides.length - 1)) {
                    move(currentIndex + 1);
                } else {
                    move(0);
                }
                }, 10000);
            }
            
            $('.next_btn').on('click', function() {
                if (currentIndex < ($slides.length - 1)) {
                move(currentIndex + 1);
                } else {
                move(0);
                }
            });
            
            $('.previous_btn').on('click', function() {
                if (currentIndex !== 0) {
                move(currentIndex - 1);
                } else {
                move(3);
                }
            });
            
            $.each($slides, function(index) {
                var $button = $('<a class="slide_btn">&bull;</a>');
                
                if (index === currentIndex) {
                $button.addClass('active');
                }
                $button.on('click', function() {
                move(index);
                }).appendTo('.slide_buttons');
                bulletArray.push($button);
            });
            
            advance();
        });
        </script>      
    
    </body>
    </html>
    <?php
}
$conexion = null;
?>

