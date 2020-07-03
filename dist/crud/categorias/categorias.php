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
    <title>Categorías</title>
    <?php
    import_css_crud();
    import_js_head();
    ?>
</head>
<body>
    <?php
    menu_crud();
    if(isset($_GET['id'])){
        $consulta_borrar = $conexion -> prepare("DELETE FROM categoria WHERE id=?");
        $id = $_GET['id'];
        $consulta_borrar -> bindParam(1,$id);
        $consulta_borrar -> execute();
    }
    ?>
    <a href="nueva_categoria.php"><button type="button" class="btn btn-primary">Nueva categoría</button></a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#ID</th>
        <th scope="col">Imagen</th>
        <th scope="col">Título</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Visible</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

    <?php
        $consulta_salidas = $conexion -> prepare("SELECT * from categoria");
        $consulta_salidas -> setFetchMode(PDO::FETCH_ASSOC);
        $consulta_salidas -> execute();

        while($datos = $consulta_salidas -> fetch()){
            echo "<tr>
            <th scope='row'>$datos[id]</th>
            <td><img src='../../assets/img/categorias/$datos[imagen]' style='max-width:100px'></td>
            <td>$datos[nombre]</td>
            <td>$datos[descripcion]</td>";
            if($datos['visible']==1){
                echo "<td>Sí</td>";
            } else {
                echo "<td>No</td>";
            }
            echo "<td><button class='btn btn-success'><a href='editar_categoria.php?id=$datos[id]'>Editar</a></button></td>
            <td><button class='btn btn-danger'><a class='borrar' href='categorias.php?id=$datos[id]'>Borrar</a></button></td>
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