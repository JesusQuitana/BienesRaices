<?php
    declare(strict_types = 1);
    require __DIR__ . '/includes/funciones.php';

    template('header_layout');
?>

<main class="contenedor">
    <section class="blog_principal contenedor">
        <h3>Nuestro Blog</h3>
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

            <article class="entrada">
                <picture>
                    <source srcset="build/img/thumb/blog3.avif" type="image/avif">
                    <source srcset="build/img/thumb/blog3.webp" type="image/webp">
                    <img loading="lazy" src="build/img/thumb/blog3.jpg" alt="blog1">
                </picture>
                <a href="entrada.php">
                    <h4 class="entrada_titulo">Guía para la decoración de tu hogar</h4>
                    <p class="entrada_autor">Escrito el: <span>20/10/2024</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </article>

            <article class="entrada">
                <picture>
                    <source srcset="build/img/thumb/blog4.avif" type="image/avif">
                    <source srcset="build/img/thumb/blog4.webp" type="image/webp">
                    <img loading="lazy" src="build/img/thumb/blog4.jpg" alt="blog1">
                </picture>
                <a href="entrada.php">
                    <h4 class="entrada_titulo">Guía para la decoración de tu hogar</h4>
                    <p class="entrada_autor">Escrito el: <span>20/10/2024</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </article>
        </div>
    </section>
</main>

<?php
    template('footer');
?>