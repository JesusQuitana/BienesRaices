<?php
    declare(strict_types = 1);
    require __DIR__ . '/includes/funciones.php';

    template('header_layout');
?>

<main class="contenedor max-centrado">
    <h2>Guía para la decoracion de tu hogar</h2>
    <picture>
        <source srcset="build/img/full/destacada3.avif" type="image/avif">
        <source srcset="build/img/full/destacada3.webp" type="image/webp">
        <img loading="lazy" src="build/img/full/destacada3.jpg" alt="entrada_blog">
    </picture>
    <div>
        <p class="entrada_autor">Escrito el: <span>20/10/2024</span> por: <span>Admin</span></p>
        <p class="justificado">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis libero atque rem. Possimus, odio repellat quam optio placeat sequi sunt! Accusantium, aliquid magni. Quo eum eos est cum dolor Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo pariatur laborum vitae nobis dolore provident quis id ex culpa eum cum quam iusto consectetur, veniam amet magni rem deleniti assumenda!<br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta porro tenetur modi, nulla placeat aperiam consectetur doloribus voluptates corrupti? Facere assumenda aspernatur ea quasi porro fuga inventore esse nihil eaque Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed impedit id saepe quidem omnis maiores recusandae modi facilis sit ipsum error qui est eum tenetur quisquam</p>
    </div>
</main>

<?php
    template('footer');
?>