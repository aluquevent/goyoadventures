<?php

function menu($page){
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
        <!-- Nav -->
        <nav class="px-5 navbar navbar-expand-xl navbar-dark">
            <a class="navbar-brand logo logo-light"  href="index.php"><span>Goyo</span>Garrido Adventures</a>            
            <button style="color:white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="w-100 navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='barranquismo'){ echo 'active';}?>" href="categories.php?id=<?=$datos_barranquismo['id']?>">Barranquismo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='bicicleta'){ echo 'active';} ?>" href="categories.php?id=<?=$datos_bicicleta['id']?>">Bicicleta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='caballos'){ echo 'active';} ?>" href="categories.php?id=<?=$datos_caballos['id']?>">Caballos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='4x4'){ echo 'active';} ?>" href="categories.php?id=<?=$datos_4x4['id']?>">4x4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='senderismo'){ echo 'active';} ?>" href="categories.php?id=<?=$datos_senderismo['id']?>">Senderismo</a>
                </li>
                <li class="mr-5 nav-item">
                    <a class="nav-link <?php if($page=='about'){ echo 'active';} ?>" href="about.php">Sobre nosotros</a>                    
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
                <li class="nav-item">
                <button class="boton"><a class="contacto-enlace" href="contact.php">Contacto</a></button>
                </li>
                <li class="nav-item d-flex m-0 p-2 ml-3 align-items-center">
                    <a class="nav-link m-0 p-0 mr-2" href="index.php?lang=es">ES</a>
                    <p class="nav-link m-0 p-0">|</p>
                    <a class="nav-link m-0 p-0 ml-2" href="index.php?lang=en">EN</a>                              
                </li>              
                    
                </ul>
                
            </div>                
        </nav>
        <a class="llamar" href="tel:tel:+679529844"><i class="fas fa-phone"></i></a>        
    </header>
    <?php
}

function menu_en($page){
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
        <!-- Nav -->
        <nav class="px-5 navbar navbar-expand-xl navbar-dark">
            <a class="navbar-brand logo logo-light"  href="index.php"><span>Goyo</span>Garrido Adventures</a>            
            <button style="color:white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="w-100 navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='barranquismo'){ echo 'active';}?>" href="categories.php?id=<?=$datos_barranquismo['id']?>">Canyoning</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='bicicleta'){ echo 'active';} ?>" href="categories.php?id=<?=$datos_bicicleta['id']?>">Bicycle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='caballos'){ echo 'active';} ?>" href="categories.php?id=<?=$datos_caballos['id']?>">Horses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='4x4'){ echo 'active';} ?>" href="categories.php?id=<?=$datos_4x4['id']?>">4x4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='senderismo'){ echo 'active';} ?>" href="categories.php?id=<?=$datos_senderismo['id']?>">Hiking</a>
                </li>
                <li class="mr-5 nav-item">
                    <a class="nav-link <?php if($page=='about'){ echo 'active';} ?>" href="about.php">About us</a>                    
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
                <li class="nav-item">
                <button class="boton"><a class="contacto-enlace" href="contact.php">Contact</a></button>
                </li>
                <li class="nav-item d-flex m-0 p-2 ml-3 align-items-center">
                    <a class="nav-link m-0 p-0 mr-2" href="index.php?lang=es">ES</a>
                    <p class="nav-link m-0 p-0">|</p>
                    <a class="nav-link m-0 p-0 ml-2" href="index.php?lang=en">EN</a>                              
                </li>              
                    
                </ul>
                
            </div>                
        </nav>
        
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
            <div class="row responsive-footer">
                <div class="col-md-6 col-12 mb-5">
                    <h2><a class="logo logo-light" href="index.php"><span>Goyo</span>GarridoAdventures</a></h2>
                </div>
                <div class="col-md-6 col-12 contacto-footer">
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
            </div>
        </div>
    </div>
</footer>
    <?php
}
function footer_en(){
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
            <div class="row responsive-footer">
                <div class="col-md-6 col-12 mb-5">
                    <h2><a class="logo logo-light" href="index.php"><span>Goyo</span>GarridoAdventures</a></h2>
                </div>
                <div class="col-md-6 col-12 contacto-footer">
                    <h3 class="w-100">Leave me a message and I'll get in touch</h3>
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

function menu_crud(){
    ?>
    <header class="mb-5">
        <!-- Nav -->
        <div class="navbar navbar-expand-lg">
            <h1 class="ml-5"><a class="logo logo-light"  href="index.php"><span>Goyo</span><span style="color: yellow;">Garrido</span>Adventures</a></h1>   
            <div class="container pl-0">            
                <div class="row w-50 ml-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">&#9776;</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">                                        
                        <nav class="w-50 responsive">                            
                            <a href="../salidas/salidas.php">Salidas</a>
                            <a href="../categorias/categorias.php">Categorías</a>
                        </nav>
                    </div>                                  
                </div>
            </div>        
        </div>
    </header>
    <?php        
}



?>
