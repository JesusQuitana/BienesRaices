<?php
    declare(strict_types = 1);
    require __DIR__ . '/includes/funciones.php';
    include __DIR__ . '/include/app.php';

    $id=intval($_GET["a"]);

    if(!is_int($id)) {
        header("location: anuncios.php");
    }

    try {
        $conexion=new PDO($database,$user,$password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_select= "SELECT TITULO, PRECIO, IMAGEN, HABITACIONES, WC, ESTACIONAMIENTO, DESCRIPCION FROM propiedades WHERE ID=:id";

        $consulta_select = $conexion->prepare($query_select);
        $consulta_select->bindValue(":id", $id);
        $consulta_select->execute();
        $registro_select = $consulta_select->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e) {
        echo "ERROR: " . $e->getMessage();
        die();
    }

    template('header_layout');
?>

<main class="contenedor max-centrado">
    <?php
        foreach($registro_select as $propiedades) {
        echo 
            '<h2>'.$propiedades["TITULO"].'</h2>
            <picture>
                <img loading="lazy" src="imagenes/'.$propiedades["IMAGEN"].'" alt="entrada_blog">
            </picture>
            <div>
                <p class="precio precio_blog">'.$propiedades["PRECIO"].'</p>
                <div class="main-2_anuncio_icons icons_blog">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="65"  height="65"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-toilet-paper"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 10m-3 0a3 7 0 1 0 6 0a3 7 0 1 0 -6 0" /><path d="M21 10c0 -3.866 -1.343 -7 -3 -7" /><path d="M6 3h12" /><path d="M21 10v10l-3 -1l-3 2l-3 -3l-3 2v-10" /><path d="M6 10h.01" /></svg>
                    <p class="canti_anuncio">'.$propiedades["WC"].'</p>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="65"  height="65"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-car-garage"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 20a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M15 20a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M5 20h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" /><path d="M3 6l9 -4l9 4" /></svg>
                    <p class="canti_anuncio">'.$propiedades["ESTACIONAMIENTO"].'</p>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="65"  height="65"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bed"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M22 17v-3h-20" /><path d="M2 8v9" /><path d="M12 14h10v-2a3 3 0 0 0 -3 -3h-7v5z" /></svg>
                    <p class="canti_anuncio">'.$propiedades["HABITACIONES"].'</p>
                </div>
                <p class="justificado">'.$propiedades["DESCRIPCION"].'</p>
            </div>';
        }
    ?>
</main>

<?php
    template('footer');
?>