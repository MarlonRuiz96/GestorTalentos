
document.addEventListener("DOMContentLoaded", () => {
    // Funciones para ocultar y mostrar divs
    const toggleDivs = {
        ocultar: (clases) => {
            clases.forEach(clase => {
                document.querySelectorAll(`.${clase}`).forEach(div => {
                    div.style.display = 'none';
                });
            });
        },
        mostrar: (clase) => {
            document.querySelectorAll(`.${clase}`).forEach(div => {
                div.style.display = 'block';
            });
        }
    };

    // Manejo de la paginación para mostrar y ocultar divs
    const linksPaginacion = document.querySelectorAll('.pagination .page-link');
    const divClasses = ['div-ocultar', 'div-ocultar-2', 'div-ocultar-3', 'div-ocultar-4', 'div-ocultar-5'];

    linksPaginacion.forEach((link, index) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            toggleDivs.ocultar(divClasses);
            toggleDivs.mostrar(divClasses[index]);
        });
    });

    // Mostrar el primer div por defecto al cargar la página
    toggleDivs.ocultar(divClasses); // Primero ocultar todos
    toggleDivs.mostrar(divClasses[0]); // Luego mostrar el primero

    // Función general para manejar SweetAlert2
    const handleSweetAlert = (selector, options) => {
        const links = document.querySelectorAll(selector);
        links.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const targetUrl = link.getAttribute('href');
                const title = link.getAttribute('data-title');

                Swal.fire({
                    title: title,
                    text: options.text,
                    icon: options.icon,
                    showCancelButton: true,
                    confirmButtonColor: options.confirmButtonColor,
                    cancelButtonColor: options.cancelButtonColor,
                    confirmButtonText: options.confirmButtonText,
                    cancelButtonText: options.cancelButtonText
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: options.successTitle,
                            text: options.successText,
                            icon: 'success',
                            confirmButtonColor: '#3085d6'
                        }).then(() => {
                            window.location.href = targetUrl;
                        });
                    }
                });
            });
        });
    };

    // Configuración para diferentes tipos de SweetAlert2
    const sweetAlertConfigs = [{
            selector: '.sweetalert-guardar',
            options: {
                text: '¿Estás seguro?',
                icon: 'warning',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, Guardar',
                cancelButtonText: 'Cancelar',
                successTitle: 'Observaciones',
                successText: 'Observaciones guardadas con éxito.'
            }
        },
        {
            selector: '.sweetalert-activar',
            options: {
                text: '¿Estás seguro?',
                icon: 'warning',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, activar.',
                cancelButtonText: 'Cancelar',
                successTitle: 'Prueba activada.',
                successText: 'La prueba fue activada con éxito.'
            }
        },
        {
            selector: '.sweetalert-desactivar',
            options: {
                text: '¿Estás seguro?',
                icon: 'warning',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, Desactivar',
                cancelButtonText: 'Cancelar',
                successTitle: 'Prueba desactivada.',
                successText: 'La prueba fue desactivada con éxito.'
            }
        },
        {
            selector: '.sweetalert-reiniciar',
            options: {
                text: '¿Estás seguro?',
                icon: 'warning',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, Reiniciar datos',
                cancelButtonText: 'Cancelar',
                successTitle: 'Acción realizada con éxito.',
                successText: 'Los datos de la prueba fueron reiniciados con éxito.'
            }
        }
    ];

    // Aplicar las configuraciones de SweetAlert2
    sweetAlertConfigs.forEach(config => handleSweetAlert(config.selector, config.options));

    // Optimizar la ocultación de múltiples divs al final del documento
    document.querySelectorAll('.div-ocultar-2, .div-ocultar-3, .div-ocultar-4, .div-ocultar-5').forEach(
        div => {
            div.style.display = 'none';
        });
});
