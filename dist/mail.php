<?php
if(isset($_POST['envio_form'])){
    if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['asunto']) && !empty($_POST['mensaje'])){
        $destinatario = 'a.luqueventura997@gmail.com';
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];

        $header = "Enviado desde formulario de GoyoGarridoAdventures";
        $mensajeCompleto = $mensaje . "\nEnviado por: ".$nombre;
        mail($destinatario, $asunto, $mensajeCompleto,$header);
        echo "<script>alert('Correo enviado correctamente')</script>";


    }else{
        echo "<script>alert('Faltan datos por completar')</script>";
    }
}
?>