<?php
declare(strict_types=1);
require '../../includes/app.php';

session_start();

if($_SESSION==[]) {
    header('location: ../../index.php');
}

    //Verificar si se envio el formulario

    /*echo "<pre class'contenedor>";
    var_dump($imagen);
    echo "</pre>";*/

    $errores=[];

    $titulo="";
    $precio="";
    $descripcion="";
    $imagen="";
    $habitaciones="";
    $wc="";
    $estacionamiento="";
    $vendedores_id="";

    try {
        $conexion=new PDO($database, $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $quey_select = "SELECT * FROM vendedores";

        $consulta_select = $conexion->prepare($quey_select);
        $consulta_select->execute();
        $registros_vendedores = $consulta_select->fetchAll(PDO::FETCH_ASSOC);

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $titulo=$_POST["titulo"];
            $precio=$_POST["precio"];
            $imagen=$_FILES["imagen"];
            $descripcion=$_POST["descripcion"];
            $habitaciones=$_POST["habitaciones"];
            $wc=$_POST["wc"];
            $estacionamiento=$_POST["estacionamiento"];
            $vendedores_id=$_POST["vendedor"];

            if($titulo=="") {
                $errores[]="El titulo es obligatorio";
            }
            if($precio=="") {
                $errores[]="El precio es obligatorio";
            }
            if($imagen["name"]=="") {
                $errores[]="La imagen es obligatoria";
            }
            if($imagen["size"] > 1000000) {
                $errores[]="El tamaño de la imagen debe ser menor a 1Mb";
            }
            if($imagen["error"]==1) {
                $errores[]="Hubo un error al subir la imagen";
            }
            if($descripcion=="") {
                $errores[]="La descripcion es obligatoria";
            }
            if(strlen($descripcion) < 30) {
                $errores[]="La descripcion debe contener al menos 30 caracteres";
            }
            if($habitaciones=="") {
                $errores[]="La cantidad de habitaciones es obligatoria";
            }
            if($wc=="") {
                $errores[]="La cantidad de baños es obligatorio";
            }
            if($estacionamiento=="") {
                $errores[]="La cantidad de estacionamientos es obligatorio";
            }
            if(!$vendedores_id) {
                $errores[]="El vendedor es obligatorio";
            }

            if(empty($errores)) {
                $creado = date('Y-m-d');

                //Guardar en el disco duro la imagen
                $carpetaImagen = "../../imagenes/";
                if(!is_dir($carpetaImagen)) {
                    mkdir($carpetaImagen);
                }
                $ramdon = rand(1, 10);
                $nombreImagen = md5( uniqid(strval($random), true) ) . ".jpg";
                move_uploaded_file($imagen["tmp_name"], $carpetaImagen . $nombreImagen  );

                //-------------INSERTAR DATOS------------------------------------
                $query_insert= "INSERT INTO `propiedades` (`TITULO`, `PRECIO`, `IMAGEN`, `DESCRIPCION`, `HABITACIONES`, `WC`, `ESTACIONAMIENTO`, `CREADO`, `VENDEDORES_ID`) VALUES (:titulo, :precio, :imagen, :descripcion, :habitaciones, :wc, :estacionamiento, :creado, :vendedores_id)";

                $consulta_insert = $conexion->prepare($query_insert);
                
                $consulta_insert->bindValue(":titulo", $titulo);
                $consulta_insert->bindValue(":precio", $precio);
                $consulta_insert->bindValue(":imagen", $nombreImagen);
                $consulta_insert->bindValue(":descripcion", $descripcion);
                $consulta_insert->bindValue(":habitaciones", $habitaciones);
                $consulta_insert->bindValue(":wc", $wc);
                $consulta_insert->bindValue(":estacionamiento", $estacionamiento);
                $consulta_insert->bindValue(":creado", $creado);
                $consulta_insert->bindValue(":vendedores_id", $vendedores_id);

                $consulta_insert->execute();

                if($consulta_insert->rowCount()!=0) {
                    $conexion=null;
                    header("location: ../index.php?r=1");
                }else {
                    $errores[]="Hubo un error al agregar la propiedad";
                }
            }
            
        }
    }
    catch(Exception $e) {
        echo "ERROR: " . $e->getMessage();
        die();
    }

    require '../../includes/funciones.php';
    template('header');
?>

<main class="contenedor">
    <h2>Agregar Propiedad</h2>

    <?php
        foreach($errores as $datos) {
            echo "<p class='alerta roja'>" . $datos . "</p>";
        }
    ?>

    <form method="post" class="contacto" enctype="multipart/form-data">
        <fieldset class="contacto-1">
            <legend>Informacion General</legend>

            <label for="titulo">Titulo de la Popiedad</label>
            <input type="text" id="titulo" name="titulo" class="inputs" placeholder="Casa en la Playa" maxlength="20" value="<?php echo $titulo; ?>">

            <label for="precio">Precio de la Popiedad</label>
            <input type="number" id="precio" name="precio" class="inputs" placeholder="12000" maxlength="20" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen de la Popiedad</label>
            <label class="input_imagen">--Seleccione el Archivo--
                <input type="file" id="imagen" name="imagen" class="imagen" accept="image/jpeg, image/png, image/avif, image/webp"><label class="nombre_imagen"> </label>
            </label>

            <label for="descripcion">Descripcion de la Popiedad</label>
            <textarea id="descripcion" name="descripcion" min="26" maxlength="255"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset class="contacto-2 margen_arriba">
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones">Habitaciones de la Popiedad</label>
            <input type="number" min="1" max="9" placeholder="Ej: 3" id="habitaciones" name="habitaciones" class="inputs" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños de la Popiedad</label>
            <input type="number" min="1" max="9" placeholder="Ej: 3" id="wx" name="wc" class="inputs" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento de la Popiedad</label>
            <input type="number" min="1" max="9" placeholder="Ej: 3" id="estacionamiento" name="estacionamiento" class="inputs" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset class="contacto-1 margen_arriba">
            <legend>Vendedor</legend>
            <select name="vendedor" value="<?php echo $vendedor ?>">
                <option value="" disabled selected>---Seleccione---</option>
                <?php
                    foreach($registros_vendedores as $vendedor) {
                        echo "<option value='" . $vendedor["ID"] . "'>" . $vendedor["NOMBRE"]." " .$vendedor["APELLIDO"] . "</option>";
                    }
                ?>
            </select>
        </fieldset>

        <div class="enviar-form-agregar">
            <input type="submit" class="btn verde" style="margin-top:0;">
            <a href="../index.php" class="btn verde">Volver</a>
        </div>
    </form>
</main>

<script src="../../build/js/input_imagen.js"></script>
<?php
    template('footer');
?>