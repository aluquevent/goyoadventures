<?php
session_start();
include 'assets/php/functions.php';
$conexion = conectarBD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a CRUD</title>
    <?php
    import_css();
    import_js_head();
    ?>
</head>
<body id="acceso">
    <div class="container">
        <div class="row login">
            <div class="login-panel col-8">
            <h1><a class="logo logo-light"  href="index.php"><span>Goyo</span>Adventures</a></h1>
            <form action="#" method="POST">
                <label for="usuario">Nombre de usuario</label>
                <input type="text" name="usuario" id="usuario">
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="pass">
                <button type="submit" class="boton" name="acceso"><a>Iniciar sesión</a></button>
            </form>
            </div>
        </div>
    </div>
    

    <?php

    if(isset($_POST['acceso'])){
        $consulta_acceso = $conexion -> prepare("SELECT * from usuario WHERE usuario = ?");
        $usuario = $_POST['usuario'];
        
        $consulta_acceso -> bindParam(1, $usuario);
        $consulta_acceso -> execute();
        $num_usuario = $consulta_acceso -> rowCount();
        

        if($datos_usuario = $consulta_acceso -> fetch()){
            $bash=$datos_usuario['contrasena'];        
            if(password_verify($_POST['pass'], $bash)) {
                $_SESSION['id']=$datos_usuario['id'];
                $_SESSION['usuario']=$datos_usuario['usuario'];
                echo "<meta http-equiv='refresh' content='0; url=crud/salidas/salidas.php'>";
            } else {
                // echo "<p>Datos incorrectos 1</p>";
            }
        } else {
            // echo "<p>Datos incorrectos 2</p>";
        }

    }

    ?>
</body>
<?php
$conexion = null;
import_js();
?>
</html>