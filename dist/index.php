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
    ?>
    <!-- Banner -->
    <main id="main">
    <section id="banner">        
        <div class="layer">      
            <div class="container">           
                <div class="row banner">
                    <div class="banner">                                
                        <div class="banner-info col-12">
                            <h2>Barranquismo</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem mollitia excepturi voluptate unde laudantium aut nostrum nam, accusamus enim alias.</p>
                            <a class="boton" href="categories.php">Descubre</a>
                        </div>
                        <div class="banner-icons col-12">
                            <div class="banner-circle"></div>
                            <div class="banner-circle"></div>
                            <div class="banner-circle"></div>
                            <div class="banner-circle"></div>
                            <div class="banner-circle"></div>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>

    <!-- Aventuras -->
    <section id="aventuras">
        <div class="container mb-5">
            <div class="row">
                <h2>¡Elige tu aventura!</h2>
                <div class="separador"></div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor modi sed eum doloremque ratione maiores nobis laudantium debitis soluta voluptatem.</p>    
            </div>
        </div>

        <div class="fondo-crema">          
            <div class="container-fluid">         
                <div class="row">    
                    <div class="col-md-6 col-12 p-0 bloque-imagen-texto">
                        <img class="" src="assets/img/Senderismo_en_Sierra_Nevada_Loma_Papeles_Güéjar_Sierra_IMG_9105_A3.jpg" alt="">
                    </div>                             
                    <div class="col-md-6 col-12 p-0 bloque-imagen-texto">
                        <h4 class="pl-5 mb-3">Lorem ipsum dolor sit amet.</h4>
                        <p class="pl-5 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                    </div>                                                   
                </div>
            </div>
        </div>
        <div class="fondo-terracota">          
            <div class="container-fluid">         
                <div class="row">    
                    <div class="col-md-6 col-12 p-0 bloque-imagen-texto">
                        <h4 class="pl-5 mb-3">Lorem ipsum dolor sit amet.</h4>
                        <p class="pl-5 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                    </div>                                                   
                    <div class="col-md-6 col-12 p-0 bloque-imagen-texto">
                        <img class="" src="assets/img/EL_MARQUESADO.jpg" alt="">
                    </div>                             
                </div>
            </div>
        </div>
        <div class="fondo-azul">          
            <div class="container-fluid p-0">         
                <div class="row">    
                    <div class="col-md-6 col-12 p-0 bloque-imagen-texto">
                        <img class="" src="assets/img/Descenso_de_barrancos_Río_Verde_RAUL2-817.jpg" alt="">
                    </div>                             
                    <div class="col-md-6 col-12 p-0 bloque-imagen-texto">
                        <h4 class="pl-5 mb-3">Lorem ipsum dolor sit amet.</h4>
                        <p class="pl-5 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sed ut consectetur repellendus soluta officia neque nesciunt ex magnam voluptas?</p>
                    </div>                                                   
                </div>
            </div>
        </div>
    </section>
    <section id="profesionales">
        <div class="container">
            <div class="row">
                <h2>Profesionales</h2>
                <div class="col-12 separador"></div>
            </div>            
        </div>
        <div class="fondo-azulOsc">
            <div class="container">            
                <div class="row">
                    <div class="col-md-6 p-0 col-12">
                        <h3>Goyo Garrido</h3>
                        <p>Coordinador</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus nihil ipsum debitis, porro delectus est qui quisquam explicabo fugiat!</p>
                    </div>
                    <div class="col-md-6 p-0 col-12 image-block">
                        <div>
                            <img src="assets/img/Cicloturismo_en_Granada_MTB.jpg" alt="">
                        </div>
                        <div>
                            <img src="assets/img/Cicloturismo_en_Granada_MTB.jpg" alt="">
                        </div>
                    </div>
                </div>                
            </div>
        </div>

        <div class="row" id="newsletter">
            <div class="col-6">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
            </div>
            <div class="col-6">
                <h4>¡Entérate al momento susbribiéndote a nuestro boletín!</h4>
                <input type="email" name="boletin" id="boletin">
                <input type="submit" value="Suscribirse">
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
                <div class="col-6 info">
                    <h3 class="w-100">Déjame un mensaje y me pondré en contacto</h3>
                    <div class="contact-info">
                        <div>
                            <a href="tel:+655443321"><i class="fab fa-whatsapp mr-3"></i>654 34 34 23</a>
                        </div>
                        <div>
                            <a href="mailto:tobinhere@gmail.com"><i class="far fa-envelope mr-3"></i>tobinhere@gmail.com</a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-6 formulario">
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
    ?>

</body>
</html>