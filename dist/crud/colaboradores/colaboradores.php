<?php
session_start();
include '../../assets/php/functions.php';
$conexion = conectarBD();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colaboradores</title>
    <?php
    import_css_crud();
    import_js_head();
    ?>
</head>
<body>
    <?php
    menu_crud();
    if(isset($_GET['id'])){
        $consulta_borrar = $conexion -> prepare("DELETE FROM colaborador WHERE id=?");
        $id = $_GET['id'];
        $consulta_borrar -> bindParam(1,$id);
        $consulta_borrar -> execute();
    }
    ?>
    <a href="nueva_categoria.php"><button type="button" class="btn btn-primary">Nuevo colaborador</button></a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#ID</th>
        <th scope="col">Imagen</th>
        <th scope="col">Nombre</th>
        <th scope="col">Link</th>
        </tr>
    </thead>
    <tbody>

    <?php
        $consulta_colaborador = $conexion -> prepare("SELECT * from colaborador");
        $consulta_colaborador -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_colaborador -> execute();

        while($datos = $consulta_colaborador -> fetch()){
            echo "<tr>
            <th scope='row'>$datos[id]</th>
            <td><img src='../../assets/img/colaboradores/$datos[imagen]' style='max-width:100px'></td>
            <td>$datos[nombre]</td>
            <td>$datos[link]</td>";
            echo "<td><button class='btn btn-success'><a href='editar_colaborador.php?id=$datos[id]'>Editar</a></button></td>
            <td><button class='btn btn-danger'><a class='borrar' href='colaboradores.php?id=$datos[id]'>Borrar</a></button></td>
            </tr>";
        }
    ?>
    </tbody>
    </table>
    <?php
        
    ?>
<script>
$(document).ready(function() {
     $(".borrar").click(function() {
          if (!confirm("¿Está seguro de esta operación?")) {
               return false;
          }
     });
});
</script>
</body>
<?php
$conexion = null;
import_js();
?>
</html>