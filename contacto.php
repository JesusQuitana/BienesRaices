<?php
    declare(strict_types = 1);
    require __DIR__ . '/includes/funciones.php';

    template('header_layout');
?>

<main class="contenedor contacto">
    <h2 class="contacto_titulo">Contacto</h2>
    <picture>
        <source srcset="build/img/full/anuncio3.avif" type="image/avif">
        <source srcset="build/img/full/encuentra.webp" type="image/webp">
        <img loading="lazy" src="build/img/full/encuentra.jpg" alt="contacto">
    </picture>
    <div>
        <h2 class="contacto_titulo_formulario">Llene el formulario de contacto</h2>

        <form>
        <fieldset>
            <legend>Información Personal.</legend>
            <div class="contacto-1">
                <label>NOMBRE</label>
                <input type="text" id="contacto-1_nombre" class="contacto-1_nombre inputs" placeholder="Tu Nombre">
                <label>EMAIL</label>
                <input type="email" id="contacto-1_email" class="contacto-1_email inputs" placeholder="Tu Email">
                <label>TELEFONO</label>
                <input type="telf" id="contacto-1_telf" class="contacto-1_telf inputs" placeholder="Tu Telefono">
                <label>MENSAJE</label>
                <textarea id="contacto-1_mensaje" class="contacto-1_mensaje inputs"></textarea>
            </div>
        </fieldset>

        <fieldset class="margen_arriba">
            <legend>Información Sobre la Propieda<a class="contacto_titulo_formulario" href="users/login.php">.</a></legend>
            <div class="contacto-2">
                <label>VENDE O COMPRA</label>
                <select>
                    <option disabled selected>----Seleccione----</option>
                    <option>Compra</option>
                    <option>Vende</option>
                </select>
                <label>PRECIO O PRESUPUESTO</label>
                <input type="number" id="contacto-2_precio" class="contacto-2_precio inputs" placeholder="Tu Presupuesto">
                
                <label>¿Cómo desea ser contactado?</label>
                <div class="radios_form">
                    <label for="contacto-2_contact-1">Telefono</label><input type="radio" id="contacto-2_contac-1" name="contacto-2_radio" class="contacto-2_contac inputs" value="Telefono">
                    <label for="contacto-2_contact-2">Email</label><input type="radio" id="contacto-2_contac-2" name="contacto-2_radio" class="contacto-2_contac inputs" value="Telefono">
                </div>

                <label>Si eligió telefono, escoga la fecha y hora</label>
                <label>FECHA</label>
                <input type="date" id="contacto-2_fecha" class="contacto-2_fecha inputs">
                <label>HORA</label>
                <input type="time" id="contacto-2_time" class="contacto-2_time inputs">
            </div>
        </fieldset>
        <input type="submit" id="contacto-2_enviar" class="contacto-2_enviar">
    </form>
    </div>
</main>

<?php
    template('footer');
?>