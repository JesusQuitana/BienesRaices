document.addEventListener('DOMContentLoaded', function() {
    nombreImagen();
})

function nombreImagen( ) {
    const imagen = document.querySelector(".imagen");
    const nombre_imagen = document.querySelector(".nombre_imagen");
    imagen.addEventListener("change", () => {
        nombre_imagen.textContent = imagen.files[0].name;
    })
}

nombreImagen();