<?php
    declare(strict_types = 1);
    require __DIR__ . '/includes/funciones.php';

    include __DIR__ . '/include/app.php';

    try {
        $conexion=new PDO($database,$user,$password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query_select= "SELECT ID, TITULO, PRECIO, IMAGEN, HABITACIONES, WC, ESTACIONAMIENTO, SUBSTRING(DESCRIPCION, 1,52) AS DESCRIPC_CORTA FROM propiedades LIMIT 3";

        $consulta_select = $conexion->prepare($query_select);
        $consulta_select->execute();
        $registro_select = $consulta_select->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e) {
        echo "ERROR: " . $e->getMessage();
        die();
    }

    template('header');
?>

    <main class="main">
        <section class="main-1_principal contenedor">
            <h2 class="titulo_main-1">Más sobre nosotros</h2>
            <article>
                <picture>
                    <img width="100" height="100" loading="lazy" src=build/img/icons/icono1.svg alt="security">
                </picture>
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut accusantium soluta animi neque. Corporis officia, iure, ex praesentium sint voluptate, mollitia quasi quo quaerat illum sequi alias atque nam. Ut!</p>
            </article>
            <article>
                <picture>
                    <img width="100" height="100" loading="lazy" src=build/img/icons/icono2.svg alt="security">
                </picture>
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut accusantium soluta animi neque. Corporis officia, iure, ex praesentium sint voluptate, mollitia quasi quo quaerat illum sequi alias atque nam. Ut!</p>
            </article>
            <article>
                <picture>
                    <img width="100" height="100" loading="lazy" src=build/img/icons/icono3.svg alt="security">
                </picture>
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut accusantium soluta animi neque. Corporis officia, iure, ex praesentium sint voluptate, mollitia quasi quo quaerat illum sequi alias atque nam. Ut!</p>
            </article>
        </section>

        <section class="main-2_principal contenedor">
            <h2 class="titulo_main-2">Casas y departamentos en ventas</h2>
            <?php
            foreach($registro_select as $propiedades) {
                echo '<article>
                    <picture>
                        <img width="300" height="300" loading="lazy" src="imagenes/'.$propiedades["IMAGEN"].'" alt="anuncio">
                    </picture>
                    <div class="main-2_anuncio_info">
                        <h4>'.$propiedades["TITULO"].'</h4>
                        <p>'.$propiedades["DESCRIPC_CORTA"].'</p>
                        <p class="precio">'.$propiedades["PRECIO"].'</p>
                    </div>
                    <div class="main-2_anuncio_icons">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="65"  height="65"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-toilet-paper"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 10m-3 0a3 7 0 1 0 6 0a3 7 0 1 0 -6 0" /><path d="M21 10c0 -3.866 -1.343 -7 -3 -7" /><path d="M6 3h12" /><path d="M21 10v10l-3 -1l-3 2l-3 -3l-3 2v-10" /><path d="M6 10h.01" /></svg>
                        <p>'.$propiedades["WC"].'</p>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="65"  height="65"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-car-garage"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 20a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M15 20a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M5 20h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" /><path d="M3 6l9 -4l9 4" /></svg>
                        <p>'.$propiedades["ESTACIONAMIENTO"].'</p>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="65"  height="65"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bed"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M22 17v-3h-20" /><path d="M2 8v9" /><path d="M12 14h10v-2a3 3 0 0 0 -3 -3h-7v5z" /></svg>
                        <p>'.$propiedades["HABITACIONES"].'</p>
                    </div>
                    <a href="anuncio.php?a='.$propiedades["ID"].'" class="main-2_enlace">Ver Propiedad</a>
                </article>';
            }
            ?>
        </section>
        
        <div class="main-2_mas contenedor">
            <a href="anuncios.php">Ver Todas</a>
        </div>

        <section class="main-3_principal">
            <div class="contenedor main-3_info">
                <h3>Encuentra la casa de tus sueños</h3>
                <p>Llena el formulario de contacto y un asesor se comunicará contigo a la brevedad.</p>
                <a href="contacto.php">¡Contáctanos!</a>
            </div>
        </section>

        <section class="main-4_principal contenedor">
            <h3>Nuestro Blog</h3>
            <h3 class="titulo_testimonio">Testimoniales</h3>
            <div class="main-4_entradas">
                <article class="entrada">
                    <picture>
                        <source srcset="build/img/thumb/blog1.avif" type="image/avif">
                        <source srcset="build/img/thumb/blog1.webp" type="image/webp">
                        <img loading="lazy" src="build/img/thumb/blog1.jpg" alt="blog1">
                    </picture>
                    <a href="entrada.php">
                        <h4 class="entrada_titulo">Terraza en el techo de tu casa</h4>
                        <p class="entrada_autor">Escrito el: <span>20/10/2024</span> por: <span>Admin</span></p>
                        <p>Consejos para contruir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero.</p>
                    </a>
                </article>

                <article class="entrada">
                    <picture>
                        <source srcset="build/img/thumb/blog2.avif" type="image/avif">
                        <source srcset="build/img/thumb/blog2.webp" type="image/webp">
                        <img loading="lazy" src="build/img/thumb/blog2.jpg" alt="blog1">
                    </picture>
                    <a href="entrada.php">
                        <h4 class="entrada_titulo">Guía para la decoración de tu hogar</h4>
                        <p class="entrada_autor">Escrito el: <span>20/10/2024</span> por: <span>Admin</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                    </a>
                </article>
            </div>
            <div class="main-4_testimonios">
                <div class="testimonio">
                    <img width="50" height="50" loading="lazy" src="build/img/icons/comilla.svg" alt="comilla">
                    <p>El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.</p>
                </div>
                <p>-Jesus Quintana</p>
            </div>
        </section>
    </main>

<?php
    template('footer');
?>