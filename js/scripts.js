/* =====================================================================================================
==========	URL 		    |		www.antoniobuitrago.es   ===========================================
==========	Author Name		|		Antonio Buitrago         ===========================================
======================================================================================================== 
==========  01. Script para los POPOVER de Bootstrap.
==========  02. Script que solo permite marcar un rango de precios (Filtro productos).
==========  03. Función que muestra el formulario del buscador al pulsar en el icono de la lupa.
==========  04. Función que quita el formulario del buscador si está visible al reducir el ancho de pantalla por debajo de 1400px y vuelve a mostrar la lupa.
==========  05. Owl-Carousel - Juegos más recientes (del Index.php).
==========  06. Owl-Carousel - Juegos recomendados (del Index.php).
==========  07. Owl-Carousel - Próximos lanzamientos (del Index.php).
==========  08. Owl-Carousel - Productos recomentados (del carrito, cart.php).
==========  09. Owl-Carousel - Productos recomendados (articulos.php).
==========  10. Preview de la imagen de perfil en el formulario de registro.
==========  11. Validación de formularios con Bootstrap.
==========  12. Script para el buscador general.
==========  13. Script para el buscador de la parte de soporte.
==========  14. Script para que al pulsar el botón "Loguéate para dejar tu opinión" vayamos a la página de login
==========  15. Función que pregunta si se desea eliminar el registro de usuario
==========  16. Función que pregunta si se desea eliminar el producto.
==========  17. Scripts que al seleccionar pago con tarjeta muestra el formulario para rellenar con los datos (payment.php).
===================================================================================================== */


// ====== 01. Script para los POPOVER de Bootstrap =====================================================
let popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
let popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})
// =====================================================================================================

// ====== 02. Script que solo permite marcar un rango de precios (Filtro productos) ====================
const checkboxes = document.querySelectorAll('.check-rango');

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        checkboxes.forEach(cb => {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    });
});
// =====================================================================================================

// ====== 03. Función que muestra el formulario del buscador al pulsar en el icono de la lupa ==========
function mostrarBuscador() {
    let buscador = document.getElementById("buscador");
    let lupa = document.getElementById("lupa");

    if (buscador.classList.contains("d-lg-none")) {
        buscador.classList.remove("d-lg-none");
        lupa.classList.remove("fa-magnifying-glass");
        lupa.classList.add("fa-xmark");
    } else {
        buscador.classList.add("d-lg-none");
        lupa.classList.remove("fa-xmark");
        lupa.classList.add("fa-magnifying-glass");
        lupa.classList.remove("d-none");
    }
}
// =====================================================================================================

// ====== 04. Función que quita el formulario del buscador si está visible al reducir el ancho de pantalla por debajo de 1400px y vuelve a mostrar la lupa
window.addEventListener('resize', function () {
    // Aquí puedes realizar acciones cuando se redimensiona la pantalla
    ajustarElementos();
});

function ajustarElementos() {

    let windowWidth = window.innerWidth;

    if (windowWidth < 1400) {
        buscador.classList.add("d-lg-none");
        lupa.classList.remove("fa-xmark");
        lupa.classList.add("fa-magnifying-glass");
    }
}
// =====================================================================================================

// ====== 05. Owl-Carousel - Juegos más recientes (del Index.php) ======================================
$(document).ready(function () {
    let owl1 = $(".owl-carouselRecientes");
    owl1.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        },
        responsiveBaseElement: '.owl-carouselRecientes'
    });

    $(".owl-nextRecientes").click(function () {
        owl1.trigger("next.owl.carousel");
    });

    $(".owl-prevRecientes").click(function () {
        owl1.trigger("prev.owl.carousel");
    });
});
// =====================================================================================================

// ====== 06. Owl-Carousel - Juegos recomendados (del Index.php) =======================================
$(document).ready(function () {
    let owl2 = $(".owl-carouselRecomendados");
    owl2.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        },
        responsiveBaseElement: '.owl-carouselRecomendados'
    });

    $(".owl-nextRecommended").click(function () {
        owl2.trigger("next.owl.carousel");
    });

    $(".owl-prevRecommended").click(function () {
        owl2.trigger("prev.owl.carousel");
    });
});
// =====================================================================================================

// ====== 07. Owl-Carousel - Próximos lanzamientos (del Index.php) =====================================
$(document).ready(function () {
    let owl3 = $(".owl-carouselLanzamientos");
    owl3.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        },
        responsiveBaseElement: '.owl-carouselLanzamientos'
    });

    $(".owl-nextLanzamientos").click(function () {
        owl3.trigger("next.owl.carousel");
    });

    $(".owl-prevLanzamientos").click(function () {
        owl3.trigger("prev.owl.carousel");
    });
});
// =====================================================================================================

