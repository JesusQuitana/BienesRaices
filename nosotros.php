<?php
    declare(strict_types = 1);
    require __DIR__ . '/includes/funciones.php';

    template('header_layout');
?>

    <main class="contenedor">
        <section class="nosotros-1">
            <h2>Conoce sobre nosotros</h2>
            <picture>
                <source srcset="build/img/full/nosotros.avif" type="image/avif">
                <source srcset="build/img/full/nosotros.webp" type="image/webp">
                <img loading="lazy" src="build/img/full/nosotros.jpg" alt="nosotros">
            </picture>
            <div class="nosotros-1_info">
                <h3>25 años de experiencia</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur soluta corrupti quasi eius eaque expedita harum aliquam commodi quis sint! Magni est inventore nulla? Delectus alias vitae rerum quidem illo?Lorem ipsum dolor sit amet consectetur adipisicing elit. <br><br>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, quos rerum? Consequatur impedit odio, nostrum cupiditate dolore enim expedita fugiat harum eligendi qui porro sint officia dolorum beatae magni doloremque.</p>
            </div>
        </section>

        <section class="nosotros-2">
            <h2>Más sobre nosotros</h2>
            <article class="nosotros-2_articulo">
                <picture>
                    <img width="100" height="100" loading="lazy" src=build/img/icons/icono1.svg alt="security">
                </picture>
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat officia accusamus unde enim, eum necessitatibus nesciunt, cumque beatae sed non vero eius ex, omnis iusto excepturi harum est ipsum accusantium?</p>
            </article>
            <article class="nosotros-2_articulo">
                <picture>
                    <img width="100" height="100" loading="lazy" src=build/img/icons/icono2.svg alt="security">
                </picture>
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat officia accusamus unde enim, eum necessitatibus nesciunt, cumque beatae sed non vero eius ex, omnis iusto excepturi harum est ipsum accusantium?</p>
            </article>
            <article class="nosotros-2_articulo">
                <picture>
                    <img width="100" height="100" loading="lazy" src=build/img/icons/icono3.svg alt="security">
                </picture>
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat officia accusamus unde enim, eum necessitatibus nesciunt, cumque beatae sed non vero eius ex, omnis iusto excepturi harum est ipsum accusantium?</p>
            </article>
        </section>
    </main>

<?php
    template('footer');
?>