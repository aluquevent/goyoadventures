<?php
$page = 'contanct';
include 'assets/php/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goyo Adventures | Actividad</title> <!-- bd -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>    
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script src="https://kit.fontawesome.com/0c2b6b3736.js" crossorigin="anonymous"></script>    
</head>
<body class="token">
    <?php
    menu($page);
    ?>
    <!-- Banner -->
    <main id="main">
        <section id="contacto">
            <div class="container">
                <div class="row">
                    <h2 class="w-100">Contacto</h2>
                    <div class="separador"></div>
                </div>
                <div class="row contacto">
                    <div class="col-12 col-md-6 info">
                        <h3 class="w-100">Déjame un mensaje y me pondré en contacto</h3>
                        <div class="contact-info">
                            <div>
                                 <a href="tel:+34679529844"><i class="fas fa-phone mr-3"></i>679 52 98 44</a>
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
                        <button type="submit" class="boton envio">Enviar</button>
                    </div>
                </div>
            </div>
            </section>
    </main>
    <?php
    footer();
    ?>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