// ====== 08. Owl-Carousel - Productos recomentados (del carrito, cart.php) ============================
$(document).ready(function () {
    let owlCart = $(".owl-carouselCart");
    owlCart.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        },
        responsiveBaseElement: '.owl-carouselCart'
    });

    $(".owl-nextCart").click(function () {
      owlCart.trigger("next.owl.carousel");
    });

    $(".owl-prevCart").click(function () {
      owlCart.trigger("prev.owl.carousel");
    });
});
// =====================================================================================================

// ====== 09. Owl-Carousel - Productos recomendados (articulos.php) ====================================
$(document).ready(function () {
    let owl4 = $(".owl-carouselArticulosRecomendados");
    owl4.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        },
        responsiveBaseElement: '.owl-carouselArticulosRecomendados'
    });

    $(".owl-nextArticleRecommended").click(function () {
        owl4.trigger("next.owl.carousel");
    });

    $(".owl-prevArticleRecommended").click(function () {
        owl4.trigger("prev.owl.carousel");
    });
});
// =====================================================================================================

// ====== 10. Preview de la imagen de perfil en el formulario de registro ==============================
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var img = document.getElementById('imagePreview');
        img.src = reader.result;
        img.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}

// ====== 11. Validación de formularios con Bootstrap ===================================================
// Un ejemplo de código JavaScript básico para evitar que se envíen formularios si hay campos inválidos
(() => {
    'use strict'

    // Obtenga todos los formularios a los que deseamos aplicar estilos de validación personalizados de Bootstrap
    const forms = document.querySelectorAll('.needs-validation')

    // Recorrerlos y prevenir su envío
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()
// =====================================================================================================

// ====== 12. Script para el buscador general ==========================================================
function submitForm() {
    var searchTerm = document.getElementById('cajaBuscador').value.trim();
    if (searchTerm !== '') {
        window.location.href = 'productSearch.php?buscar=' + searchTerm;
    }
}

function checkSubmit(e) {
    if (e.key === 'Enter') {
        var searchTerm = document.getElementById('cajaBuscador').value.trim();
        if (searchTerm !== '') {
            window.location.href = 'productSearch.php?buscar=' + searchTerm;
        }
    }
}
// =====================================================================================================

// ====== 13. Script para el buscador de la parte de soporte ===========================================
function submitFormSupport() {
    var searchTerm = document.getElementById('cajaBuscador').value.trim();
    if (searchTerm !== '') {
        window.location.href = '../productSearch.php?buscar=' + searchTerm;
    }
}

function checkSubmitSupport(e) {
    if (e.key === 'Enter') {
        var searchTerm = document.getElementById('cajaBuscador').value.trim();
        if (searchTerm !== '') {
            window.location.href = '../productSearch.php?buscar=' + searchTerm;
        }
    }
}
// =====================================================================================================

// ====== 14. Script para que al pulsar el botón "Loguéate para dejar tu opinión" vayamos a la página de login
document.getElementById("goToLoginButton").addEventListener("click", function () {
    window.location.href = "login.php";
});
// =====================================================================================================

// ====== 15. Función que pregunta si se desea eliminar el registro de usuario =========================
function confirmarEliminarUsuario(usuario, id) {
    let respuesta = confirm("¿Estás seguro de que quieres eliminar al usuario " + usuario + "?");
    if (respuesta == true) {
        location.href = "controlador/borrarUsuario.php?id=" + id;
    } else if (respuesta == false) {
        location.href = "admin-panel.php?id=2";
    }
}
// =====================================================================================================

// ====== 16. Función que pregunta si se desea eliminar el producto ====================================
function confirmarEliminarProducto(producto, id) {
    let respuesta = confirm("¿Estás seguro de que quieres eliminar el producto " + producto + "?");
    if (respuesta == true) {
        location.href = "controlador/borrarProducto.php?id=" + id;
    } else if (respuesta == false) {
        location.href = "admin-panel.php?id=3";
    }
}
// =====================================================================================================

// ====== 17. Scripts que al seleccionar pago con tarjeta muestra el formulario para rellenar con los datos (payment.php)
function mostrarDetallesTarjeta(radioButton) {
    var cardDetails = document.getElementById("card-details");
    if (radioButton.checked) {
        cardDetails.style.display = "block"; // Muestra el div cuando el radio button está seleccionado
    } else {
        cardDetails.style.display = "none"; // Esconde el div cuando el radio button no está seleccionado
    }
}

function ocultarDetallesTarjeta(radioButton) {
    var cardDetails = document.getElementById("card-details");
    cardDetails.style.display = "none"; // Muestra el div cuando el radio button está seleccionado
}
// =====================================================================================================


 