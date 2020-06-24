<?php
include 'assets/php/functions.php'
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
    menu();
    ?>
    <!-- Banner -->
    <main id="main">
        <div class="container">
            <div class="row">
                <div class="titulo">
                    <div class="texto-titulo w-30 p-5">
                        <h1>Barranquismo</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 salida">
                    <div class="titulo-salida">
                        <h2>Río Verde</h2>
                        <button class="boton"type="button"><a href="token.php">Ver ficha</a></button>
                    </div>

                    <div class="separador"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro minima non iure odit? Omnis, illo numquam ipsa inventore magni a blanditiis eaque? Ab voluptates quia nulla, fugit non iure molestias odit illo! Reprehenderit animi repellat molestias? Doloribus labore iste possimus officiis perspiciatis. Deserunt velit veritatis aliquid fugiat inventore, nulla molestias?</p>
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