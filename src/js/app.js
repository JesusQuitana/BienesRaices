const icon_sun = '<svg class="icon_sm_mode" xmlns="http://www.w3.org/2000/svg"  width="50"  height="50"  viewBox="0 0 24 24"  fill="none"  stroke="#fff"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-sun"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>';

const icon_moon = '<svg class="icon_sm_mode" xmlns="http://www.w3.org/2000/svg"  width="50"  height="50"  viewBox="0 0 24 24"  fill="none"  stroke="#fff"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-moon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>';

document.addEventListener('DOMContentLoaded', function() {
    
    preferenciasUser();
    dark_mode();

    bar_menu();

});

/*--------------------------VARIABLES----------------------------------------------------- */
const icon_dark_mode = document.querySelector('.icon_dark_mode');
/*--------------------------VARIABLES----------------------------------------------------- */

function preferenciasUser() {
    const dark_modeTrue = window.matchMedia('(prefers-color-scheme:dark)').matches;

    if (dark_modeTrue) {
        
        icon_dark_mode.classList.add('dark');
        document.body.classList.add('dark');
        icon_dark_mode.innerHTML = icon_sun;
    }
    else {

        icon_dark_mode.classList.remove('dark');
        document.body.classList.remove('dark');
        icon_dark_mode.innerHTML = icon_moon;
    }
}

function dark_mode() {
    const icon_mode = document.querySelector('.icon_sm_mode');

    icon_mode.addEventListener('click', function() {
        
        if(icon_dark_mode.classList.contains('dark')) {
            icon_mode.remove();
            icon_dark_mode.classList.remove('dark');
            document.body.classList.remove('dark');
            icon_dark_mode.innerHTML = icon_moon;
        } else {
            icon_mode.remove();
            icon_dark_mode.classList.add('dark');
            document.body.classList.add('dark');
            icon_dark_mode.innerHTML = icon_sun;
        }

        dark_mode();

    })
}

function bar_menu() {
    const bar_menu = document.querySelector('.bar_menu');
    const barra_nav = document.querySelector('.header_barra_nav');

    bar_menu.addEventListener('click', function() {
        
        if(barra_nav.classList.contains('visibled')) {
            barra_nav.classList.remove('visibled');
        } else {
            barra_nav.classList.add('visibled');
        }

    })
}