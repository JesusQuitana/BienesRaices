<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bienes Raices</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../..//build/img/icons/favicon.png">
    <link rel="preloadt" href="../..//build/css/app.css" as="style">
    <link rel="stylesheet" href="../..//build/css/app.css">

</head>
<body>
    <header class="header_principal">
        <div class="contenedor">
            <div class="header_eslogan_principal">
                <a href="../../index.php"><h1 class="header_titulo_principal">Bienes<span>Raices</span></h1></a>

                    <div class="bar_menu">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="70"  height="70"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
                    </div>

                    <nav class="header_barra_nav">
                        <a href="../../nosotros.php">Nosotros</a>
                        <a href="../../anuncios.php">Anuncios</a>
                        <a href="../../blog.php">Blog</a>
                        <a href="../../contacto.php">Contactos</a>
                        <?php
                            session_start();
                            if($_SESSION["login"]) {
                                echo '<a href="../../users/cerrar-session.php">Cerrar Sesion</a>';
                            }
                        ?>
                        <div class="icon_dark_mode dark"></div>
                    </nav>
            </div>

            <div class="header_info_principal">
                <h2>Ventas de Casas y Departamentos <br>Exclusivos y de Lujo</h2>
            </div>
        </div>
    </header>