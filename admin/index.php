<?php   
    declare(strict_types=1);
    require '../includes/funciones.php';
    require '../includes/app.php';

    session_start();

    if($_SESSION==[]) {
        header("location: ../index.php");
    }

    template('header');

    $r=$_GET["r"];
    $eliminado=$_GET["e"];
    $acces=$_GET["x"];

    try {
        $conexion=new PDO($database, $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_select = "SELECT * FROM `propiedades` LIMIT 10";

        $consulta_select = $conexion->prepare($query_select);
        $consulta_select->execute();
        $registros_propiedades = $consulta_select->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e) {
        echo "ERROR: " . $e->getMessage();
        die();
    }
?>

<main class="contenedor-admin ">

    <h2 class="titulo_main-1">Propiedades</h2>

    <?php
        if($r==1) {
            echo "<p class='alerta verde-a'>Propiedad Agregada Correctamente</p>";
        }else if($r==2) {
            echo "<p class='alerta verde-a'>Propiedad Editada Correctamente</p>";
        }else if($r==3) {
            echo "<p class='alerta verde-a'>Propiedad Eliminada Correctamente</p>";
        }

        if($eliminado==1) {
            echo "<p class='alerta verde-a'>La propiedad se elimino correctamente</p>";
        }else if($eliminado==2){
            echo "<p class='alerta verde-a'>Hubo un error al eliminar la propiedad</p>";
        }
        if($acces==1) {
            echo "<p class='alerta verde-a'>Acceso Concedido</p>";
        }
    ?>

    <a href="../admin/acciones/crear.php" class="btn verde" style='margin: 5rem auto;'>Agregar Propiedades</a>

    <div class="admin_propiedades">
        <p class="admin-ver">ID</p>
        <p class="admin-ver">Titulo</p>
        <p class="admin-ver">Imagen</p>
        <p class="admin-ver">Precio</p>
        <p class="admin-ver">Fecha Modificacion</p>
        <p class="admin-ver">Accion</p>
        <?php
            foreach($registros_propiedades as $propiedades) {
                echo 
                    "<p class='admin-ver'>" . $propiedades["ID"] . "</p>" .
                    "<p class='admin-ver'>" . $propiedades["TITULO"] . "</p>" .
                    "<div class='admin-ver'><img src='../imagenes/".$propiedades["IMAGEN"]."'></div>" .
                    "<p class='admin-ver'>$" . $propiedades["PRECIO"] . "</p>" .
                    "<p class='admin-ver'>" . $propiedades["CREADO"] . "</p>" .
                    "<form method='post' action='acciones/eliminar.php' class='admin-ver acciones'>
                        <input type='hidden' name='id' value='". $propiedades["ID"] ."'><input type='submit' class='btn rojo' value='Eliminar'>
                        <a href='acciones/actualizar.php?p=".$propiedades["ID"]."' class='btn verde' style='width: 131px;'>Editar</a>
                    </form>"
                    ;
            }
        ?>
    </div>

</main>

<script src="../build/js/alertas.js"></script>

<?php
    template('footer');
?>