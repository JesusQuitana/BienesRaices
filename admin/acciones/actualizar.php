<?php
    declare(strict_types = 1);
    require '../../includes/funciones.php';
    include '../../includes/app.php';

    session_start();

    if($_SESSION==[]) {
        header('location: ../../index.php');
    }

    $id=$_GET["p"];
    $errores=[];
    $nombreImagen="";

    try {
        $conexion=new PDO($database,$user,$password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_select= "SELECT * FROM propiedades, vendedores WHERE propiedades.ID=:id AND propiedades.VENDEDORES_ID=vendedores.ID";

        $consulta_select = $conexion->prepare($query_select);
        $consulta_select->bindValue(":id", $id);
        $consulta_select->execute();
        $registro_select = $consulta_select->fetchAll(PDO::FETCH_ASSOC);

        $conexion=null;

    }
    catch(Exception $e) {
        echo "ERROR: " . $e->getMessage();
        die();
    }

    if($_SERVER["REQUEST_METHOD"]=="POST") {

        $titulo=$_POST["titulo"];
        $precio=$_POST["precio"];
        $descripcion=$_POST["descripcion"];
        $imagen=$_FILES["imagen"];
        $habitaciones=$_POST["habitaciones"];
        $wc=$_POST["wc"];
        $estacionamiento=$_POST["estacionamiento"];
        $vendedores_id=$_POST["vendedores"];

        if($imagen["name"]=="") {
            $errores[]="La imagen es obligatoria";
        }
        if(strlen($descripcion) < 30) {
            $errores[]="La descripcion debe contener al menos 30 caracteres";
        }

        if(empty($errores)) {
            $creado=date("Y-m-d");

            unlink("../../imagenes/" . $nombreImagen);
            $carpetaImagen = "../../imagenes/";
            $ramdon = rand(1, 10);
            $nombreImagen = md5( uniqid(strval($random), true) ) . ".jpg";
            move_uploaded_file($imagen["tmp_name"], $carpetaImagen . $nombreImagen  );

            try {
                $conexion=new PDO($database,$user,$password);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $query_insert= "UPDATE propiedades SET TITULO=:titulo, PRECIO=:precio, DESCRIPCION=:descripcion, IMAGEN=:imagen, HABITACIONES=:habitaciones, WC=:wc, ESTACIONAMIENTO=:estacionamiento, CREADO=:creado WHERE ID=:id";
        
                $consulta_insert = $conexion->prepare($query_insert);
                $consulta_insert->bindValue(":id", $id);
                $consulta_insert->bindValue(":titulo", $titulo);
                $consulta_insert->bindValue(":precio", $precio);
                $consulta_insert->bindValue(":descripcion", $descripcion);
                $consulta_insert->bindValue(":imagen", $nombreImagen);
                $consulta_insert->bindValue(":habitaciones", $habitaciones);
                $consulta_insert->bindValue(":wc", $wc);
                $consulta_insert->bindValue(":estacionamiento", $estacionamiento);
                $consulta_insert->bindValue(":creado", $creado);
                $consulta_insert->execute();
        
                
                if($consulta_insert->rowCount()!=0) {
                    $conexion=null;
                    header("location: ../index.php?r=2");
                }
            }
            catch(Exception $e) {
                echo "ERROR: " . $e->getMessage();
                die();
            }
        }   
    }

    template('header_layout');
?>

<main class="contenedor">
    <h2>Eliminar Propiedad</h2>

    <?php
    foreach($errores as $datos) {
        echo "<p class='alerta roja'>" . $datos . "</p>";
    }
    foreach($registro_select as $propiedades) {
    $nombreImagen=$propiedades["IMAGEN"];
    echo '<form method="post" class="contacto" enctype="multipart/form-data">
        <fieldset class="contacto-1">
            <legend>Informacion General</legend>

            <label for="titulo">Titulo de Propiedad</label>
            <input type="text" id="titulo" name="titulo" class="inputs" placeholder="Casa en la Playa" maxlength="20" value="'.$propiedades["TITULO"].'">

            <label for="precio">Precio de la Popiedad</label>
            <input type="number" id="precio" name="precio" class="inputs" placeholder="12000" maxlength="20" value="'.$propiedades["PRECIO"].'">

            <label for="imagen">Imagen de la Popiedad</label>
            <label class="input_imagen">--Seleccione el Archivo--
                <input type="file" id="imagen" name="imagen" class="imagen" accept="image/jpeg, image/png, image/avif, image/webp"><label class="nombre_imagen"></label>
            </label>

            <label for="descripcion">Descripcion de la Popiedad</label>
            <textarea id="descripcion" name="descripcion" maxlength="255">'.$propiedades["DESCRIPCION"].'</textarea>
        </fieldset>

        <fieldset class="contacto-2 margen_arriba">
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones">Habitaciones de la Popiedad</label>
            <input type="number" min="1" max="9" placeholder="Ej: 3" id="habitaciones" name="habitaciones" class="inputs" value="'.$propiedades["HABITACIONES"].'">

            <label for="wc">Baños de la Popiedad</label>
            <input type="number" min="1" max="9" placeholder="Ej: 3" id="wx" name="wc" class="inputs" value="'.$propiedades["WC"].'">

            <label for="estacionamiento">Estacionamiento de la Popiedad</label>
            <input type="number" min="1" max="9" placeholder="Ej: 3" id="estacionamiento" name="estacionamiento" class="inputs" value="'.$propiedades["ESTACIONAMIENTO"].'">
        </fieldset>

        <fieldset class="contacto-1 margen_arriba">
            <legend>Vendedor</legend>
            <select name="vendedor" value="'.$propiedades["VENDEDORES_ID"].'">
                <option value="'.$propiedades["VENDEDORES_ID"].'"selected>'.$propiedades["NOMBRE"]. " ".$propiedades["APELLIDO"].'</option>
                </select>
        </fieldset>

        <div class="enviar-form-agregar">
            <input type="submit" class="btn verde" style="margin-top:0;">
            <a href="../index.php" class="btn verde">Volver</a>
        </div>
    </form>';
    }
    ?>
</main>

<?php
    template("footer");
?>