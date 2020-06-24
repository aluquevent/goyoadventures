<?php
function menu(){
    ?>
    <header id="header" class="menu">
        <!-- Top-bar -->
        <div class="top-bar">           
            <div class="container">
                    <div class="row justify-content-between py-3">
                        <h1><a class="logo logo-light"  href="index.html"><span>Goyo</span>Adventures</a></h1>
                        <button class="boton"><a href="contact.php">Contacto</a></button>       
                    </div>
            </div>
        </div>
        <!-- Nav -->
        <div class="navbar ">   
            <div class="container pl-0">            
                <div class="row w-100 ml-0">                                        
                        <nav class="w-100">                            
                            <a href="token.php">Barranquismo</a>
                            <a href="">Bicicleta</a>
                            <a href="">Caballos</a>
                            <a href="">4x4</a>
                            <a href="">Senderismo</a>
                            <a href="">Ofertas</a>
                            <a href="">Lunáticos</a>
                            <a href="about.php">Sobre nosotros</a>
                        </nav>                                  
                </div>
            </div>        
        </div>
    </header>
    <?php
}

function footer(){
    ?>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2><a class="logo logo-light" href="#"><span>Goyo</span>Adventures</a></h2>
                </div>
                <div class="col-md-4">
                    <nav class="w-100 footer-menu">
                        <a href="#">Barranquismo</a>
                        <a href="#">Bicicleta</a>
                        <a href="#">Caballos</a>
                        <a href="#">4x4</a>
                        <a href="#">Senderismo</a>
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
?>