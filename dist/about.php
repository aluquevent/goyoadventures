<?php
$page ='about';
include 'assets/php/functions.php';
if($_COOKIE['idioma']=="es"){
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Goyo Adventures | Inicio</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400;1,700&display=swap"
            rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script src="https://kit.fontawesome.com/0c2b6b3736.js" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <?php
        menu($page);
        ?>
        <!-- Banner -->
        <main id="main">
            <div class="container">
                <div class="row">
                    <div class="titulo mt-3" style="background: url(assets/img/ALTIPLANO.jpg) center center; background-size: cover;">
                        <div class="texto-titulo w-30 p-5">
                            <h1>Quiénes somos</h1>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="col-md-12 descripcion-general fondo-secundario">
                        <h2>Nuestra filosofía</h2>
                        <div class="separador-azul"></div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, eligendi rerum sunt laudantium voluptate dolore placeat ex expedita dolores animi atque. Nisi autem quod pariatur architecto expedita ad dolor, quia reprehenderit commodi fugiat similique? Aliquid maxime facere iure repellat repudiandae fugiat tempora obcaecati impedit quam illo! Cupiditate ea iusto autem.</p>
                    </div>
                </div>
                <section class="row mt-5" id="equipo">
                    <div class="col-md-12">
                        <h2>El equipo</h2>
                        <div class="separador"></div>
                    </div>
                    <div id="goyo-img" class="col-md-3 imagen-perfil" style="background: url(assets/img/goyo.jpg) center center; background-size: cover;">
                                
                    </div>
                    <div class="col-md-9">
                        <h3>Goyo Garrido</h3>
                        <p>Mi vida deportiva va de la mano de mis distintos trabajos en España y el extranjero, que me han permitido los distintos viajes. <br><br>La bicicleta me ha dado infinitos placeres en la vida, y alguna cicatriz también, pero los mayores no han sido ni mucho menos los mas extremos; la bicicleta híbrida con alforjas me ha enseñado a viajar, y eso, más mi trabajo de guía, me ha permitido conocer buena parte de la geografía nacional e internacional, como Marruecos, Cuba, Italia, Francia, Alemania…<br><br>Gracias a mi pasión por la montaña, he podido titularme en muchos de los ámbitos que amo, soy Tecnico Deportivo de Esquí Alpino, Barranquismo y Escalada, entre otros.​</p>
                    </div>
                    <div class="separador"></div>
    
                    <div class="col-md-9">
                        <h3 class="text-right">Esmeralda</h3>
                        <p>Me llamo Esmeralda y ofrezco tour culturales en Granada! Trabajo como guía autónoma especializada en tours privados. Será un placer enseñarte la belleza de esta ciudad y transportarte a los mágicos tiempos de la Alhambra medieval. Soy una antropóloga italiana experta en interculturalidad que se mudó en Granada hace mas de 16 años. Vine por un intercambio universitario, me enamoré de esta ciudad y nunca me fui de vuelta! <br><br> Mi pasión era tan grande que estudié y aprobé el examen oficial de guía y ahora puedo transmitir mi entusiasmo y conocimiento a los muchos viajeros que! Estoy particularmente interesada a la historia y al arte, que se transmitir de una forma narrativa y con humorismo.<br><br>  Me encanta compartir mi conocimiento de las tradiciones locales: formas de vivir, música, arte, religión y filosofía.Mi pasión es viajar y he viajado mucho: en casi toda Europa, Turquia, Persia, Asia, Sud América y norte de África, soy capaz de contextualizar eventos en larga escala y acercarme a la historia desde diferentes puntos de vistas.<br><br> Te llevaré mas allá de la belleza de los sitios históricos en un tour que explora la complexidad de esta tierra llena de historia, literatura y filosofía. Me gusta en particular modo acentuar las diferentes personas y culturas ( cristiana, islámica y judía) que compartieron el mismo espacio por los cientos de años medievales.<br><br> Te propongo un tour dinámico contado de una forma viva che te transportará adentro de la atmosfera de la época centrado en tus particulares intereses y requerimientos. Solo hazme saber!<br><br> Como guía Oficial , me he permiso guiar en todas los monumentos históricos y iglesias. Seré feliz de organizar un trasporte privado que te recogía de otras ciudades, del aeropuerto o del puerto de Motril o Malaga.</p>
                    </div>
                    <div id="goyo-img" class="col-md-3 imagen-perfil" style="background: url(assets/img/esmeralda.jpg) center center; background-size: cover;">
                                
                    </div>
                    
                </section>
                <div class="row">
                    <div class="col-md-12 descripcion-general fondo-secundario">
                        <h2>Los grupos</h2>
                        <div class="separador-azul"></div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, eligendi rerum sunt laudantium voluptate
                            dolore placeat ex expedita dolores animi atque. Nisi autem quod pariatur architecto expedita ad dolor, quia
                            reprehenderit commodi fugiat similique? Aliquid maxime facere iure repellat repudiandae fugiat tempora
                            obcaecati impedit quam illo! Cupiditate ea iusto autem.</p>
                    </div>
                </div>
                <section id="colaboradores">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Colaboradores</h2>
                        <div class="separador"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 colaborador">
                        <img src="assets/img/naturbike.jpg" alt="">
                        <h4><a href="https://naturbike.es">Naturbike</h4>
                    </div>
                </div>   
    
    
                </section>
            </div>
        </main>
        <?php
        footer();
        ?>
    
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    </body>
    
    </html>
    <?php
}elseif($_COOKIE['idioma']=="en"){
    ?>
    <!DOCTYPE html>
    <html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Goyo Adventures | About Us</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400;1,700&display=swap"
            rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script src="https://kit.fontawesome.com/0c2b6b3736.js" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <?php
        menu_en($page);
        ?>
        <!-- Banner -->
        <main id="main">
            <div class="container">
                <div class="row">
                    <div class="titulo mt-3" style="background: url(assets/img/ALTIPLANO.jpg) center center; background-size: cover;">
                        <div class="texto-titulo w-30 p-5">
                            <h1>About us</h1>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="col-md-12 descripcion-general fondo-secundario">
                        <h2>Our philosophy</h2>
                        <div class="separador-azul"></div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, eligendi rerum sunt laudantium voluptate dolore placeat ex expedita dolores animi atque. Nisi autem quod pariatur architecto expedita ad dolor, quia reprehenderit commodi fugiat similique? Aliquid maxime facere iure repellat repudiandae fugiat tempora obcaecati impedit quam illo! Cupiditate ea iusto autem.</p>
                    </div>
                </div>
                <section class="row mt-5" id="equipo">
                    <div class="col-md-12">
                        <h2>The team</h2>
                        <div class="separador"></div>
                    </div>
                    <div id="goyo-img" class="col-md-3 imagen-perfil" style="background: url(assets/img/goyo.jpg) center center; background-size: cover;">
                                
                    </div>
                    <div class="col-md-9">
                        <h3>Goyo Garrido</h3>
                        <p>Mi vida deportiva va de la mano de mis distintos trabajos en España y el extranjero, que me han permitido los distintos viajes. <br><br>La bicicleta me ha dado infinitos placeres en la vida, y alguna cicatriz también, pero los mayores no han sido ni mucho menos los mas extremos; la bicicleta híbrida con alforjas me ha enseñado a viajar, y eso, más mi trabajo de guía, me ha permitido conocer buena parte de la geografía nacional e internacional, como Marruecos, Cuba, Italia, Francia, Alemania…<br><br>Gracias a mi pasión por la montaña, he podido titularme en muchos de los ámbitos que amo, soy Tecnico Deportivo de Esquí Alpino, Barranquismo y Escalada, entre otros.​</p>
                    </div>
                    <div class="separador"></div>
    
                    <div class="col-md-9">
                        <h3 class="text-right">Esmeralda</h3>
                        <p>Me llamo Esmeralda y ofrezco tour culturales en Granada! Trabajo como guía autónoma especializada en tours privados. Será un placer enseñarte la belleza de esta ciudad y transportarte a los mágicos tiempos de la Alhambra medieval. Soy una antropóloga italiana experta en interculturalidad que se mudó en Granada hace mas de 16 años. Vine por un intercambio universitario, me enamoré de esta ciudad y nunca me fui de vuelta! <br><br> Mi pasión era tan grande que estudié y aprobé el examen oficial de guía y ahora puedo transmitir mi entusiasmo y conocimiento a los muchos viajeros que! Estoy particularmente interesada a la historia y al arte, que se transmitir de una forma narrativa y con humorismo.<br><br>  Me encanta compartir mi conocimiento de las tradiciones locales: formas de vivir, música, arte, religión y filosofía.Mi pasión es viajar y he viajado mucho: en casi toda Europa, Turquia, Persia, Asia, Sud América y norte de África, soy capaz de contextualizar eventos en larga escala y acercarme a la historia desde diferentes puntos de vistas.<br><br> Te llevaré mas allá de la belleza de los sitios históricos en un tour que explora la complexidad de esta tierra llena de historia, literatura y filosofía. Me gusta en particular modo acentuar las diferentes personas y culturas ( cristiana, islámica y judía) que compartieron el mismo espacio por los cientos de años medievales.<br><br> Te propongo un tour dinámico contado de una forma viva che te transportará adentro de la atmosfera de la época centrado en tus particulares intereses y requerimientos. Solo hazme saber!<br><br> Como guía Oficial , me he permiso guiar en todas los monumentos históricos y iglesias. Seré feliz de organizar un trasporte privado que te recogía de otras ciudades, del aeropuerto o del puerto de Motril o Malaga.</p>
                    </div>
                    <div id="goyo-img" class="col-md-3 imagen-perfil" style="background: url(assets/img/esmeralda.jpg) center center; background-size: cover;">
                                
                    </div>
                    
                </section>
                <div class="row">
                    <div class="col-md-12 descripcion-general fondo-secundario">
                        <h2>The groups</h2>
                        <div class="separador-azul"></div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, eligendi rerum sunt laudantium voluptate
                            dolore placeat ex expedita dolores animi atque. Nisi autem quod pariatur architecto expedita ad dolor, quia
                            reprehenderit commodi fugiat similique? Aliquid maxime facere iure repellat repudiandae fugiat tempora
                            obcaecati impedit quam illo! Cupiditate ea iusto autem.</p>
                    </div>
                </div>
                <section id="colaboradores">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Collaborators</h2>
                        <div class="separador"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 colaborador">
                        <img src="assets/img/naturbike.jpg" alt="">
                        <h4><a href="https://naturbike.es">Naturbike</h4>
                    </div>
                </div>   
    
    
                </section>
            </div>
        </main>
        <?php
        footer_en();
        import_js();
        ?>
    </body>
    
    </html>
    <?php
}
?>