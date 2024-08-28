document.addEventListener('DOMContentLoaded', function() {
    quitarAlerta();
})

function quitarAlerta() {
    const alerta = document.querySelector(".alerta");
    setTimeout(()=> {
        alerta.style.display = 'none';
    }, 2000)
}