<?php
function menu(){
    $conexion = conectarBD();
    $consulta_barranquismo= $conexion -> prepare("SELECT id from categoria WHERE id=1");
    $consulta_barranquismo -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_barranquismo -> execute();
    $datos_barranquismo = $consulta_barranquismo ->fetch();

    $consulta_caballos= $conexion -> prepare("SELECT id from categoria WHERE id=2");
    $consulta_caballos -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_caballos -> execute();
    $datos_caballos = $consulta_caballos ->fetch();

    $consulta_4x4= $conexion -> prepare("SELECT id from categoria WHERE id=3");
    $consulta_4x4 -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_4x4 -> execute();
    $datos_4x4 = $consulta_4x4 ->fetch();

    $consulta_senderismo= $conexion -> prepare("SELECT id from categoria WHERE id=4");
    $consulta_senderismo -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_senderismo -> execute();
    $datos_senderismo = $consulta_senderismo ->fetch();

    $consulta_bicicleta= $conexion -> prepare("SELECT id from categoria WHERE id=5");
    $consulta_bicicleta -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_bicicleta -> execute();
    $datos_bicicleta = $consulta_bicicleta ->fetch();
    ?>
    <header id="header" class="menu">
        <!-- Top-bar -->
        <div class="top-bar">           
            <div class="container">
                    <div class="row justify-content-between py-3">
                        <h1><a class="logo logo-light"  href="index.php"><span>Goyo</span>Adventures</a></h1>
                        <button class="boton"><a href="contact.php">Contacto</a></button>
                    </div>
            </div>
        </div>
        <!-- Nav -->
        <div class="navbar navbar-expand-lg">   
            <div class="container pl-0">            
                <div class="row w-100 ml-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">                                        
                        <nav class="w-100">                            
                            <a href="categories.php?id=<?=$datos_barranquismo['id']?>">Barranquismo</a>
                            <a href="categories.php?id=<?=$datos_bicicleta['id']?>">Bicicleta</a>
                            <a href="categories.php?id=<?=$datos_caballos['id']?>">Caballos</a>
                            <a href="categories.php?id=<?=$datos_4x4['id']?>">4x4</a>
                            <a href="categories.php?id=<?=$datos_senderismo['id']?>">Senderismo</a>
                            <a href="lunaticos.php">Lunáticos</a>
                            <a href="about.php">Sobre nosotros</a>
                        </nav>
                        </div>                                  
                </div>
            </div>        
        </div>
    </header>
    <?php
}

function footer(){
    $conexion = conectarBD();
    $consulta_barranquismo= $conexion -> prepare("SELECT id from categoria WHERE id=1");
    $consulta_barranquismo -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_barranquismo -> execute();
    $datos_barranquismo = $consulta_barranquismo ->fetch();

    $consulta_caballos= $conexion -> prepare("SELECT id from categoria WHERE id=2");
    $consulta_caballos -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_caballos -> execute();
    $datos_caballos = $consulta_caballos ->fetch();

    $consulta_4x4= $conexion -> prepare("SELECT id from categoria WHERE id=3");
    $consulta_4x4 -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_4x4 -> execute();
    $datos_4x4 = $consulta_4x4 ->fetch();

    $consulta_senderismo= $conexion -> prepare("SELECT id from categoria WHERE id=4");
    $consulta_senderismo -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_senderismo -> execute();
    $datos_senderismo = $consulta_senderismo ->fetch();

    $consulta_bicicleta= $conexion -> prepare("SELECT id from categoria WHERE id=5");
    $consulta_bicicleta -> setFetchMode(PDO::FETCH_ASSOC);
    $consulta_bicicleta -> execute();
    $datos_bicicleta = $consulta_bicicleta ->fetch();
    ?>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2><a class="logo logo-light" href="index.php"><span>Goyo</span>Adventures</a></h2>
                </div>
                <div class="col-md-4">
                    <nav class="w-100 footer-menu">
                        <a href="categories.php?id=<?=$datos_barranquismo['id']?>">Barranquismo</a>
                        <a href="categories.php?id=<?=$datos_bicicleta['id']?>">Bicicleta</a>
                        <a href="categories.php?id=<?=$datos_caballos['id']?>">Caballos</a>
                        <a href="categories.php?id=<?=$datos_4x4['id']?>">4x4</a>
                        <a href="categories.php?id=<?=$datos_senderismo['id']?>">Senderismo</a>
                        <a href="#">Ofertas</a>
                        <a href="#">Lunáticos</a>
                        <a href="about.php">Sobre nosotros</a>
                    </nav>
                </div>
                <div class="col-md-4 contacto-footer">
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
            </div>
        </div>
    </footer>
    <?php
}

function conectarBD(){
    // ESTABLECER CONEXIÓN A LA BASE DE DATOS PDO
    $usuario="root";
    $contrasena="";
    try{
        $mbd = new PDO(
            'mysql:host=localhost;dbname=goyogarrido',
            $usuario,
            $contrasena,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
    }catch(PDOException $e){
        echo $e -> getMessage();
    }

    return $mbd;
}

function import_js(){
    echo "<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>";
}

function import_css(){
    echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400;1,700&display=swap'><link rel=stylesheet href=https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css integrity=sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk crossorigin=anonymous>
    <link rel=stylesheet href=assets/css/style.css>
    <script src='https://kit.fontawesome.com/0c2b6b3736.js' crossorigin='anonymous'></script>";
}

function import_js_head(){
    echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js' integrity='sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI' crossorigin='anonymous'></script>";
}

function import_css_crud(){
    echo "<link rel=stylesheet href=https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css integrity=sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk crossorigin=anonymous>
    <link rel=stylesheet href=assets/css/style.css>
    <script src='https://kit.fontawesome.com/0c2b6b3736.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../../assets/css/style.css'>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400;1,700&display=swap' rel='stylesheet'>";
}

function extension_imagen($tipo_imagen){
    $extension="";
    switch($tipo_imagen){
        case "image/jpeg": $extension=".jpeg";
        break;
        case "image/png": $extension=".png";
        break;
    }
    
    return $extension;
}




?>