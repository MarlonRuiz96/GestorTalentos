//Varaiable global que contiene el progreso del candidato
//VAR CANDIDATO_PROGRESO para manejar el progreso del usuario

document.addEventListener("DOMContentLoaded", function() {
    var comentarioRechazo = document.getElementById('divComentarioRechazo');
    comentarioRechazo.style.display = 'none'; // Oculta el comentario al cargar la página

    document.getElementById('RechazarCandidato').addEventListener('click', function() {
        if (comentarioRechazo.style.display === 'none') {
            comentarioRechazo.style.display = 'block'; // Muestra el comentario
            Swal.fire({
                icon: 'warning',
                title: 'Comentario requerido',
                text: 'Por favor, ingresa un comentario para rechazar al candidato.',
            });
        } else {
            comentarioRechazo.style.display = 'none';
        }
        
        if (CANDIDATO_PROGRESO == 6) {
            comentarioRechazo.style.display = 'none';
        }
    });

    // Lógica adicional para ocultar elementos si la etapa RECHAZADO
    if (CANDIDATO_PROGRESO == 5) {
        document.getElementById('formAgregarComentario').style.display = 'none';
        document.getElementById('RechazarCandidato').style.display = 'none';
        document.getElementById('btnContinuar').style.display = 'none';
        document.getElementById('comentarios').style.display = 'none';
        

    }
    if (CANDIDATO_PROGRESO == 5){
        document.getElementById('BotonAcciones').style.display = 'none';

    }

});

//Rechazar candidato

document.addEventListener("DOMContentLoaded", function() {
    const btnRechazarCandidato = document.getElementById('btnRechazarCandidato');

    if (btnRechazarCandidato) {
        btnRechazarCandidato.addEventListener('click', function() {
            const idCandidato = document.querySelector('[name="idCandidato"]').value;
            const comentarios = document.getElementById('comentarioRechazo').value;

            // Usamos la variable definida en la vista (SITE_URL_RECHAZAR_CANDIDATO)
            fetch(SITE_URL_RECHAZAR_CANDIDATO, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    idCandidato,
                    comentarios,
                }),
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Candidato rechazado',
                        text: '¡El candidato ha sido rechazado correctamente!.',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message ||
                            'No se pudo rechazar al candidato. Intenta nuevamente.',
                    });
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error en el servidor',
                    text: 'Hubo un problema con la solicitud.',
                });
            });
        });
    }
});

//FUNCIONALIDAD PARA CONTINUAR EL PROCESO DEL CANDIDATO, ESTA FUNCIONALIDAD LO QUE HACE ES QUE SUMA UN +1 EN EL PROGRESO DEL CANDIDATO

document.addEventListener("DOMContentLoaded", function() {
    const btnContinuar = document.getElementById("btnContinuar");

    if (btnContinuar) {
        btnContinuar.addEventListener("click", function() {
            // Rediriges usando la variable global definida en la vista:
            window.location.href = RUTA_CONTINUAR_PROCESO;
        });
    }
});
