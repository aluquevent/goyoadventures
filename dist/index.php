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
    // import_css();
    // import_js_head();

    
    ?>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src='https://kit.fontawesome.com/0c2b6b3736.js' crossorigin='anonymous'></script>

<!-- JS, Popper.js, and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->

       
</head>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/app.js"></script> 
<body>
    <?php
    menu();
    ?>
    <!-- Banner -->
    <main id="main">
    <section carrousel>
  
        <input id="slide-0" name="carrousel" type="radio" checked/>
        <div class="slide" style="background: url(assets/img/banner/barranquismo.jpg) center center; background-size: cover;">
            <label for="slide-3" class="back">◀</label>
            <div class="slide-content">
            <h1>Barranquismo</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam et cumque temporibus consequuntur voluptatem asperiores dolor, nihil enim totam molestiae.</p>
            <button class="boton"><a href="">Descubre</a></button>
            </div>
            <label for="slide-1" class="forward">▶</label>
        </div>
        
        <input id="slide-1" name="carrousel" type="radio" />
        <div class="slide" style="background: url(assets/img/banner/caballos.jpg) center center; background-size: cover;">
            <label for="slide-0" class="back">◀</label>
            <div class="slide-content">
            <h1>Caballos</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam et cumque temporibus consequuntur voluptatem asperiores dolor, nihil enim totam molestiae.</p>
            <button class="boton"><a href="">Descubre</a></button>
            </div>
            <label for="slide-2" class="forward">▶</label>
        </div>
        
        <input id="slide-2" name="carrousel" type="radio" />
        <div class="slide" style="background: url(assets/img/banner/4x4.jpg) center center; background-size: cover;">
            <label for="slide-1" class="back">◀</label>
            <div class="slide-content">
            <h1>4x4</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam et cumque temporibus consequuntur voluptatem asperiores dolor, nihil enim totam molestiae.</p>
            <button class="boton"><a href="">Descubre</a></button>
            </div>
            <label for="slide-3" class="forward">▶</label>
        </div>  

        <input id="slide-3" name="carrousel" type="radio" />
        <div class="slide" style="background: url(assets/img/banner/senderismo.jpg) center center; background-size: cover;">
            <label for="slide-2" class="back">◀</label>
            <div class="slide-content">
            <h1>Senderismo</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam et cumque temporibus consequuntur voluptatem asperiores dolor, nihil enim totam molestiae.</p>
            <button class="boton"><a href="">Descubre</a></button>
            </div>
            <label for="slide-4" class="forward">▶</label>
        </div>

        <input id="slide-4" name="carrousel" type="radio" />
        <div class="slide" style="background: url(assets/img/banner/ciclo.jpg) center center; background-size: cover;">
            <label for="slide-3" class="back">◀</label>
            <div class="slide-content">
            <h1>Bicicleta</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam et cumque temporibus consequuntur voluptatem asperiores dolor, nihil enim totam molestiae.</p>
            <button class="boton"><a href="">Descubre</a></button>
            </div>
            <label for="slide-0" class="forward">▶</label>
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
                            <a href="tel:+655443321"><i class="fab fa-whatsapp mr-3"></i>654 34 34 23</a>
                        </div>
                        <div>
                            <a href="mailto:tobinhere@gmail.com"><i class="far fa-envelope mr-3"></i>tobinhere@gmail.com</a>
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
    // import_js();
    ?>

</body>
</html>