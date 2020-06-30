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
    <title>Salidas</title>
    <?php
    import_css_crud();
    import_js_head();
    ?>
</head>
<body>
    <?php
    menu_crud();
    if(isset($_GET['id'])){
        $consulta_borrar = $conexion -> prepare("DELETE FROM salida WHERE id=?");
        $id = $_GET['id'];
        $consulta_borrar -> bindParam(1,$id);
        $consulta_borrar -> execute();
    }
    ?>
    <a href="nueva_salida.php"><button type="button" class="btn btn-primary">Nueva salida</button></a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#ID</th>
        <th scope="col">Imagen</th>
        <th scope="col">Título</th>
        <th scope="col">Categoría</th>
        <th scope="col">Localización</th>
        <th scope="col">Punto Encuentro</th>
        <th scope="col">Máximo asistentes</th>
        <th scope="col">Época</th>
        <th scope="col">Dificultad</th>
        <th scope="col">¿Visible?</th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>

    <?php
        $consulta_salidas = $conexion -> prepare("SELECT * from salida");
        $consulta_salidas -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_salidas -> execute();

        while($datos = $consulta_salidas -> fetch()){

            $consulta_categorias = $conexion -> prepare("SELECT nombre from categoria WHERE id=?");
            $consulta_categorias -> setFetchMode(PDO::FETCH_ASSOC);
            $consulta_categorias -> bindParam(1, $datos['categoria']);
            $consulta_categorias -> execute();
            $datos_categoria = $consulta_categorias -> fetch();
            echo "<tr>
            <th scope='row'>$datos[id]</th>
            <td><img src='../../assets/img/salidas/$datos[imagen]' style='max-width:100px'></td>
            <td>$datos[titulo]</td>
            <td>$datos_categoria[nombre]</td>
            <td>$datos[localizacion]</td>
            <td>$datos[punto_encuentro]</td>
            <td>$datos[max_personas]</td>
            <td>$datos[epoca]</td>
            <td>$datos[dificultad]</td>";
            if($datos['visible']==1){
                echo "<td>Sí</td>";
            } else {
                echo "<td>No</td>";
            }
            
            echo "<td><button class='btn btn-success'><a href='editar-salida.php?id=$datos[id]'>Editar</a></button></td>
            <td><button class='btn btn-danger'><a class='borrar' href='salidas.php?id=$datos[id]'>Borrar</a></button></td>
            </tr>";
        }
    ?>
    </tbody>
    </table>
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