let lastScrollTop = 0;
const header = document.querySelector('header');

window.addEventListener('scroll', () => {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        header.style.top = '-100px';
    } else {
        header.style.top = '0';
    }

    lastScrollTop = scrollTop;
});

document.addEventListener('DOMContentLoaded', function() {
    var menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(function(item) {
        var image = item.querySelector('img');

        image.addEventListener('click', function() {
            if (image.classList.contains('zoomed')) {
                image.classList.remove('zoomed');
            } else {
                // Remover la clase 'zoomed' de todas las imágenes
                menuItems.forEach(function(item) {
                    item.querySelector('img').classList.remove('zoomed');
                });

                // Agregar la clase 'zoomed' solo a la imagen clicada
                image.classList.add('zoomed');
            }
        });
    });
});